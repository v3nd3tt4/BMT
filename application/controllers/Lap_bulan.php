<?php
/**
* 
*/
class Lap_bulan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		if($this->session->userdata('username')=="" /*|| $this->session->userdata('level')!='admin'*/){
			redirect(base_url());
		};
	}

	function index(){
		$data= array(
			'halaman' => 'admin',
			'title' => 'Laporan Bulanan',
			'page' => 'lap_bulan',

					
			//'tahun'=> $this->db->query("select * from transaksi_simpanan group by year(tanggal)"),
			//'bulan'=> $this->db->query("select * from transaksi_simpanan group by month(tanggal)")
			//'maps' => $this->Model->list_data('lokasi')
			//'admin' => $this->Model->list_data('user')
			//select * from invoice where month(tanggal)='$bulan' and year(tanggal)='$tahun'
		);
		$this->load->view('template/wrapper',$data);
	}

	function lihat(){
		$bulan = $this->input->post('bulan_lap_bulan');
		$tahun = $this->input->post('tahun_lap_bulan');
		$data = array(
			'title' => 'Laporan Bulanan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'setor' => $this->db->query("select sum(nominal) as setor from transaksi_simpanan where keterangan='setor' and month(tanggal_transaksi)=$bulan and year(tanggal_transaksi)=$tahun")->result(),
			'tarik' => $this->db->query("select sum(nominal) as tarik from transaksi_simpanan where keterangan='tarik' and month(tanggal_transaksi)=$bulan and year(tanggal_transaksi)=$tahun")->result(),
			'pembiayaan' => $this->db->query("select sum(pokok_pembiayaan) as pembiayaan from register_pembiayaan where month(tanggal)=$bulan and year(tanggal)=$tahun")->result(),
			'angsuran' => $this->db->query("select sum(nominal) as cicilan from transaksi_pembiayaan where month(tanggal)=$bulan and year(tanggal)=$tahun")->result(),
			'rincian' => $this->db->query("
				SELECT 
					produk.id_produk,
					produk.nama_produk,
					register_simpanan.id_register,
					SUM(transaksi_simpanan.nominal) AS n
				FROM 
					transaksi_simpanan
				JOIN 
					register_simpanan ON transaksi_simpanan.id_register_simpanan = register_simpanan.id_register
				JOIN 
					produk ON register_simpanan.id_produk = produk.id_produk
				WHERE 
					MONTH(tanggal_transaksi) = ? 
					AND YEAR(tanggal_transaksi) = ?
					AND transaksi_simpanan.keterangan = 'setor'
				GROUP BY 
					produk.id_produk, produk.nama_produk, register_simpanan.id_register
			", array($bulan, $tahun))->result(),

			'rincian_tarik' => $this->db->query("
				SELECT 
					produk.id_produk,
					produk.nama_produk,
					register_simpanan.id_register,
					SUM(transaksi_simpanan.nominal) AS n
				FROM 
					transaksi_simpanan
				JOIN 
					register_simpanan ON transaksi_simpanan.id_register_simpanan = register_simpanan.id_register
				JOIN 
					produk ON register_simpanan.id_produk = produk.id_produk
				WHERE 
					MONTH(tanggal_transaksi) = ? 
					AND YEAR(tanggal_transaksi) = ?
					AND transaksi_simpanan.keterangan = 'tarik'
				GROUP BY 
					produk.id_produk, produk.nama_produk, register_simpanan.id_register
			", array($bulan, $tahun))->result()
		);
		$this->load->view('cetak_lap_bulan',$data);
		

	}
}
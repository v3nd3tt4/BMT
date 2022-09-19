<?php
class Lap_pembiayaan_per_bulan extends CI_Controller
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
			'title' => 'Laporan Pembiayaan Bulanan',
			'page' => 'Lap_pembiayaan_per_bulan',

					
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
			'pembiayaan' => $this->db->query("select pokok_pembiayaan, register_pembiayaan.id, register_pembiayaan.no_anggota, anggota.nama, register_pembiayaan.jenis_pembiayaan, register_pembiayaan.tanggal,  register_pembiayaan.fee,  register_pembiayaan.tempo from register_pembiayaan join anggota on register_pembiayaan.no_anggota=anggota.id where month(tanggal)=$bulan and year(tanggal)=$tahun")->result(),
			'angsuran' => $this->db->query("select sum(nominal) as cicilan from transaksi_pembiayaan where month(tanggal)=$bulan and year(tanggal)=$tahun")->result(),
			'rincian' => $this->db->query("select *, sum(nominal) as n from transaksi_simpanan join register_simpanan on transaksi_simpanan.id_register_simpanan=register_simpanan.id_register join produk on register_simpanan.id_produk=produk.id_produk  where month(tanggal_transaksi)=$bulan and year(tanggal_transaksi)=$tahun and transaksi_simpanan.keterangan='setor' group by produk.id_produk")->result(),
			'rincian_tarik' => $this->db->query("select *, sum(nominal) as n from transaksi_simpanan join register_simpanan on transaksi_simpanan.id_register_simpanan=register_simpanan.id_register join produk on register_simpanan.id_produk=produk.id_produk  where month(tanggal_transaksi)=$bulan and year(tanggal_transaksi)=$tahun and transaksi_simpanan.keterangan='tarik' group by produk.id_produk")->result()
		);
		$this->load->view('cetak_lap_pembiayaan_per_bulan',$data);
		

	}

}
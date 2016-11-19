<?php
class Lap_sisa_angsuran_pembiayaan extends CI_Controller
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
			'title' => 'Laporan sisa angsuran pembiayaan',
			'page' => 'lap_sisa_angsuran_pembiayaan'

					
			//'tahun'=> $this->db->query("select * from transaksi_simpanan group by year(tanggal)"),
			//'bulan'=> $this->db->query("select * from transaksi_simpanan group by month(tanggal)")
			//'maps' => $this->Model->list_data('lokasi')
			//'admin' => $this->Model->list_data('user')
			//select * from invoice where month(tanggal)='$bulan' and year(tanggal)='$tahun'
		);
		$this->load->view('template/wrapper',$data);
	}

	function lihat(){
		$tgl = $this->input->post('tgl_lap_sisa_angsuran_pembiayaan');
		$data = array(
			'title' => 'cetak laporan sisa angsuran pembiayaan',
			'tanggal' => $tgl,
			'semua' => $this->db->query("select sum(pokok_pembiayaan) as pokok, sum(fee) as fee from register_pembiayaan")->result(),
			'sisa_semua' => $this->db->query("select sum(nominal) as uang from transaksi_pembiayaan")->result(),
			'sisa' => $this->db->query("select sum(nominal) as uang from transaksi_pembiayaan where tanggal<='$tgl'")->result()
		);
		$this->load->view('cetak_lap_sisa_angsuran_pembiayaan',$data);
	}

}
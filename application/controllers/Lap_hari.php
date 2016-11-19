<?php

/**
* 
*/
class Lap_hari extends CI_Controller
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
			'title' => 'Laporan Harian',
			'page' => 'lap_hari'
			//'maps' => $this->Model->list_data('lokasi')
			//'admin' => $this->Model->list_data('user')
		);
		$this->load->view('template/wrapper',$data);
	}

	function lihat(){
		$tanggal = $this->input->post('tanggal_lap_hari');

		$data = array(
			'tanggal' => $tanggal,
			'setor' => $this->db->query("select sum(nominal) as setor from transaksi_simpanan where keterangan='setor' and tanggal_transaksi='$tanggal'")->result(),
			'tarik' => $this->db->query("select sum(nominal) as tarik from transaksi_simpanan where keterangan='tarik' and tanggal_transaksi='$tanggal'")->result(),
			'pembiayaan' => $this->db->query("select sum(pokok_pembiayaan) as pembiayaan from register_pembiayaan where tanggal='$tanggal'")->result(),
			'angsuran' => $this->db->query("select sum(nominal) as cicilan from transaksi_pembiayaan where tanggal='$tanggal'")->result(),
			'rincian' => $this->db->query("select *, sum(nominal) as n from transaksi_simpanan join register_simpanan on transaksi_simpanan.id_register_simpanan=register_simpanan.id_register join produk on register_simpanan.id_produk=produk.id_produk  where tanggal_transaksi='$tanggal' and transaksi_simpanan.keterangan='setor' group by produk.id_produk")->result(),
			'rincian_tarik' => $this->db->query("select *, sum(nominal) as n from transaksi_simpanan join register_simpanan on transaksi_simpanan.id_register_simpanan=register_simpanan.id_register join produk on register_simpanan.id_produk=produk.id_produk  where tanggal_transaksi='$tanggal' and transaksi_simpanan.keterangan='tarik' group by produk.id_produk")->result()
		);
		$this->load->view('cetak_lap_hari',$data);
	}
}
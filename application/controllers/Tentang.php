<?php

/**
* 
*/
class Tentang extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
		if($this->session->userdata('username')=="" /*|| $this->session->userdata('level')!='admin'*/){
			redirect(base_url());
		};
	}

	public function index()
	{
		$data= array(
			'halaman' => 'admin',
			'title' => 'Tentang',
			'page' => 'tentang',
			//'maps' => $this->Model->list_data('lokasi')
			//'pembiayaan' => $this->db->query('select pokok_pembiayaan, register_pembiayaan.id, register_pembiayaan.no_anggota, anggota.nama, register_pembiayaan.jenis_pembiayaan,  register_pembiayaan.fee,  register_pembiayaan.tempo from register_pembiayaan join anggota on register_pembiayaan.no_anggota=anggota.id')->result()
			//'produk' => $this->Model->list_data('produk')
		);
		$this->load->view('template/wrapper',$data);
	}
}
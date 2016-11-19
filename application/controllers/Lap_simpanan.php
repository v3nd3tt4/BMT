<?php

class Lap_simpanan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model');
		if($this->session->userdata('username')=="" /*|| $this->session->userdata('level')!='admin'*/){
			redirect(base_url());
		};
	}

	function index(){
		$data= array(
			'halaman' => 'admin',
			'title' => 'Lap_simpanan',
			'page' => 'lap_simpanan',
			'produk' => $this->Model->list_data('produk')
		);
		$this->load->view('template/wrapper',$data);
	}

	function lihat(){
		$id = $this->input->post('produk');
		$tanggal = $this->input->post('tanggal');
		$data = array(
			'title' => 'Laporan Bulanan'
			'produk' => $id,
			'$tanggal' => $tanggal,
			'jumlah_setor' => $this->db->query("select sum()"),
			'jumlah_tarik' => $this->db->query("")
		);
		$this->load->view('cetak_lap_simpanan', $data);

	}

}
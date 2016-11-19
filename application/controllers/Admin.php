<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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
			'title' => 'admin',
			'page' => 'admin',
			//'maps' => $this->Model->list_data('lokasi')
			'admin' => $this->Model->list_data('user')
		);
		$this->load->view('template/wrapper',$data);
	}

	public function input_data(){
		$username = $this->input->post('username');
		$cek = $this->Model->cek_data('username', $username, 'user')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Username sudah digunakan !</div>';
		}else{
			$data = array(
				'nama' => $this->input->post('nama'), 
				'username' => $this->input->post('username'), 
				'password' => md5($this->input->post('password')), 
				'level' => $this->input->post('level')
				);
			$simpan = $this->Model->input_data($data, 'user');
			if($simpan){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
				echo'<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
			}
		}
	}

	public function hapus_data(){
		$id=$this->input->post('id');
		$hapus = $this->Model->hapus_data('username', $id, 'user');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	public function edit_data(){
		$username = $this->input->post('username');
		$data =  array(
			'nama' => $this->input->post('nama'),
			'password' => md5($this->input->post('password')),
			'level' => $this->input->post('level')
		);
		$update = $this->Model->edit_data('username', $username, 'user', $data);
		if($update){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
		}
	}

	public function ambil(){
		$username = $this->input->post('id');
		$data = $this->Model->ambil('username', $username, 'user')->row();

		echo json_encode($data);
	}

}
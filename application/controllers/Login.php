<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		//if($this->session->userdata('username')=="" /*|| $this->session->userdata('level')!='admin'*/){
			//redirect(base_url());
		//}
	}

	public function index(){
		$this->load->view('login');
	 }

	 function login(){
	 	$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		
		if($username==''){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Username harus diisi !</div>';
		}
		else if($password=='' || $password=='d41d8cd98f00b204e9800998ecf8427e' ){
			echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Password harus diisi !</div>';
		}
		else{
			$data=array(
			'username'=>$username,
			'password'=>$password
			);
			$hasil=$this->Model->cek_user($data, 'user');
			if($hasil->num_rows()==1){
				foreach($hasil->result() as $sess){
					$sess_data['logged_in']='Berhasil Login';
					//$sess_data['id']=$sess->id;
					$sess_data['username']=$sess->username;
					$sess_data['nama']=$sess->nama;
					$sess_data['password']=$sess->password;
					$sess_data['level']=$sess->level;
					$this->session->set_userdata($sess_data);
				};
				echo'<script>window.location.href="'.base_url().'welcome";</script>';
				echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>User ditemukan, sedang menyambungkan..</div>';

				/*if($this->session->userdata('level')=='admin'){
					echo'<script>window.location.href="'.base_url().'admin";</script>';
					echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>User ditemukan, sedang menyambungkan..</div>';
				}
				else if($this->session->userdata('level')=='konsumen'){
					echo'<script>location.reload();</script>';
					echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>User ditemukan, sedang menyambungkan..</div>';
				}*/
			}
			else{
					echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> User tidak ditemukan !</div>';
				}
			
			
		}

	 }

	function logout(){
		echo 'Please wait...';
		$this->session->unset_userdata('username');
		session_destroy();
		redirect(base_url(),'refresh');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

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
			'title' => 'anggota',
			'page' => 'anggota',
			//'maps' => $this->Model->list_data('lokasi')
			'anggota' => $this->Model->list_data('anggota')
		);
		$this->load->view('template/wrapper',$data);
	}

	public function input_data(){
		$id_anggota = $this->input->post('nomor_anggota');
		$cek = $this->Model->cek_data('id', $id_anggota, 'anggota')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> nomor anggota sudah digunakan !</div>';
		}else{
			$data = array(
				'id' => htmlspecialchars($this->input->post('nomor_anggota')), 
				'nama' => htmlspecialchars($this->input->post('nama_anggota')), 
				'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')), 
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'agama' => $this->input->post('agama'),
				'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan')),
				'ayah' => htmlspecialchars($this->input->post('ayah')),
				'ibu' => htmlspecialchars($this->input->post('ibu')), 
				'alamat' => htmlspecialchars($this->input->post('alamat')), 
				'no_hp' => $this->input->post('nomor_hp')
				);
			$simpan = $this->Model->input_data($data, 'anggota');
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
		$hapus = $this->Model->hapus_data('id', $id, 'anggota');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	public function edit_data(){
		$id_anggota = $this->input->post('nomor_anggota');
		$data =  array(
			'id' => htmlspecialchars($this->input->post('nomor_anggota')), 
			'nama' => htmlspecialchars($this->input->post('nama_anggota')), 
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')), 
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'agama' => $this->input->post('agama'),
			'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan')),
			'ayah' => htmlspecialchars($this->input->post('ayah')),
			'ibu' => htmlspecialchars($this->input->post('ibu')), 
			'alamat' => htmlspecialchars($this->input->post('alamat')), 
			'no_hp' => $this->input->post('nomor_hp')
		);
		$update = $this->Model->edit_data('id', $id_anggota, 'anggota', $data);
		if($update){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
		}
	}

	public function ambil(){
		$username = $this->input->post('id');
		$data = $this->Model->ambil('id', $username, 'anggota')->row();

		echo json_encode($data);
	}

	public function lihat($id){
		$data= array(
			//'id' => $id,
			//'page' => 'cetak_anggota',
			'ambil' => $this->Model->ambil('id', $id, 'anggota')->row()
		);
		$this->load->view('cetak_anggota', $data);
	}

}
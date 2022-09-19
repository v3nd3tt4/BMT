<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
			'title' => 'produk',
			'page' => 'produk',
			//'maps' => $this->Model->list_data('lokasi')
			'produk' => $this->Model->list_data('produk')
		);
		$this->load->view('template/wrapper',$data);
	}

	public function input_data(){
		$username = $this->input->post('jenis_produk');
		$cek = $this->Model->cek_data('id_produk', $username, 'produk')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Username sudah digunakan !</div>';
		}else{
			$data = array(
				'id_produk' => htmlspecialchars($this->input->post('jenis_produk')), 
				'nama_produk' => htmlspecialchars($this->input->post('keterangan_produk')), 
				'presentase' => $this->input->post('presentase_mudharabah'),
				//'kategori'=> $this->input->pos('kategori_produk')
				//'level' => 'admin'
				);
			$simpan = $this->Model->input_data($data, 'produk');
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
		$hapus = $this->Model->hapus_data('id_produk', $id, 'produk');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	public function edit_data(){
		$username = $this->input->post('jenis_produk');
		$data =  array(
			//'id_produk' => htmlspecialchars($this->input->post('jenis_produk')), 
			'nama_produk' => htmlspecialchars($this->input->post('keterangan_produk')), 
			'presentase' => $this->input->post('presentase_mudharabah'),
			//'kategori'=> $this->input->post('kategori_produk')
		);
		$update = $this->Model->edit_data('id_produk', $username, 'produk', $data);
		if($update){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
		}
	}

	public function ambil(){
		$username = $this->input->post('id');
		$data = $this->Model->ambil('id_produk', $username, 'produk')->row();

		echo json_encode($data);
	}
	
	public function detail_produk($id_produk){
		$data= array(
			'halaman' => 'admin',
			'title' => 'produk',
			'page' => 'detail-produk',
			//'maps' => $this->Model->list_data('lokasi')
			'produk' => $id_produk,
			'list' => $this->db->query("SELECT transaksi_simpanan.id_register_simpanan, anggota.nama, sum(transaksi_simpanan.nominal) as nominal FROM anggota 
left join register_simpanan on anggota.id = register_simpanan.no_anggota
left join transaksi_simpanan on transaksi_simpanan.id_register_simpanan = register_simpanan.id_register
where transaksi_simpanan.keterangan='setor' and register_simpanan.id_produk = '$id_produk'
group by transaksi_simpanan.id_register_simpanan")
		);
		$this->load->view('template/wrapper',$data);
	}

}
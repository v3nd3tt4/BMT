<?php

class Register_simpanan extends CI_Controller {

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
			'title' => 'register_simpanan',
			'page' => 'register_simpanan',
			//'maps' => $this->Model->list_data('lokasi')
			'pendaftar' => $this->db->query('select id_register, id_produk, no_anggota, nama from register_simpanan join anggota on register_simpanan.no_anggota=anggota.id')->result(),
			'produk' => $this->Model->list_data('produk')
		);
		$this->load->view('template/wrapper',$data);
	}

	public function hapus_data(){
		$id=$this->input->post('id');
		$hapus = $this->Model->hapus_data('id_register', $id, 'register_simpanan');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	public function hapus_data_transaksi(){
		$id=$this->input->post('id');
		$hapus = $this->Model->hapus_data('id', $id, 'transaksi_simpanan');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	public function input_data(){		
		$data = array(
			'id_produk' => htmlspecialchars($this->input->post('id_produk_penyimpan')), 
			'no_anggota' => htmlspecialchars($this->input->post('nomor_anggota_penyimpan')), 
			//'presentase' => $this->input->post('presentase_mudharabah'),
			//'kategori'=> $this->input->pos('kategori_produk')
			//'level' => 'admin'
			);
		$simpan = $this->Model->input_data($data, 'register_simpanan');
		if($simpan){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
		}

	}

	public function ambil_nama(){
		$id=$this->input->post('id');
		$data=$this->db->query("select nama from anggota where id like '%$id%' ");
		if($data->num_rows() ==0){
			echo 'tidak ada';
		}else{
			echo json_encode($data->row());
		}		
	}

	public function transaksi($id){
		$setor='setor';
		$data = array(
			'title' => 'transaksi',
			'page' => 'transaksi',
			'semua' => $this->db->query("select produk.id_produk, produk.nama_produk, produk.presentase, register_simpanan.no_anggota, anggota.nama from register_simpanan join anggota on register_simpanan.no_anggota=anggota.id join produk on register_simpanan.id_produk=produk.id_produk where id_register=$id")->row(),
			'transaksi' => $this->Model->ambil('id_register_simpanan',$id,'transaksi_simpanan')->result(),
			'saldo' => $this->db->query("select sum(nominal) as nominal from transaksi_simpanan where keterangan='setor' and id_register_simpanan=$id ")->result(),
			'tarik' => $this->db->query("select sum(nominal) as tarik from transaksi_simpanan where keterangan='tarik' and id_register_simpanan=$id")->result(),
			'id' => $id
		);
		$this->load->view('template/wrapper',$data);
	}

	public function input_data_transaksi(){
		$data = array(
			'id_register_simpanan' => $this->input->post('id_register_simpanan'),
			'nominal' => htmlspecialchars($this->input->post('nominal-transaksi')), 
			'tanggal_transaksi' => htmlspecialchars($this->input->post('tanggal-transaksi-simpanan')), 
			'petugas'=> $this->session->userdata('username'),
			'keterangan' => $this->input->post('kategori_simpanan')
			
			//'level' => 'admin'
			);
		$simpan = $this->Model->input_data($data, 'transaksi_simpanan');
		if($simpan){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
		}
	}

	function cetak($id){
		$setor='setor';
		$data = array(
			'title' => 'transaksi',
			'page' => 'transaksi',
			'semua' => $this->db->query("select produk.id_produk, produk.nama_produk, produk.presentase, register_simpanan.no_anggota, anggota.nama from register_simpanan join anggota on register_simpanan.no_anggota=anggota.id join produk on register_simpanan.id_produk=produk.id_produk where id_register=$id")->row(),
			'transaksi' => $this->Model->ambil('id_register_simpanan',$id,'transaksi_simpanan')->result(),
			'saldo' => $this->db->query("select sum(nominal) as nominal from transaksi_simpanan where keterangan='setor' and id_register_simpanan=$id ")->result(),
			'tarik' => $this->db->query("select sum(nominal) as tarik from transaksi_simpanan where keterangan='tarik' and id_register_simpanan=$id")->result(),
			'id' => $id
		);
		$this->load->view('cetak_simpanan',$data);
	}



}
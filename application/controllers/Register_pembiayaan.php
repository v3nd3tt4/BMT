<?php

class Register_pembiayaan extends CI_Controller {

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
			'title' => 'register_pembiayaan',
			'page' => 'register_pembiayaan',
			//'maps' => $this->Model->list_data('lokasi')
			'pembiayaan' => $this->db->query('select pokok_pembiayaan, register_pembiayaan.id, register_pembiayaan.no_anggota, anggota.nama, register_pembiayaan.jenis_pembiayaan,  register_pembiayaan.fee,  register_pembiayaan.tempo from register_pembiayaan join anggota on register_pembiayaan.no_anggota=anggota.id')->result()
			//'produk' => $this->Model->list_data('produk')
		);
		$this->load->view('template/wrapper',$data);
	}

	public function input_data(){		
		$data = array(
			//'id_produk' => htmlspecialchars($this->input->post('id_produk_penyimpan')), 
			'no_anggota' => htmlspecialchars($this->input->post('nomor_anggota_pembiayaan')), 
			'jenis_pembiayaan' => $this->input->post('jenis_pembiayaan'),
			'pokok_pembiayaan' => $this->input->post('pokok-pembiayaan'),
			'fee'=> $this->input->post('margin_keuntungan'),
			'tempo' => $this->input->post('tempo'),
			'tanggal' => $this->input->post('tanggal_pembiayaan')
			);
		$simpan = $this->Model->input_data($data, 'register_pembiayaan');
		if($simpan){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
		}

	}
    public function input_data_transaksi(){	
    	/*$id=$this->input->post('id_register_pembiayaan');
        $angsuran=$this->db->query("select max(angsuran_ke) from transaksi_pembiayaan where id_register_pembiayaan=$id ")->result();
        $a = foreach ($angsuran as $angsuran) {
        	$angsuran1=$angsuran->angsuran_ke;
        };*/
		$data = array(
			//'id_produk' => htmlspecialchars($this->input->post('id_produk_penyimpan')), 
			'id_register_pembiayaan' => htmlspecialchars($this->input->post('id_register_pembiayaan')), 
			'nominal' => $this->input->post('nominal_transaksi_pembiayaan'),

			'tanggal' => $this->input->post('tanggal_transaksi_pembiayaan'),
			'petugas'=> $this->session->userdata('username'),
			'angsuran_ke' => $this->input->post('angsuran_ke_transaksi_pembiayaan')
			);
		$simpan = $this->Model->input_data($data, 'transaksi_pembiayaan');
		if($simpan){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
		}

	}

	public function hapus_data(){
		$id=$this->input->post('id');
		$hapus = $this->Model->hapus_data('id', $id, 'register_pembiayaan');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	public function hapus_data_transaksi_pembiayaan(){
		$id=$this->input->post('id');
		$hapus = $this->Model->hapus_data('id', $id, 'transaksi_pembiayaan');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	function transaksi($id){
		$data = array(
			'title' => 'transaksi_pembiayaan',
			'page' => 'transaksi_pembiayaan',
			'id' => $id,
			'semua' => $this->db->query("select register_pembiayaan.no_anggota, register_pembiayaan.tanggal, register_pembiayaan.fee, register_pembiayaan.tempo, register_pembiayaan.pokok_pembiayaan, register_pembiayaan.jenis_pembiayaan, anggota.nama from register_pembiayaan join anggota on anggota.id=register_pembiayaan.no_anggota where register_pembiayaan.id=$id")->row(),
            'sisa' => $this->db->query("select sum(nominal) as uang from transaksi_pembiayaan where id_register_pembiayaan=$id")->result(),
			'transaksi' => $this->Model->ambil('id_register_pembiayaan', $id, 'transaksi_pembiayaan')->result(),
			'angsuran_ke' => $this->db->query("select * from transaksi_pembiayaan where id_register_pembiayaan=$id ")->num_rows()
		);

		$this->load->view('template/wrapper',$data);

	}

	function cetak($id){
		$data = array(
			'title' => 'transaksi_pembiayaan',
			'page' => 'transaksi_pembiayaan',
			'id' => $id,
			'semua' => $this->db->query("select register_pembiayaan.no_anggota, register_pembiayaan.tanggal, register_pembiayaan.fee, register_pembiayaan.tempo, register_pembiayaan.pokok_pembiayaan, register_pembiayaan.jenis_pembiayaan, anggota.nama from register_pembiayaan join anggota on anggota.id=register_pembiayaan.no_anggota where register_pembiayaan.id=$id")->row(),
            'sisa' => $this->db->query("select sum(nominal) as uang from transaksi_pembiayaan where id_register_pembiayaan=$id")->result(),
			'transaksi' => $this->Model->ambil('id_register_pembiayaan', $id, 'transaksi_pembiayaan')->result(),
			'angsuran_ke' => $this->db->query("select * from transaksi_pembiayaan where id_register_pembiayaan=$id ")->num_rows()
		);

		$this->load->view('cetak_pembiayaan',$data);
	}

}
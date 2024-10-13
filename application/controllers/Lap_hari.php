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
		if ($this->session->userdata('username') == "" /*|| $this->session->userdata('level')!='admin'*/) {
			redirect(base_url());
		};
	}

	function index()
	{
		$data = array(
			'halaman' => 'admin',
			'title' => 'Laporan Harian',
			'page' => 'lap_hari'
			//'maps' => $this->Model->list_data('lokasi')
			//'admin' => $this->Model->list_data('user')
		);
		$this->load->view('template/wrapper', $data);
	}

	function lihat()
	{
		$tanggal = $this->input->post('tanggal_lap_hari');

		$data = array(
			'tanggal' => $tanggal,
			'setor' => $this->db->query("select sum(nominal) as setor from transaksi_simpanan where keterangan='setor' and tanggal_transaksi='$tanggal'")->result(),
			'tarik' => $this->db->query("select sum(nominal) as tarik from transaksi_simpanan where keterangan='tarik' and tanggal_transaksi='$tanggal'")->result(),
			'pembiayaan' => $this->db->query("select sum(pokok_pembiayaan) as pembiayaan from register_pembiayaan where tanggal='$tanggal'")->result(),
			'angsuran' => $this->db->query("select sum(nominal) as cicilan from transaksi_pembiayaan where tanggal='$tanggal'")->result(),
			'rincian' => $this->db->query("
				SELECT 
					produk.id_produk,
					produk.nama_produk,
					register_simpanan.id_register,
					SUM(transaksi_simpanan.nominal) AS n
				FROM 
					transaksi_simpanan
				JOIN 
					register_simpanan ON transaksi_simpanan.id_register_simpanan = register_simpanan.id_register
				JOIN 
					produk ON register_simpanan.id_produk = produk.id_produk
				WHERE 
					transaksi_simpanan.tanggal_transaksi = ? 
					AND transaksi_simpanan.keterangan = 'setor'
				GROUP BY 
					produk.id_produk, produk.nama_produk, register_simpanan.id_register
			", array($tanggal))->result(),

						'rincian_tarik' => $this->db->query("
				SELECT 
					produk.id_produk,
					produk.nama_produk,
					register_simpanan.id_register,
					SUM(transaksi_simpanan.nominal) AS n
				FROM 
					transaksi_simpanan
				JOIN 
					register_simpanan ON transaksi_simpanan.id_register_simpanan = register_simpanan.id_register
				JOIN 
					produk ON register_simpanan.id_produk = produk.id_produk
				WHERE 
					transaksi_simpanan.tanggal_transaksi = ? 
					AND transaksi_simpanan.keterangan = 'tarik'
				GROUP BY 
					produk.id_produk, produk.nama_produk, register_simpanan.id_register
			", array($tanggal))->result()
		);
		$this->load->view('cetak_lap_hari', $data);
	}
}

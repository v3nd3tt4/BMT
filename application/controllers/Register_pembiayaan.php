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
			'pembiayaan' => $this->db->query('select pokok_pembiayaan, register_pembiayaan.id, register_pembiayaan.no_anggota, anggota.nama, register_pembiayaan.jenis_pembiayaan,  register_pembiayaan.fee,  register_pembiayaan.tempo from register_pembiayaan join anggota on register_pembiayaan.no_anggota=anggota.id')->result(),

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

	public function sudah_lunas(){
		$data= array(
			'halaman' => 'admin',
			'title' => 'register_pembiayaan_sudah_lunas',
			'page' => 'register_pembiayaan_sudah_lunas',
			//'maps' => $this->Model->list_data('lokasi')
			'pembiayaan' => $this->db->query('select pokok_pembiayaan, register_pembiayaan.id, register_pembiayaan.no_anggota, anggota.nama, register_pembiayaan.jenis_pembiayaan,  register_pembiayaan.fee,  register_pembiayaan.tempo from register_pembiayaan join anggota on register_pembiayaan.no_anggota=anggota.id')->result(),

			//'produk' => $this->Model->list_data('produk')
		);
		$this->load->view('template/wrapper',$data);
	}
	
	public function mandek(){
		$data= array(
			'halaman' => 'admin',
			'title' => 'register_pembiayaan_mandek',
			'page' => 'cek_npl',
		);
		$this->load->view('template/wrapper',$data);
	}
	
	public function data_npl(){
		echo '<div class="pull-right">';
			echo '<button id="hitugNpl" class="btn btn-danger"><i class="fa fa-refresh"></i> Hitung Manual</button><br/><br/>';
		echo '</div>';
		echo '<table class="table table-striped">';
			echo '<tr>';
				echo '<th><input type="checkbox"  class="checkbox select_all "></th>';
				echo '<th>No. </th>';
				echo '<th>Nama</th>';
				echo '<th>Tanggal Jatuh Tempo</th>';
				echo '<th>Tanggal Terakhir Bayar</th>';
				echo '<th>Detail</th>';
				echo '<th>Pembiayaan</th>';
				echo '<th>Sub Total</th>';
			echo '</tr>';
		
		
		$tanggal = @$this->input->post('tanggal', true);
		
		$pecah = explode('-', $tanggal);
		$tahun = $pecah[0];
		$bulan = $pecah[1];
		$tgl = $pecah[2];

		$tglHariIni = new DateTime(date('Y-m-d'));
		$data_reg_pembiayaan = $this->db->query("select anggota.id as id_anggota, register_pembiayaan.id as id_register_pembiayaan, anggota.nama as nama_anggota, register_pembiayaan.fee as fee, register_pembiayaan.tempo as tempo, register_pembiayaan.pokok_pembiayaan as pokok_pembiayaan, day(register_pembiayaan.tanggal) as tglJthTempo, register_pembiayaan.tanggal as tglRegister from register_pembiayaan join anggota on anggota.id = register_pembiayaan.no_anggota
			where day(register_pembiayaan.tanggal) = '$tgl'
			");
		$tot = 0;
		$no = 1;
		foreach($data_reg_pembiayaan->result() as $list){
			$id_register_pembiayaan = $list->id_register_pembiayaan;
			$angsuran = ($list->fee + $list->pokok_pembiayaan) / $list->tempo ;
			$cek_trx = $this->db->get_where('transaksi_pembiayaan', array('id_register_pembiayaan' => $id_register_pembiayaan));
			$cekLastTrx = $this->db->query("select * from transaksi_pembiayaan where id_register_pembiayaan = '$id_register_pembiayaan' order by tanggal DESC Limit 1");
			if($cekLastTrx->num_rows() != 0){
				$re = $cekLastTrx->row()->tanggal;
				// $tglTerakhirBayar = new DateTime($cekLastTrx->row()->tanggal);

				$tglTerakhirBayar = new DateTime(date('Y-m',strtotime($cekLastTrx->row()->tanggal)).'-'.$list->tglJthTempo);
			}else{
				$re = 'belum pernah bayar';
				$tglTerakhirBayar = new DateTime($list->tglRegister);
			} 
			if(count($cek_trx->result()) < $list->tempo){
				$difference = $tglHariIni->diff($tglTerakhirBayar);
				$m = $difference->format('%m');
				$y = $difference->format('%y');
				$d = $difference->format('%d');
				$diff = date_diff($tglTerakhirBayar, $tglHariIni);
				$month = $diff->y * 12 + $diff->m + $diff->d/30;
				
				if($month >= 1){
					$monthTampil = number_format($month, 2);
					$monthHitung = explode('.',$monthTampil);
					$monthHitung = $monthHitung[0];
					$subTotal = $monthHitung * $angsuran; 
					$tot += $subTotal;
					// if(date('d', strtotime($cekLastTrx->row()->tanggal)) > date('d',strtotime($list->tglRegister))){ $trColor =  'style="background: red; color: #fff"';
					// }else{
					// 	$trColor = '';
					// }
					// echo '<tr '.$trColor.'>';
					echo '<tr>';
						echo '<td><input name="selector[]" type="checkbox" value="'.$subTotal.'" class="checkbox checkbox1 "></td>';
						echo '<td>'.$no++.'.</td>';
						echo '<td><a href="'.base_url().'register_pembiayaan/transaksi/'.$id_register_pembiayaan.'" target="_blank">'.$list->nama_anggota.'</a></td>';
						echo '<td>'.$list->tglJthTempo.'</td>';
						echo '<td>'. $re.'</td>';
						echo '<td>'.$monthTampil.' Bulan </td>';
						echo '<td>Rp. '.number_format($angsuran).'</td>';
						echo '<td>Rp. '.number_format($subTotal, 2).' </td>';
					echo '</tr>';
				}
			}
		}
			echo '<tr>';
				echo '<td colspan="7" style="text-align: right"><b>Total Pembiayaan Yang Belum Dibayar :</b></td>';
				echo '<td>Rp. '.number_format($tot).'</td>';
			echo '<tr>';
			echo '<tr style="display: none; color: red" class="resultManualNpl">';
				echo '<td colspan="7" style="text-align: right"><b>Total Pembiayaan Yang Belum Dibayar (Manual) :</b></td>';
				echo '<td><div id="mandekManual"></div></td>';
			echo '<tr>';
		echo '</table>';
	}

}
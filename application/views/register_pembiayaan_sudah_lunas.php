<!-- <button class="btn btn-default" id="tambah-pembiayaan">Tambah..</button> -->
<br/>
<br/>
<div class="table-responsive">
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>No Anggota</th>
			<th>Nama anggota</th>
			<th>Jenis Pembiayaan</th>
			<th>Pokok Pembiayaan</th>
			<th>Margin Keuntungan</th>
			<th>Total Pembiayaan</th>
			<th>Tempo</th>
			<th>Jumlah Angsuran</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no=1;
		foreach($pembiayaan as $data){
      $cek_sama_ga = $this->Model->ambil('id_register_pembiayaan', $data->id, 'transaksi_pembiayaan');

      $jumlah_sudah_trx = count($cek_sama_ga->result());

      if($jumlah_sudah_trx == $data->tempo){
	?>
		<tr>
			<td><?=$no++;?>. </td>
			<td><?=$data->no_anggota?></td>
			<td><?=$data->nama?></td>
			<td><?=$data->jenis_pembiayaan?></td>
			<td>Rp. <?=number_format($data->pokok_pembiayaan)?>,-</td>
			<td>Rp. <?=number_format($data->fee)?>,-</td>			
			<td>Rp. <?=number_format($data->fee + $data->pokok_pembiayaan)?>,-</td>
			<td><?=$data->tempo?> Bulan</td>
			<td>Rp. <?=number_format(($data->fee + $data->pokok_pembiayaan) / $data->tempo)?>,-</td>
			<td>
			<!-- <a href="#" class="hapus-pembiayaan" id="<?=$data->id?>">Hapus</a>
			 | 
			<a href="<?=base_url()?>register_pembiayaan/transaksi/<?=$data->id?>" class="edit-produk" id="">Transaksi</a> 
      |-->
      <a href="<?=base_url()?>register_pembiayaan/cetak/<?=$data->id?>" target="_blank">Lihat</a>
			</td>
		</tr>
	<?php
  }
		}
	?>
	</tbody>

</table>
</div>
<br/><br/><br/>
<!-- Modal -->
<div id="modal-pembiayaan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register Pembiayaan</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-pembiayaan"></div>

        <form id="form-pembiayaan">
        	<div class="form-group">
        		<label>Nomor Anggota:</label>
        		<input type="text" class="form-control" name="nomor_anggota_pembiayaan" id="nomor_anggota_pembiayaan"  required="required" />
        	</div>
        	<div class="form-group">
        		<label>Nama Anggota:</label>
        		<input type="text" class="form-control" name="nama_anggota_pembiayaan" id="nama_anggota_pembiayaan"  required="required" readonly="readonly" />
        	</div>
        	<div class="form-group">
        		<label>Pokok Pembiayaan (Rp.):</label>
        		<input type="text" class="form-control" name="pokok-pembiayaan" id="pokok-pembiayaan"  required="required" value="0" />
        	</div>
        	<div class="form-group">
        		<label>Jenis Pembiayaan:</label>
        		<select class="form-control" name="jenis_pembiayaan" id="jenis_pembiayaan" required="required" >
        			<option>--pilih--</option>       			
        			<option value="murabahah">murabahah</option>
        			<option value="mudharabah">mudharabah</option>
        			<option value="hawalah">hawalah</option>  
              <option value="ijarah">ijarah</option>       			
        		</select> 
        		<input type="text" id="aksi-pembiayaan" name="aksi-pembiayaan" style="display: none;"  />
        	</div>   
        	<div class="form-group">
        		<label>Margin Keuntungan (Rp.):</label>
        		<input type="number" class="form-control" name="margin_keuntungan" id="margin_keuntungan" required="required" value="0" />
        	</div>
        	<div class="form-group">
        		<label>Tempo (Bulan):</label>
        		<input type="number" class="form-control" name="tempo" id="tempo" required="required" value="0" />
        	</div>
          <div class="form-group">
            <label>Tanggal:</label>
            <input type="date" class="form-control" name="tanggal_pembiayaan" id="tanggal_pembiayaan" required="required" />
          </div>
        	<!--<div class="form-group">
        		<label>Kategori:</label>
        		<select class="form-control" name="kategori_produk" id="kategori_produk" required="required">
        			<option>--pilih--</option>
        			<option value="simpanan">simpanan</option>
        			<option value="pembiayaan">pembiayaan</option>
        		</select>
        	</div>-->
        	<input type="submit" class="btn btn-primary" value="Submit" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->

<!-- Modal -->
<div id="modal-hapus-pembiayaan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pembiayaan</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-hapus-pembiayaan"></div>
       	<p>Apakah anda yakin akan menghapus data ini ?</p>
       	<button type="button" class="btn btn-danger" id="proses-hapus-pembiayaan">Ya</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

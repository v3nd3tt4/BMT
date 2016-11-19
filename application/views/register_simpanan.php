<button class="btn btn-default" id="tambah-penyimpan">Tambah..</button>
<br/>
<br/>
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Jenis Produk Simpanan</th>
			<th>nomor_anggota</th>
			<th>nama</th>
			<!--<th>Kategori</th>-->
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no=1;
		foreach($pendaftar as $data){
	?>
		<tr>
			<td><?=$no++;?>.</td>
			<td><?=$data->id_produk?></td>
			<td><?=$data->no_anggota?></td>
			<td><?=$data->nama?></td>
			
			<td>
			<a href="#" class="hapus-penyimpan" id="<?=$data->id_register?>">Hapus</a>
			 | 
			<a href="<?=base_url()?>register_simpanan/transaksi/<?=$data->id_register?>" class="edit-produk" id="">Transaksi</a>
      |
      <a href="<?=base_url()?>register_simpanan/cetak/<?=$data->id_register?>" target="_blank">Lihat</a>
			</td>
		</tr>
	<?php
		}
	?>
	</tbody>

</table>
<br/><br/><br/>
<!-- Modal -->
<div id="modal-penyimpan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-penyimpan"></div>

        <form id="form-penyimpan">
        	<div class="form-group">
        		<label>Jenis Produk:</label>
        		<select class="form-control" name="id_produk_penyimpan" id="jenis_produk" required="required" >
        			<option>--pilih--</option>
        			<?php
        				foreach ($produk as $produk) {
        			?>
        			<option value="<?=$produk->id_produk?>"><?=$produk->nama_produk?></option>
        			<?php
        				}
        			?>
        		</select> 
        		<input type="text" id="aksi-penyimpan" name="aksi-penyimpan" style="display: none;"  />
        		
        	</div>
        	<div class="form-group">
        		<label>Nomor Anggota:</label>
        		<input type="text" class="form-control" name="nomor_anggota_penyimpan" id="nomor_anggota_penyimpan"  required="required" />
        	</div>
        	<div class="form-group">
        		<label>Nama Anggota:</label>
        		<input type="text" class="form-control" name="nama_anggota_penyimpan" id="nama_anggota_penyimpan"  required="required" readonly="readonly" />
        	</div>

        	<!--<div class="form-group">
        		<label>Presentase Mudharabah (%):</label>
        		<input type="number" class="form-control" name="presentase_mudharabah" id="presentase_mudharabah" required="required" value="0" />
        	</div>
        	<div class="form-group">
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
<div id="modal-hapus-penyimpan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Produk</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-hapus-penyimpan"></div>
       	<p>Apakah anda yakin akan menghapus data ini ?</p>
       	<button type="button" class="btn btn-danger" id="proses-hapus-penyimpan">Ya</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

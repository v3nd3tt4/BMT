<button class="btn btn-default" id="tambah-produk">Tambah..</button>
<br/>
<br/>
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Jenis Produk</th>
			<th>Keterangan</th>
			<th>presentase Mudharabah</th>
			<!--<th>Kategori</th>-->
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no=1;
		foreach($produk as $data){
	?>
		<tr>
			<td><?=$no++;?>.</td>
			<td><?=$data->id_produk?></td>
			<td><?=$data->nama_produk?></td>
			<td><?=$data->presentase?>%</td>
			
			<td>
			<a href="#" class="hapus-produk" id="<?=$data->id_produk?>">Hapus</a>
			 | 
			<a href="#" class="edit-produk" id="<?=$data->id_produk?>">Edit</a>
			</td>
		</tr>
	<?php
		}
	?>
	</tbody>

</table>
<br/><br/><br/>
<!-- Modal -->
<div id="modal-produk" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Produk</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-produk"></div>

        <form id="form-produk">
        	<div class="form-group">
        		<label>Jenis Produk:</label>
        		<input type="text" class="form-control" name="jenis_produk" id="jenis_produk" required="required" />
        		<input type="text" id="aksi-produk" name="aksi-produk" style="display: none;"  />
        		
        	</div>
        	<div class="form-group">
        		<label>Keterangan Produk:</label>
        		<input type="text" class="form-control" name="keterangan_produk" id="keterangan_produk"  required="required" />
        	</div>
        	<div class="form-group">
        		<label>Presentase Mudharabah (%):</label>
        		<input type="text" class="form-control" name="presentase_mudharabah" id="presentase_mudharabah" required="required" value="0" />
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
<div id="modal-hapus-produk" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Produk</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-hapus-produk"></div>
       	<p>Apakah anda yakin akan menghapus data ini ?</p>
       	<button type="button" class="btn btn-danger" id="proses-hapus-produk">Ya</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
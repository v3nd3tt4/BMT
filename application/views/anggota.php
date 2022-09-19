<button class="btn btn-default" id="tambah-anggota">Tambah..</button>
<br/>
<br/>
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Anggota</th>
			<th>Nama Anggota</th>
			
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no=1;
		foreach($anggota as $data){
	?>
		<tr>
			<td><?=$no++;?>.</td>
			<td><?=$data->id?></td>
			<td><?=$data->nama?></td>
			
			<td>
			<a href="#" class="hapus-anggota" id="<?=$data->id?>">Hapus</a>
			 | 
			<a href="#" class="edit-anggota" id="<?=$data->id?>">Edit</a>
      |
      <a href="<?=base_url()?>anggota/lihat/<?=$data->id?>" target="_blank" >Lihat</a>
			</td>
		</tr>
	<?php
		}
	?>
	</tbody>

</table>
<br/><br/><br/>
<!-- Modal -->
<div id="modal-anggota" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Anggota</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-anggota"></div>

        <form id="form-anggota">
        	<div class="form-group">
        		<label>Nomor Anggota:</label>
        		<input type="text" class="form-control" name="nomor_anggota" id="nomor_anggota" required="required" />
        		<input type="text" id="aksi-anggota" name="aksi-anggota" style="display: none;"  />
        		
        	</div>
        	<div class="form-group">
        		<label>Nama Anggota:</label>
        		<input type="text" class="form-control" name="nama_anggota" id="nama_anggota"  required="required" />
        	</div>
        	<div class="form-group">
        		<label>Tempat Lahir:</label>
        		<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required="required" />
        	</div>
        	<div class="form-group">
        		<label>Tanggal Lahir:</label>
        		<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required="required" />
        	</div>
        	<div class="form-group">
        		<label>Jenis Kelamin:</label>
        		<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required="required" >
        			<option>--pilih--</option>
        			<option value="pria">pria</option>
        			<option value="wanita">wanita</option>
        		</select>
        	</div>
        	<div class="form-group">
        		<label>Agama:</label>
        		<select class="form-control" name="agama" id="agama" required="required" >
        			<option>--pilih--</option>
        			<option value="islam">islam</option>
        			<option value="kristen">kristen</option>
        			<option value="katolik">katolik</option>
        			<option value="hindu">hindu</option>
        			<option value="budha">budha</option>
        			<option value="kongucu">kongucu</option>
        		</select>
        	</div>
        	<div class="form-group">
        		<label>Pekerjaan:</label>
        		<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required="required" />
        	</div>
        	<div class="form-group">
        		<label>Nama Ayah:</label>
        		<input type="text" class="form-control" name="ayah" id="ayah" required="required" />
        	</div>
        	<div class="form-group">
        		<label>Nama Ibu:</label>
        		<input type="text" class="form-control" name="ibu" id="ibu" required="required" />
        	</div>
        	<div class="form-group">
        		<label>Alamat</label>
        		<textarea class="form-control" name="alamat" id="alamat" required="required" style="resize: none"></textarea>
        	</div>
        	<div class="form-group">
        		<label>Nomor HP:</label>
        		<input type="text" class="form-control" name="nomor_hp" id="nomor_hp" required="required">
        	</div>
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
<div id="modal-hapus-anggota" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Anggota</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-hapus-anggota"></div>
       	<p>Apakah anda yakin akan menghapus data ini ?</p>
       	<button type="button" class="btn btn-danger" id="proses-hapus-anggota">Ya</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
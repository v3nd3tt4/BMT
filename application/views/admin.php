<button class="btn btn-default" id="tambah-admin">Tambah..</button>
<br/>
<br/>
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Nama</th>
			<th>Level</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no=1;
		foreach($admin as $data){
	?>
		<tr>
			<td><?=$no++;?>.</td>
			<td><?=$data->username?></td>
			<td><?=$data->nama?></td>
			<td><?=$data->level?></td>
			<td>
			<a href="#" class="hapus-admin" id="<?=$data->username?>">Hapus</a>
			 | 
			<a href="#" class="edit-admin" id="<?=$data->username?>">Edit</a>
			</td>
		</tr>
	<?php
		}
	?>
	</tbody>

</table>
<br/><br/><br/>
<!-- Modal -->
<div id="modal-admin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Admin</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-admin"></div>

        <form id="form-admin">
        	<div class="form-group">
        		<label>Username:</label>
        		<input type="text" class="form-control" name="username" id="username" required="required" />
        		<input type="text" id="aksi-admin" name="aksi-admin" style="display: none;"  />
        		
        	</div>
        	<div class="form-group">
        		<label>Nama:</label>
        		<input type="text" class="form-control" name="nama" id="nama"  required="required" />
        	</div>
        	<div class="form-group">
        		<label>Password:</label>
        		<input type="password" class="form-control" name="password" id="password" required="required" />
        	</div>
          <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="level" id="level" required="required">
              <option>--pilih--</option>
              <option value="admin">admin</option>
              <option value="master">master</option>
            </select>            
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
<div id="modal-hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Admin</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-hapus-admin"></div>
       	<p>Apakah anda yakin akan menghapus data ini ?</p>
       	<button type="button" class="btn btn-danger" id="proses-hapus-admin">Ya</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
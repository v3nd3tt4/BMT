<table class="table table-bordered">
<tr>
<td>Nomor Anggota</td><td>:</td><td> <?=$semua->no_anggota?></td>
</tr>
<tr>
<td>Nama </td><td>:</td><td> <?=$semua->nama?></td>
</tr>
<tr>
<td>Produk Simpanan </td><td>:</td><td> <?=$semua->nama_produk?> (<?=$semua->id_produk?>)</td>
</tr>
<tr>
<td>Saldo </td><td>:</td><td><?php foreach($saldo as $saldo){ 
	foreach($tarik as $tarik){
	$uang= 'Rp. '.number_format($saldo->nominal-$tarik->tarik).',-';
	}
	}?> <?=$uang?> </td>
</tr>
<tr>
<td>Presentase Mudharabah </td><td>:</td><td> <?=$semua->presentase?>% </td>
</tr>
<tr>
<td>Nominal Mudharabah </td><td>:</td><td>Rp. <?=number_format(($semua->presentase/100)*($saldo->nominal-$tarik->tarik))?></td>
</tr>
</table>
<button class="btn btn-primary" id="tambah-transaksi-simpanan">Tambah</button>

<br/><br/>
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Tarik</th>
			<th>Setor</th>
			<th>Tanggal</th>
			<th>Petugas</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no=1;
		foreach($transaksi as $data){
	?>
		<tr>
			<td><?=$no++;?>.</td>
			<?php
				$kat=$data->keterangan;
				if($kat=='tarik'){
					echo '<td>Rp. '.number_format($data->nominal).' ,-</td>';
					echo '<td>-</td>';
				}
				else{
					echo '<td>-</td>';
					echo '<td>Rp. '.number_format($data->nominal).' ,-</td>';
				}
			?>
			
			<td><?=$data->tanggal_transaksi?></td>
			<td><?=$data->petugas?></td>
			<td>
			<a href="#" class="hapus-transaksi-simpanan" id="<?=$data->id?>">Hapus</a>		</td>
		</tr>
	<?php
		}
	?>
	</tbody>

</table>
<br/><br/><br/>
<!-- Modal -->
<div id="modal-transaksi-simpanan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Transaksi Simpanan</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-transkasi-simpanan"></div>

        <form id="form-transaksi-simpanan">
        	
        	<div class="form-group">
        		<label>Nominal (Rp.):</label>
        		<input type="number" class="form-control" name="nominal-transaksi" id="nominal-transaksi"  required="required" placeholder="10000" />
        		<input type="text" id="aksi-transaksi-simpanan" style="display: none"/>
        		<input type="text" name="id_register_simpanan" id="id_register_simpanan" value="<?=$id?>" style="display: none"/>
        	</div>
        	<div class="form-group">
        		<label>Tanggal:</label>
        		<input type="date" class="form-control" name="tanggal-transaksi-simpanan" id="tanggal-transaksi-simpanan"  required="required"  />
        	</div>


        	<!--<div class="form-group">
        		<label>Presentase Mudharabah (%):</label>
        		<input type="number" class="form-control" name="presentase_mudharabah" id="presentase_mudharabah" required="required" value="0" />
        	</div>-->
        	<div class="form-group">
        		<label>Kategori:</label>
        		<select class="form-control" name="kategori_simpanan" id="kategori_simpanan" required="required">
        			<option>--pilih--</option>
        			<option value="setor">setor</option>
        			<option value="tarik">tarik</option>
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
<div id="modal-hapus-transaksi-simpanan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Transaksi</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-hapus-transaksi-simpanan"></div>
       	<p>Apakah anda yakin akan menghapus data ini ?</p>
       	<button type="button" class="btn btn-danger" id="proses-hapus-transaksi-simpanan">Ya</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<table class="table table-bordered">
<tr>
<td>Nomor Anggota</td><td>:</td><td> <?=$semua->no_anggota?></td>
</tr>
<tr>
<td>Nama </td><td>:</td><td> <?=$semua->nama?></td>
</tr>
<tr>
<td>Jenis Pembiayaan </td><td>:</td><td> <?=$semua->jenis_pembiayaan?> </td>
</tr>
<tr>
<td>Pokok Pembiayaan</td><td>:</td><td>Rp. <?=number_format($semua->pokok_pembiayaan)?>,-</td>
</tr>
<tr>
<td>Margin Keuntungan </td><td>:</td><td>Rp. <?=number_format($semua->fee)?>,- </td>
</tr>
<tr>
<td>Total Pembiayaan </td><td>:</td><td>Rp. <?=number_format($semua->fee+$semua->pokok_pembiayaan)?>,- </td>
</tr>
<tr>
<td>Tempo </td><td>:</td><td><?=$semua->tempo?> Bulan </td>
</tr>
<tr>
<td>Jumlah Angsuran </td><td>:</td><td>Rp. <?=number_format(($semua->fee + $semua->pokok_pembiayaan) / $semua->tempo)?>,-</td>
</tr>
<tr>
<td>Sisa Angsuran Yang Belum Dibayar </td><td>:</td><td><?php foreach($sisa as $sisa){
    echo 'Rp. '.number_format(($semua->fee+$semua->pokok_pembiayaan)-$sisa->uang).',-';
}?> </td>
</tr>
<tr>
<td>Tanggal Jatuh Tempo </td><td>:</td><td><?=date('d',strtotime($semua->tanggal))?></td>
</tr>
</table>
<button class="btn btn-primary" id="tambah-transaksi-pembiayaan">Angsur</button>

<br/><br/>
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>			
			<th>Nominal</th>
			<th>Tanggal</th>
			<th>Petugas</th>
			<th>Angsuran Ke</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$no=1;
		foreach($transaksi as $data){
	?>
		<tr>
            <td><?=$no++?></td>
			<td>Rp. <?=number_format($data->nominal)?></td>			
			<td><?=$data->tanggal?></td>
			<td><?=$data->petugas?></td>
            <td><?=$data->angsuran_ke?></td>
			<td>
			<a href="#" class="hapus-transaksi-pembiayaan" id="<?=$data->id?>">Hapus</a>	
            </td>	
		</tr>
	<?php
		}
	?>
	</tbody>

</table>
<br/><br/><br/>
<!-- Modal -->
<div id="modal-transaksi-pembiayaan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Transaksi Pembiayaan</h4>
      </div>
      <div class="modal-body">
      	<div id="notif-transaksi-pembiayaan"></div>

        <form id="form-transaksi-pembiayaan">
        	<div class="form-group">
        		<label>Nominal:</label>
        		<input type="text" class="form-control" value="Rp. <?=number_format(($semua->fee + $semua->pokok_pembiayaan) / $semua->tempo)?>,-" readonly="readonly" required="required" />
                <input type="text" class="form-control" name="nominal_transaksi_pembiayaan" id="nominal_transaksi_pembiayaan" value="<?=($semua->fee + $semua->pokok_pembiayaan) / $semua->tempo?>" readonly="readonly" required="required" style="display: none"/>
                <input type="text" id="aksi-transaksi-pembiayaan" style="display: none"/> 
                <input type="text" name="id_register_pembiayaan" id="id_register_pembiayaan" value="<?=$id?>" style="display: none" />
        	</div>
        	<div class="form-group">
        		<label>Tanggal:</label>
        		<input type="date" class="form-control" name="tanggal_transaksi_pembiayaan" id="tanggal_transaksi_pembiayaan"  required="required" />
        	</div>
            <div class="form-group">
                <label>Angsuran Ke:</label>
                <input type="text" class="form-control" name="angsuran_ke_transaksi_pembiayaan" id="angsuran_ke_transaksi_pembiayaan"  required="required" value="<?=$angsuran_ke+1?>" readonly />
            </div>
        	<!--<div class="form-group">
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
<div id="modal-hapus-transaksi-pembiayaan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Transaksi pembiayaan</h4>
      </div>
      <div class="modal-body">
        <div id="notif-hapus-transaksi-pembiayaan"></div>
        <p>Apakah anda yakin akan menghapus data ini ?</p>
        <button type="button" class="btn btn-danger" id="proses-hapus-transaksi-pembiayaan">Ya</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
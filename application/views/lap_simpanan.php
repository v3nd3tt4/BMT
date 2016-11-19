<h3>
Laporan Simpanan
</h3>
<form method="POST" action="<?=base_url()?>lap_simpanan/lihat" class="form-inline">
	<div class="form-goup">
		<label>Pilih Produk Simpanan</label><br/>
		<select class="form-control" name="produk">
			<option>--pilih--</option>
			<?php
			foreach ($produk as $data) {
			?>
			<option value="<?=$data->id_produk?>"><?=$data->nama_produk?></option>
			<?php
			}
			?>
		</select>
	</div>
	<br/>
	<div class="form-group">
		<label>Tanggal</label><br/>
		<input type="date" name="tanggal" class="form-control"/>
	</div><br/><br/>
	<button class="btn btn-primary">Lihat</button>
</form>
<br/><br/>
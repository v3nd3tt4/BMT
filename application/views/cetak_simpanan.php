<?php include'header.php'; ?>
<body>
<div class="container">
<div class="row">
		<div class="col-md-12">
			<img src="<?=base_url()?>assets/logo.png" style="float: left"/>
		
			<h2>
				BMT La-Tahzan
			</h2>
			<p>
				<em>Lembaga Keuangan Syariah</em>
				<br/>
				JL. Raya Way Galih Gg. La Tahzan Tanjung Bintang - Lampung Selatan 35361 
			</p>
			<hr/>
			<center>
				<u>
					Laporan Transaksi Simpanan Per Anggota
				</u>
			</center>
		</div>
	</div><br/><br/>
<div class="row">
<div class="col-md-12">
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
</table>

<button class="btn btn-warning" onclick="window.print()">Cetak</button>
<br/><br/>
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Tarik</th>
			<th>Setor</th>
			<th>Tanggal</th>
			<th>Petugas</th>
			
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
			
		</tr>
	<?php
		}
	?>
	</tbody>

</table>
</div>
</div>
</div>

</body>
<?php include 'header.php' ?>
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
					Laporan Transaksi Pembiayaan Per Anggota
				</u>
			</center>
		</div>
	</div><br/><br/>
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
<button class="btn btn-warning" onclick="window.print()">Cetak</button>
<br/><br/>
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>			
			<th>Nominal</th>
			<th>Tanggal</th>
			<th>Petugas</th>
			<th>Angsuran Ke</th>
			
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
				
		</tr>
	<?php
		}
	?>
	</tbody>

</table>
<br/><br/><br/>
</div>

</body>
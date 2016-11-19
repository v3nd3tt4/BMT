<?php include 'header.php'; ?>
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
					Laporan Pembiayaan Per Bulan
				</u>
				<br/>
				Bulan: <?=$bulan?> &nbsp;&nbsp; Tahun: <?=$tahun?>
			</center>
		</div>
	</div><br/><br/>
	<button class="btn btn-warning" onclick="window.print()">Cetak</button><br/><br/>
	<div class="row">
		<div class="col-md-12">
		<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nomor Anggota</th>
				<th>Nama</th>
				<th>Jenis Pembiayaan</th>
				<th>Pokok Pembiayaan</th>
				<th>MK (Rp.)</th>
				<th>Total Pembiayaan</th>
				<th>Tempo</th>
				<th>Jumlah Angsuran</th>
				<th>Tanggal Jatuh Tempo</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no=1;
		foreach($pembiayaan as $data){
		?>
		<tr>
			<td><?=$no++;?>.</td>
			<td><?=$data->no_anggota?></td>
			<td><?=$data->nama?></td>
			<td><?=$data->jenis_pembiayaan?></td>
			<td>Rp. <?=number_format($data->pokok_pembiayaan)?>,-</td>
			<td>Rp. <?=number_format($data->fee)?>,-</td>			
			<td>Rp. <?=number_format($data->fee + $data->pokok_pembiayaan)?>,-</td>
			<td><?=$data->tempo?> Bulan</td>
			<td>Rp. <?=number_format(($data->fee + $data->pokok_pembiayaan) / $data->tempo)?>,-</td>
			<td>
			<?=date('d',strtotime($data->tanggal))?>
			</td>
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
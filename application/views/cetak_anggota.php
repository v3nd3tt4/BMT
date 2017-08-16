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
					Data Anggota
				</u>
			</center>
		</div>
	</div><br/><br/>
	<button class="btn btn-warning" onclick="window.print()">Cetak</button><br/><br/>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-striped">
				<tr>
					<td>Nomor Anggota</td>
					<td>:</td>
					<td><?=$ambil->id?></td>
				</tr>
				<tr>
					<td>Nama Anggota</td>
					<td>:</td>
					<td><?=$ambil->nama?></td>
				</tr>	
				<tr>
					<td>Tempat, Tanggal Lahir</td>
					<td>:</td>
					<td><?=$ambil->tempat_lahir.', '.$ambil->tanggal_lahir?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?=$ambil->jenis_kelamin?></td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>:</td>
					<td><?=$ambil->agama?></td>
				</tr>
				<tr>
					<td>Pekerjaan</td>
					<td>:</td>
					<td><?=$ambil->pekerjaan?></td>
				</tr>
				<tr>
					<td>Nama Ayah</td>
					<td>:</td>
					<td><?=$ambil->ayah?></td>
				</tr>
				<tr>
					<td>Nama Ibu</td>
					<td>:</td>
					<td><?=$ambil->ibu?></td>
				</tr>
				<tr>
					<td>Nomor Handphone</td>
					<td>:</td>
					<td><?=$ambil->no_hp?></td>
				</tr>	
					<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?=$ambil->alamat?></td>
				</tr>	
			</table>
		</div>
	</div>
</div>
</body>
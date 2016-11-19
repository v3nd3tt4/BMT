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
					Laporan Bulanan
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
				<tr>
					<td>Kas Koperasi</td>
					<td>:</td>
					<td><?php foreach($setor as $setor){
							$setor1=$setor->setor;
							//echo $setor1;
							foreach ($tarik as $tarik) {
								$tarik1=$tarik->tarik;
									foreach ($pembiayaan as $pembiayaan) {
										$pembiayaan1 = $pembiayaan->pembiayaan;
										foreach ($angsuran as $angsuran) {
											$angsuran1 = $angsuran->cicilan;

											$income_simpanan = ($setor1+$angsuran1)-($tarik1+$pembiayaan1);
											echo '<b>Rp. '.number_format($income_simpanan).',-</b>';
										}
									}
							}
						}?></td>
				</tr>
				<tr>
					<td>Jumlah Setoran Simpanan</td>
					<td>:</td>
					<td><?php 
					echo 'Rp. '.number_format($setor1).',-';
					?></td>
				</tr>
				<tr>
					<td>Jumlah Penarikan Simpanan</td>
					<td>:</td>
					<td><?php 
					echo 'Rp. '.number_format($tarik1).',-';
					?></td>
				</tr>
				<tr>
					<td>Jumlah Pembiayaan Yang dikeluarkan</td>
					<td>:</td>
					<td><?php 
					
						echo 'Rp. '.number_format($pembiayaan1).',-';
					
					?></td>
				</tr>
				<tr>
					<td>Jumlah Angsuran Pembiayaan</td>
					<td>:</td>
					<td><?php 
					
						echo 'Rp. '.number_format($angsuran1).',-';
					
					?></td>
				</tr>
			</table>
			<h2>Rincian Setoran</h2>
			<table class="table table-bordered table-striped">
			<?php
			$no=1;
				foreach($rincian as $data){
			?>

				<tr>
				<td><?=$no++?></td>
				<td><?=$data->nama_produk?></td>
				<td>:</td>
				<td>Rp. <?=number_format($data->n)?>,-</td>
				</tr>
			<?php
				}
			?>
			</table>
			<h2>Rincian Penarikan</h2>
			<table class="table table-bordered table-striped">
			<?php
			$no=1;
				foreach($rincian_tarik as $data){
			?>

				<tr>
				<td><?=$no++?></td>
				<td><?=$data->nama_produk?></td>
				<td>:</td>
				<td>Rp. <?=number_format($data->n)?>,-</td>
				</tr>
			<?php
				}
			?>
			</table>
		</div>
	</div>
	</div>
</body>
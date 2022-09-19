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
						Laporan Sisa Angsuran Pembiayaan
					</u>
					<br/>
					Tanggal : <?=date('d F Y',strtotime($tanggal))?>
				</center>
			</div>
		</div><br/><br/>
		<button  onclick="window.print()" class="btn btn-warning">Cetak</button><br/><br/>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered table-striped">
					<tr>
						<td>Akumulasi Seluruh Pembiayaan</td>
						<td>
							<?php
								foreach($semua as $semua){
									$semuanya = $semua->pokok+$semua->fee;
									echo 'Rp. '.number_format($semuanya);
								}
							?>
						</td>
					</tr>
					
					<tr>
						<td>Akumulasi Pembiayaan Yang Sudah Dibayar <br/>Sampai Dengan tanggal <?=date('d F Y',strtotime($tanggal))?></td>
						<td>
						<?php 
						foreach($sisa as $data){
							$u = $data->uang;
							echo 'Rp. '.number_format($data->uang);
						}
						?>								
						</td>
					</tr>
					<tr>
						<td>Sisa Pembiayaan Yang Belum Dibayar </td>
						<td>
						<?php 
							echo 'Rp. '. number_format($semuanya-$u);
						?>								
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
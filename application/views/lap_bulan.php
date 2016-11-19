<h1>
	Laporan Bulanan
</h1>
<form action="<?=base_url()?>lap_bulan/lihat" method="POST">
	<div class="form-group">
		<label>Bulan</label>
		<select  class="form-control" style="max-width: 200px" name="bulan_lap_bulan" id="bulan_lap_bulan">
			<option>--pilih--</option>
			<option value="01">Januari</option>
			<option value="02">Februari</option>
			<option value="03">Maret</option>
			<option value="04">April</option>
			<option value="05">Mei</option>
			<option value="06">Juni</option>
			<option value="07">JUli</option>
			<option value="08">Agustus</option>
			<option value="09">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		</select> 
	</div>
	<div class="form-group">
		<label>Tahun</label>
		<select  class="form-control" style="max-width: 200px" name="tahun_lap_bulan" id="tahun_lap_bulan">
			<option>--pilih--</option>
			<option value="2010">2010</option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option>
			<option value="2027">2027</option>
			<option value="2028">2028</option>
			<option value="2029">2029</option>
			<option value="2030">2030</option>
		</select> 
	</div>
	<button type="submit" class="btn btn-primary">Lihat</button>
</form>
<br/><br/><br/>
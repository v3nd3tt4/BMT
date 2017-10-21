<marquee>belum bisa digunakan, masih tahap pengembangan</marquee>
<form id="form_cek_npl">
	<div class="form-group">
		<label>Pilih Tanggal:</label>
		<input name="tanggal" type="date" class="form-control" required />
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Cek</button>
	</div>
</form>
<div id="result_npl"></div>
<br/><br/><br/>

<script>
	$(document).ready(function(){
		$(document).on('submit', '#form_cek_npl', function(e){
			e.preventDefault();
			$('#result_npl').html('Loading....');
			var data = $('#form_cek_npl').serialize();
			$.ajax({
				url: '<?=base_url()?>register_pembiayaan/data_npl',
				type: 'POST',
				data: data,
				success: function(msg){
					$('#result_npl').html(msg);
				}
			});
		});
	});
</script>
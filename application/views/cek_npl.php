<h4>Cek NPL</h4><hr/>
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
		$(document).on('click', '#hitugNpl', function(e){
			e.preventDefault();
		    var count = 0;
		    var table_abc = document.getElementsByClassName("checkbox1");
		    for (var i = 0; table_abc[i]; ++i) {
		        if (table_abc[i].checked) {
		            var value = table_abc[i].value;
		            count += Number(table_abc[i].value);
		        }
		    }
		    $('.resultManualNpl').show();

		    $('#mandekManual').html('Rp. '+addCommas(Math.round(count)));
		    var val = count;
					
			// $('#mandekManual').text( val !== '' ? 'Rp. '+val : '(empty)' );

		    // $('#mandekManual').number( true, 2 );
		});

		function addCommas(nStr)
		{
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
			    x1 = x1.replace(rgx, '$1' + ',' + '$2');
			}
			return x1 + x2;
		}

		$.fn.digits = function(){ 
		    return this.each(function(){ 
		        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
		    })
		}

		$(document).on('change', '.select_all', function(e) {
			e.preventDefault();
		    var c = this.checked;
    		$(':checkbox').prop('checked',c);
		});
	});
</script>
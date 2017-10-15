<table class="table table-striped">
	<tr>
		<td>Nama Produk</td>
		<td>:</td>
		<td><?=$produk?></td>
	</tr>
	<tr>
		<td>Total Saldo</td>
		<td>:</td>
		<td><span id="totalView"></span></td>
	</tr>
</table>
<br/><br/>
<table id="table" class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
		<?php $total = 0; $no = 1; foreach($list->result() as $data){
		$total += $data->nominal;
		?>
		<tr>
			<td><?=$no?>.</td>
			<td><?=$data->nama?></td>
			<td>Rp. <?=number_format($data->nominal).', -'?></td>
		</tr>
		<?php $no++;}?>
	</tbody>

</table>

<input type="hidden" id="total" value="Rp. <?=number_format($total).', -'?>" />
<br/><br/>
<br/><br/>
<script>
	$(document).ready(function(){
		var total = $('#total').val();
		$('#totalView').html(total)
	});

</script>
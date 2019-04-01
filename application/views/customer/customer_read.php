<!doctype html>
<html>
    <head>
        <title>Detail Order <?php echo $t_no_trans; ?></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <!-- <h2 style="margin-top:0px">Customer Read</h2>
        <table class="table">
	    <tr><td>C Name Sender</td><td><?php echo $c_name_sender; ?></td></tr>
	    <tr><td>C Address Sender</td><td><?php echo $c_address_sender; ?></td></tr>
	    <tr><td>C City Sender</td><td><?php echo $c_city_sender; ?></td></tr>
	    <tr><td>C Postcode Sender</td><td><?php echo $c_postcode_sender; ?></td></tr>
	    <tr><td>C Phone Sender</td><td><?php echo $c_phone_sender; ?></td></tr>
	    <tr><td>C Name Receiver</td><td><?php echo $c_name_receiver; ?></td></tr>
	    <tr><td>C Address Receiver</td><td><?php echo $c_address_receiver; ?></td></tr>
	    <tr><td>C City Receiver</td><td><?php echo $c_city_receiver; ?></td></tr>
	    <tr><td>C Postcode Receiver</td><td><?php echo $c_postcode_receiver; ?></td></tr>
	    <tr><td>C Phone Receiver</td><td><?php echo $c_phone_receiver; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table> -->
	<div id="printerwrapper">
		<h2><?php echo $t_no_trans; ?></h2>
		<img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$t_no_trans;?>.png">
		<table cellpadding="10">
			<tbody>
				<tr >
					<td style="width: 300px;">
						<b>Pengirim </b>:<br>
						<?php echo $c_name_sender; ?><br>
						<?php echo $c_address_sender; ?><br>
						<?php echo $c_city_sender; ?>
						<?php echo " ".$c_postcode_sender; ?><br>
						<?php echo "Tlpn.".$c_phone_sender; ?>
					</td>
					<td style="width: 300px;"></td>
					<td style="width: 300px;">
						<b>Penerima</b>:<br>
						<?php echo $c_name_receiver; ?><br>
						<?php echo $c_address_receiver; ?><br>
						<?php echo $c_city_receiver; ?>
						<?php echo " ".$c_postcode_receiver; ?><br>
						<?php echo "Tlpn.".$c_phone_receiver; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<table cellpadding="10" class="table table-bordered">
			<tbody>
				<tr>
					<td><b>Nama Barang</b> :</td>
					<td><b>Total Berat</b> :</td>
					<td><b>Deskripsi</b> :</td>
				</tr>
				<tr>
					<td><?php echo $dt_list_products; ?></td>
					<td><?php echo $dt_total_weight; ?></td>
					<td><?php echo $dt_desc; ?></td>
				</tr>
				<tr>
					<td><b>Total barang</b> :</td>
					<td><b>Jenis Packing</b> :</td>
				</tr>
				<tr>
					<td><?php echo $dt_total_items; ?></td>
					<td><?php foreach ($packing as $p){
						if($p->pk_id == $dt_packing){
							echo $p->pk_name;
							break;
						}
					} ?></td>
				</tr>
			</tbody>
		</table>
	</div>
		<input type="button" onclick="printDiv('printerwrapper')" value="Print" />
		<a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a>
        </body>
		<script type="text/javascript">
			function printDiv(divName) {
				var printContents = document.getElementById(divName).innerHTML;
				var originalContents = document.body.innerHTML;
				document.body.innerHTML = printContents;
				window.print();
				document.body.innerHTML = originalContents;
			}
		</script>
</html>
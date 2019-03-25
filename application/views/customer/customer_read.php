<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Customer Read</h2>
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
	</table>
        </body>
</html>
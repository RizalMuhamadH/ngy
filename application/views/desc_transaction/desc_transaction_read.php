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
        <h2 style="margin-top:0px">Desc_transaction Read</h2>
        <table class="table">
	    <tr><td>Dt List Products</td><td><?php echo $dt_list_products; ?></td></tr>
	    <tr><td>Dt Total Items</td><td><?php echo $dt_total_items; ?></td></tr>
	    <tr><td>Dt Total Weight</td><td><?php echo $dt_total_weight; ?></td></tr>
	    <tr><td>Dt Packing</td><td><?php echo $dt_packing; ?></td></tr>
	    <tr><td>Dt Total Price</td><td><?php echo $dt_total_price; ?></td></tr>
	    <tr><td>Dt Desc</td><td><?php echo $dt_desc; ?></td></tr>
	    <tr><td>Dt Date</td><td><?php echo $dt_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('desc_transaction') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
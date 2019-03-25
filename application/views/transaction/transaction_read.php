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
        <h2 style="margin-top:0px">Transaction Read</h2>
        <table class="table">
	    <tr><td>T No Trans</td><td><?php echo $t_no_trans; ?></td></tr>
	    <tr><td>T Date Delivery</td><td><?php echo $t_date_delivery; ?></td></tr>
	    <tr><td>T Date Reception</td><td><?php echo $t_date_reception; ?></td></tr>
	    <tr><td>T Status</td><td><?php echo $t_status; ?></td></tr>
	    <tr><td>T Desc</td><td><?php echo $t_desc; ?></td></tr>
	    <tr><td>Dt Id</td><td><?php echo $dt_id; ?></td></tr>
	    <tr><td>C Id</td><td><?php echo $c_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaction') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
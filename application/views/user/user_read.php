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
        <h2 style="margin-top:0px">Admin Read</h2>
        <table class="table">
	    <tr><td> Username</td><td><?php echo $_username; ?></td></tr>
	    <tr><td> Password</td><td><?php echo $_password; ?></td></tr>
	    <tr><td> Name</td><td><?php echo $_name; ?></td></tr>
	    <tr><td> Previllage</td><td><?php echo $_previllage; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
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
        <h2 style="margin-top:0px">Transaction <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">T No Trans <?php echo form_error('t_no_trans') ?></label>
            <input type="text" class="form-control" name="t_no_trans" id="t_no_trans" placeholder="T No Trans" value="<?php echo $t_no_trans; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">T Date Delivery <?php echo form_error('t_date_delivery') ?></label>
            <input type="text" class="form-control" name="t_date_delivery" id="t_date_delivery" placeholder="T Date Delivery" value="<?php echo $t_date_delivery; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">T Date Reception <?php echo form_error('t_date_reception') ?></label>
            <input type="text" class="form-control" name="t_date_reception" id="t_date_reception" placeholder="T Date Reception" value="<?php echo $t_date_reception; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">T Status <?php echo form_error('t_status') ?></label>
            <input type="text" class="form-control" name="t_status" id="t_status" placeholder="T Status" value="<?php echo $t_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="t_desc">T Desc <?php echo form_error('t_desc') ?></label>
            <textarea class="form-control" rows="3" name="t_desc" id="t_desc" placeholder="T Desc"><?php echo $t_desc; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Dt Id <?php echo form_error('dt_id') ?></label>
            <input type="text" class="form-control" name="dt_id" id="dt_id" placeholder="Dt Id" value="<?php echo $dt_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">C Id <?php echo form_error('c_id') ?></label>
            <input type="text" class="form-control" name="c_id" id="c_id" placeholder="C Id" value="<?php echo $c_id; ?>" />
        </div>
	    <input type="hidden" name="t_id" value="<?php echo $t_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaction') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
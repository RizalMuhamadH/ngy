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
        <h2 style="margin-top:0px">Desc_transaction <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="dt_list_products">Dt List Products <?php echo form_error('dt_list_products') ?></label>
            <textarea class="form-control" rows="3" name="dt_list_products" id="dt_list_products" placeholder="Dt List Products"><?php echo $dt_list_products; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Dt Total Items <?php echo form_error('dt_total_items') ?></label>
            <input type="text" class="form-control" name="dt_total_items" id="dt_total_items" placeholder="Dt Total Items" value="<?php echo $dt_total_items; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Dt Total Weight <?php echo form_error('dt_total_weight') ?></label>
            <input type="text" class="form-control" name="dt_total_weight" id="dt_total_weight" placeholder="Dt Total Weight" value="<?php echo $dt_total_weight; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Dt Packing <?php echo form_error('dt_packing') ?></label>
            <input type="text" class="form-control" name="dt_packing" id="dt_packing" placeholder="Dt Packing" value="<?php echo $dt_packing; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Dt Total Price <?php echo form_error('dt_total_price') ?></label>
            <input type="text" class="form-control" name="dt_total_price" id="dt_total_price" placeholder="Dt Total Price" value="<?php echo $dt_total_price; ?>" />
        </div>
	    <div class="form-group">
            <label for="dt_desc">Dt Desc <?php echo form_error('dt_desc') ?></label>
            <textarea class="form-control" rows="3" name="dt_desc" id="dt_desc" placeholder="Dt Desc"><?php echo $dt_desc; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Dt Date <?php echo form_error('dt_date') ?></label>
            <input type="text" class="form-control" name="dt_date" id="dt_date" placeholder="Dt Date" value="<?php echo $dt_date; ?>" />
        </div>
	    <input type="hidden" name="dt_id" value="<?php echo $dt_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('desc_transaction') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
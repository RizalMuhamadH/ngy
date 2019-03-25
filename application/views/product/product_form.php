<!doctype html>
<html>
    <head>
    </head>
    <body>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Barang
                <small><?php echo $button; ?></small>
                </h1>
                <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="product">Barang</a></li>
                <li class="active"><?php echo $button; ?></li>
                <!--
                <li><a href="#">Layout</a></li>
                <li class="active">Top Navigation</li>
                -->
                </ol>
            </section>

            <!-- Main content -->
	        <section class="content">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form barang <?php echo $button; ?></h3>
                    </div> <!-- box-header -->
                

                    <div class="box-body">
                        <!-- <h2 style="margin-top:0px">Users <?php echo $button ?></h2> -->
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="form-group">
                                <label for="varchar">Nama <?php echo form_error('p_name') ?></label>
                                <input type="text" class="form-control" name="p_name" id="p_name" placeholder="Nama" value="<?php echo $p_name; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="p_desc">Deskripsi <?php echo form_error('p_desc') ?></label>
                                <textarea class="form-control" rows="3" name="p_desc" id="p_desc" placeholder="Deskripsi"><?php echo $p_desc; ?></textarea>
                            </div>
                            <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('product') ?>" class="btn btn-default">Cancel</a>
                        </form>
                        
                    </div> <!-- box-body -->
                </div> <!-- box-info -->
            </section><!-- content -->
        </div> <!-- wrapper -->
    </body>
</html>
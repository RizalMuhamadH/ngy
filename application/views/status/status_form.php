<!doctype html>
<html>
    <head>
        <!-- jQuery 3.2.1 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Status
                <small><?php echo $button; ?></small>
                </h1>
                <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="user">Status</a></li>
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
                        <h3 class="box-title">Form User <?php echo $button; ?></h3>
                    </div> <!-- box-header -->
                

                    <div class="box-body">
                        <!-- <h2 style="margin-top:0px">Users <?php echo $button ?></h2> -->
                        <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Nama <?php echo form_error('s_name') ?></label>
                            <input type="text" class="form-control" name="s_name" id="s_name" placeholder="Nama" value="<?php echo $s_name; ?>" />
                        </div>
                        <input type="hidden" name="s_id" value="<?php echo $s_id; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('status') ?>" class="btn btn-default">Cancel</a>
                        </form>
                        
                    </div> <!-- box-body -->
                </div> <!-- box-info -->
            </section><!-- content -->
        </div> <!-- wrapper -->
    </body>
</html>
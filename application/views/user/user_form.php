<!doctype html>
<html>
    <head>
        <!-- jQuery 3.2.1 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#user_birthday').datepicker({
                    viewMode: 'years',
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                });
            });
        </script>
    </head>
    <body>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                User
                <small><?php echo $button; ?></small>
                </h1>
                <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="user">Users</a></li>
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
                                <label for="varchar"> Username <?php echo form_error('_username') ?></label>
                                <input type="text" class="form-control" name="_username" id="_username" placeholder=" Username" value="<?php echo $_username; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar"> Password <?php echo form_error('_password') ?></label>
                                <input type="text" class="form-control" name="_password" id="_password" placeholder=" Password" value="<?php echo $_password; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar"> Name <?php echo form_error('_name') ?></label>
                                <input type="text" class="form-control" name="_name" id="_name" placeholder=" Name" value="<?php echo $_name; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int"> Previllage <?php echo form_error('_previllage') ?></label>
                                <!-- <input type="text" class="form-control" name="_previllage" id="_previllage" placeholder=" Previllage" value="<?php echo $_previllage; ?>" /> -->
                                <select class="form-control" name="_previllage" id="_previllage">
                                    <option value="0" <?php if($_previllage == 0 ) echo 'selected="selected"'; ?>> Admin </option>
                                    <option value="1" <?php if($_previllage == 1 ) echo 'selected="selected"'; ?>> User </option>
                                </select>
                            </div>
                            <input type="hidden" name="_id" value="<?php echo $_id; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
                        </form>
                        
                    </div> <!-- box-body -->
                </div> <!-- box-info -->
            </section><!-- content -->
        </div> <!-- wrapper -->
    </body>
</html>
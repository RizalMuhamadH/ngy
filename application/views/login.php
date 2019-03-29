<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>NIPOINDO | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.4.5/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.4.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/AdminLTE-2.4.5/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>NIPOINDO</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?php echo site_url('user/login') ?>" method="post">
                    <div class="form-group has-feedback">
                        <div class="input-group">
	                        <span class="input-group-addon">
	                            <i class="glyphicon glyphicon-user"></i>
	                        </span>
	                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
	                    </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group">
	                        <span class="input-group-addon">
	                            <i class="glyphicon glyphicon-lock"></i>
	                        </span>
	                        <input class="form-control" placeholder="Password" name="password" type="password" autofocus>
	                    </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 pull-right">
                            <input type="submit" class="btn btn-primary btn-block pull-right" value="Sign in">
                        </div><!-- /.col -->
                    </div>
                </form>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/AdminLTE-2.4.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- jQuery-UI -->
        <script src="<?php echo base_url('assets/AdminLTE-2.4.5/plugins/jQueryUI/jquery-ui.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/AdminLTE-2.4.5/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/AdminLTE-2.4.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
    </body>
</html>
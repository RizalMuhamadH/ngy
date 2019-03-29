<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
    <title>CMS | NIPOINDO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.4.5/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.4.5/bower_components/ionicons/css/ionicons.min.css'); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.4.5/bower_components/datatables.net-bs/dataTables.bootstrap.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.4.5/dist/css/AdminLTE.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.4.5/dist/css/skins/_all-skins.min.css'); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css'); ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css'); ?>"> -->

    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.4.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
    <!-- select2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/select2/css/select2.min.css">

    <!-- UIkit -->
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/uikit.min.css"> -->
    
<!-- Content Wrapper. Contains page content -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>NI</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Nipoindo</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Selamat Datang, <?php echo $this->session->userdata('session_username'); ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo site_url('user/logout') ?>">Logout</a></li>
                </ul>
              </li>              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($page == "dashboard/index"){echo "active";} ?>">
              <a href="<?php echo base_url('dashboard') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>

            <li class="<?php if($page == 'user/user_list'){echo 'active';} ?>">
              <a href="<?php echo base_url('User') ?>">
                <i class="fa fa-user"></i> <span>User</span>
              </a>
            </li> 

            <li class="<?php if($page == 'product/product_list'){echo 'active';} ?>">
              <a href="<?php echo base_url('product') ?>">
                <i class="fa fa-cubes"></i> <span>Barang</span>
              </a>
            </li> 

            <li class="<?php if($page == 'customer/customer_list'){echo 'active';} ?>">
              <a href="<?php echo base_url('customer') ?>">
                <i class="fa fa-list-ol"></i> <span>Order</span>
              </a>
            </li> 

            <li class="<?php if($page == 'packing/packing_list'){echo 'active';} ?>">
              <a href="<?php echo base_url('packing') ?>">
                <i class="fa fa-suitcase"></i> <span>Jenis Packing</span>
              </a>
            </li> 

            <li class="<?php if($page == 'status/status_list'){echo 'active';} ?>">
              <a href="<?php echo base_url('status') ?>">
                <i class="fa fa-truck"></i> <span>Status</span>
              </a>
            </li> 

            <!-- <li class="<?php if($page == 'photo/photo_list'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>Photo">
                <i class="fa fa-file-image-o"></i> <span>Photo</span>
              </a>
            </li> 

            <li class="<?php if($page == 'video/video_list'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>Video">
                <i class="fa fa-file-video-o"></i> <span>Video</span>
              </a>
            </li> 

            <li class="<?php if($page == 'post/post_list'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>post">
                <i class="fa fa-camera-retro "></i> <span>Sharing Moment</span>
              </a>
            </li> 

            <li class="<?php if($page == 'document/document_list'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>Document">
                <i class="fa fa-file"></i> <span>Document</span>
              </a>
            </li>

            <li class="<?php if($page == 'comment_post/comment_post_list'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>Comment_post">
              <div id="messages"></div>
              <p id="token"></p>
                <i class="fa fa-comments-o"></i> <span>Comments</span>
              </a>
            </li> -->

          </ul>
        </section>
        <!-- /.sidebar -->
        
      </aside>

      <?php $this->load->view($page); ?>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy;   <a href="#">NIPOINDO</a>.</strong> All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <!-- <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.2.3.min.js"></script> -->
    <!-- <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- jQuery 3.2.1 -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- <script>
      $(function () {
        $("#example1").DataTable({          
          "language": {
            "url": "<?php echo base_url(); ?>assets/plugins/datatables/Indonesian.json",
            "sEmptyTable": "Tidak ada data di database"
        }
        });
      });
      $(function() {
          $( "#tgl_surat" ).datepicker({ 
            autoclose: true 
          });
        });
    </script> -->
    <!-- jQuery 2.1.3 -->
    <!-- <script src="<?php echo base_url('assets/AdminLTE-2.4.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script> -->
    <!-- jQuery-UI -->
    <script src="<?php echo base_url('assets/AdminLTE-2.4.5/plugins/jQueryUI/jquery-ui.min.js') ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.5/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.5/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.5/dist/js/adminlte.min.js"></script> 
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     <script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.5/dist/js/pages/dashboard.js"></script> 
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.5/dist/js/demo.js"></script> 
    <!-- select2 -->
    <script src="<?php echo base_url() ?>assets/select2/js/select2.full.min.js"></script>
    <!-- UIkit -->
    <!-- <script src="<?php echo base_url() ?>assets/js/uikit.js"></script> -->
    <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2();
            });
        </script>

    

    <!-- <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.2.1.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap3-wysihtml5.all.min.js"></script>
        <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    // CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script> -->
  </body>
</html>

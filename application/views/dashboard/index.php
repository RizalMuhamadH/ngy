
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i> Dashboard</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3><?php echo $count_user ?></h3>
                  <p>Admin</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="<?php echo base_url(); ?>Users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <!-- Small boxes (Stat box) -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $count_customer ?></h3>
                  <p>transaksi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list-ol"></i>
                </div>
                <a href="<?php echo base_url(); ?>Customer" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <!-- Small boxes (Stat box) -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $count_packing ?></h3>
                  <p>Jenis Packing</p>
                </div>
                <div class="icon">
                  <i class="fa fa-suitcase"></i>
                </div>
                <a href="<?php echo base_url(); ?>Packing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <!-- Small boxes (Stat box) -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-olive">
                <div class="inner">
                  <h3><?php echo $count_product ?></h3>
                  <p>Jenis Barang</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <a href="<?php echo base_url(); ?>Product" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <!-- Small boxes (Stat box) -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-olive">
                <div class="inner">
                  <h3><?php echo $count_status ?></h3>
                  <p>Status</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-video-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>Status" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            </div><!-- /.row -->
          </section>
            
 
            <!--Load chart js-->
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->


          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

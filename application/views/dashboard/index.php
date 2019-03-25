
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
                  <p>User</p>
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
                  <h3><?php echo $count_article ?></h3>
                  <p>News</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>News" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <!-- Small boxes (Stat box) -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $count_news_cat ?></h3>
                  <p>Category News</p>
                </div>
                <div class="icon">
                  <i class="fa fa-bookmark"></i>
                </div>
                <a href="<?php echo base_url(); ?>News_cat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <!-- Small boxes (Stat box) -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-olive">
                <div class="inner">
                  <h3><?php echo $count_foto ?></h3>
                  <p>Photo</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-image-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>Photo" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <!-- Small boxes (Stat box) -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-olive">
                <div class="inner">
                  <h3><?php echo $count_video ?></h3>
                  <p>Video</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-video-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>Video" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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

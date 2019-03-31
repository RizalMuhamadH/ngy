<head>
        <style>
            /* .dataTables_wrapper {
                min-height: 500px
            } */
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
        </style>
    </head>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin
                <small>Control Panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Admin</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            
            <div class="row pad">           
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="col-md-4">
                        </div>
                        <div class="box-tools">
                        <div class="text-right">
                            <?php echo anchor(site_url('user/create'), 'Create', 'class="btn btn-primary"'); ?>
                    <?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                    <?php echo anchor(site_url('user/word'), 'Word', 'class="btn btn-primary"'); ?>
                    </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    
                        <table class="table table-bordered table-striped" id="mytable">
                        <div class="text-center">
                        </div>
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                            <th> Username</th>
                            <th> Password</th>
                            <th> Name</th>
                            <th> Previllage</th>
                            <th width="200px">Action</th>
                                </tr>
                            </thead>
                        
                        </table>

                        <div style="margin-top: 4px"  id="message">
                            <?php if($this->session->userdata('message') <> ''){ ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->userdata('message'); ?>
                                </div>
                            <?php } ?>
                            
                            </div>
                        
                        <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                                {
                                    return {
                                        "iStart": oSettings._iDisplayStart,
                                        "iEnd": oSettings.fnDisplayEnd(),
                                        "iLength": oSettings._iDisplayLength,
                                        "iTotal": oSettings.fnRecordsTotal(),
                                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                                    };
                                };

                                var t = $("#mytable").dataTable({
                                    initComplete: function() {
                                        var api = this.api();
                                        $('#mytable_filter input')
                                                .off('.DT')
                                                .on('keyup.DT', function(e) {
                                                    if (e.keyCode == 13) {
                                                        api.search(this.value).draw();
                                            }
                                        });
                                    },
                                    oLanguage: {
                                        sProcessing: "loading..."
                                    },
                                    processing: true,
                                    serverSide: true,
                                    ajax: {"url": "user/json", "type": "POST"},
                                    columns: [
                                        {
                                            "data": "_id",
                                            "orderable": false
                                        },{"data": "_username"},{"data": "_password"},{"data": "_name"},{"data": "_previllage"},
                                        {
                                            "data" : "action",
                                            "orderable": false,
                                            "className" : "text-center"
                                        }
                                    ],
                                    order: [[0, 'desc']],
                                    rowCallback: function(row, data, iDisplayIndex) {
                                        var info = this.fnPagingInfo();
                                        var page = info.iPage;
                                        var length = info.iLength;
                                        var index = page * length + (iDisplayIndex + 1);
                                        $('td:eq(0)', row).html(index);
                                    }
                                });
                            });
                        </script>
                    </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
            

            </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
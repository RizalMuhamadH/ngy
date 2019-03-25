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
                Barang
                <small>Control Panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Barang</li>
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
                            <?php echo anchor(site_url('product/create'), 'Create', 'class="btn btn-primary"'); ?>
                            <?php echo anchor(site_url('product/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                            <?php echo anchor(site_url('product/word'), 'Word', 'class="btn btn-primary"'); ?>
                    </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                        <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th width="200px">Action</th>
                            </tr>
                        </thead>
                        
                        </table>
                        
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
                                    ajax: {"url": "product/json", "type": "POST"},
                                    columns: [
                                        {
                                            "data": "p_id",
                                            "orderable": false
                                        },{"data": "p_name"},{"data": "p_desc"},
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
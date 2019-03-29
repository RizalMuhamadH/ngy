<head>
        <style>
            /* .dataTables_wrapper {
                min-height: 500px
            } */
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                /* width: 100%; */
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
                Order
                <small>Control Panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Order</li>
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
                            <?php echo anchor(site_url('customer/create'), 'Create', 'class="btn btn-primary"'); ?>
                            <?php echo anchor(site_url('customer/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                            <?php echo anchor(site_url('customer/word'), 'Word', 'class="btn btn-primary"'); ?>
                    </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <div class="text-center">
                        </div>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Nama Pengirim</th>
                                    <th>Alamat Pengirim</th>
                                    <th>Kota Pengirim</th>
                                    <th>Kode Pos Pengirim</th>
                                    <th>Telpon Pengirim</th>
                                    <th>Nama Penerima</th>
                                    <th>Alamat Penerima</th>
                                    <th>Kota Penerima</th>
                                    <th>Kode Pos Penerima</th>
                                    <th>Telpon Penerima</th>
                                    <th>Status</th>
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
                                    ajax: {"url": "customer/json", "type": "POST"},
                                    columns: [
                                        {
                                            "data": "c_id",
                                            "orderable": false
                                        },{"data": "c_name_sender"},{"data": "c_address_sender"},{"data": "c_city_sender"},{"data": "c_postcode_sender"},{"data": "c_phone_sender"},{"data": "c_name_receiver"},{"data": "c_address_receiver"},{"data": "c_city_receiver"},{"data": "c_postcode_receiver"},{"data": "c_phone_receiver"},{"data": "s_name"},
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
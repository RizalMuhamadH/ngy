<!doctype html>
<html>
    <head>
        <!-- jQuery 3.2.1 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#date_time').datepicker({
                    viewMode: 'years',
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                });
            });
            $(function () {
                $('#date_time2').datepicker({
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
                Order
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
                        <h3 class="box-title">Form Order <?php echo $button; ?></h3>
                    </div> <!-- box-header -->
                

                    <div class="box-body">
                        <!-- <h2 style="margin-top:0px">Users <?php echo $button ?></h2> -->
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="form-group">
                                <label for="varchar">Nama Pengirim <?php echo form_error('c_name_sender') ?></label>
                                <input type="text" class="form-control" name="c_name_sender" id="c_name_sender" placeholder="Nama" value="<?php echo $c_name_sender; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="c_address_sender">Alamat Pengirim <?php echo form_error('c_address_sender') ?></label>
                                <textarea class="form-control" rows="3" name="c_address_sender" id="c_address_sender" placeholder="Alamat"><?php echo $c_address_sender; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Kota Pengirim <?php echo form_error('c_city_sender') ?></label>
                                <input type="text" class="form-control" name="c_city_sender" id="c_city_sender" placeholder="Kota" value="<?php echo $c_city_sender; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Kode Pos Pengirim <?php echo form_error('c_postcode_sender') ?></label>
                                <input type="text" class="form-control" name="c_postcode_sender" id="c_postcode_sender" placeholder="Kode Pos" value="<?php echo $c_postcode_sender; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">No. Telepon Pengirim <?php echo form_error('c_phone_sender') ?></label>
                                <input type="text" class="form-control" name="c_phone_sender" id="c_phone_sender" placeholder="Telepon" value="<?php echo $c_phone_sender; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Nama Penerima <?php echo form_error('c_name_receiver') ?></label>
                                <input type="text" class="form-control" name="c_name_receiver" id="c_name_receiver" placeholder="Nama" value="<?php echo $c_name_receiver; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="c_address_receiver">Alamat penerima <?php echo form_error('c_address_receiver') ?></label>
                                <textarea class="form-control" rows="3" name="c_address_receiver" id="c_address_receiver" placeholder="Alamat"><?php echo $c_address_receiver; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Kota Penerima <?php echo form_error('c_city_receiver') ?></label>
                                <input type="text" class="form-control" name="c_city_receiver" id="c_city_receiver" placeholder="Kota" value="<?php echo $c_city_receiver; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Kode Pos Penerima <?php echo form_error('c_postcode_receiver') ?></label>
                                <input type="text" class="form-control" name="c_postcode_receiver" id="c_postcode_receiver" placeholder="Kode Pos" value="<?php echo $c_postcode_receiver; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">No. Telepon Penerima <?php echo form_error('c_phone_receiver') ?></label>
                                <input type="text" class="form-control" name="c_phone_receiver" id="c_phone_receiver" placeholder="Telepon" value="<?php echo $c_phone_receiver; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Barang</label>
                                <select multiple class="form-control select2" name="product_tags[]" multiple="multiple" data-placeholder="Select a State" id="p_list_products">
                                    <!-- <option value="0">Sendal</option>
                                    <option value="1">Sepatu</option> -->
                                    <?php

                                        $active = '';
                                        $total = count($product);

                                        $selected = '';
                                        // Looping All Tags
                                        for ($i=0; $i < $total ; $i++):
                                            // Looping Post_tag jika ada
                                            $p = explode(',', $p_list_products);

                                            foreach ($p as $bt){
                                                $active = $bt;

                                                if($active == $product[$i]['p_id']){
                                                    $selected = ' selected=selected';
                                                    break;
                                                }else{
                                                    $selected = '';
                                                }
                                            }
                                    ?>
                                        <option value="<?php echo $product[$i]['p_id'];?>" <?php echo $selected ?> ><?php echo $product[$i]['p_name'];?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Berat (Kg)</label>
                                <input type="text" class="form-control" name="dt_total_weight" id="dt_total_weight" placeholder="0.00" value="<?php echo $dt_total_weight; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int"> Jenis Packing</label>
                                <select class="form-control" name="dt_packing" id="dt_packing">
                                    <!-- <option value="0" <?php if($dt_packing == 0 ) echo 'selected="selected"'; ?>> Dus </option>
                                    <option value="1" <?php if($dt_packing == 1 ) echo 'selected="selected"'; ?>> Koper </option>
                                    <option value="2" <?php if($dt_packing == 1 ) echo 'selected="selected"'; ?>> Storage Box </option> -->
                                    <?php
                                        foreach ($packing as $p):
                                    ?>
                                        <option value="<?php echo $p->pk_id;?>" <?php if($dt_packing==$p->pk_id) echo 'selected="selected"'; ?> ><?php echo $p->pk_name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="c_address_receiver">Deskripsi Barang</label>
                                <textarea class="form-control" rows="5" name="dt_desc" id="dt_desc" placeholder="Deskripsi"><?php echo $dt_desc; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal kirim</label>
                            
                                <div class='input-group date' id='date_time'>
                                    <input type='text' name="t_date_delivery" id="t_date_delivery" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo $t_date_delivery; ?>" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal Diterima</label>
                                <div class='input-group date' id='date_time2'>
                                    <input type='text' name="t_date_reception" id="t_date_reception" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo $t_date_reception; ?>" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Total Harga </label>
                                <input type="text" class="form-control" name="dt_total_price" id="dt_total_price" placeholder="Harga" value="<?php echo $dt_total_price; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">Status</label>
                                <select class="form-control" name="t_status" id="t_status">
                                    <?php
                                        foreach ($status as $s):
                                    ?>
                                        <option value="<?php echo $s->s_id;?>" <?php if($t_status==$s->s_id) echo 'selected="selected"'; ?> ><?php echo $s->s_name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="c_address_receiver">Deskripsi Status</label>
                                <textarea class="form-control" rows="5" name="t_desc" id="t_desc" placeholder="Deskripsi"><?php echo $t_desc; ?></textarea>
                            </div>
                            <input type="hidden" name="c_id" value="<?php echo $c_id; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a>
                        </form>
                    </div> <!-- box-body -->
                </div> <!-- box-info -->
            </section><!-- content -->
        </div> <!-- wrapper -->
    </body>
</html>
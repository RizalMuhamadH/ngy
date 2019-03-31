<!doctype html>
<html>
    <head>
        <title>Document Transaction</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Customer List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No.Transaksi</th>
		<th>Nama Pengirim</th>
		<th>Alamat Pengirim</th>
		<th>Kota Pengirim</th>
		<th>Kode pos Pengirim</th>
		<th>No.Telpon Pengirim</th>
		<th>Nama Penerima</th>
		<th>Alamat Penerima</th>
		<th>Kota penerima</th>
		<th>Kode Pos Penerima</th>
		<th>No.Telepon Penerima</th>
        
		<th>Tanggal Pengiriman</th>
		<th>Tanggal Penerimaan</th>
		<th>Status</th>
		<th>Deskripsi Status</th>
		<th>Daftar Barang</th>
		<th>Jumlah Barang</th>
		<th>Total Berat(kg)</th>
		<th>Jenis Packing</th>
		<th>Jumlah Biaya</th>
		
            </tr><?php
            $list = $product;

            foreach ($customer_data as $customer)
            {
                $data_product = '';
                $total = count($list);
                for ($i=0; $i < $total ; $i++){
                    $p = explode(',', $data->dt_list_products);

                    foreach ($p as $pro){
                        if ($pro == $list[$i]['p_id']) {
                            $data_product = $data_product.$pro.",";
                            break;
                        }
                    }
                }
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $customer->t_no_trans ?></td>
		      <td><?php echo $customer->c_name_sender ?></td>
		      <td><?php echo $customer->c_address_sender ?></td>
		      <td><?php echo $customer->c_city_sender ?></td>
		      <td><?php echo $customer->c_postcode_sender ?></td>
		      <td><?php echo $customer->c_phone_sender ?></td>
		      <td><?php echo $customer->c_name_receiver ?></td>
		      <td><?php echo $customer->c_address_receiver ?></td>
		      <td><?php echo $customer->c_city_receiver ?></td>
		      <td><?php echo $customer->c_postcode_receiver ?></td>
		      <td><?php echo $customer->c_phone_receiver ?></td>	
              
		      <td><?php echo $customer->t_date_delivery ?></td>
		      <td><?php echo $customer->t_date_reception ?></td>
		      <td><?php echo $customer->s_name ?></td>
		      <td><?php echo $customer->t_desc ?></td>
		      <td><?php echo $customer->data_product ?></td>
		      <td><?php echo $customer->dt_total_items ?></td>
		      <td><?php echo $customer->dt_total_weight ?></td>
		      <td><?php echo $customer->pk_name ?></td>
		      <td><?php echo $customer->dt_total_price ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
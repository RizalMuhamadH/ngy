<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>Desc_transaction List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Dt List Products</th>
		<th>Dt Total Items</th>
		<th>Dt Total Weight</th>
		<th>Dt Packing</th>
		<th>Dt Total Price</th>
		<th>Dt Desc</th>
		<th>Dt Date</th>
		
            </tr><?php
            foreach ($desc_transaction_data as $desc_transaction)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $desc_transaction->dt_list_products ?></td>
		      <td><?php echo $desc_transaction->dt_total_items ?></td>
		      <td><?php echo $desc_transaction->dt_total_weight ?></td>
		      <td><?php echo $desc_transaction->dt_packing ?></td>
		      <td><?php echo $desc_transaction->dt_total_price ?></td>
		      <td><?php echo $desc_transaction->dt_desc ?></td>
		      <td><?php echo $desc_transaction->dt_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
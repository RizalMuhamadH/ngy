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
        <h2>Transaction List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>T No Trans</th>
		<th>T Date Delivery</th>
		<th>T Date Reception</th>
		<th>T Status</th>
		<th>T Desc</th>
		<th>Dt Id</th>
		<th>C Id</th>
		
            </tr><?php
            foreach ($transaction_data as $transaction)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $transaction->t_no_trans ?></td>
		      <td><?php echo $transaction->t_date_delivery ?></td>
		      <td><?php echo $transaction->t_date_reception ?></td>
		      <td><?php echo $transaction->t_status ?></td>
		      <td><?php echo $transaction->t_desc ?></td>
		      <td><?php echo $transaction->dt_id ?></td>
		      <td><?php echo $transaction->c_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
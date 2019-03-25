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
        <h2>Customer List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>C Name Sender</th>
		<th>C Address Sender</th>
		<th>C City Sender</th>
		<th>C Postcode Sender</th>
		<th>C Phone Sender</th>
		<th>C Name Receiver</th>
		<th>C Address Receiver</th>
		<th>C City Receiver</th>
		<th>C Postcode Receiver</th>
		<th>C Phone Receiver</th>
		
            </tr><?php
            foreach ($customer_data as $customer)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
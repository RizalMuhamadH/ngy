<!doctype html>
<html>
    <head>
        <title>Admin</title>
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
        <h2>Admin List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th> Username</th>
		<th> Password</th>
		<th> Name</th>
		<th> Previllage</th>
		
            </tr><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $user->_username ?></td>
		      <td><?php echo $user->_password ?></td>
		      <td><?php echo $user->_name ?></td>
		      <td><?php echo $user->_previllage ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
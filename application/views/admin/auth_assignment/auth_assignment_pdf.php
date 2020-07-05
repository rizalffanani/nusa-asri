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
        <h2>Auth_assignment List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Item Name</th>
		<th>User Id</th>
		<th>Created At</th>
		
            </tr><?php
            foreach ($auth_assignment_data as $auth_assignment)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $auth_assignment->item_name ?></td>
		      <td><?php echo $auth_assignment->user_id ?></td>
		      <td><?php echo $auth_assignment->created_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
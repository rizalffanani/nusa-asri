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
        <h2>Auth_item List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Tipe</th>
		<th>Description</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($auth_item_data as $auth_item)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $auth_item->name ?></td>
		      <td><?php echo $auth_item->tipe ?></td>
		      <td><?php echo $auth_item->description ?></td>
		      <td><?php echo $auth_item->created_at ?></td>
		      <td><?php echo $auth_item->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>

              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'><?php echo anchor('users/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('users/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body' style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Username</th>
		    <!-- <th>Password</th> -->
		    <th>Email</th>
		    <th>Nama</th>
		    <!-- <th>Last Name</th> -->
		    <!-- <th>Company</th> -->
            <th>Phone</th>
		    <th>Kartu Identitas</th>
		    <th>Foto</th>
		    <!-- <th>Active</th> -->
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($users_data as $users)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $users->username ?></td>
		    <!-- <td><?php echo $users->password ?></td> -->
		    <td><?php echo $users->email ?></td>
		    <td><?php echo $users->first_name ?></td>
		    <!-- <td><?php echo $users->last_name ?></td> -->
		    <!-- <td><?php echo $users->company ?></td> -->
            <td><?php echo $users->phone ?></td>
		    <td><?php echo $users->nokartuidentitas ?></td>
		    <td><?php echo $users->Foto ?></td>
		    <!-- <td><?php echo $users->active ?></td> -->
		    <td style="text-align:center" width="160px">
			<?php 
            if ($users->active==0) {
                echo anchor(site_url('users/chek/'.$users->id.'/1'),'<i class="fa fa-check"></i>',array('title'=>'akif','class'=>'btn btn-danger btn-sm')); 
            }else{
                echo anchor(site_url('users/chek/'.$users->id.'/0'),'<i class="fa fa-close"></i>',array('title'=>'non','class'=>'btn btn-danger btn-sm')); 
            }
            echo '  '; 
            echo anchor(site_url('users/read/'.$users->username),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('users/update/'.$users->username),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			// echo '  '; 
			// echo anchor(site_url('users/delete/'.$users->username),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
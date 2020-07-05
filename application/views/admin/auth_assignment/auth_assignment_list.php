<div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'><?php echo anchor('auth_assignment/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('auth_assignment/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body' style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Item Name</th>
		    <th>Username</th>
		    <th>Created At</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($auth_assignment_data as $auth_assignment)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $auth_assignment->item_name ?></td>
		    <td><?php echo $auth_assignment->username ?></td>
		    <td><?php echo $auth_assignment->created_at ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('auth_assignment/read/'.$auth_assignment->id_assignment),'<i class="fa fa-eye"></i>',array('title'=>'details','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('auth_assignment/update/'.$auth_assignment->id_assignment),'<i class="fa fa-pencil"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('auth_assignment/delete/'.$auth_assignment->id_assignment),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
            </div><!-- /.col -->
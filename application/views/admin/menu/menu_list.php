<div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>
                    <?php echo anchor('menu/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		              <?php echo anchor(site_url('menu/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body' style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
		    <th>Link</th>
		    <th>Deskrip</th>
		    <th>Icon</th>
		    <th>Is Active</th>
		    <th>Is Parent</th>
		    <th>Tipe</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($menu_data as $menu)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $menu->name ?></td>
		    <td><?php echo $menu->link ?></td>
		    <td><?php echo $menu->deskrip ?></td>
		    <td><?php echo $menu->icon ?></td>
		    <td><?php echo $menu->is_active ?></td>
		    <td><?php echo $menu->is_parent ?></td>
		    <td><?php echo $menu->tipe ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('menu/read/'.$menu->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('menu/update/'.$menu->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('menu/delete/'.$menu->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
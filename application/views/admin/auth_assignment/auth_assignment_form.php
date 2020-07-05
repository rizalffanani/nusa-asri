<div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Item Name <?php echo form_error('item_name') ?></td>
            <td>
              <?php echo cmb_dinamis2('item_name', 'auth_item', 'name', 'name', $item_name,'1') ?>
            </td>
	    <tr><td>User Id <?php echo form_error('user_id') ?></td>
            <td>
              <?php echo cmb_dinamis('user_id', 'users', 'username', 'id', $user_id) ?>
              <!-- <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" /> -->
            </td>
	    <tr><td>Created At <?php echo form_error('created_at') ?></td>
            <td><input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="10101010" />
        </td>
	    <input type="hidden" name="id_assignment" value="<?php echo $id_assignment; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('auth_assignment') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
</div><!-- /.box-body -->
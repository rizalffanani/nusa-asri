<div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Parent <?php echo form_error('parent') ?></td>
            <td>
              <?php echo cmb_dinamis2('parent', 'auth_item', 'name', 'name', $parent,'1') ?>
              <!-- <input type="text" class="form-control" name="parent" id="parent" placeholder="Parent" value="<?php echo $parent; ?>" /> -->
        </td>
	    <tr><td>Child <?php echo form_error('child') ?></td>
            <td>
              <?php echo cmb_menu('child', 'menu', 'name', 'id', $child) ?>
              <!-- <input type="text" class="form-control" name="child" id="child" placeholder="Child" value="<?php echo $child; ?>" /> -->
        </td>
	    <input type="hidden" name="idc" value="<?php echo $idc; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('auth_item_child') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
</div>
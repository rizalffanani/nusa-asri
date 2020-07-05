<div class='box-body'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Email <?php echo form_error('email') ?></td>
            <td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </td>
	    <tr><td>First Name <?php echo form_error('first_name') ?></td>
            <td><input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
        </td>
        <tr><td>Phone <?php echo form_error('phone') ?></td>
            <td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </td>
	    <tr><td>Kartu Identitas <?php echo form_error('nokartuidentitas') ?></td>
            <td><input type="text" class="form-control" name="nokartuidentitas" id="nokartuidentitas" placeholder="Kartu Identitas" value="<?php echo $nokartuidentitas; ?>" />
        </td>
        <input type="hidden" name="username" value="<?php echo $username; ?>" /> 
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
</div>
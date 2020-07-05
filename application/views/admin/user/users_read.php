
              <div class='box'>
                <div class='box-header'>
        <table class="table table-bordered">
	    <!-- <tr><td>Username</td><td><?php echo $username; ?></td></tr> -->
	    <!-- <tr><td>Password</td><td><?php echo $password; ?></td></tr> -->
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $first_name; ?></td></tr>
	    <tr><td>Kartu Identitas</td><td><?php echo $nokartuidentitas; ?></td></tr>
	    <!-- <tr><td>Company</td><td><?php echo $company; ?></td></tr> -->
	    <tr><td>Hp</td><td><?php echo $phone; ?></td></tr>
	    <tr>
        <td>Foto</td>
        <td>
          <?=@$val?><br>
          <img src="<?php echo base_url()?>template/dist/img/<?php echo $Foto; ?>" class="img-circle" alt="User Image" style="height: 215px;width: 215px;">
          <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" name="foto" id="exampleInputFile">

            <p class="help-block">Example block-level help text here.</p>
          </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>" />
          <input type="hidden" name="username" value="<?php echo $username; ?>" />
          <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        </form>
        </td>
      </tr>
	    <!-- <tr><td>Active</td><td><?php echo $active; ?></td></tr> -->
	    <tr><td></td><td><a href="<?php echo site_url('users/update/'.$username) ?>" class="btn btn-default">Edit</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
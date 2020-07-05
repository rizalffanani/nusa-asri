<div class='box'>
    <div class='box-header'>
        <table class="table table-bordered">
            <tr><td>Nama Web</td><td><?php echo $nama_web; ?></td></tr>
            <tr><td>Tentang</td><td><?php echo $tentang; ?></td></tr>
            <tr><td>Slogan</td><td><?php echo $slogan; ?></td></tr>
            <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
            <tr><td>Email</td><td><?php echo $email; ?></td></tr>
            <tr><td>Wa</td><td><?php echo $wa; ?></td></tr>
            <tr>
                <td>Logo Web</td>
                <td>
                  <?=@$val?><br>
                  <img src="<?php echo base_url()?>assets/img/<?php echo $logo_web; ?>" class="img-circle" alt="User Image" style="height: 215px;width: 215px;">
                  <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" name="foto" id="exampleInputFile">

                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $id_info; ?>" />
                  <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                </form>
                </td>
            </tr>
            <tr><td></td><td><a href="<?php echo site_url('info') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
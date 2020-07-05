<div class="box box-default">
    <div class="box-header with-border">
      <!-- <h3 class="box-title">Guru</h3> -->
    </div>
    <form action="<?php echo $action; ?>" method="post">
        <div class="box-body">
            <div class="form-group">
                <label for="char">Password Lama <?php echo form_error('passlama') ?></label>
                <input type="password" class="form-control" name="passlama" id="passlama"  />
            </div>
            <div class="form-group">
                <label for="varchar">Password Baru <?php echo form_error('password') ?></label>
                <input type="password" class="form-control" name="password" id="password" />
            </div>
            <div class="form-group">
                <label for="varchar">Ulangi Password Baru <?php echo form_error('passretype') ?></label>
                <input type="password" class="form-control" name="passretype" id="passretype" />
            </div>
        </div>
        <div class="box-footer">
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button>       
        </div>
    </form>
</div>
    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Web <?php echo form_error('nama_web') ?></label>
            <input type="text" class="form-control" name="nama_web" id="nama_web" placeholder="Nama Web" value="<?php echo $nama_web; ?>" />
        </div>
	    <div class="form-group">
            <label for="tentang">Tentang <?php echo form_error('tentang') ?></label>
            <textarea class="form-control" rows="3" name="tentang" id="tentang" placeholder="Tentang"><?php echo $tentang; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Slogan <?php echo form_error('slogan') ?></label>
            <input type="text" class="form-control" name="slogan" id="slogan" placeholder="Slogan" value="<?php echo $slogan; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Wa <?php echo form_error('wa') ?></label>
            <input type="text" class="form-control" name="wa" id="wa" placeholder="Wa" value="<?php echo $wa; ?>" />
        </div>
	    <input type="hidden" name="id_info" value="<?php echo $id_info; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('info') ?>" class="btn btn-default">Cancel</a>
	</form>
<h2 style="margin-top:0px">Pasien <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
    </div>
    <div class="form-group">
        <label for="date">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
    </div>
    <div class="form-group">
        <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" >
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L" <?= ($jenis_kelamin=="L") ? "selected" : "" ;?> >L</option>
            <option value="P" <?= ($jenis_kelamin=="P") ? "selected" : "" ;?> >P</option>
        </select>
    </div>
    <div class="form-group">
        <label for="int">Nomerid <?php echo form_error('nomerid') ?></label>
        <input type="text" class="form-control" name="nomerid" id="nomerid" placeholder="Nomerid" value="<?php echo $nomerid; ?>" />
    </div>
    <div class="form-group">
        <label for="analisis">Analisis <?php echo form_error('analisis') ?></label>
        <textarea class="form-control" rows="3" name="analisis" id="analisis" placeholder="Analisis"><?php echo $analisis; ?></textarea>
    </div>
    <input type="hidden" name="id_pasien" value="<?php echo $id_pasien; ?>" /> 
    <input type="hidden" name="nomerids" value="<?php echo $nomerid; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('pasien') ?>" class="btn btn-default">Cancel</a>
</form>

<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo ($tanggal) ? $tanggal : date("Y-m-d") ; ?>" />
    </div>
    <div class="form-group">
        <label for="rincian">Rincian <?php echo form_error('rincian') ?></label>
        <textarea class="form-control" rows="3" name="rincian" id="rincian" placeholder="Rincian"><?php echo $rincian; ?></textarea>
    </div>
    <div class="form-group">
        <label for="int">Nominal <?php echo form_error('nominal') ?></label>
        <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Sumber Dana <?php echo form_error('sumber_dana') ?></label>
        <input type="text" class="form-control" name="sumber_dana" id="sumber_dana" placeholder="Sumber Dana" value="<?php echo $sumber_dana; ?>" />
    </div>
    <input type="hidden" name="id_transaksi_pengeluaran" value="<?php echo $id_transaksi_pengeluaran; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('transaksi_pengeluaran') ?>" class="btn btn-default">Cancel</a>
</form>
<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">Sku <?php echo form_error('sku') ?></label>
        <input type="text" class="form-control" name="sku" id="sku" placeholder="Sku" value="<?php echo $sku; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
    </div>
    <div class="form-group">
        <label for="enum">Jenis Barang <?php echo form_error('jenis_barang') ?></label>
        <select class="form-control" name="jenis_barang" id="jenis_barang" >
            <option value="">Pilih Jenis Barang</option>
            <option value="Barang Jadi" <?= ($jenis_barang=="Barang Jadi") ? "selected" : "" ;?> >Barang Jadi</option>
            <option value="Bahan Mentah" <?= ($jenis_barang=="Bahan Mentah") ? "selected" : "" ;?> >Bahan Mentah</option>
            <option value="Aksesoris" <?= ($jenis_barang=="Aksesoris") ? "selected" : "" ;?> >Aksesoris</option>
        </select>
    </div>
    <div class="form-group">
        <label for="enum">Kategori <?php echo form_error('kategori') ?></label>
        <select class="form-control" name="kategori" id="kategori" >
            <option value="">Pilih Kategori</option>
            <option value="sprei" <?= ($kategori=="sprei") ? "selected" : "" ;?> >sprei</option>
            <option value="gordyn" <?= ($kategori=="gordyn") ? "selected" : "" ;?> >gordyn</option>
            <option value="aksesoris" <?= ($kategori=="aksesoris") ? "selected" : "" ;?> >aksesoris</option>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Ukuran <?php echo form_error('ukuran') ?></label>
        <select class="form-control" name="ukuran" id="ukuran" >
            <option value="">Pilih Ukuran</option>
            <option value="S" <?= ($ukuran=="S") ? "selected" : "" ;?> >S</option>
            <option value="M" <?= ($ukuran=="M") ? "selected" : "" ;?> >M</option>
            <option value="L" <?= ($ukuran=="L") ? "selected" : "" ;?> >L</option>
        </select>
    </div>
    <div class="form-group">
        <label for="int">Varian <?php echo form_error('varian') ?></label>
        <input type="text" class="form-control" name="varian" id="varian" placeholder="Varian" value="<?php echo $varian; ?>" />
    </div>
    <div class="form-group">
        <label for="int">Stok <?php echo form_error('stok') ?></label>
        <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" value="0" readonly/>
    </div>
    <div class="form-group">
        <label for="enum">Unit <?php echo form_error('unit') ?></label>
        <select class="form-control" name="unit" id="unit" >
            <option value="">Pilih Unit</option>
            <option value="PCS" <?= ($unit=="PCS") ? "selected" : "" ;?> >PCS</option>
            <option value="M" <?= ($unit=="M") ? "selected" : "" ;?> >M</option>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Harga Beli Terakhir</label>
        <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" value="0" readonly />
    </div>
    <div class="form-group">
        <label for="varchar">Harga Jual <?php echo form_error('harga_jual') ?></label>
        <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="<?php echo $harga_jual; ?>" />
    </div>
    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
</form>
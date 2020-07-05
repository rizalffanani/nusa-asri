<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="int">SKU <?php echo form_error('id_barang') ?></label>
                <!-- <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" /> -->
                <?php echo cmb_dinamis('id_barang', 'barang', 'nama_barang', 'id_barang', $id_barang,'select2bs4','panggil(this.value)') ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="varchar">Nama Barang <?php echo form_error('penerima') ?></label>
        <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" readonly />
    </div>
    <div class="form-group">
        <label for="varchar">Jenis Barang <?php echo form_error('penerima') ?></label>
        <input type="text" class="form-control" id="jenis_barang" placeholder="Jenis Barang" readonly />
    </div>
    <div class="form-group">
        <label for="varchar">Kategori <?php echo form_error('penerima') ?></label>
        <input type="text" class="form-control" id="kategori" placeholder="Kategori" value="<?php echo $penerima; ?>" readonly />
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="varchar">Varian <?php echo form_error('penerima') ?></label>
                <input type="text" class="form-control" id="varian" placeholder="Varian" readonly />
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="varchar">Jumlah <?php echo form_error('jumlah') ?></label>
                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="varchar">Unit <?php echo form_error('penerima') ?></label>
                <input type="text" class="form-control" id="unit" placeholder="Unit" readonly />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="varchar">Harga Beli <?php echo form_error('harga_beli') ?></label>
                <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" value="<?php echo $harga_beli; ?>" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="varchar">Harga Jual <?php echo form_error('harga_jual') ?></label>
                <input type="number" class="form-control" id="harga_jual" placeholder="Harga Jual" readonly/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="varchar">Penerima <?php echo form_error('penerima') ?></label>
        <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Penerima" value="<?php echo $penerima; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Pemasok <?php echo form_error('pemasok') ?></label>
        <input type="text" class="form-control" name="pemasok" id="pemasok" placeholder="Pemasok" value="<?php echo $pemasok; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Tanda terima <?php echo form_error('tandaterima') ?></label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="tandaterima" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
    </div>
    <input type="hidden" name="idbrgmasuk" value="<?php echo $idbrgmasuk; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('barang_masuk') ?>" class="btn btn-default">Cancel</a>
</form>
<script src="<?php echo base_url() ?>templateadmin/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url() ?>templateadmin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
  function panggil(a) {
    $.ajax({
        type:"POST",
        url:"<?=site_url('barang_masuk/panggil');?>",    
        dataType : "JSON",
        data : {product_code:a},
        success: function(data){   
            document.getElementById('nama_barang').value = data.nama_barang;
            document.getElementById('jenis_barang').value = data.jenis_barang;
            document.getElementById('kategori').value = data.kategori;
            document.getElementById('varian').value = data.nama_varian;
            document.getElementById('unit').value = data.unit;
            document.getElementById('harga_jual').value = data.harga_jual;
        }  
    });
  }
</script>
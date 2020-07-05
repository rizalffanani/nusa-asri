<div class='box'>
    <div class='box-header'>
        
    </div><!-- /.box-body -->
</div><!-- /.box -->
<div class="whole-wrap">
        <div class="container box_1170">
            <div class="section-top-border">
                <h3 class="mb-30">Detail Produk <?php echo $nama_produk; ?></h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo base_url() ?>fort/img/photography/<?= $gambar_produk; ?>" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-9 mt-sm-20">
                        <form action="<?= base_url(); ?>onlineshop/add_to_cart" method="post">
                        <table class="table table-bordered">
                            <tr><td>Nama Produk</td><td><?php echo $nama_produk; ?></td></tr>
                            <tr><td>Harga Sewa/Item</td><td>Rp. <?php echo $harga_sewa; ?>/Hari</td></tr>
                            <tr><td>Detail Produk</td><td><?php echo $detail_produk; ?></td></tr>
                            <tr><td>Stok Produk</td><td><?php echo $stok_produk; ?></td></tr>
                            <tr><td>Qty</td><td><input type="number" value='1' min='1' max='<?php echo $stok_produk; ?>' name="qty" placeholder="Primary color"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'" required
                                    class="single-input-primary"></td></tr>
                            <tr>
                                <td><a href="<?php echo site_url('onlineshop') ?>" class="btn btn-default">Cancel</a></td>
                                <td>
                                    <input type="hidden" name="id_produk" value="<?php echo($id_produk); ?>" />
                                    <button type="submit" class="genric-btn primary radius">Order</button> 
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
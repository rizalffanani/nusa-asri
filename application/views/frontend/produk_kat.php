<div class='box'>
    <div class='box-header'>
        
    </div><!-- /.box-body -->
</div><!-- /.box -->
<div class="whole-wrap">
        <div class="container box_1170">
            <div class="row">
                <div class="col-xl-12">
                    <div class="instagram_title text-center">
                        <h3>Sewa Kamera Malang</h3>
                    </div>
                </div>
            </div>
            <div class="section-top-border">
                <!-- <h3 class="mb-30">Detail Produk <?php //echo $nama_produk; ?></h3> -->
                <div class="row">
                    <?php $start = 0;foreach ($barang_data as $auth_assignment){?>
                    <a href="<?php echo base_url() ?>onlineshop/read/<?php echo $auth_assignment->id_produk ?>" class="col-xl-3 col-md-3" id="produk">
                        <div class="card">
                          <img src="<?php echo base_url()?>fort/img/photography/<?php echo $auth_assignment->gambar_produk; ?>" alt="Avatar" style="width:100%">
                          <div class="container">
                            <h4><b><?php echo $auth_assignment->nama_produk ?></b></h4> 
                            <p>Rp. <?= $auth_assignment->harga_sewa?></p> 
                          </div>
                        </div>
                    </a> 
                    <?php }?>
                </div>
            </div>
        </div>
</div>
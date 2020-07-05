    <!-- welcome_protomedia_start -->
    <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      width: 100%;
      border-radius: 5px;
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    img {
      border-radius: 5px 5px 0 0;
    }

    .container {
      padding: 2px 16px;
    }
    #produk{
        margin-bottom: 5px;
    }
    </style>
    <div class="welcome_protomedia">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <h3>Selamat Datang <br>
                        Fotografi</h3>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="add_here">
                        <a href="#">
                            <img src="<?php echo base_url() ?>fort/img/add/add.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_protomedia_end -->

    <!-- photographi_area_start -->
    <div class="photographi_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="single_photography photography_bg_1">
                        <div class="info">
                            <div class="info_inner">
                                <div class="date_catagory d-flex align-items-center justify-content-between">
                                    <span>12 jun 2019</span>
                                    <span class="catagory">lightroom</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="single_photography photography_bg_2">
                        <div class="info">
                            <div class="info_inner">
                                <div class="date_catagory d-flex align-items-center justify-content-between">
                                    <span>12 jun 2019</span>
                                    <span class="catagory">lightroom</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- photographi_area_end -->

    <!-- photography_slider_area_start -->
    <div class="photography_slider_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="photoslider_active owl-carousel">
                        <?php $start = 0;foreach ($barang_data as $auth_assignment){?>
                        <div class="single_photography">
                            <img src="<?php echo base_url()?>fort/img/photography/<?php echo $auth_assignment->gambar_produk; ?>" alt="">
                            <div class="photo_title">
                                <h4><?php echo $auth_assignment->nama_produk ?></h4>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- photography_slider_area_end -->
    <div class="instagram_media_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="instagram_title text-center">
                        <i class="fa fa-instagram"></i>
                        <h3>Sewa Kamera Malang</h3>
                    </div>
                </div>
            </div>
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
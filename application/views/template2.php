<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sewa Kamera Malang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>fort/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>fort/css/responsive.css">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <?php $indo = $this->db->get_where('info', array('id_info' => '1'))->row();?>
    <header>
        <div class="header-area ">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        
                        <div class="col-xl-2 col-md-2">
                            <div class="logo">
                                <a href="<?php echo base_url() ?>">
                                    <img width="100px" src="<?php echo base_url(); ?>/assets/img/<?= $indo->logo_web?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2 d-none d-md-block">
                            <div class="header_links ">
                                <ul>
                                    <li><?= $indo->wa?></li>
                                    <li><?= $indo->email?></li>
                                    <li><?= $indo->alamat?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-8 d-none d-md-block">
                            <div class="login_resiter">
                                <p>
                                    <?php if($this->session->userdata("first_name")){?>
                                    <a href="#"><i class="flaticon-user"></i>Hallo, <?= $this->session->userdata("first_name")?>| </a>
                                    <a href="<?php echo base_url() ?>login/logout">logout</a>
                                    <?php }else{?>
                                    <a href="<?php echo base_url() ?>login"><i class="flaticon-user"></i>login</a> | 
                                    <a href="<?php echo base_url() ?>login/regis">Resister</a>
                                    <?php }?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area white-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="<?= (current_url()==base_url()."onlineshop") ? 'active' : '' ;?>" href="<?php echo base_url() ?>onlineshop">Home</a></li>
                                        <li><a class="<?= (base_url().$this->uri->segment(1).'/'.$this->uri->segment(2)==base_url()."onlineshop/kategori") ? 'active' : '' ;?>" href="#">Kategori <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <?php $menu = $this->db->get('kategori');
                                                    foreach ($menu->result() as $m) {?>
                                                    <li><a href="<?php echo base_url() ?>onlineshop/kategori/<?=$m->id_kategori?>"><?=$m->nama_kategori?></a></li>
                                                <?php }?>
                                            </ul>
                                        </li>
                                        <li><a class="<?= (current_url()==base_url()."onlineshop/show_cart") ? 'active' : '' ;?>" href="<?php echo base_url() ?>onlineshop/show_cart">Keranjang Belanja (<?= count($this->cart->contents());?>)</a></li>
                                        <li><a class="<?= (current_url()==base_url()."onlineshop/tentang") ? 'active' : '' ;?>" href="<?php echo base_url() ?>onlineshop/tentang">Tentang</a></li>
                                        <?php if($this->session->userdata("first_name")){?>
                                        <li><a class="<?= (current_url()==base_url()."akun/riwayat") ? 'active' : '' ;?>" href="<?php echo base_url() ?>akun/riwayat">Transaksi</a></li>
                                        <?php }?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="get_serch">
                                <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="search_input" id="search_input_box">
                            <div class="container ">
                                <form class="d-flex justify-content-between search-inner">
                                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                                    <button type="submit" class="btn"></button>
                                    <span class="ti-close" id="close_search" title="Close Search"></span>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <?php
    echo $contents;
    ?>
    <!-- instagram_media_area_start -->
    <div class="instagram_media_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="instagram_title text-center">
                        <i class="fa fa-instagram"></i>
                        <h3>Testimoni Sewa Kamera Malang</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-3">
                    <div class="single_instragram">
                        <img src="<?php echo base_url() ?>fort/img/instagram/1.png" alt="">
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="single_instragram">
                        <img src="<?php echo base_url() ?>fort/img/instagram/2.png" alt="">
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="single_instragram">
                        <img src="<?php echo base_url() ?>fort/img/instagram/3.png" alt="">
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="single_instragram">
                        <img src="<?php echo base_url() ?>fort/img/instagram/4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- instagram_media_area_end -->

    <!-- footer_start -->
    <footer class="footer">
        <div class="footer_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer_info text-center">
                            <div class="footer_logo text-center">
                                <a href="#">
                                    <img width="100px" src="<?php echo base_url(); ?>/assets/img/<?= $indo->logo_web?>" alt="">
                                </a>
                            </div>
                            <p class="footer_text">
                                <?= $indo->slogan?><br>
                            </p>
                            <div class="header_links">
                                <ul>
                                    <li style="color:#fff"><?= $indo->wa?> || </li>
                                    <li style="color:#fff"><?= $indo->email?> || </li>
                                    <li style="color:#fff"><?= $indo->alamat?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom ">
            <div class="container">
                <div class="footer_border">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer_links text-center">
                                <ul>
                                    <li><a href="<?php echo base_url() ?>onlineshop">Home</a></li>
                                    <li><a href="<?php echo base_url() ?>onlineshop/tentang">Tentang</a></li>
                                    <li><a href="<?php echo base_url() ?>login">login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright_text text-center">


    <!-- JS here -->
    <script src="<?php echo base_url() ?>fort/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/ajax-form.js"></script>
    <script src="<?php echo base_url() ?>fort/js/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/scrollIt.js"></script>
    <script src="<?php echo base_url() ?>fort/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/wow.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/nice-select.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/plugins.js"></script>

    <!--contact js-->
    <script src="<?php echo base_url() ?>fort/js/contact.js"></script>
    <script src="<?php echo base_url() ?>fort/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/jquery.form.js"></script>
    <script src="<?php echo base_url() ?>fort/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>fort/js/mail-script.js"></script>

    <script src="<?php echo base_url() ?>fort/js/main.js"></script>

</body>

</html>
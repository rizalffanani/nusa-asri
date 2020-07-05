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
                                <ul>
                                    <li>No Nota <?= $tran_data->nonota?></li>
                                    <li>Tgl Transaksi <?= $tran_data->tgl_transaksi?></li>
                                    <li>Tgl Kembali <?= $tran_data->tgl_kembali?></li>
                                    <li>Status <?= $tran_data->status?></li>
                                </ul>
                            </div>
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
                        <h3><a onclick="javascript(windows.print())" class="genric-btn success radius">print</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
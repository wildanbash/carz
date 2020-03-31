
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.ico" type="image/x-icon" />

    <title>Carz - Car Rental</title>

    <!--=== Bootstrap CSS ===-->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="<?= base_url() ?>assets/css/plugins/vegas.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="<?= base_url() ?>assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="<?= base_url() ?>assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="<?= base_url() ?>assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="<?= base_url() ?>assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="<?= base_url() ?>assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="<?= base_url() ?>assets/css/responsive.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js">

    <!-- Datetime Picker -->
    <link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
		<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>


</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="<?= base_url() ?>assets/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <?php if (isset($_SESSION['level']) == 2) { ?>
                        <!--== Single HeaderTop Start ==-->
                        <div class="col-lg-2 text-left">
                            <i class="fa fa-envelope"></i> carz@gmail.com
                        </div>
                        <!--== Single HeaderTop End ==-->

                        <!--== Single HeaderTop Start ==-->
                        <div class="col-lg-2 text-center">
                            <i class="fa fa-mobile"></i> (0341) 404424
                        </div>
                        <!--== Single HeaderTop End ==-->

                        <!--== Single HeaderTop Start ==-->
                        <div class="col-lg-3 text-center">
                            <i class="fa fa-clock-o"></i> Setiap Hari 09.00 - 17.00
                        </div>
                        <!--== Single HeaderTop End ==-->

                        <!--== Single HeaderTop Start ==-->
                        <div class="col-lg-3 text-center">
                            <i class="fa fa-user"> <?= $_SESSION['nama'] ?></i> 
                        </div>
                        <!--== Single HeaderTop End ==-->

                        <!--== Social Icons Start ==-->
                        <div class="col-lg-2 text-right">
                            <div class="header-social-icons">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <!--== Social Icons End ==-->
                    <?php } else { ?>
                        <!--== Single HeaderTop Start ==-->
                        <div class="col-lg-3 text-left">
                            <i class="fa fa-envelope"></i> carz@gmail.com
                        </div>
                        <!--== Single HeaderTop End ==-->

                        <!--== Single HeaderTop Start ==-->
                        <div class="col-lg-3 text-center">
                            <i class="fa fa-mobile"></i> (0341) 404424
                        </div>
                        <!--== Single HeaderTop End ==-->

                        <!--== Single HeaderTop Start ==-->
                        <div class="col-lg-3 text-center">
                            <i class="fa fa-clock-o"></i> Setiap Hari 09.00 - 17.00
                        </div>
                        <!--== Single HeaderTop End ==-->

                        <!--== Social Icons Start ==-->
                        <div class="col-lg-3 text-right">
                            <div class="header-social-icons">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <!--== Social Icons End ==-->
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!-- Header Bottom Start -->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="<?= base_url() ?>" class="logo">
                            <img src="<?= base_url() ?>assets/img/logo2.png" alt="JSOFT">
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li><a href="<?= base_url() ?>">BERANDA</a>
                                </li>
                                <li><a href="<?= base_url('customer/rental/tentang') ?>">TENTANG</a></li>
                                <li><a href="<?= base_url('customer/rental/list_mobil')?>">LIST MOBIL</a></li>
                                <li><a href="<?= base_url('customer/rental/kontak_kami') ?>">KONTAK KAMI</a></li>
                                <?php if (isset($_SESSION['level']) == 2) { ?>
                                    <li><a href="<?= base_url('customer/rental/riwayat_sewa') ?>">RIWAYAT SEWA</a></li>
                                    <li class="ml-3 auth" style="border: 2px solid #cccc00;"><a style="margin: 5px; margin-top: -2px; margin-bottom: -5px; color: white" href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                                <?php } else { ?>
                                    <li class="ml-3 auth" style="border: 2px solid #cccc00;"><a style="margin: 5px; margin-top: -2px; margin-bottom: -5px; color: white" href="<?= base_url('auth') ?>"><i class="fa fa-sign-in"></i> LOGIN</a></li>
                                <?php } ?>
                                <style>
                                    .auth:hover{
                                        background : #cccc00;
                                    }
                                </style>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->



    
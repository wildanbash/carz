<!DOCTYPE html>
<html lang="en">

<head>
    <title>CARZ - ADMIN</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url() ?>assets/img/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
	
	<!-- Datatable -->
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

	<!-- Datetime Picker -->
    <link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
		<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="<?= base_url() ?>assets/admin/images/user/avatar1.png" alt="User-Profile-Image">
						<div class="user-details">
							<span><?= $_SESSION['nama'] ?></span>
						</div>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li class="nav-item">
					    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a class="nav-link" style="cursor: pointer"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Transaksi</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="<?= base_url('admin/transaksi/menunggu_pembayaran') ?>"">Menunggu Pembayaran</a></li>
					        <li><a href="<?= base_url('admin/transaksi/menunggu_konfirmasi') ?>"">Menunggu Konfirmasi</a></li>
					        <li><a href="<?= base_url('admin/transaksi/disewa') ?>"">Sedang Disewa</a></li>
					        <li><a href="<?= base_url('admin/transaksi/selesai') ?>"">Selesai</a></li>
					    </ul>
					</li>
					<li class="nav-item">
					    <a href="<?= base_url('admin/user') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">User</span></a>
					</li>
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="<?= base_url() ?>assets/admin/images/logo2.png" alt="" class="logo" style="width: 100px">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span><?= $_SESSION['nama'] ?></span>
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<a href="<?= base_url('auth/logout') ?>" class="text-white">
										<div class="pro-head">
											<span class="mr-2 ml-2">Logout</span>
											<i class="fas fa-sign-out-alt"></i>
										</div>
									</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->



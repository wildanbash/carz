    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
    	<div class="container">
    		<div class="row">
    			<!-- Page Title Start -->
    			<div class="col-lg-12">
    				<div class="section-title  text-center">
    					<h2>Rental</h2>
    					<span class="title-line"><i class="fa fa-car"></i></span>
    				</div>
    			</div>
    			<!-- Page Title End -->
    		</div>
    	</div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
    	<div class="container">
    		<div class="row">
    			<!-- Car List Content Start -->
    			<div class="col-lg-8">
    				<div class="car-details-content">
    					<?php for ($i=0; $i < count($mobil['data']); $i++) { ?>
    					<h2><?= $mobil['data'][$i]['merk'] ?><span class="price">Harga: <b>Rp.
    								<?= $mobil['data'][$i]['harga'] ?> / Hari</b></span></h2>
    					<img src="<?= $mobil['data'][$i]['gambar'] ?>" alt="" style="width: 730px; height: 450px">
    				</div>
    			</div>
    			<!-- Car List Content End -->

                <?php $today = date('Y-m-d') ?>

                <!-- Sidebar Area Start -->
    			<div class="col-lg-4">
                    <form action="<?= base_url('customer/rental/tambah_rental_simpan') ?>" method="POST">
    				<div class="sidebar-content-wrap m-t-50">
    					<!-- Single Sidebar Start -->
    					<div class="single-sidebar">
    						<h3>Detail Rental</h3>

    						<div class="sidebar-body">
                                <div class="form-group">
                                    <label>Tanggal Sewa</label>
                                    <input type="text" name="tanggal_sewa" class="form-control" value="<?= indo_date($tgl_sewa)?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input type="text" name="tanggal_kembali" class="form-control" value="<?= indo_date($tgl_kembali)?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Durasi</label>
                                    <input type="text" name="durasi" class="form-control" value="<?= $durasi ?> Hari" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Total Biaya</label>
                                    <input type="text" name="total_biaya" class="form-control" value="<?= indo_currency(($mobil['data'][$i]['harga'])*$durasi) ?>" disabled>
                                </div>

    						</div>
    					</div>
                        <!-- Single Sidebar End -->
                        
                        <input type="hidden" name="sewa" value="<?= $tgl_sewa ?>">
                        <input type="hidden" name="kembali" value="<?= $tgl_kembali ?>">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                        <input type="hidden" name="harga" value="<?= $mobil['data'][$i]['harga'] ?>" >
                        <input type="hidden" name="id_mobil" value="<?= $mobil['data'][$i]['id_mobil'] ?>" >
                        <button type="submit" class="btn btn-lg btn-dark text-white" style="cursor: pointer"><i class="fa fa-shopping-cart"></i> Rental</button>
    				</div>
                    </form>
                </div>
                <?php } ?>
    			<!-- Sidebar Area End -->
    		</div>
    	</div>
    </section>
    <!--== Car List Area End ==-->

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
    	<div class="container">
    		<div class="row">
    			<!-- Page Title Start -->
    			<div class="col-lg-12">
    				<div class="section-title  text-center">
    					<h2>Detail Mobil</h2>
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
                    <form action="<?= base_url('customer/rental/tambah_rental_ready') ?>" method="POST">
    				<div class="sidebar-content-wrap m-t-50">
    					<!-- Single Sidebar Start -->
    					<div class="single-sidebar">
    						<h3>Pilih Tanggal Rental</h3>

    						<div class="sidebar-body">
                                <div class="form-group">
                                    <label>Tanggal Sewa</label>
                                    <input type="date" name="tanggal_sewa" class="form-control" min="<?= $today ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input type="date" name="tanggal_kembali" class="form-control" min="<?= $today ?>">
                                </div>
    						</div>
    					</div>
    					<!-- Single Sidebar End -->
                        
                        <input type="hidden" name=id_mobil value="<?= $mobil['data'][$i]['id_mobil'] ?>" >
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

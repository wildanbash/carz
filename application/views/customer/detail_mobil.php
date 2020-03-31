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
    					<div class="car-details-info">
    						<h4>Detail Mobil</h4>

    						<div class="technical-info">
    							<div class="row">
    								<div class="col-lg-6">
    									<div class="tech-info-table">
    										<table class="table table-bordered">
    											<tr>
    												<th>Type</th>
    												<td><?= $mobil['data'][$i]['type'] ?></td>
    											</tr>
    											<tr>
    												<th>Merk</th>
    												<td><?= $mobil['data'][$i]['merk'] ?></td>
    											</tr>
    											<tr>
    												<th>No Plat</th>
    												<td><?= $mobil['data'][$i]['no_plat'] ?></td>
    											</tr>
    											<tr>
    												<th>Warna</th>
    												<td><?= $mobil['data'][$i]['warna'] ?></td>
    											</tr>
    											<tr>
    												<th>Tahun</th>
    												<td><?= $mobil['data'][$i]['tahun'] ?></td>
    											</tr>
    										</table>
    									</div>
    								</div>
    							</div>
    						</div>

                            
    					</div>
    				</div>
    			</div>
    			<!-- Car List Content End -->

    			<!-- Sidebar Area Start -->
    			<div class="col-lg-4">
    				<div class="sidebar-content-wrap m-t-50">
    					<!-- Single Sidebar Start -->
    					<div class="single-sidebar">
    						<h3>Informasi Lebih Lanjut</h3>

    						<div class="sidebar-body">
    							<p><i class="fa fa-mobile"></i> (0341) 404424</p>
    							<p><i class="fa fa-clock-o"></i> Setiap Hari 09.00 - 17.00</p>
    						</div>
    					</div>
    					<!-- Single Sidebar End -->

    					<!-- Single Sidebar Start -->
    					<div class="single-sidebar">
    						<h3>Share</h3>

    						<div class="sidebar-body">
    							<div class="social-icons text-center">
    								<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
    								<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
    								<a href="#" target="_blank"><i class="fa fa-behance"></i></a>
    								<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
    								<a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
    							</div>
    						</div>
    					</div>
                        <!-- Single Sidebar End -->
                        <?php if($mobil['data'][$i]['status'] == "Tersedia") { ?>
                            <a href="<?= base_url('customer/rental/tambah_rental/').$mobil['data'][$i]['id_mobil'] ?>" class="btn btn-lg btn-dark text-white" style="cursor: pointer"><i class="fa fa-shopping-cart"></i> Checkout</a>
                        <?php }else{ ?>
                            <a class="btn btn-lg btn-danger text-white" style="cursor: unset">Sedang Disewa</a>
                        <?php } ?>
    				</div>
                </div>
                <?php } ?>
    			<!-- Sidebar Area End -->
    		</div>
    	</div>
    </section>
    <!--== Car List Area End ==-->

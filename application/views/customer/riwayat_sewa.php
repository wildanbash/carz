    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
    	<div class="container">
    		<div class="row">
    			<!-- Page Title Start -->
    			<div class="col-lg-12">
    				<div class="section-title  text-center">
    					<h2>Riwayat Sewa</h2>
    					<span class="title-line"><i class="fa fa-car"></i></span>
    				</div>
    			</div>
    			<!-- Page Title End -->
    		</div>
    	</div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Contact Page Area Start ==-->
    <div class="contact-page-wrao section-padding">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12 m-auto">
    				<div class="card bg-light">

    					<div class="card-body">
    						<h3>Riwayat Sewa</h3>
    						<table class="table table-responsive table-striped" id="data_table">
    							<thead>
    								<tr>
    									<th>No</th>
    									<th>Nama</th>
    									<th>Id Mobil</th>
    									<th>Tanggal Sewa</th>
    									<th>Tanggal Kembali</th>
    									<th>Total Sewa</th>
    									<th>Status Pembayaran</th>
    									<th>Bukti Pembayaran</th>
    								</tr>
    							</thead>
    							<tbody>
    								<?php
            $no = 1;
            foreach ($transaksi as $ts) : ?>
    								<tr>
    									<td><?= $no++ ?></td>
    									<td><?= $ts->nama ?></td>
    									<td><?= $ts->id_mobil ?></td>
    									<td><?= $ts->tanggal_sewa ?></td>
    									<td><?= $ts->tanggal_kembali ?></td>
    									<td><?= indo_currency($ts->total_sewa) ?></td>
    									<td>
    										<?php
                        if ($ts->status_pembayaran == 0) {
                            echo "Menunggu Pembayaran";
                        } elseif ($ts->status_pembayaran == 1) {
                            echo "Menunggu Konfirmasi Pembayaran";
                        } else {
                            echo "Sudah Dibayar";
                        }
                        ?>
    									</td>
    									<td>
    										<?php
                        if ($ts->bukti_pembayaran == '') { ?>
    										<a href="<?= base_url('customer/rental/konfirmasi_pembayaran/').$ts->id_transaksi?>"
    											class="badge badge-success">Konfirmasi Pembayaran</a>
    										<?php } else{?>
    										<a
    											href="<?=base_url().'assets/upload/bukti_pembayaran/'.$ts->bukti_pembayaran?>"><img
    												width="100px" height="60px"
    												src="<?=base_url().'assets/upload/bukti_pembayaran/'.$ts->bukti_pembayaran?>"></a>
    										<?php } ?>

    									</td>
    									<td></td>

    								</tr>
    								<?php endforeach; ?>
    							</tbody>
    						</table>
    					</div>

    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!--== Contact Page Area End ==-->

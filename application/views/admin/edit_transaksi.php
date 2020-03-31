<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Edit User</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><i
										class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('admin/user') ?>">Edit User</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col text-left">
								<h4>Edit User</h4>
							</div>
						</div>
					</div>
					<div class="card-body">

						<?php foreach($transaksi as $ts) : 
							foreach ($mobil as $mb) :
							?>

						<form action="<?= base_url('admin/transaksi/edit_transaksi_simpan')?>" method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Customer</label>
										<div class="input-group">
											<input type="hidden" name="harga" id="harga" value="<?=$mb->harga?>">
											<input type="hidden" name="id_transaksi" value="<?=$ts->id_transaksi?>">
											<input type="hidden" name="id_user" value="<?=$ts->id_user?>" id="id_user">
											<input type="hidden" name="id_mobil" value="<?=$ts->id_mobil?>"
												id="id_mobil">
											<input type="text" name="user" class="form-control" id="nama"
												value="<?= $ts->nama?>" required disabled>
											<div class="input-group-append">
												<button type="button" class="btn btn-primary btn" data-toggle="modal"
													data-target="#modal-user">
													<i class="fas fa-search"></i>
												</button>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Mobil</label>
										<div class="input-group">
											<input type="text" name="mobil" class="form-control" id="merk_mobil"
												value="<?= $mb->merk?>" required disabled>
											<div class="input-group-append">
												<button type="button" class="btn btn-primary btn" data-toggle="modal"
													data-target="#modal-mobil">
													<i class="fas fa-search"></i>
												</button>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Tanggal Sewa</label>
										<input type="text" name="tgl_sewa" class="form-control picker"
											onclick="disable()" value="<?= indo_date($ts->tanggal_sewa)?>" required>
									</div>
									<div class="form-group">
										<label>Tanggal Kembali</label>
										<input type="text" name="tgl_kembali" class="form-control picker"
											onclick="disable()" value="<?= indo_date($ts->tanggal_kembali)?>" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Status</label>
										<select name="status" class="form-control" required>
											<option <?php if($ts->status == "1"){echo "selected='selected'";}
                    ?> value="1">Disewa</option>
											<option <?php if($ts->status == "2"){echo "selected='selected'";}
                    ?> value="2">Selesai</option>
										</select>
										<?= form_error('status','<div class="text-small text-danger">','</div>') ?>
									</div>

									<button type="submit" class="btn btn-primary mt-3">Simpan</button>
									<button type="reset" class="btn btn-danger mt-3">Reset</button>
								</div>
							</div>
						</form>
						<?php endforeach ?>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Main Content ] end -->




		<div class="modal fade" id="modal-user">
			<div class="modal-dialog" style="min-width: 700px; max-height: 80%">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Pilih user</h4>
						<button type="button" class="close" data-dismiss="modal" arial-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body table-responsive">
						<table class="table table-bordered table-striped table-responsive" id="all_table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Gender</th>
									<th>No. Telp</th>
									<th>No. KTP</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                    $no=1;
                    foreach($user as $ct) : ?>
								<tr>
									<td><?= $no++?></td>
									<td><?= $ct->nama?></td>
									<td><?= $ct->alamat?></td>
									<td><?= $ct->gender?></td>
									<td><?= $ct->no_telp?></td>
									<td><?= $ct->no_ktp?></td>
									<td>
										<button class="btn btn-xs btn-primary input-group-append" id="select_user"
											data-id="<?=$ct->id_user?>" data-nama="<?=$ct->nama?>">
											<i class="fas fa-check mr-1 mt-1"></i>Select
										</button>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="modal-mobil">
			<div class="modal-dialog" style="min-width: 700px; max-height: 80%">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Pilih Mobil Tersedia</h4>
						<button type="button" class="close" data-dismiss="modal" arial-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body table-responsive">
						<table class="table table-bordered table-striped" id="all_table2">
							<thead>
								<tr>
									<th>No</th>
									<th>Gambar</th>
									<th>Merk</th>
									<th>No. Plat</th>
									<th>Warna</th>
									<th>Tahun</th>
									<th>Harga</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                    $no=1;
					foreach($all_mobil as $mb) : 
						if (($mb->status) == "Tersedia") :
						?>
								<tr>
									<td><?= $no++?></td>
									<td><img width="100px" height="60px" src="<?= $mb->gambar?>"></td>
									<td><?= $mb->merk?></td>
									<td><?= $mb->no_plat?></td>
									<td><?= $mb->warna?></td>
									<td><?= $mb->tahun?></td>
									<td><?= $mb->harga?></td>
									<td>
										<button class="btn btn-xs btn-primary input-group-append" id="select_mobil"
											data-id="<?=$mb->id_mobil?>" data-merk="<?=$mb->merk?>"
											data-harga="<?=$mb->harga?>">
											<i class="fas fa-check mr-1 mt-1"></i>Select
										</button>
									</td>
								</tr>
								<?php endif ?>
								<?php endforeach; ?>
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

		<script>
			$(document).ready(function () {
				$(document).on('click', '#select_user', function () {
					var id_user = $(this).data('id');
					var nama = $(this).data('nama');

					$('#nama').val(nama);
					$('#id_user').val(id_user);

					$('#modal-user').modal('hide');
				});
			});

		</script>

		<script>
			$(document).ready(function () {
				$(document).on('click', '#select_mobil', function () {
					var id_mobil = $(this).data('id');
					var merk = $(this).data('merk');
					var harga = $(this).data('harga');

					$('#merk_mobil').val(merk);
					$('#id_mobil').val(id_mobil);
					$('#harga').val(harga);

					$('#modal-mobil').modal('hide');
				});
			});

		</script>
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

						<?php foreach($user as $us) : ?>

						<form action="<?= base_url('admin/user/edit_user_simpan')?>" enctype="multipart/form-data"
							method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Nama</label>
										<input type="hidden" name="id_user" value="<?=$us->id_user?>">
										<input type="text" name="nama" class="form-control" value="<?= $us->nama?>">
										<?= form_error('nama','<div class="text-small text-danger">','</div>') ?>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" value="<?= $us->email?>">
										<?= form_error('email','<div class="text-small text-danger">','</div>') ?>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
										<?= form_error('password','<div class="text-small text-danger">','</div>') ?>
									</div>
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="confirm_password" class="form-control">
										<?= form_error('confirm_password','<div class="text-small text-danger">','</div>') ?>
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<input type="text" name="alamat" class="form-control" value="<?= $us->alamat?>">
										<?= form_error('alamat','<div class="text-small text-danger">','</div>') ?>
									</div>
									<div class="form-group">
										<label>Jenis Kelamin</label>
										<select name="gender" class="form-control">
											<option value="<?= $us->gender?>"><?= $us->gender?></option>
											<option value="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
										<?= form_error('gender','<div class="text-small text-danger">','</div>') ?>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>No. Telepon</label>
										<input type="text" name="no_telp" class="form-control"
											value="<?= $us->no_telp?>">
										<?= form_error('no_telp','<div class="text-small text-danger">','</div>') ?>
									</div>
									<div class="form-group">
										<label>No. KTP</label>
										<input type="text" name="no_ktp" class="form-control" value="<?= $us->no_ktp?>">
										<?= form_error('no_ktp','<div class="text-small text-danger">','</div>') ?>
									</div>
									<div class="form-group">
										<label>Scan KTP</label>
										<input type="file" name="scan_ktp" class="form-control">
									</div>
									<div class="form-group">
										<label>Scan KK</label>
										<input type="file" name="scan_kk" class="form-control">
									</div>
									<div class="form-group">
										<label>Level</label>
										<select name="level" class="form-control">
											<option value="<?= $us->level?>">
												<?php if(($us->level) == 1){
                            echo "Admin";
                        }else{
                            echo "Customer";
                        } ?>

											</option>

											<option value="1">Admin</option>
											<option value="2">Customer</option>
										</select>
										<?= form_error('level','<div class="text-small text-danger">','</div>') ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<button type="submit" class="btn btn-primary mt-3">Simpan</button>
									<button type="reset" class="btn btn-danger mt-3">Reset</button>
								</div>
							</div>
						</form>

						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Main Content ] end -->

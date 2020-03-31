<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">User</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><i
										class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('admin/user') ?>">User</a></li>
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
								<h4>Data User</h4>
							</div>
							<div class="col text-right">
								<button type="button" data-toggle="modal" class="btn btn-sm btn-info"
									data-target=".bd-modal-lg"><i class="fas fa-plus"></i> Tambah User</button>
								<div class="modal fade bd-modal-lg" tabindex="-1" role="dialog"
									aria-labelledby="tambah_user" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title h4" id="tambah_user">Tambah User</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close"><span aria-hidden="true">&times;</span></button>
											</div>
											<form action="<?= base_url('admin/user/tambah_user_simpan')?>" enctype="multipart/form-data" method="POST">
											<div class="modal-body text-left">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Nama</label>
															<input type="text" name="nama" class="form-control">
															<?= form_error('nama','<div class="text-small text-danger">','</div>') ?>
														</div>
														<div class="form-group">
															<label>Email</label>
															<input type="email" name="email" class="form-control">
															<?= form_error('email','<div class="text-small text-danger">','</div>') ?>
														</div>
														<div class="form-group">
															<label>Password</label>
															<input type="password" name="password" class="form-control">
															<?= form_error('password','<div class="text-small text-danger">','</div>') ?>
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" name="confirm_password"
																class="form-control">
															<?= form_error('confirm_password','<div class="text-small text-danger">','</div>') ?>
														</div>
														<div class="form-group">
															<label>Alamat</label>
															<input type="text" name="alamat" class="form-control">
															<?= form_error('alamat','<div class="text-small text-danger">','</div>') ?>
														</div>
														<div class="form-group">
															<label>Jenis Kelamin</label>
															<select name="gender" class="form-control">
																<option value="">-- Pilih Jenis Kelamin</option>
																<option value="Laki-Laki">Laki-Laki</option>
																<option value="Perempuan">Perempuan</option>
															</select>
															<?= form_error('gender','<div class="text-small text-danger">','</div>') ?>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>No. Telepon</label>
															<input type="text" name="no_telp" class="form-control">
															<?= form_error('no_telp','<div class="text-small text-danger">','</div>') ?>
														</div>
														<div class="form-group">
															<label>No. KTP</label>
															<input type="text" name="no_ktp" class="form-control">
															<?= form_error('no_ktp','<div class="text-small text-danger">','</div>') ?>
														</div>
														<div class="form-group">
															<label>Scan KTP</label>
															<input type="file" name="scan_ktp" class="form-control"
																required>
														</div>
														<div class="form-group">
															<label>Scan KK</label>
															<input type="file" name="scan_kk" class="form-control"
																required>
														</div>
														<div class="form-group">
															<label>Level</label>
															<select name="level" class="form-control">
																<option value="">-- Pilih Level --</option>
																<option value="1">Admin</option>
																<option value="2">Customer</option>
															</select>
															<?= form_error('level','<div class="text-small text-danger">','</div>') ?>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary mt-3">Simpan</button>
												<button type="reset" class="btn btn-danger mt-3">Reset</button>
											</div>
										</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table class="table table table-hover table-striped table-bordered" id="dataTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Alamat</th>
									<th>Gender</th>
									<th>No. Telp</th>
									<th>No. KTP</th>
									<th>Level</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                    $no=1;
                    foreach($user as $u) : ?>
								<tr>
									<td><?= $no++?></td>
									<td><?= $u->nama?></td>
									<td><?= $u->email?></td>
									<td><?= $u->alamat?></td>
									<td><?= $u->gender?></td>
									<td><?= $u->no_telp?></td>
									<td><?= $u->no_ktp?></td>
									<td>
										<?php if($u->level == 1){
                                    echo "Admin";
                                }else{
                                    echo "Customer";
                                }
                                
                                ?>

									</td>
									<td>
										<div class="input-group-append">
											<a href="<?= base_url('admin/user/delete_user/').$u->id_user?>"
												class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
											<a href="<?= base_url('admin/user/edit_user/').$u->id_user?>"
												class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
										</div>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Main Content ] end -->

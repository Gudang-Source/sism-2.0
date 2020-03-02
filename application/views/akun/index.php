<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Kelola Akun</h4>
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">
						<table id="order-listing" class="table">
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
									data-target="#exampleModal" style="float: right" name="tambah_surat">Tambah Akun
							</button>
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Akun</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no =1;
							foreach ($akun as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['username'] ?></td>
									<td><a href="<?= base_url('akun/edit/'.$value['user_id'])?>"class="btn social-btn btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
										<?php
										if ($value['user_level']=='Pegawai'):
										?>
										<a href="<?= base_url('akun/hapus/'.$value['user_id'])?>"class="btn social-btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')" title="Hapus"><i class="fa fa-trash-o"></i></td>
									<?php
									endif;
									?>
								</tr>
								<?php
								$no++;
							endforeach;
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('akun/buat', array('enctype' => 'multipart/form-data')) ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Username</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username"
						   name="username" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Password</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Password"
						   name="password" required>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<div class="form-radio">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="jenis_kelamin" id="optionsRadios1" value="Pria"
								   checked>
							Pria
						</label>
					</div>
					<div class="form-radio">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="jenis_kelamin" id="optionsRadios2"
								   value="Wanita">
							Wanita
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Alamat</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Alamat"
						   name="alamat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tanggal Lahir</label>
					<input type="date" class="form-control" id="exampleInputEmail1" name="tanggal_lahir">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Lengkap</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="nama_lengkap">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tempat Lahir</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="tempat_lahir">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Jabatan</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="user_jabatan" >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nomor HP</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="user_nope" >
				</div>


				<div class="modal-footer">
					<button type="submit" class="btn btn-success" name="simpan">Submit</button>
					<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>

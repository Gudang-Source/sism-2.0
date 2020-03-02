<?php foreach ($akun as $key => $value){ ?>
	<form action="<?php echo base_url('akun/update/'.$value->user_id); ?>" method="post" style="width: 100%;margin-left: 20%;margin-right: 20%" >
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
				</button>
			</div>
			<?= form_open( 'akun/edit/'.$value->user_id, array('enctype' => 'multipart/form-data')) ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama akun</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="username" value="<?php echo $value-> username ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Password</label>
					<input type="password" class="form-control" id="exampleInputEmail1" name="password" value="">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Lengkap</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="nama_lengkap" value="<?php echo $value-> nama_lengkap ?>">
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
					<input type="text" class="form-control" id="exampleInputEmail1" name="alamat" value="<?php echo $value-> alamat ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tanggal Lahir</label>
					<input type="date" class="form-control" id="exampleInputEmail1" name="tanggal_lahir" value="<?php echo $value-> user_tanggal ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tempat Lahir</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="tempat_lahir" value="<?php echo $value-> user_tempat ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Jabatan</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="user_jabatan" value="<?php echo $value-> user_jabatan ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nomor HP</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="user_nope" value="<?php echo $value-> user_nope ?>">
				</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-success" name="simpan">Submit</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
			<?= form_close() ?>
		</div
	</form>
<?php } ?>

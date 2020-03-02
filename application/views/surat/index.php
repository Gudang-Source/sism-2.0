<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Surat Masuk</h4>
			<div class="row">
				<?php
				if ($this->session->flashdata('alert') == 'gagal_upload_foto'):
					?>
					<div class="alert alert-danger animated fadeInDown" id="feedback" role="alert" style="width: 100%;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Isi Data Dengan Lengkap
					</div>
				<?php
				elseif ($this->session->flashdata('alert') == 'berhasil_buat_surat'):
					?>
					<div class="alert alert-success animated fadeInDown" id="feedback" role="alert" style="width: 100%;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Surat Berhasil Dibuat
					</div>
				<?php
				elseif ($this->session->flashdata('alert') == 'berhasil_menghapus_surat'):
					?>
					<div class="alert alert-success animated fadeInDown" id="feedback" role="alert" style="width: 100%;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Surat Berhasil Dihapus
					</div>
				<?php
				elseif ($this->session->flashdata('alert') == 'berhasil_edit_surat'):
					?>
					<div class="alert alert-success animated fadeInDown" id="feedback" role="alert" style="width: 100%;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Surat Berhasil Dibuat
					</div>
				<?php
				elseif ($this->session->flashdata('alert') == 'berhasil_disposisi_surat'):
					?>
					<div class="alert alert-success animated fadeInDown" id="feedback" role="alert" style="width: 100%;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Surat Berhasil Didisposisi
					</div>
				<?php
				elseif ($this->session->flashdata('alert') == 'berhasil_menolak_surat'):
					?>
					<div class="alert alert-success animated fadeInDown" id="feedback" role="alert" style="width: 100%;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Surat Berhasil Ditolak
					</div>
				<?php
				elseif ($this->session->flashdata('alert') == 'berhasil_simpan_surat'):
					?>
					<div class="alert alert-success animated fadeInDown" id="feedback" role="alert" style="width: 100%;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Surat Berhasil Disimpan
					</div>
				<?php
				elseif ($this->session->flashdata('alert') == 'gagal_upload_dokumen'):
					?>
					<div class="alert alert-danger animated fadeInDown" id="feedback" role="alert" style="width: 100%;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Dokumen Gagal Upload
					</div>
				<?php
				endif;
				?>
				<div class="col-12">
					<div class="table-responsive">
						<table id="order-listing" class="table">
							<?php
							if ($this->session->userdata('session_level') == 'Pegawai'):
								?>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
										data-target="#exampleModal" style="float: right" name="tambah_surat">Tambah Surat
								</button>
							<?php
							endif;
							?>
							<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Nomor Surat</th>
<!--								<th>Perihal</th>-->

								<th>Tanggal Surat</th>
								<th>Pengirim</th>
								<th>Isi Singkat</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($surat as $key => $value):
								if ($this->session->userdata('session_level') == 'Pegawai' || $this->session->userdata('session_level') == 'Penghulu'):
									?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $value['masuk_date_created'] ?></td>
										<td><?= $value['masuk_nomor'] ?></td>
<!--										<td>--><?//= $value['masuk_perihal'] ?><!--</td>-->
										<td><?= $value['masuk_tanggal'] ?></td>
										<td><?= $value['masuk_asal'] ?></td>
										<td><?= $value['masuk_isi_singkat'] ?></td>
										<td><?= $value['masuk_keterangan'] ?></td>

										<td>

											<?php
												if ($this->session->userdata('session_level') || $this->session->userdata('session_level') == 'Penghulu'):
											?>
													<a href="<?= base_url('assets/upload/upload_gambar/' . $value['surat_foto']) ?>"
												   class="btn btn-small btn-primary" title="Lihat" target="_blank"><i
														class="fa fa-eye"></i></a>
													<a href="<?= base_url('surat/edit/' . $value['masuk_id']) ?>"
													   class="btn btn-small btn-success" title="Edit"><i
															class="fa fa-pencil"></i></a>
													<a href="<?= base_url('surat/hapus/' . $value['masuk_id']) ?>"
													   class="btn btn-small btn-danger"
													   onclick="return confirm('Apakah anda yakin ingin menghapus?')"
													   title="Hapus"><i
															class="fa fa-trash-o"></i></a>
												<?php
												endif;
											?>
										</td>

									</tr>
									<?php
								$no++;
								endif;

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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Surat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('surat/buat', array('enctype' => 'multipart/form-data')) ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Asal Surat</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Asal Surat"
						   name="asal_surat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tanggal Surat</label>
					<input type="date" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Surat"
						   name="tanggal_surat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Perihal</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Perihal"
						   name="perihal" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nomor Surat</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nomor Surat"
						   name="nomor_surat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Isi Singkat</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Isi Singkat"
						   name="isi_singkat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Keterangan</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Keterangan"
						   name="keterangan" required>
				</div>
				<div>
					<label for="exampleInputEmail1">Upload Surat</label>
					<input type="file" class="dropify" name="upload"/>
				</div>


			<div class="modal-footer">
				<button type="submit" class="btn btn-success" name="simpan">Submit</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Masukkan Keterangan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url("surat/tolak_surat")?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea name="keterangan" class="form-control" rows="3" placeholder="isi disini ..."></textarea>

					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" name="simpan">Submit</button>
					<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
				</div>
				<input type="text" id="id_surat" name="id" required readonly style="background: transparent;width: 1px;height: 1px">
			</form>
		</div>
	</div>
</div>


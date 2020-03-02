<?php foreach ($surat as $key => $value){ ?>
<form action="<?php echo base_url('surat/update/'.$value->masuk_id); ?>" method="post" style="width: 100%;margin-left: 20%;margin-right: 20%" >
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Surat</h5>
				</button>
			</div>
			<?= form_open( 'surat/buat', array('enctype' => 'multipart/form-data')) ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Asal Surat</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Asal Surat" value="<?php echo $value-> masuk_asal ?>"
						   name="asal_surat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tanggal Surat</label>
					<input type="date" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Surat" value="<?php echo $value-> masuk_tanggal ?>"
						   name="tanggal_surat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Perihal</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Perihal" value="<?php echo $value-> masuk_perihal ?>"
						   name="perihal" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nomor Surat</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nomor Surat" value="<?php echo $value-> masuk_nomor ?>"
						   name="nomor_surat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Isi Singkat</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Isi Singkat" value="<?php echo $value-> masuk_isi_singkat ?>"
						   name="isi_singkat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Keterangan</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Keterangan" value="<?php echo $value-> masuk_keterangan ?>"
						   name="keterangan" required>
				</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-success" name="simpan">Submit</button>
				<a href="<?= base_url('surat') ?>"
				   class="btn btn-small btn-danger" title="Kembali"style="float: right">Back</a>
			</div>
			<?= form_close() ?>
</div
</form>
<?php } ?>

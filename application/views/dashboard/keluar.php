<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Surat Keluar</h4>
			<div class="row">
			<?=form_open('keluar')?>
				<select name="jenis" id="" class="form-control">
					<option selected disabled>- Pilih jenis surat -</option>
					<option value="skck">Surat Keterangan Catatan Berkelakuan Baik</option>
					<option value="ktps">Surat Keterangan KTP Sementara</option>
					<option value="ppak">Surat Keterangan Permohonan Pindah Antar Kabupaten</option>
					<option value="skb">Surat Keterangan Berdomisili</option>
					<option value="skh">Surat Keterangan Kehilangan</option>
					<option value="skkn">Surat Keterangan Kebenaran Nama</option>
					<option value="skpn">Surat Keterangan Pindah Nikah</option>
					<option value="sktk">Surat Keterangan Tanda Kependudukan</option>
					<option value="sku">Surat Keterangan Usaha</option>
					<option value="spbpn">Surat Keterangan Belum Pernah Nikah</option>
				</select>
				<br>
				<button type="submit" name="lihat" class="btn btn-primary">Lihat</button>
			<?=form_close()?>
			</div>
		</div>
	</div>
</div>

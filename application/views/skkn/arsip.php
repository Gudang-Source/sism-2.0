<div class="col-12">
	<div class="card">
		<div class="card-body">
			<button onclick="window.print()" class="btn btn-primary btn-sm d-print-none" style="float: right"><i class="fa fa-print"></i></button>

			<h4 class="card-title text-center">Arsip Surat Keterangan Kebenaran Nama</h4>
			<h6 class="card-title text-center">Dari Tanggal <?=$tanggal1?> - <?=$tanggal2?></h6>
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>No</th>
					<th>Nomor Surat</th>
					<th>Nama Surat</th>
					<th>Tanggal Lahir</th>
					<th>Tempat Lahir</th>
					<th>Kewarganegaraan</th>
					<th>Jenis Kelamin</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				foreach ($laporan as $key => $value):
//				if ($value['skkn_disposisi'] == 'Setuju'):
				?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $value['skkn_nomor'] ?></td>
					<td><?= $value['skkn_nama'] ?></td>
					<td><?= $value['skkn_tanggal_lahir'] ?></td>
					<td><?= $value['skkn_tempat_lahir'] ?></td>
					<td><?= $value['skkn_wni'] ?></td>
					<td><?= $value['skkn_jk'] ?></td>
					<?php

					$no++;
//					endif;
					endforeach;
					?>
				</tbody>
			</table>
		</div>
		<div class="col-4 float-right" style="margin-left: 80%;">
			<div style="margin-left: 20px;">
				<p style="margin-left: -100px;margin-bottom:-6px;" class="text-center"><b>BANGKO BAKTI, <?php
						echo date('Y-m-d');
						?></b></p>
				<p style="margin-left: -100px;margin-bottom:-6px;" class="text-center"><b>PENGHULU BANGKO BAKTI</b></p>
				<br>
				<br><br>
				<p style="margin-left: -100px;" class="text-center"><b>HUSNI TAMRIN, S.Ap</b></p>
				<p style="margin-left: -100px;" class="text-center"><b>NIP.19740923 200906 1 002</b></p>
			</div>
	</div>
</div>

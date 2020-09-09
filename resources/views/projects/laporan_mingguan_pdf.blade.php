<html>

<head>
	<title>Laporan Mingguan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<center>
		<h4>LAPORAN MINGGUAN KEGIATAN PEMBANGUNAN TANGKI SEPTIK</h4>
		<h5>KABUPATEN/KOTA.....</h6>
			<h6>Dusun..... Kelurahan/Desa ..... Kecamatan ........</h7>
	</center>

	<table>
		<tbody>
			<tr>
				<td>1.</td>
				<td>Tanggal Pelaporan</td>
				<td>: {{$data->tgl_pelaporan}}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>2.</td>
				<td>Minggu Ke-</td>
				<td>: {{$data->minggu_ke}}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>3.</td>
				<td>Identifikasi Tangki Septik</td>
			</tr>
			<tr>
				<td style="font-size: 10;">3.1.</td>
				<td style="font-size: 10;">Jenis Konstruksi Tangki Septik</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td style="font-size: 8;">1 = Pasangan Batu Bata; 2 = Cor Beton; 3 = Fabrikasi); 4 = buis beton</td>
				<td>: {{ $data->tipe_konstruksi }}</td>
			</tr>
			<tr>
				<td style="font-size: 10;">3.2.</td>
				<td style="font-size: 10;">Jenis Tangki Septik</td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size: 8;">3.2.1</td>
				<td style="font-size: 8;">Individu (unit)</td>
				<td>: {{$data->tipe_tangki}}</td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">Dimensi (dalam meter)</td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">- Panjang (m)</td>
				<td>: {{$data->panjang}}</td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">- Lebar (m)</td>
				<td>: {{$data->lebar}}</td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">- Tinggi (m)</td>
				<td>: {{$data->tinggi}}</td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">- Diameter, jika Biofilter atau buis beton (m)</td>
				<td>: {{$data->diameter}}</td>
			</tr>
			<tr>
				<td style="font-size: 8;">3.2.2</td>
				<td style="font-size: 8;">Komunal (unit)</td>
				<td>: </td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">Dimensi (dalam meter)</td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">- Panjang (m)</td>
				<td>: </td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">- Lebar (m)</td>
				<td>: </td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">- Tinggi (m)</td>
				<td>: </td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">- Diameter, jika Biofilter atau buis beton (m)</td>
				<td>: </td>
			</tr>
			<tr>
				<td>4.</td>
				<td>Kamar Mandi dan WC</td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">Sudah ada (unit)</td>
				<td>: {{$data->km_sa}}</td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">Termasuk dalam pembangunan TS (unit)</td>
				<td>: {{$data->km_ts}}</td>
			</tr>
			<tr>
				<td style="font-size: 8;"></td>
				<td style="font-size: 8;">Tidak ada (unit)</td>
				<td>: {{$data->km_ta}}</td>
			</tr>
			<tr>
				<td>5.</td>
				<td>Identitas Pelaksana Kegiatan</td>
			</tr>
			<tr>
				<td style="font-size: 10;">5.1.</td>
				<td style="font-size: 10;">Nama Perusahaan/Kelompok Masyarakat</td>
				<td>: </td>
			</tr>
			<tr>
				<td style="font-size: 10;">5.2.</td>
				<td style="font-size: 10;">No. Kontrak</td>
				<td>: </td>
			</tr>
			<tr>
				<td style="font-size: 10;">5.3.</td>
				<td style="font-size: 10;">Nilai Kontrak, Rp.</td>
				<td>: </td>
			</tr>
			<tr>
				<td style="font-size: 10;">5.4.</td>
				<td style="font-size: 10;">Surat Perintah Mulai Kerja (SPMK)</td>
				<td></td>
			</tr>
			<tr>
				<td style="font-size: 10;">5.5.</td>
				<td style="font-size: 10;">Nomor</td>
				<td>: </td>
			</tr>
			<tr>
				<td style="font-size: 10;">5.6.</td>
				<td style="font-size: 10;">Tanggal SPMK</td>
				<td>: </td>
			</tr>
			<tr>
				<td style="font-size: 10;">5.7.</td>
				<td style="font-size: 10;">Tanggal Mulai Pekerjaan Fisik</td>
				<td>: </td>
			</tr>
			<tr>
				<td>6.</td>
				<td>Pengadaan Barang/material</td>
				<td>: {{ $data->pengadaan }}</td>
			</tr>
			<tr>
				<td></td>
				<td style="font-size: 10;">Keterangan/Kendala:</td>
				<td style="font-size: 10;">: {{ $data->note_pengadaan }}</td>
			</tr>
			<tr>
				<td>7.</td>
				<td>Pelaksanaan Kegiatan Pembangunan</td>
				<td>: {{$data->pelaksanaan}}</td>
			</tr>
			<tr>
				<td></td>
				<td style="font-size: 10;">Keterangan/Kendala</td>
				<td style="font-size: 10;">: {{$data->note_pelaksanaan}}</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>8.</td>
				<td>Waktu Pelaksanaan</td>
				<td>: {{$hari}} Hari</td>
			</tr>
			<tr>
				<td style="font-size: 10;">8.1.</td>
				<td style="font-size: 10;">Tanggal Realisasi Mulai Pekerjaan</td>
				<td>: {{$data->tgl_realisasi_awal}}</td>
			</tr>
			<tr>
				<td style="font-size: 10;">8.2.</td>
				<td style="font-size: 10;">Tanggal Realisasi Mulai Pekerjaan</td>
				<td>: {{$data->tgl_realisasi_awal}}</td>
			</tr>
			<tr>
				<td>9.</td>
				<td>Progres Fisik (%) *</td>
				<td>: {{$hari}} Hari</td>
			</tr>
			<tr>
				<td style="font-size: 10;">9.1.</td>
				<td style="font-size: 10;">Jumlah TS Mulai terbangun dalam minggu ini (unit)</td>
				<td>: {{$data->progres_fisik}}</td>
			</tr>
			<tr>
				<td style="font-size: 10;">9.2.</td>
				<td style="font-size: 10;">Jumlah TS dengan progres fisik +/- 50% dalam minggu ini (unit)</td>
				<td>: {{$data->jml_ts}}</td>
			</tr>
			<tr>
				<td style="font-size: 10;">9.3.</td>
				<td style="font-size: 10;">Akumulasi jumlah TS progres fisik +/- 100% (unit)</td>
				<td>: {{$data->jml_ts_50}}</td>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<div style="margin-left: 5%;">
		<table>
			<thead>
				<tr>
					<th>Diperiksa/Disetujui,</th>
					<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th>Diperiksa/Disetujui,</th>
					<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th>Dibuat Oleh,</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Dinas ................</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Konsultan Oversight (LE),</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Pelaksana,</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>............................................</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>............................................</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>............................................</td>
				</tr>
			</tbody>
		</table>
	</div>

</body>

</html>
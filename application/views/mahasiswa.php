<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>

<h3>Data Mahasiswa</h3>
<h5 style="color:red;">
<?php

	$info = $this->session->flashdata('info');
		if(!empty($info)){
			echo $info;
		}

?>
</h5>
<a href="<?= site_url('mahasiswa/addData') ?>">Tambah Data</a>

<table style="border-collapse: collapse;border: 1px solid black;">
	<thead>
		<tr>
			<th style="text-align: center;vertical-align: middle;">No.</th>
			<th style="text-align: center;vertical-align: middle;">Nomor Induk Mahasiswa</th>
			<th style="text-align: center;vertical-align: middle;">Nama Lengkap</th>
			<th style="text-align: center;vertical-align: middle;">No. Handphone</th>
			<th style="text-align: center;vertical-align: middle;">Departemen</th>
			<th style="text-align: center;vertical-align: middle;">Action</th>
		</tr>
	</thead>
	<tbody>

	<?php
		$no = 1; 
		foreach($dataMahasiswa as $data){ 
	?>

		<tr>
			<td style="text-align:center; vertical-align:middle;"><?= $no++ ?></td>
			<td style="text-align:center; vertical-align:middle;"><?= $data->nim ?></td>
			<td style="text-align:center; vertical-align:middle;"><?= $data->nama_mahasiswa ?></td>
			<td style="text-align:center; vertical-align:middle;"><?= $data->no_hp_mahasiswa ?></td>
			<td style="text-align:center; vertical-align:middle;"><?= $data->departemen ?></td>
			<td style="text-align:center; vertical-align:middle;">
				<a href="<?= site_url('mahasiswa/editData/'.$data->id_mahasiswa) ?>">Edit</a> || <a href="<?= site_url('mahasiswa/doDelete/'.$data->id_mahasiswa) ?>">Hapus</a>
			</td>
		</tr>

	<?php } ?>

	</tbody>
</table>

</body>
</html>

<style type="text/css">
	table, th, td {
  border: 1px solid black;
}
</style>
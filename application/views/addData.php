<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>

<h3>Formulir Tambah Data</h3>

<form method="POST" action="<?= site_url('mahasiswa/doAddData') ?>">
	Nama : <input type="text" name="nama_mahasiswa" maxlength="40" required><br/>
	Nim : <input type="text" name="nim" maxlength="15" required><br/>
	No. Hp : <input type="number" name="no_hp_mahasiswa" maxlength="12" required><br/>
	Departemen : <select name="departemen">
		<option value="">-Pilih Jurusan-</option>
		<option value="Teknik Nuklir">Teknik Nuklir</option>
		<option value="Teknik Fisika">Teknik Fisika</option>
		<option value="Teknik Kimia">Teknik Kimia</option>
		<option value="Teknik Pertambangan">Teknik Pertambangan</option>
	</select>
	<br/>
	<button type="submit">Submit</button>
</form>

</body>
</html>
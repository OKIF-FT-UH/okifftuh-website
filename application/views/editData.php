<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Mahasiswa</title>
</head>
<body>

<h3>Formulir Tambah Data</h3>

<?php 

foreach($dataMahasiswa as $data){ 
$select = $data->departemen;
?>

<form method="POST" action="<?= site_url('mahasiswa/doEditData/'.$data->id_mahasiswa) ?>">
	Nama : <input type="text" name="nama_mahasiswa" maxlength="40" value="<?= $data->nama_mahasiswa ?>" required><br/>
	Nim : <input type="text" name="nim" maxlength="15" value="<?= $data->nim ?>" required><br/>
	No. Hp : <input type="number" name="no_hp_mahasiswa" maxlength="12" value="<?= $data->no_hp_mahasiswa ?>" required><br/>
	Departemen : <select name="departemen">
		<option value="" <?php if($select == ''){ echo "selected";} ?>>-Pilih Jurusan-</option>
		<option value="Teknik Nuklir" <?php if($select == 'Teknik Nuklir'){echo "selected";} ?>>Teknik Nuklir</option>
		<option value="Teknik Fisika" <?php if($select == 'Teknik Fisika'){echo "selected";} ?>>Teknik Fisika</option>
		<option value="Teknik Kimia" <?php if($select == 'Teknik Kimia'){echo "selected";} ?>>Teknik Kimia</option>
		<option value="Teknik Pertambangan" <?php if($select == 'Teknik Pertambangan'){echo "selected";} ?>>Teknik Pertambangan</option>
	</select>
	<br/>
	<button type="submit">Submit</button>
<?php } ?>
</form>

</body>
</html>
<?php 
require 'functions.php';

$mahasiswa = query("SELECT * FROM tblmahasiswa");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah Data Mahasiswa</a>
<br><br>
<table border="1" cellpadding="10" cellspacing="0">
	

	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>NPM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>
<?php $i=1; ?>
<?php foreach ($mahasiswa as $row) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><a href="">ubah</a> | 
			<a href="hapus.php?ID=<?= $row['ID'] ; ?>" onclick="return confirm('yakin?');">hapus</a></td>
		<td><img src="img/<?= $row["GAMBAR"] ; ?>" width="50"></td>
		<td> <?=  $row["NPM"]; ?></td>
		<td> <?=  $row["NAMA"]; ?></td>
		<td> <?=  $row["EMAIL"]; ?></td>
		<td> <?=  $row["JURUSAN"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
</table>

</body>
</html>
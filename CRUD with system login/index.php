<?php 
session_start();

if (!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;
}

require 'functions.php';

// pagination
$jumlahDataPerHalaman = 4;
// $result = mysqli_query($conn, "SELECT * FROM tblmahasiswa");
// $jumlahData = mysqli_num_rows($result);
// atau
	$jumlahData = count(query("SELECT * FROM tblmahasiswa"));

	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;

$awalData= ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman; 


$mahasiswa = query("SELECT * FROM tblmahasiswa LIMIT $awalData, $jumlahDataPerHalaman ");

// tombol cari ditekan
if (isset($_POST['cari'])){

	$mahasiswa = cari($_POST['keyword']);
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah Data Mahasiswa</a>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cari">Cari</button>
	

</form>
<br>
<!-- navigasi page -->
<?php if($halamanAktif > 1): ?>
<a href="?hal=<?= $halamanAktif-1; ?>">&laquo;</a>
<?php endif; ?>


<?php for($i=1;$i<=$jumlahHalaman;$i++): ?>
	<?php if($i == $halamanAktif): ?>
		<a href="?hal=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else: ?>
		<a href="?hal=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if($halamanAktif < $jumlahHalaman): ?>
<a href="?hal=<?= $halamanAktif+1; ?>">&raquo;</a>
<?php endif; ?>
<br>
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
		<td><a href="ubah.php?ID=<?= $row['ID'];?>">ubah</a> | 
			<a href="hapus.php?ID=<?= $row['ID'] ; ?>" onclick="return confirm('yakin ingin dihapus?');">hapus</a></td>
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
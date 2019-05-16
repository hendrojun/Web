<?php 
session_start();

if (!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;
}

require 'functions.php';


//cek tombol sumbit sudah ditekan
 if(isset($_POST["submit"])){
 	

 	// cek data berhasil input

 	if (tambah($_POST) > 0 ){

 		echo "
 		<script>	
 			alert('Data berhasil ditambahkan!');
 			document.location.href = 'index.php';
 		</script> ";

 	}else{ echo "
 		<script>	
 			alert('Data gagal ditambahkan!');
 			document.location.href = 'index.php';
 		</script> ";

 	}
 	// if(mysqli_affected_rows($conn) > 0 ){
 	// 	echo "berhasil";
 	// }else{
 	// 	echo "gagal";
 	// 		echo "<br>";
 	// 		echo mysqli_error($conn);
 	// }
 }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data mahasiswa</title>
</head>
<body>
	<h1>Tambah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li><label for="npm">NPM : </label>
				<input type="text" name="NPM" id="npm" required>
			</li>
			<li><label for="nama">Nama : </label>
				<input type="text" name="NAMA" id="nama" required>
			</li>
			<li><label for="email">Email : </label>
				<input type="text" name="EMAIL" id="email" required>
			</li>
			<li><label for="jurusan">Jurusan : </label>
				<input type="text" name="JURUSAN" id="jurusan" required>
			</li>
			<li><label for="gambar">Gambar : </label>
				<input type="file" name="GAMBAR" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>
		</ul>

	</form>

</body>
</html>
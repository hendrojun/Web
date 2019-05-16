<?php 
session_start();

if (!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;
}

require 'functions.php';

//ambil data di url
$id = $_GET["ID"];

// query data mhs berdasarkan id
$mhs = query("SELECT * FROM tblmahasiswa WHERE ID = $id ")[0];



//cek tombol sumbit sudah ditekan
 if(isset($_POST["submit"])){
 	

 	// cek data berhasil input

 	if (ubah($_POST) > 0 ){

 		echo "
 		<script>	
 			alert('Data berhasil diubah!');
 			document.location.href = 'index.php';
 		</script> ";

 	}else{ echo "
 		<script>	
 			alert('Data gagal diubah!');
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
	<title>Ubah data mahasiswa</title>
</head>
<body>
	<h1>Ubah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="ID" value="<?= $mhs['ID']; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs['GAMBAR']; ?>">
		<ul>
			<li><label for="npm">NPM : </label>
				<input type="text" name="NPM" id="npm" required value="<?= $mhs['NPM']; ?>">
			</li>
			<li><label for="nama">Nama : </label>
				<input type="text" name="NAMA" id="nama" required value="<?= $mhs['NAMA']; ?>">
			</li>
			<li><label for="email">Email : </label>
				<input type="text" name="EMAIL" id="email" required value="<?= $mhs['EMAIL']; ?>">
			</li>
			<li><label for="jurusan">Jurusan : </label>
				<input type="text" name="JURUSAN" id="jurusan" required value="<?= $mhs['JURUSAN']; ?>">
			</li>
			<li>

				<label for="gambar">Gambar : </label>
				<img src="img/<?= $mhs['GAMBAR']; ?>" width="50"> 
				
				<input type="file" name="GAMBAR" id="gambar" >
			</li>
			<li>
				<button type="submit" name="submit">Ubah data</button>
			</li>
		</ul>

	</form>

</body>
</html>
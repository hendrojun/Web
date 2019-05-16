<?php 

// koneksi ke DB
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows =[];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}



function tambah($data){
	global $conn;
// ambil data dari tiap form
 	$npm = htmlspecialchars($data["NPM"]);
 	$nama = htmlspecialchars($data["NAMA"]);
 	$email = htmlspecialchars($data["EMAIL"]);
 	$jurusan = htmlspecialchars($data["JURUSAN"]);

 	//upload gambar
 	$gambar = upload();
 	if( !$gambar){
 		return false;
 	}

 	// query insert data
 	$query = " INSERT INTO tblmahasiswa VALUES ('','$nama','$npm','$email','$jurusan','$gambar')"; 
 	mysqli_query($conn, $query);

 	return mysqli_affected_rows($conn);

}

function upload(){
	$namaFile = $_FILES['GAMBAR']['name'];
	$ukuranFile = $_FILES['GAMBAR']['size'];
	$error = $_FILES['GAMBAR']['error'];
	$tmpName = $_FILES['GAMBAR']['tmp_name'];

	// cek gambar tidak diupload
	if($error === 4){
		echo "<script> alert('File gambar belum diupload!'); </script>";
		return false;
	}

	// cek file apa yang diupload
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.',$namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "<script> alert('File upload harus gambar!'); </script>";
		return false;
	}

	// cek size terlalu besar
	if($ukuranFile > 1000000 ){
		echo "<script> alert('Ukuran file terlalu besar!'); </script>";
		return false;
	}

	// nama gambar baru jika sama
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	// gambar siap diupload
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;


}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM tblmahasiswa WHERE ID = $id");

	return mysqli_affected_rows($conn);

}

function ubah($data){

	global $conn;

	// ambil data dari tiap form
 	$id = $data['ID'];
 	$npm = htmlspecialchars($data["NPM"]);
 	$nama = htmlspecialchars($data["NAMA"]);
 	$email = htmlspecialchars($data["EMAIL"]);
 	$jurusan = htmlspecialchars($data["JURUSAN"]);
 	$gambarLama = htmlspecialchars($data["gambarLama"]);
 	// cek user upload gambar baru atau tidak
 	if($_FILES['GAMBAR']['error'] === 4){
 		$gambar = $gambarLama;
 	}else{
 	$gambar = upload();
	}
	
 	// query insert data
 	$query = " UPDATE tblmahasiswa SET
 			NPM = '$npm',
 			NAMA = '$nama',
 			EMAIL = '$email',
 			JURUSAN = '$jurusan',
 			GAMBAR = '$gambar'
 			WHERE ID = $id
 	"; 
 	mysqli_query($conn, $query);

 	return mysqli_affected_rows($conn);

}

function cari($keyword){

	$query = "SELECT * FROM tblmahasiswa WHERE
	NAMA LIKE '%$keyword%' OR
	NPM = '$keyword' OR
	EMAIL LIKE '%$keyword%' OR
	JURUSAN = '$keyword' 
	";

	return query($query);
}


function registrasi($data){

	global $conn;

	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	// cek user sudah terdaftar
	$result = mysqli_query($conn, "SELECT username FROM tbluser WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>
		alert('Username sudah terdaftar!');
		</script>";
		return false;
	}

	//cek password sama?
	if($password !== $password2){
		echo "<script>
		alert('Password tidak sesuai!');
		</script>";
		return false;
	}

	// enkripsi pasword
	$password = password_hash($password, PASSWORD_DEFAULT);


	// tambahkan user ke DB
	mysqli_query($conn, "INSERT INTO tbluser VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);



}


 ?>

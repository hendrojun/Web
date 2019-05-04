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
 	$gambar = htmlspecialchars($data["GAMBAR"]);

 	// query insert data
 	$query = " INSERT INTO tblmahasiswa VALUES ('','$npm','$nama','$email','$jurusan','$gambar')"; 
 	mysqli_query($conn, $query);

 	return mysqli_affected_rows($conn);

}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM tblmahasiswa WHERE ID = $id");

	return mysqli_affected_rows($conn);

}





 ?>
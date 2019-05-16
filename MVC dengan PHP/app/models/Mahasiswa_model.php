  <?php 

class Mahasiswa_model{

	private $table = 'tblmahasiswa';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	

	public function getAllMahasiswa()
	{

		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getMahasiswaById($id)
	{
		$this->db->query('SELECT * FROM tblmahasiswa  WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}


	public function tambahDataMahasiswa($data)
	{

		$gambar = uploadfoto();
	 	if( !$gambar){
	 		return false;
	 	}
	 	//$gambar = $data['gambar'];

		$query = "INSERT INTO tblmahasiswa VALUES('', :nama, :npm, :email, :jurusan, :gambar)";

		$this->db->query($query);
		$this->db->bind('nama', htmlspecialchars($data['nama']));
		$this->db->bind('npm', $data['npm']);
		$this->db->bind('email', htmlspecialchars($data['email']));
		$this->db->bind('jurusan', htmlspecialchars($data['jurusan']));
		$this->db->bind('gambar', $gambar);

		$this->db->execute();

		return $this->db->rowCount();
	}


	public function hapusDataMahasiswa($id)
	{
		$query = "DELETE FROM tblmahasiswa WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();

	}

	public function ubahDataMahasiswa($data)
	{
		$gambarLama = $data["gambarLama"];
 	// cek user upload gambar baru atau tidak
	 	if($_FILES['gambar']['error'] === 4){
	 		$gambar = $gambarLama;
	 	}else{
	 		$gambar = uploadfoto();
		}


		$query = "UPDATE tblmahasiswa SET
		nama = :nama,
		npm = :npm,
		email = :email,
		jurusan = :jurusan,
		gambar = :gambar
		WHERE id = :id
		";

		$this->db->query($query);
		$this->db->bind('nama', htmlspecialchars($data['nama']));
		$this->db->bind('npm', $data['npm']);
		$this->db->bind('email', htmlspecialchars($data['email']));
		$this->db->bind('jurusan', htmlspecialchars($data['jurusan']));
		$this->db->bind('gambar', $gambar);
		$this->db->bind('id', $data['id']);

		$this->db->execute();

		return $this->db->rowCount();
	}


	public function cariDataMahasiswa()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM tblmahasiswa WHERE nama LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");
		return $this->db->resultSet();

	}

	


}
 function uploadfoto()
	{
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

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
	if($ukuranFile > 2000000 ){
		echo "<script> alert('Ukuran file terlalu besar!'); </script>";
		return false;
	}

	// nama gambar baru jika sama
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	// gambar siap diupload
	move_uploaded_file($tmpName, "img/foto/" . $namaFileBaru);
	return $namaFileBaru;


}
 
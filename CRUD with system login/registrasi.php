<?php 

require 'functions.php';

if(isset($_POST['register'])){

	if(registrasi($_POST) > 0){
		echo "<script>
		alert('User baru berhasil ditambahkan!');
		</script>";
	}else{
		echo mysqli_error($conn);
	}

} 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman registrasi</title>
	<style>
		label{	display : block;}
	</style>
</head>
<body>
<a href="login.php">Login</a>
<h1>Halaman registrasi</h1>

<form action="" method="post">
	<ul>
		<li>
			<label for="username">username: </label><input type="text" name="username" id="username" required>
		</li>
		<li>
			<label for="password">password: </label><input type="password" name="password" id="password" required>
		</li>
		<li>
			<label for="password2">konfirmasi password: </label><input type="password" name="password2" id="password2" required>
		</li>
		<li>
			<button type="submit" name="register">Daftar!</button>
		</li>
	</ul>	

</form>
</body>
</html>
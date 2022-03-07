<?php
require 'functions.php';

if( isset($_POST["register"]) ) {
	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
				</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" type="text/css" href="../css/registrasi.css">
</head>

<body>

<div class="container">


<br>
<img src="img.png" width="75" height="75">
<h1>Halaman Registrasi</h1>

<form action="" method="post">

	<ul type="none">
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<label for="password2">Confirm Password :</label>
			<input type="password" name="password2" id="password2">
		</li>
		<li>
			<label for="nama_admin">Nama Admin :</label>
			<input type="text" name="nama_admin" id="nama_admin">
		</li>
		<br><br>
	</ul>
			<button type="submit" name="register">Register</button> |
			<a href="login.php"> I Have Account</a>

	
</form>

</div>

</body>
</html>
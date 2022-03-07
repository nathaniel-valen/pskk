<?php 
session_start();

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}

require 'functions.php'; 

if( isset($_POST["login"]) ) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

	// cek password
		$row = mysqli_fetch_assoc($result);
		if( $password == $row["password"] ) {

			// set session
			$_SESSION["login"] = true;

			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

	<div class="container">
	<br>
	<img src="img.png" width="75" height="75">
	<h1>Halaman Login</h1>

	<?php if( isset($error) ) : ?>
		<p style="color: red; font-style: italic;">Username / Password Salah</p>
	<?php endif; ?>

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

		</ul>
				<br>
				<button type="submit" name="login">Login</button>
				<br><br>
				<a href="registrasi.php"> I Already an have account</a>

	</form>

</div>

</body>
</html>
<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$siswa = query("SELECT * FROM siswa");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css"></li>
</head>
<body>
<center>
	<br>
	<img src="img.png" width="75" height="75" >
	<h1>Welcome to Daftar List SPP SMKN 1 Karawang</h1>

	<a href="index.php">Home</a> |
	<a href="halamanspp.php">Halaman Data SPP</a> |
	<a href="logout.php">Logout</a>

	<br><br><br>

	<textarea cols="75" rows="10" disabled readonly>Selamat datang di Website Daftar List SPP SMKN 1 Karawang, Website ini bertujuan untuk para siswa/siswi melihat Daftar SPP, semoga adanya website ini bisa berguna untuk para siswa/siswi di SMKN 1 Karawang</textarea>


</center>
</body>
</html>
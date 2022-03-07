<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// cek apakah tombol submit sudah ditekan
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil ditambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'halamanspp.php'
			</script>
		";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				// document.location.href = 'tambah.php'
			</script>
		";
	}
	
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data SPP</title>
	<link rel="stylesheet" type="text/css" href="../css/tambah.css">
</head>

<body>
	<div class="container">
	<br>
	<img src="img.png" width="75" height="75">
	<h1>Tambah Data SPP SMKN 1 Karawang</h1>

	<a href="index.php">Home</a> |
	<a href="halamanspp.php">Halaman Data SPP</a>

	<form action="" method="post">
		<ul type="none">
			<li>
				<label for="nisn">NISN :</label>
				<input type="text" name="nisn" id="nisn" required>
			</li>

			<li>
				<label for="nis">NIS :</label>
				<input type="text" name="nis" id="nis" required>
			</li>

			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required>
			</li>

			<li>
				<label for="idkls">ID Kelas :</label>
				<input type="text" name="idkls" id="idkls" required>
			</li>

			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat" required>
			</li>

			<li>
				<label for="notlp">No. Telp :</label>
				<input type="text" name="notlp" id="notlp" required>
			</li>

			<li>
				<label for="idspp">ID SPP :</label>
				<input type="text" name="idspp" id="idspp" required>
			</li>
		</ul>
		<br>
				<button type="submit" name="submit">Tambah Data SPP</button>
		
	</form>
</div>
</body>
</html>
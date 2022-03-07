<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

	// ambil data di URL
	$id = $_GET["id"];

	// query data siswa berdasarkan nisn
	$siswa = query("SELECT * FROM siswa WHERE nisn = $id")[0];

	// cek apakah tombol submit sudah ditekan
	if ( isset($_POST["submit"]) ) {
		var_dump($_POST);


	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'halamanspp.php'
			</script>
		";
	} else {
		echo "<script>
				alert('data gagal diubah!');
				// document.location.href = 'halamanspp.php'
			</script>
		";
	}
	
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data SPP</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<div class="container">
	<h1>Ubah Data SPP</h1>
	<a href="index.php">Home</a> |
	<a href="halamanspp.php">Halaman Data SPP</a>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $siswa["nisn"]; ?>">
		<ul>
			<li>
				<label for="nisn">NISN : <?= $siswa["nisn"]; ?></label>
			</li>

			<li>
				<label for="nis">NIS :</label>
				<input type="text" name="nis" id="nis" required value="<?= $siswa["nis"]; ?>">
			</li>

			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $siswa["nama"]; ?>">
			</li>

			<li>
				<label for="idkls">ID Kelas :</label>
				<input type="text" name="idkls" id="idkls" value="<?= $siswa["id_kelas"]; ?>">
			</li>

			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat" required value="<?= $siswa["alamat"]; ?>">
			</li>

			<li>
				<label for="notlp">No. Telp :</label>
				<input type="text" name="notlp" id="notlp" required value="<?= $siswa["no_telp"]; ?>">
			</li>

			<li>
				<label for="idspp">ID SPP :</label>
				<input type="text" name="idspp" id="idspp" value="<?= $siswa["id_spp"]; ?>">
			</li>
		</ul>
		<br>
				<button type="submit" name="submit">Ubah Data SPP</button>
		
	</form>
</div>
</body>
</html>
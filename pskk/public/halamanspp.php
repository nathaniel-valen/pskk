<?php  
require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerhalaman = 5;
$jumlahData = count(query("SELECT * FROM siswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;




$siswa = query("SELECT * FROM siswa ORDER BY nisn LIMIT $awalData, $jumlahDataPerhalaman");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$siswa = cari($_POST["keyword"]);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
<center>
	<br>
	<img src="img.png" width="75" height="75">
	<h1>Halaman SPP SMKN 1 Karawang</h1>

	<a href="index.php">Home</a> |
	<a href="tambah.php">Tambah Data SPP</a> |
	<a href="logout.php">Logout</a>

	<br><br>

	<form action="" method="post">
		
		<input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
		<button type="submit" name="cari">Cari !</button>

	</form>
<br>
	<!-- navigator -->
	<?php for($i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<a href="?halaman=<?= $i;?>" style="font-weight: bold; color: red;"><?= $i;?></a>
	<?php else : ?>
		<a href="?halaman=<?= $i;?>"><?= $i;?></a>
	<?php endif; ?>

	<?php endfor; ?>

<div id="container">
	<table border="2" cellpadding="5" cellspacing="1">
		
		<tr>
			<th>NISN</th>
			<th>NIS</th>
			<th>Nama</th>
			<th>ID Kelas</th>
			<th>Alamat</th>
			<th>No. Telp</th>
			<th>ID SPP</th>
			<th>Aksi</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach( $siswa as $row ) : ?>
		<tr>
			<td><?= $row["nisn"]; ?></td>
			<td><?= $row["nis"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["id_kelas"]; ?></td>
			<td><?= $row["alamat"]; ?></td>
			<td><?= $row["no_telp"]; ?></td>
			<td><?= $row["id_spp"]; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["nisn"]; ?>">Ubah</a> |
				<a href="hapus.php?id=<?= $row["nisn"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>


	</table>
	</div>
</center>
</body>
</html>
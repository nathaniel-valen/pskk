<?php
// koneksi ke database
$conn = mysqli_connect("localhost","root","","pskk");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;

	$nisn = htmlspecialchars($data["nisn"]);
	$nis = htmlspecialchars($data["nis"]);
	$nama = htmlspecialchars($data["nama"]);
	$idkls = htmlspecialchars($data["idkls"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$notlp = htmlspecialchars($data["notlp"]);
	$idspp = htmlspecialchars($data["idspp"]);

	$query = "INSERT INTO siswa 
				VALUES
				('$nisn','$nis','$nama','$idkls','$alamat','$notlp','$idspp')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM siswa WHERE nisn = $id");

	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nis = htmlspecialchars($data["nis"]);
	$nama = htmlspecialchars($data["nama"]);
	$idkls = htmlspecialchars($data["idkls"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$notlp = htmlspecialchars($data["notlp"]);
	$idspp = htmlspecialchars($data["idspp"]);

	$query = "UPDATE siswa SET
				nis = '$nis',
				nama = '$nama',
				id_kelas = '$idkls',
				alamat = '$alamat',
				no_telp = '$notlp',
				id_spp = '$idspp'
			WHERE nisn = $id
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function cari($keyword) {
	$query = "SELECT * FROM siswa
				WHERE
			  nama LIKE '%$keyword%' OR
			  nisn LIKE '%$keyword%' OR
			  nis LIKE '%$keyword%' OR
			  id_kelas LIKE '%$keyword%' OR
			  id_spp LIKE '%$keyword%'
				";
			return query($query);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nama_admin = $data["nama_admin"];

	// cek username sudah dipakai atau belum
	$result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('Username sudah dipakai !');
			 </script>";
			 return false;
	}

	// cek konfirmasi

	if( $password !== $password2 ) {
		echo "<script>
				alert('Konfirmasi Password tidak sesuai !');
		</script>";
		return false;
	}

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO admin VALUES('', '$username', '$password', '$nama_admin')");

	return mysqli_affected_rows($conn);

}




?>
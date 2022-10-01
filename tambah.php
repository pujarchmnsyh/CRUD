<?php
	include 'lib/koneksi.php';

	if ($_SERVER['REQUEST_METHOD'] =='POST') {
		$npm 				= @$_POST['npm'];
		$nama_mhs 		= @$_POST['nama_mhs'];
		$jenis_kelamin 		= @$_POST['jenis_kelamin'];
		$jurusan 			= @$_POST['jurusan'];
		$alamat 			= @$_POST['alamat'];

		if (empty($npm)) {
			flash('error', 'Mohon masukan NPM dengan benar');
		} else if (empty($nama_mhs)) {
			flash('error', 'Mohon masukan mana lengkap dengan benar');
		}

		$sql = "INSERT INTO t_mhs (npm, nama_mhs, jenis_kelamin, jurusan, alamat) VALUES 
			('$npm', '$nama_mhs', '$jenis_kelamin', '$jurusan', '$alamat')";

		$conn->query($sql) or die ($conn->error);
		header('location: index.php');
}

$success = flash('success');
$error = flash('error');

	include 'views/v_tambah.php';
?>			
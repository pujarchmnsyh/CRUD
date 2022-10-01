<?php
	include 'lib/koneksi.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$npm = $_POST['npm'];
		$nama_mhs = $_POST['nama_mhs'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$jurusan = $_POST['jurusan'];
		$alamat = $_POST['alamat'];

		$sql = "UPDATE t_mhs SET npm = '$npm',
					nama_mhs = '$nama_mhs',
					jenis_kelamin = '$jenis_kelamin',
					jurusan = '$jurusan',
					alamat = '$alamat' WHERE npm = '$npm' ";

		$conn->query($sql) or die ($conn->error);

		header('location: index.php');
	}

	$npm = $_GET['npm'];

	if (empty($npm)) header('location: index.php');

	$sql = "SELECT * FROM t_mhs WHERE npm = '$npm' ";
	$query = $conn->query($sql);
	$mhs = $query->fetch_array();

	if (empty($mhs)) header('location: index.php');

	include 'views/v_tambah.php';
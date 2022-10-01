<?php
	include 'lib/koneksi.php';

	$npm = $_GET['npm'];
	if (!empty($npm)) {

		$sql = "DELETE FROM t_mhs WHERE npm = '$npm'";

		if($conn->query($sql)) {
			header('location: index.php');
		} else {
			echo 'Data gagal dihapus';
		}
	}

?>
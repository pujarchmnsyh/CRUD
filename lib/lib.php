<?php  
session_start();

function flash($tipe, $pesan = '') {
	if (empty($pesan)) {
		$pesan = @$_SESSION[$tipe];
		unset($_SESSION[$tipe]);
		return $pesan;
	} else {
		$_SESSION[$tipe] = $pesan;
	}
}
?>
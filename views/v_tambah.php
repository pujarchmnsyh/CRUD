
<style type="text/css">
	form{
		margin-top: 100px;
		margin-left: 500px;
		padding: 10px;
	}
	table{
		padding: 10px;
		color: black;
		border: 2px solid cadetblue;
	}
	th{
		padding: 10px;
		font-size: 40px;
		font-family: cool;
		color: white;
	}
	@font-face{
		font-family: cool;
		src: url(assets/vintage.ttf);
	}
	img{
		width: 100px;
		height: 100px;
	}
	.button{
		background: gold;
		color: white;
		border: solid gold;
		font-weight: bold;
		border-radius: 30px;
		width: 100px;
	}
</style>

<?php
	$action = 'tambah.php';
	$kasus = '';
	if (!empty($mhs)) {
	$action = 'edit.php';
	$kasus = 'readonly';
}

?>

<form class="form-horizontal" action="<?php echo $action ?>" method="POST" enctype="multipart/form-data">
	<table cellpadding="5" cellspacing="0">
	<tr bgcolor="cadetblue">
		<td><img src="assets/logo.png"></td>
		<th colspan="2">DATA MAHASISWA</th>
	</tr>
	<?php if (!empty($success)) { ?>
	<div class="alert alert-success">
		<p><?= $success ?></p>
	</div>
<?php } ?>

<?php if (!empty($error)) { ?>
	<div class="alert alert-danger">
		<?= $error ?>
	</div>
<?php } ?>
	<tr>
	<td>NPM</td>
	<td><input type="text" name="npm" value="<?= @$mhs['npm'] ?>" <?= $kasus ?>></td>
	</tr>
	<tr>
	<td>Nama Lengkap</td>
	<td><input type="text" name="nama_mhs" value="<?= @$mhs['nama_mhs'] ?>"></td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td><input type="radio" name="jenis_kelamin" value="Laki-laki" <?= @$mhs['jenis_kelamin'] == 'Laki-laki' ? 'checked' :'' ?>> Laki-laki	
	<input type="radio" name="jenis_kelamin" value="Perempuan" <?= @$mhs['jenis_kelamin'] == 'Perempuan' ? 'checked' :'' ?>> Perempuan<br></td>
</tr>
<tr>
	<td>Jurusan</td>
	<td><input type="text" name="jurusan" value="<?= @$mhs['jurusan'] ?>"><br></td>
</tr>
<tr>
	<td>Alamat</td> 
	<td><input type="text" name="alamat" value="<?= @$mhs['alamat'] ?>"></td>
</tr>
<tr>
	<th bgcolor="cadetblue" colspan="2"><input type="submit" class="button" name="submit" value="Simpan"></th>
</tr>
</table>
</form>

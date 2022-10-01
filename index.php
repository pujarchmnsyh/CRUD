<?php 
 include 'lib/koneksi.php';

 $sql = "SELECT * FROM t_mhs";
 $listmhs = $conn->query($sql) or die ($conn->error);;

 include 'views/v_index.php';
?>
<!DOCTYPE html>
<html>
<title>Data Mahasiswa</title>
<style type="text/css">
  body{
    background: url();
    background-size: cover;
    background-attachment: fixed;
  }
  .header{
    color: white;
    text-align: center;
  }
  table{
    width: 85%;
    text-align: center;
    margin-top: 50px;
    border: 1px solid cadetblue;
    font-size: 15px;
  }
  th{
    font-size: 16px;
    color: firebrick;
  }
  .edit, .hapus, .tambah{
    margin-bottom: 200px;
    text-decoration: none;
    font-family: tahoma;
    color: white;
    background: gold;
    border: solid gold;
    font-weight: bold;
    border-radius: 10px;
  }
  .hapus{
    background: red;
    border: solid red;
  }
  p{
    font-size: 30px;
  }
  img{
    width: 120px;
    height: 120px;
  }
  
</style>
<body>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/toastr/toastr.min.css">
  <center>
  <table border="1" cellpadding="4" cellspacing="0">
    <thead>
      <tr>
        <th class="header" bgcolor="cadetblue" colspan="12">
          <img src="assets/logo.png"><p>DATA MAHASISWA</p><p>STMIK "AMIKBANDUNG"</p></th>
      </tr>
      <tr>
        <form method="GET" action="index.php">
        <th colspan="12">
        <a class="btn btn-success" href="tambah.php"><i class="fa fa-plus"></i> Tambah Data</a>
      </th>
      </form>
      </tr>
      <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th colspan="2">Aksi</th>
      </tr>
    </thead>  

    <tbody>
      <?php
        $i = 1;
        while ($mhs = $listmhs->fetch_array()) {
      ?>

      <tr>
        <td><?= $i++; ?></td>
        <td><?= $mhs['npm']; ?></td>
        <td><?= $mhs['nama_mhs']; ?></td>
        <td><?= $mhs['jenis_kelamin']; ?></td>
        <td><?= $mhs['jurusan']; ?></td>
        <td><?= $mhs['alamat']; ?></td>
        <td>
          <a class="btn btn-info" href="edit.php?npm=<?= $mhs['npm'] ?>"><span style="color: white;" class="fa fa-pencil"></span></a>
        </td>
        <td>
          <a class="btn btn-danger btnDelete" href="delete.php?npm=<?= $mhs['npm'] ?>"><span class="fa fa-trash"></span></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
    <div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>

      <div class="modal-body">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary btnYa">Ya</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
  </table>
</center>

<script type="text/javascript" src="assets/plugins/toastr/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
<script type="text/javascript">
  $(function(){
    $(".btnDelete").on("click", function(e) {
      e.preventDefault();

      var nama = $(this).parent().parent().children()[2];
      nama = $(nama).html();

      var tr = $(this).parent().parent();

      $(".modal").modal('show');
      $(".modal-title").html('Konfirmasi');
      $(".modal-body").html('Anda yakin ingin menghapus data <b>' + nama + '</b> ?');

      var href = $(this).attr('href');

      $(".btnYa").off();
      $(".btnYa").on("click", function() {
        $.ajax({
          'url'     : href,
          'type'    : 'POST',
          'success'   : function(result) {
            if (result == 1) {
              $(".modal").modal('hide');
              tr.fadeOut();

              toastr.success('Data berhasil dihapus', 'Informasi');
            }
          }

        });
      });
    });
  });
</script>
</body>
</html>

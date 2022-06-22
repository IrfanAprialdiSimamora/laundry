<?php
 include("koneksi.php"); // untuk memanggil file koneksi.php
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://kit.fontawesome.com/a01a6d192c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="header">
<a href="logout.php" class="btn btn-primary">Logout</a>
</div>
<input type="checkbox" id="cek">
<label for="cek">
<i class="fas fa-arrow-right" id="btn"></i>
<i class="fas fa-arrow-left" id="close"></i>
</label>
<div class="sidebar">
<header>
</header>
<ul>
<li><a href="dassbord.php"><i class="fas fa-laptop"></i>Beranda</a></li>
<li><a href="pelanggan.php"><i class="fas fa-users"></i>Pelanggan</a></li>
<li><a href="transaksi.php"><i class="fas fa-print"></i>Transaksi</a></li>
<li><a href="laporan.php"><i class="fas fa-chart-line"></i>Laporan</a></li>
<li><a href="harga.php"><i class="fas fa-list-alt"></i>Layanan</a></li>
</ul>
</div>
<section>
<h2><font color="#FF0000" style="alignment-baseline:" ><i><u>Ubah Status Transaksi</u></i></font></h2>
<div class="conten">
<table class="table table-responsive table-striped">
<?php
  //untuk mengambil value dari paramater id=
  $no=$_GET['id_transaksi'];
  //query sql untuk menampilkan data berdasarkan id
  $query="SELECT * FROM tb_transaksi WHERE id_transaksi='".$no."'";
  $result=mysqli_query($koneksi,$query);
  //menampilkan data dari query database berbentuk array an ditampilkan di form
  if (mysqli_num_rows($result) > 0){
	$data = mysqli_fetch_assoc($result);
}

 //syntax php untuk edit data ke database
 if (isset($_POST['edit'])) {
  $query="UPDATE tb_transaksi SET
  tgl_selesai_transaksi='".$_POST['tgl_selesai_transaksi']."',
  status_transaksi='".$_POST['status_transaksi']."',
  status_cucian='".$_POST['status_cucian']."'
  WHERE id_transaksi='$no'";
	$result=mysqli_query($koneksi,$query);
	
  if ($query) {
   echo "data berhasil disimpan";
   
   $query="SELECT * FROM tb_transaksi WHERE id_transaksi='".$no."'";
   $result=mysqli_query($koneksi,$query);
   //menampilkan data dari query database berbentuk array an ditampilkan di form
   echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
  <meta http-equiv='refresh' content='2; url= laporan.php'/> ";
  }else{
   echo "data gagal disimpan".mysql_error();
  }
 }
?>
 <!--form edit -->
 <form method="POST">
  <tr>
   <td>Tanggal Selesai Dibayar :</td>
   <td><input  name="tgl_selesai_transaksi" type="date" size="30" value="<?php echo $data['tgl_selesai_transaksi']; ?>">
  </td>
  </tr>
  <tr>
  <td>Status Pembayaran : </td>
<td>
<select name="status_transaksi" type="text" value="<?php echo $data['status_transaksi']; ?>">
  <option value="Belum">BELUM</option>
  <option value="Selesai">SELESAI</option>
</select></td>
  </tr>
  <tr>
  <td>Status Cucian : </td>
<td>
<select name="status_cucian" type="text" value="<?php echo $data['status_cucian']; ?>">
  <option value="Belum">BELUM</option>
  <option value="Selesai">SELESAI</option>
</select></td>
  </tr>
  <td><input class="btn btn-primary" type="submit" name="edit" Value="Simpan" alignment="right">
<input class="btn btn-warning" type="reset" Value="Bersihkan" >
<a class="btn btn-danger" href = 'dassbord.php'> Kembali </a></td>
 </form>
</table>
</div>
</section>
</body>
</html>
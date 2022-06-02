<?php
 include("koneksi.php"); // untuk memanggil file koneksi.php
?>
<!DOCTYPE html>
<html>
<head>
 <title></title>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
<h2>Laundry</h2>
<a href="index.php" class="tombol">Logout</a>
<h4 >Salama' To Pole</h4>
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
<li><a href="dashboard.php"><i class="fas fa-laptop"></i>Beranda</a></li>
<li><a href="pelanggan.php"><i class="fas fa-users"></i>Pelanggan</a></li>
<li><a href="transaksi.php"><i class="fas fa-print"></i>Transaksi</a></li>
<li><a href="laporan.php"><i class="fas fa-chart-line"></i>Laporan</a></li>
<li><a href="harga.php"><i class="fas fa-list-alt"></i>Layanan</a></li>
</ul>
</div>
<section>
<div class="conten">
<h3>Selamat Datang Di Laundry Ikhlas</h3>
<table>
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
  $query="UPDATE tb_transaksi SET pelanggan_transaksi='".$_POST['pelanggan_transaksi']."',
 tgl_masuk_transaksi='".$_POST['tgl_masuk_transaksi']."',
  harga_transaksi='".$_POST['harga_transaksi']."',
  berat_transaksi='".$_POST['berat_transaksi']."' ,
  tgl_selesai_transaksi='".$_POST['tgl_selesai_transaksi']."',
  status_transaksi='".$_POST['status_transaksi']."'
  WHERE id_pelanggan='$no'";
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
   <td>Nama</td>
   <td><input name="pelanggan_transaksi" size="30" value="<?php echo $data['pelanggan_transaksi']; ?>"></td>
  </tr>
  <tr>
   <td>Tanggal Masuk Transaksi</td>
   <td><input  name="tgl_masuk_transaksi" type="date" size="30" value="<?php echo $data['tgl_masuk_transaksi']; ?>"></td>
  </tr>
  <tr>
  <td>Harga Transaksi</td>
   <td><input  name="harga_transaksi" type="number" size="30" value="<?php echo $data['harga_transaksi']; ?>"></td>
  </tr>
  <tr>
  <td>Berat Cucian</td>
   <td><input  name="berat_transaksi" type="number" size="30" value="<?php echo $data['berat_transaksi']; ?>"></td>
  </tr>
  <tr>
  <tr>
   <td>Tanggal Selesai Dibayar</td>
   <td><input  name="tgl_selesai_transaksi" type="date" size="30" value="<?php echo $data['tgl_selesai_transaksi']; ?>"></td>
  </tr>
  <tr>
  <td>Status :
<select>
  <option name="status_transaksi" value="Selesai">SELESAI</option>
  <option name="status_transaksi" value="Belum">BELUM</option>
</select></td>
  </tr>
   <td colspan="2"><input type="submit" name="edit" value="Edit"></td>
  </tr>
 </form>
</table>
</div>
</section>
</body>
</html>
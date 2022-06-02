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
</div>
<table>
<?php
  //untuk mengambil value dari paramater id=
  $no=$_GET['id_pakaian'];
  //query sql untuk menampilkan data berdasarkan id
  $query="SELECT * FROM tb_pakaian WHERE id_pakaian='".$no."'";
  $result=mysqli_query($koneksi,$query);
  //menampilkan data dari query database berbentuk array an ditampilkan di form
  if (mysqli_num_rows($result) > 0){
	$data = mysqli_fetch_assoc($result);
}

 //syntax php untuk edit data ke database
 if (isset($_POST['edit'])) {
  $query="UPDATE tb_pakaian SET jenis_layanan='".$_POST['jenis_layanan']."', 
  harga_layanan='".$_POST['harga_layanan']."' WHERE id_pakaian='$no'";
	$result=mysqli_query($koneksi,$query);
	
  if ($query) {
   echo "data berhasil disimpan";
   
   $query="SELECT * FROM tb_pakaian WHERE id_pakaian='".$no."'";
   $result=mysqli_query($koneksi,$query);
   //menampilkan data dari query database berbentuk array an ditampilkan di form
   echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
  <meta http-equiv='refresh' content='2; url= harga.php'/> ";
  }else{
   echo "data gagal disimpan".mysql_error();
  }
 }
?>
 <!--form edit -->
 <form method="POST">
  <tr>
   <td>Jenis Layanan</td>
   <td><input name="jenis_layanan" size="30" value="<?php echo $data['jenis_layanan']; ?>"></td>
  </tr>
  <tr>
   <td>Harga Layanan</td>
   <td><input  name="harga_layanan" size="30" value="<?php echo $data['harga_layanan']; ?>"></td>
  </tr>
  <tr>
   <td colspan="2"><input type="submit" name="edit" value="Edit"></td>
  </tr>
 </form>
</table>
    </section>
</body>
</html>
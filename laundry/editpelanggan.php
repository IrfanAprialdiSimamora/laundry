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
    <h2><font color="#FF0000" style="alignment-baseline:" ><i><u>Ubah Data Pelanggan</u></i></font></h2>
    <table class="table table-responsive table-striped">
<?php
  //untuk mengambil value dari paramater id=
  $no=$_GET['id_pelanggan'];
  //query sql untuk menampilkan data berdasarkan id
  $query="SELECT * FROM tb_pelanggan WHERE id_pelanggan='".$no."'";
  $result=mysqli_query($koneksi,$query);
  //menampilkan data dari query database berbentuk array an ditampilkan di form
  if (mysqli_num_rows($result) > 0){
	$data = mysqli_fetch_assoc($result);
}

 //syntax php untuk edit data ke database
 if (isset($_POST['edit'])) {
  $query="UPDATE tb_pelanggan SET nama_pelanggan='".$_POST['nama_pelanggan']."', telp_pelanggan='".$_POST['telp_pelanggan']."',
  alamat_pelanggan='".$_POST['alamat_pelanggan']."' WHERE id_pelanggan='$no'";
	$result=mysqli_query($koneksi,$query);
	
  if ($query) {
   echo "data berhasil disimpan";
   
   $query="SELECT * FROM tb_pelanggan WHERE id_pelanggan='".$no."'";
   $result=mysqli_query($koneksi,$query);
   //menampilkan data dari query database berbentuk array an ditampilkan di form
   echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
  <meta http-equiv='refresh' content='2; url= pelanggan.php'/> ";
  }else{
   echo "data gagal disimpan".mysql_error();
  }
 }
?>
 <!--form edit -->
 <form method="POST">
  <tr>
   <td>Nama</td>
   <td><input name="nama_pelanggan" size="30" value="<?php echo $data['nama_pelanggan']; ?>"></td>
  </tr>
  <tr>
   <td>Nomor Handphone</td>
   <td><input  name="telp_pelanggan" size="30" value="<?php echo $data['telp_pelanggan']; ?>"></td>
  </tr>
  <td>Alamat</td>
   <td><input  name="alamat_pelanggan" size="30" value="<?php echo $data['alamat_pelanggan']; ?>"></td>
  </tr>
  <td><input class="btn btn-primary" type="submit" name="edit" Value="Simpan" alignment="right">
<input class="btn btn-warning" type="reset" Value="Bersihkan" >
<a class="btn btn-danger" href = 'dassbord.php'> Kembali </a></td>
 </form>
</table>
    </section>
</body>
</html>
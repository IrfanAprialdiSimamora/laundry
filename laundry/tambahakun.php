<?php
error_reporting(E_ALL ^ E_NOTICE);
include "koneksi.php";
// file submit.php
// menangkap data yang dikirimkan dari file tambah.php mwnggunakan method = POST
$nama = $_POST['nama_pelanggan'];
$telepon = $_POST['telp_pelanggan'];
$alamat = $_POST['alamat_pelanggan'];
$pass = $_POST['password'];

// perintah SQL
$query="INSERT INTO tb_pelanggan VALUES ('','$nama' ,'$telepon','$alamat','$pass') " ;
$hasil=mysqli_query($koneksi,$query);
if ($hasil){
//header ('location:pelanggan.php');
echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
<meta http-equiv='refresh' content='2; url= user.php'/> ";
} else { echo "Data gagal disimpan
<meta http-equiv='refresh' content='2; url= tambahpelanggan.php'/> ";
}
?>
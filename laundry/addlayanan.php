<?php
error_reporting(E_ALL ^ E_NOTICE);
include "koneksi.php";
// file submit.php
// menangkap data yang dikirimkan dari file tambah.php mwnggunakan method = POST
$jenis = $_POST['jenis_layanan'];
$harga = $_POST['harga_layanan'];
// perintah SQL
$query="INSERT INTO tb_pakaian VALUES ('','$jenis','$harga') " ;
$hasil=mysqli_query($koneksi,$query);
if ($hasil){
//header ('location:pelanggan.php');
echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
<meta http-equiv='refresh' content='2; url= harga.php'/> ";
} else { echo "Data gagal disimpan
<meta http-equiv='refresh' content='2; url= tambahlayanan.php'/> ";
}
?>
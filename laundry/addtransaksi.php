<?php
error_reporting(E_ALL ^ E_NOTICE);
include "koneksi.php";
// file submit.php
// menangkap data yang dikirimkan dari file tambah.php mwnggunakan method = POST
$jenis = $_POST['jenis_layanan'];
$nama = $_POST['nama_pelanggan'];
$masuk = $_POST['tgl_masuk_transaksi'];
$berat = $_POST['berat_transaksi'];
$lunas = $_POST['tgl_selesai_transaksi'];
$transaksi = $_POST['status_transaksi'];
$cucian = $_POST['status_cucian'];
// perintah SQL
$query="INSERT INTO tb_transaksi VALUES 
('','$jenis','$nama','$masuk','$berat','$lunas','$transaksi','$cucian') " ;
$hasil=mysqli_query($koneksi,$query);
if ($hasil){

    
//header ('location:pelanggan.php');
echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
<meta http-equiv='refresh' content='2; url= laporan.php'/> ";
} else { echo "Data gagal disimpan
<meta http-equiv='refresh' content='2; url= transaksi.php'/> ";
}
?>
<?php
 include("koneksi.php"); // untuk memanggil file koneksi.php
$no=$_GET['id_pelanggan'];
//query untuk delete data
$query="DELETE FROM tb_pelanggan WHERE id_pelanggan='".$no."'";
$hasil=mysqli_query($koneksi,$query);
//setelah data dihapus redirect ke halaman index.php
header("Location:pelanggan.php");
?>
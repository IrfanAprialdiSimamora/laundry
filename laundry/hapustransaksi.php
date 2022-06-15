<?php
 include("koneksi.php"); // untuk memanggil file koneksi.php
$no=$_GET['id_transaksi'];
//query untuk delete data
$query="DELETE FROM tb_transaksi WHERE id_transaksi='".$no."'";
$hasil=mysqli_query($koneksi,$query);
//setelah data dihapus redirect ke halaman index.php
header("Location:laporan.php");
?>
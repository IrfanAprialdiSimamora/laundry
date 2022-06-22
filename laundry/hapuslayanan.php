<?php
 include("koneksi.php"); // untuk memanggil file koneksi.php
$no=$_GET['id_pakaian'];
//query untuk delete data
$query="DELETE FROM tb_pakaian WHERE id_pakaian='".$no."'";
$hasil=mysqli_query($koneksi,$query);
//setelah data dihapus redirect ke halaman index.php
header("Location:harga.php");
?>
<?php
   include('koneksi.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($koneksi,"select nama_pelanggan from tb_pelanggan where nama_pelanggan = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['nama_pelanggan'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:user.php");
      die();
   }
?>
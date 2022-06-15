<?php
 include("koneksi.php"); // untuk memanggil file koneksi.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laundry</title>
<script src="https://kit.fontawesome.com/a01a6d192c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
</head>
<body style = 'margin : 20px; font : 16px arial;' backgroundcolor="aqua">
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
<form method = 'POST' action = 'addtransaksi.php'>
<h2 align="center">
<font color="#FF0000" style="alignment-baseline:" ><i><u>Transaksi Baru </u></i></font></h2>
<table border="0">
<tr><td>Jenis Layanan</td>
<td>
	<select name="jenis_layanan">
	<?php
	$query="SELECT*FROM tb_pakaian";
	$result=mysqli_query($koneksi,$query);
	while($data=mysqli_fetch_assoc($result)){
		echo'<option value="'.$data['id_pakaian'].'">'.$data['jenis_layanan'].'</option>';
	}
	?>
	</select>
</td></tr>
<tr><td>Nama Pelanggan</td>
<td>
	<select name="nama_pelanggan">
	<?php
	$query="SELECT*FROM tb_pelanggan";
	$result=mysqli_query($koneksi,$query);
	while($data=mysqli_fetch_assoc($result)){
		echo'<option value="'.$data['id_pelanggan'].'">'.$data['nama_pelanggan'].'</option>';
	}
	?>
	</select>
</td></tr>
<tr><td>Tanggal Masuk Transaksi</td> <td><input type="date" name="tgl_masuk_transaksi" size="10"><tr><td></td>
<tr><td>Berat Cucian</td> <td><input type="number" name="berat_transaksi" size="10"><tr><td></td>
<tr><td>Tanggal Selesai Dibayar</td> <td><input type="date" name="tgl_selesai_transaksi" size="10"><tr><td></td>
  <tr>
  <td>Status Pembayaran :</td>
  <td>
<select name="status_transaksi" type="text">
  <option value="Selesai">SELESAI</option>
  <option value="Belum">BELUM</option>
</select></td>
  </tr>
  <tr>
  <td>Status Cucian :</td>
  <td>
<select name="status_cucian" type="text">
  <option value="Selesai">SELESAI</option>
  <option value="Belum">BELUM</option>
</select></td>
  </tr>
<td><input type="submit" Value="Submit" align="right"><input type="reset" Value="Clear" ></td></tr>
</table>
			<a href = 'dassbord.php'> Kembali </a>
			</form>
</div>
 
</section>
</body>
</html>
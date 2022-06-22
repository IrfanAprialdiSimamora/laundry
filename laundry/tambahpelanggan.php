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
<div class="conten">
	<form method = 'POST' action = 'addpelanggan.php'>
<h2>
   <font color="#FF0000" style="alignment-baseline:" ><i><u>Input Data Pelanggan Baru </u></i></font></h2>
<table class="table table-responsive table-striped">
<tr><td>Nama</td> <td><input type="text" name="nama_pelanggan" size="30" /></td></tr>
<tr><td> Nomor Telepon</td> <td><input type="text" name="telp_pelanggan" size="10">
<tr><td>Alamat </td> <td><textarea name="alamat_pelanggan" row="5" cols="31"></textarea></td></tr>
<td><input class="btn btn-primary" type="submit" Value="Simpan" alignment="right">
<input class="btn btn-warning" type="reset" Value="Bersihkan" >
<a class="btn btn-danger" href = 'dassbord.php'> Kembali </a></td>
</table>
			</form>
</div>
 
</section>
</body>
</html>
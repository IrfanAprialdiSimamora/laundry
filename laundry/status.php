<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laundry</title>
<script src="https://kit.fontawesome.com/a01a6d192c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
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
<li><a href="status.php"><i class="fas fa-users"></i>Status Cucian</a></li>
<li><a href="ubahprofil.php"><i class="fas fa-print"></i>Ubah Profil</a></li>
</ul>
</div>
<section>
<div class="conten">
<h3>Selamat Datang Di Laundry Ikhlas</h3>
	<br/> 
	<h3>Pembukuan </h3>
	<table border="1" class="table">
		<tr>
			<th>No</th>
			<th>Nama Pelanggan </th>
			<th>Jenis Pakaian </th>
			<th>Harga Layanan </th>
			<th>Berat Cucian</th>
			<th>Harga Total</th>
			<th>Tanggal Transaksi</th>
			<th>Status Cucian</th>
            <th>Tanggal Pengambilan</th>
			<th>Status Transaksi</th>			
		</tr>

		<?php 
		include "koneksi.php";
        include('sesi.php');
		$query= "SELECT * FROM tb_pakaian,tb_pelanggan,tb_transaksi 
		WHERE tb_pakaian.id_pakaian=tb_transaksi.id_pakaian AND tb_pelanggan.id_pelanggan=tb_transaksi.id_pelanggan 
        AND nama_pelanggan='$login_session'";
		$result=mysqli_query($koneksi,$query);
		if(mysqli_num_rows($result)>0){
		$no = 1;
		while($data = mysqli_fetch_assoc($result)){
		?>
      <tr>
          <!--untuk menampilkannya berdasarkan field yang ada pada tabel data karyawan-->
          <td><?php echo $no; ?></td>
          <td><?php echo $data['nama_pelanggan']; ?></td>
		  <td><?php echo $data['jenis_layanan']; ?></td>
		  <td><?php echo $data['harga_layanan']; ?></td>
		  <td><?php echo $data['berat_transaksi']; ?></td>
		  <td><?php echo $data['harga_layanan']*$data['berat_transaksi']; ?></td>
          <td><?php echo $data['tgl_masuk_transaksi']; ?></td>
          <td><?php echo $data['status_cucian']; ?></td>
          <td><?php echo $data['tgl_selesai_transaksi']; ?></td>
          <td><?php echo $data['status_transaksi']; ?></td>
      </tr>
		<?php 
		$no++;
		} 
		}?>
	</table>
</div>
</section>
</body>
</html>
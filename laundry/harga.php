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
	<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
<section>
<div class="conten">
<h3>Layanan dan Harga</h3>
	<br/>
	<a class="btn btn-success" href="tambahlayanan.php">+ Tambahkan Layanan</a><br></br>
	<table class="table table-striped table-responsive table-bordered">
		<tr>
			<th>No</th>
			<th>Jenis Layanan</th>
			<th>Harga</th>
			<th>Aksi</th>			
			
		</tr>

		<?php 
		include "koneksi.php";
		$query= "SELECT * FROM tb_pakaian";
		$result=mysqli_query($koneksi,$query);
		if(mysqli_num_rows($result)>0){
		$no = 1;
		while($data = mysqli_fetch_assoc($result)){
		?>
      <tr>
          <!--untuk menampilkannya berdasarkan field yang ada pada tabel data karyawan-->
          <td><?php echo $no; ?></td>
          <td><?php echo $data['jenis_layanan']; ?></td>
          <td><?php echo $data['harga_layanan']; ?></td>
          <td>
		  <a class="btn btn-warning" href="editlayanan.php?id_pakaian=<?php echo $data['id_pakaian']; ?>">Ubah</a>
		  <a class="btn btn-danger" href="hapuslayanan.php?id_pakaian=<?php echo $data['id_pakaian']; ?>">Hapus</a>

		  </td>
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
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
<li><a href="pelanggan.php"><i class="fas fa-users"></i>Pelanggan</a></li>
<li><a href="transaksi.php"><i class="fas fa-print"></i>Transaksi</a></li>
<li><a href="laporan.php"><i class="fas fa-chart-line"></i>Laporan</a></li>
<li><a href="harga.php"><i class="fas fa-list-alt"></i>Layanan</a></li>
</ul>
</div>
<section>
 
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

	<br/>
	<a class="tombol" href="tambahpelanggan.php">+ Tambahkan Data Baru</a>
 
	<h3>Pembukuan </h3>
	<table border="1" class="table">
		<tr>
			<th>No</th>
			<th>Nama </th>
			<th>Nomor</th>
			<th>Alamat</th>
			<th>Aksi</th>			
			
		</tr>

		<?php 
		include "koneksi.php";
		$query= "SELECT * FROM tb_pelanggan";
		$result=mysqli_query($koneksi,$query);
		if(mysqli_num_rows($result)>0){
		$no = 1;
		while($data = mysqli_fetch_assoc($result)){
		?>
      <tr>
          <!--untuk menampilkannya berdasarkan field yang ada pada tabel data karyawan-->
          <td><?php echo $no; ?></td>
          <td><?php echo $data['nama_pelanggan']; ?></td>
          <td><?php echo $data['telp_pelanggan']; ?></td>
          <td><?php echo $data['alamat_pelanggan']; ?></td>
          <td>
		  <a href="hapuspelanggan.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>">Hapus</a>
		  <a href="editpelanggan.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>">Edit</a>
		  </td>
      </tr>
		<?php 
		$no++;
		} 
		}?>
	</table>
</section>
</body>
</html>
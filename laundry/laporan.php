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
	<br/>
	<h3>Laporan Transaksi Yang Masuk</h3>
	<form action="laporan.php" method="get">
		<label>Cari :</label><br>
		<input type="text" name="cari">
		<input type="submit" class="btn btn-success" value="Cari">
    </form>
	<br>
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
	<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
	<table class="table table-bordered table-responsive table-striped">
		<tr>
			<th>No</th>
			<th>Nama Pelanggan </th>
			<th>Alamat </th>
			<th>Jenis Pakaian </th>
			<th>Harga Layanan </th>
			<th>Berat Cucian</th>
			<th>Harga Total</th>
			<th>Tanggal Transaksi</th>
			<th>Status Cucian</th>
            <th>Tanggal Pengambilan</th>
			<th>Status Transaksi</th>
			<th>Aksi</th>			
			
		</tr>

		<?php
		include "koneksi.php";
		if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$query= "SELECT * FROM tb_pakaian,tb_pelanggan,tb_transaksi 
		WHERE nama_pelanggan like '%".$cari."%' AND tb_pakaian.id_pakaian=tb_transaksi.id_pakaian AND tb_pelanggan.id_pelanggan=tb_transaksi.id_pelanggan";
		$result=mysqli_query($koneksi,$query);
		if(mysqli_num_rows($result)>0){
		$no = 1;
		while($data = mysqli_fetch_assoc($result)){
		?>
      <tr>
          <!--untuk menampilkannya berdasarkan field yang ada pada tabel data karyawan-->
          <td><?php echo $no; ?></td>
          <td><?php echo $data['nama_pelanggan']; ?></td>
		  <td><?php echo $data['alamat_pelanggan']; ?></td>
		  <td><?php echo $data['jenis_layanan']; ?></td>
		  <td><?php echo $data['harga_layanan']; ?></td>
		  <td><?php echo $data['berat_transaksi']; ?></td>
		  <td><?php echo $data['harga_layanan']*$data['berat_transaksi']; ?></td>
          <td><?php echo $data['tgl_masuk_transaksi']; ?></td>
          <td><?php echo $data['status_cucian']; ?></td>
          <td><?php echo $data['tgl_selesai_transaksi']; ?></td>
          <td><?php echo $data['status_transaksi']; ?></td>
          <td>
		  <a class="btn btn-warning" href="edittransaksi.php?id_transaksi=<?php echo $data['id_transaksi']; ?>">Ubah</a>
		  <a class="btn btn-danger" href="hapustransaksi.php?id_transaksi=<?php echo $data['id_transaksi']; ?>">Hapus</a>
		  <a class="btn btn-success" href="cetak.php?id_transaksi=<?php echo $data['id_transaksi']; ?>">Cetak</a>
		  </td>
      </tr>
		<?php 
		$no++;
		} 
		}
	}
	else{
		$query= "SELECT * FROM tb_pakaian,tb_pelanggan,tb_transaksi 
		WHERE tb_pakaian.id_pakaian=tb_transaksi.id_pakaian AND tb_pelanggan.id_pelanggan=tb_transaksi.id_pelanggan";
		$result=mysqli_query($koneksi,$query);
		if(mysqli_num_rows($result)>0){
		$no = 1;
		while($data = mysqli_fetch_assoc($result)){
		?>
      <tr>
          <!--untuk menampilkannya berdasarkan field yang ada pada tabel data karyawan-->
          <td><?php echo $no; ?></td>
          <td><?php echo $data['nama_pelanggan']; ?></td>
		  <td><?php echo $data['alamat_pelanggan']; ?></td>
		  <td><?php echo $data['jenis_layanan']; ?></td>
		  <td><?php echo $data['harga_layanan']; ?></td>
		  <td><?php echo $data['berat_transaksi']; ?></td>
		  <td><?php echo $data['harga_layanan']*$data['berat_transaksi']; ?></td>
          <td><?php echo $data['tgl_masuk_transaksi']; ?></td>
          <td><?php echo $data['status_cucian']; ?></td>
          <td><?php echo $data['tgl_selesai_transaksi']; ?></td>
          <td><?php echo $data['status_transaksi']; ?></td>

          <td>
		  <a class="btn btn-warning" href="edittransaksi.php?id_transaksi=<?php echo $data['id_transaksi']; ?>">Ubah</a>
		  <a class="btn btn-danger" href="hapustransaksi.php?id_transaksi=<?php echo $data['id_transaksi']; ?>">Hapus</a>
		  <a class="btn btn-success" href="cetak.php?id_transaksi=<?php echo $data['id_transaksi']; ?>">Cetak</a>
		  </td>
      </tr>
		<?php 
		$no++;
		} 
		}
	}?>
	</table>
</div>
</section>
</body>
</html>
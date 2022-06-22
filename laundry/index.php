<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laundry</title>
<script src="https://kit.fontawesome.com/a01a6d192c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="header">
<h2>Laundry Ikhlas</h2>
<a href="login.php" class="btn btn-primary">Login</a>
</div>
<input type="checkbox" id="cek">
<label for="cek">
<i class="fas fa-arrow-right" id="btn"></i>
<i class="fas fa-arrow-left" id="close"></i>
</label>
<div class="sidebar">
<ul>
<li><a href="status.php"><i class="fas fa-users"></i>Status Cucian</a></li>
</ul>
</div>
<section>
<div class="conten">
	<br/>
	<h3>Daftar dan Status Cucian</h3>
	<form action="index.php" method="get">
		<label>Cari :</label><br>
		<input type="text" name="cari">
		<input type="submit" class="btn btn-success" value="Cari">
    </form>
	<br>
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
			<th>Alamat</th>
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
		if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$query= "SELECT * FROM tb_pakaian,tb_pelanggan,tb_transaksi 
		WHERE nama_pelanggan like '%".$cari."%' AND tb_pakaian.id_pakaian=tb_transaksi.id_pakaian AND tb_pelanggan.id_pelanggan=tb_transaksi.id_pelanggan ";
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
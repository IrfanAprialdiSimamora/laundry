<?php
 include("koneksi.php"); // untuk memanggil file koneksi.php
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laundry</title>
<script src="https://kit.fontawesome.com/a01a6d192c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="header">
<h2>Laundry</h2>
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
<li><a href="dassbord.php"><i class="fas fa-laptop"></i>Beranda</a></li>
<li><a href="pelanggan.php"><i class="fas fa-users"></i>Pelanggan</a></li>
<li><a href="transaksi.php"><i class="fas fa-print"></i>Transaksi</a></li>
<li><a href="laporan.php"><i class="fas fa-chart-line"></i>Laporan</a></li>
<li><a href="harga.php"><i class="fas fa-list-alt"></i>Harga</a></li>
</ul>
</div>
<section>
<div class="conten">
<h3>Terimaksih Telah Menggunakan Jasa Laundry Kami</h3>
</div>
        <h2>Kuitansi</h2>
        <hr />
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
		</tr>
        <?php
  //untuk mengambil value dari paramater id=
  $no=$_GET['id_transaksi'];
  //query sql untuk menampilkan data berdasarkan id
  $query= "SELECT * FROM tb_pakaian,tb_pelanggan,tb_transaksi 
		WHERE tb_pakaian.id_pakaian=tb_transaksi.id_pakaian 
        AND tb_pelanggan.id_pelanggan=tb_transaksi.id_pelanggan AND id_transaksi='".$no."'";
  $result=mysqli_query($koneksi,$query);
  //menampilkan data dari query database berbentuk array an ditampilkan di form
  if (mysqli_num_rows($result) > 0){
	$data = mysqli_fetch_assoc($result);
}
		?>
        <tr>
          <td><?php echo $data['id_transaksi']; ?></td>
          <td><?php echo $data['nama_pelanggan']; ?></td>
          <td><?php echo $data['alamat_pelanggan']; ?></td>
		  <td><?php echo $data['jenis_layanan']; ?></td>
		  <td><?php echo $data['harga_layanan']; ?></td>
		  <td><?php echo $data['berat_transaksi']; ?></td>
		  <td><?php echo $data['harga_layanan']*$data['berat_transaksi']; ?></td>
          <td><?php echo $data['tgl_masuk_transaksi']; ?></td>
        </tr>
    </table>
    <script>
        window.print();
    </script>
</section>
</body>
</html>
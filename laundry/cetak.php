<?php
 include("koneksi.php"); // untuk memanggil file koneksi.php
?>
<!DOCTYPE html>
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
<li><a href="dashboard.php"><i class="fas fa-users"></i>Pelanggan</a></li>
<li><a href="transaksi.php"><i class="fas fa-print"></i>Transaksi</a></li>
<li><a href="laporan.php"><i class="fas fa-chart-line"></i>Laporan</a></li>
<li><a href="harga.php"><i class="fas fa-list-alt"></i>Harga</a></li>
</ul>
</div>
<section>
<div class="conten">
<h3>Terimaksih Telah Menggunakan Jasa Laundry Kami</h3>
</div>
<center>
        <h2>Kuitansi</h2>
        <hr />
    </center>
    <table border="1" style="width: 100%">
        <tr>
            <th width="1%">No</th>
            <th>Nama Pelanggan</th>
            <th>Tangal Masuk Laundry</th>
            <th>Harga Lundryan</th>
            <th width="5%">Berat Cucian</th>
        </tr>
        <?php
  //untuk mengambil value dari paramater id=
  $no=$_GET['id_transaksi'];
  //query sql untuk menampilkan data berdasarkan id
  $query="SELECT * FROM tb_transaksi WHERE id_transaksi='".$no."'";
  $result=mysqli_query($koneksi,$query);
  //menampilkan data dari query database berbentuk array an ditampilkan di form
  if (mysqli_num_rows($result) > 0){
	$data = mysqli_fetch_assoc($result);
}
		?>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['pelanggan_transaksi']; ?></td>
            <td><?php echo $data['tgl_masuk_transaksi']; ?></td>
            <td><?php echo $data['harga_transaksi']; ?></td>
            <td><?php echo $data['berat_transaksi']; ?></td>
        </tr>
    </table>
    <script>
        window.print();
    </script>
</section>
</body>
</html>
 <link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js">
<script src="assets/jquery.min.js"></script>
<script src="assets/instascan.min.js"></script>
<body>
    <h1>Data Trolling</h1>
    <?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
    
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
	<a class="tombol" href="qrcode1.php">+ Tambah Data Baru</a>

	<div class="container">
	    <h2>Data Trolling</h2>
	    <form method="get">
			<h2>PILIH TANGGAL</h2>
			<input type="date" name="tanggal_mulai">
			<label>Sampai Dengan</label>
			<input type="date" name="tanggal_akhir">
			<input type="submit" class="btn btn-primary" value="Cari">
	    </form>
    <div id="printarea">
    <center>
        <h1> Data Laporan Trolling</h1>
        <h2> Rumah Tahanan Negara Kelas IIB Purbalingga
        <div class="table-responsive-sm">
        <table class="table table-bordered border-dark">
        <tr>
			<th>No</th>
			<th>Blok</th>
			<th>Tanggal</th>
			<th>Jam</th>
			<th>Rupam</th>
            <th>Temuan</th>
			<th>Tindak<br>Lanjut</th>
			<th>Foto<br>Temuan</th>
			<th>Aksi</th>
		</tr>
		<br>
    <?php 
		include "koneksi.php";
			if(isset($_GET['tanggal_mulai']) AND isset($_GET['tanggal_akhir'])){
				$tgl_awal = $_GET['tanggal_mulai'];
				$tgl_akhir = $_GET['tanggal_akhir'];
				$query_mysql = mysqli_query($host,"SELECT * FROM trolling where tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'");
			} else {
				$query_mysql = mysqli_query($host,"SELECT * FROM trolling")or die(mysql_error());
			}
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['blok']; ?></td>
			<td><?php echo $data['tanggal']; ?></td>
			<td><?php echo $data['jam']; ?></td>
            <td><?php echo $data['rupam']; ?></td>
			<td><?php echo $data['temuan']; ?></td>
			<td><?php echo $data['ket']; ?></td>
			<td><img src="gambar/<?php echo $data['foto'] ?>" width="35" height="40"></td>
			<td><a class="btn btn-warning hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>					
			</td>
		</tr>
		<?php } 
		?>
    </table> 
        </div>
        
    </center>
    </div>
    
    <a class="btn btn-primary" role="button" onclick="printDiv('printarea')">Cetak</a>
    <a class="btn btn-danger" href="logout.php">LOGOUT</a>
	</div>
    
    <script>
       function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
		}
    </script>
	

</body>
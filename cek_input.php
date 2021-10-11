<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js">
<script src="assets/jquery.min.js"></script>
</head>
<body>
<div class="position-absolute">
    <h1>Data Trolling</h1>

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
<a class="btn btn-primary" href="qrcode1.php">+ Tambah Data Baru</a>
</div>
</body>
</html>
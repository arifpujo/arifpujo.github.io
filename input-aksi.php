<?php 
include 'koneksi.php';
$blok = $_POST['blok'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$rupam = $_POST['rupam'];
$temuan = $_POST['temuan'];
$ket = $_POST['ket'];

    $rand = rand();
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

	if($ukuran < 5044070){		
		$foto = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
        mysqli_query($host,"INSERT INTO trolling VALUES('','$blok','$tanggal','$jam','$rupam','$temuan','$ket','$foto')");
        header("location:cek_input.php?pesan=input");
    }

?>
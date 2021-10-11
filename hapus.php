<?php 
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($host, "DELETE FROM trolling WHERE id='$id'")or die(mysql_error());

header("location:super_admin.php");
?>
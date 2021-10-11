<!DOCTYPE html>
<html>
<tittle>
Si Mba Kolling Rangga
</tittle>
<head>
    <link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Trolling Barcode</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
	<h1 class="mt-3">Login Trolling Barcode <br/> Rumah Tahanan Negara IIB Purbalingga</h1>

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="card kotak_login text-center">
		<h4 class="card-header bg-transparent font-weight-bold">Silahkan login</h4>
 
		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username" required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password" required="required">
 
			<input type="submit" class="btn btn-primary" value="LOGIN">
 
			<br/>
			<br/>
		</form>
		
	</div>
 
 
</body>
</html>
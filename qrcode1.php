<?php
date_default_timezone_set("Asia/Jakarta");
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js">
<script src="assets/jquery.min.js"></script>
<script src="assets/instascan.min.js"></script>
<body>
    <?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
    <div class="countainer">
    <div class="row justify-content-center mt-2">
    <div class="col-md-5">
    <div class="card-header bg-transparent mb-0"><h5 class="text-center"><span class="font-weight-bold text-primary">SCAN TROLLING BARCODE</span></h5></div>    
    <div class="card-body">
    
    <video id="preview" width="98%"></video>
    <br>
    <br>
        <div class="btn-group btn-group-toggle gap-2 mb-5" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="radio" name="options" value="1" autocomplete="off" checked> Kamera Depan
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" value="2" autocomplete="off"> Kamera Belakang
        </label>
        </div>
         
	<div>
    <h3>Input Data Trolling</h3>
	<form action="input-aksi.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" id="qrcode" name="blok" readonly class="form-control">
		</div>
		<br>		
		<table class="table">	
			<tr>
				<td>Tanggal</td>
				<td><input class="form-control" type="text" name="tanggal" readonly value="<?php echo date('Y-m-d'); ?>"></td>					
			</tr>	
			<tr>
				<td>Jam</td>
				<td><input class="form-control" type="text" name="jam" readonly value="<?php echo date('H:i:s'); ?>"></td>			
            </tr>
			<tr>
				<td>Jadwal Rupam</td>
				<td>
					<select type="text" name="rupam" class="form-select" aria-label="Default select example">
						<option value="Rupam Pagi">Rupam Pagi</option>
						<option value="Rupam Siang">Rupam Siang</option>
						<option value="Rupam Malam">Rupam Malam</option>
					</select>
				</td>					
			</tr>
			<tr>
				<td>Temuan</td>
				<td><input class="form-control" type="text" name="temuan" required></td>					
            </tr>
			<tr>
				<td>Tindak Lanjut</td>
				<td><input class="form-control" type="text" name="ket" required></td>					
            </tr>
            <tr>
				<td>Foto Temuan</td>
				<td><input class="form-control" type="file" name="foto"></td>				
            </tr>
			<tr>
				<td></td>
				<td><input class="btn btn-primary" type="submit" value="Simpan"></td>					
            </tr>				
		</table>
	</form>
        <a class="btn btn-danger" href="logout.php">LOGOUT</a>
    </div>
    </div>
    </div>    
    </div>    
    </div>
	

</body>

<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        $("#qrcode").val(content);
        scanner.stop();
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });

</script>

<!-- // let scanner = new Instascan.Scanner({
//   video: document.getElementById("preview")
// });

// let resultado = document.getElementById("qrcode");
// scanner.addListener("scan", function(content) {
//     $("#qrcode").val(content);
//     scanner.stop();
// });
// Instascan.Camera.getCameras()
//   .then(function(cameras) {
//     if (cameras.length > 0) {
//       scanner.start(cameras[0]);
//     } else {
//       resultado.innerText = "No cameras found.";
//     }
//   })
//   .catch(function(e) {
//     resultado.innerText = e;
//   });

// let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
// scanner.addListener('scan', function(content){
//     //alert(content);
//     $("#qrcode").val(content);
// });

// Instascan.Camera.getCameras().then(function (cameras){
//     if(cameras.length > 0){
//         scanner.start(cameras[0]);
//     }else{
//         console.error('No cameras found');
//     }
// }).catch(function(e){
//     console.error(e);

// }); -->
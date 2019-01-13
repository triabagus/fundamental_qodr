<?php
include"koneksi/koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>T-QODR | Arsip Tugas</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="content-login">
		<div class="sub-content-login">
		<?php
			if(isset($_SESSION["msg"])){  // Check if $msg is not empty
      			echo '<div class="stsmsg">'.$_SESSION["msg"].'</div>'; 
      			session_destroy();// Display our message and wrap it with a div with the class "statusmsg".
    		} 
		?>
			<div class="sub-data">	
		<form action="proses-daftar.php" method="post" enctype="multipart/form-data">
			<input type="email" name="email" placeholder="Email" required="required">
			<input type="text" name="username" placeholder="Username" required="required">
			<input type="password" name="password" placeholder="Password" required="required">
			<input type="password" name="repassword" placeholder="Ulangi Password" required="required">
			<img src="captha.php" alt="gambar" /> 
			<input type="text" name="captha" placeholder="Ketikkan Captha Dengan Benar" required="required">
			<input class="btn-submit green" type="submit" name="submit" value="Daftar">
			<a class="registrasi" href="index.php">Kembali</a>
		</form>
			</div>			
		</div>
		<div class="sub-content-login green-gradient">
			<div class="sub-data">
			<div id="arsip-content-login">
				<img class="img-radius" src="img/walpaper/qodr.jpg" width="100px" height="100px"><br><br><br><br><br><br><br><br><br><br>
				<p>
					Dokumentasi Arsip Tugas : Berisikan dokumentasi , tutorial , latihan , dll selama saya belajar di QODR.
				</p>
				<span>&copy Tria bagus nur taufik</span>
			</div>
			</div>
		</div>
	</div>
</body>
</html>
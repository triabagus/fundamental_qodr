<?php
session_start();
if (empty($_SESSION['id_pengguna'])) {
	header('location:../index.php');
}else{
include"../koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../css/font-awesome.php" rel="stylesheet" type="text/css">
	<style type="text/css">
		body{
			background-image: linear-gradient(to top left,#1c9e8c,#09584d);
			height: 100%;
			width: 100%;
			overflow-x: hidden;
		}
		h1{
			font-size: 400px;
			margin: 0px;
		}
		.back {
			text-decoration: none;
			font-size: 20px;
			color: #fff;
		}
	</style>
</head>
<body>
	<center>
		<h1>404</h1> 
		<p><a class="back" href="index.php">Kembali ke Halaman Utama</a></p>
	</center>
</body>
</html>

<?php } ?>
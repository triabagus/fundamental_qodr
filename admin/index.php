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
	<link href="..\css\style-admin.css" rel="stylesheet" type="text/css">
	<link href="..\css\font-awesome.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include"menu.php";?>
<?php include"content.php";?>
</body>

<!---
<script>
function myFunction() {
var x = document.getElementById("menu-bar-left");
var y = document.getElementById("main");
var z = document.getElementById("content-main");
  if (x.style.width == "20%") {
    x.style.width = "0";
    y.style.width = "100%";
    y.style.marginLeft = "0";
    z.style.width = "100%";
    z.style.marginLeft = "0";
  } else {
  	x.style.width = "20%";
  	y.style.width = "80%";
    y.style.marginLeft = "20%";
    z.style.width = "80%";
    z.style.marginLeft = "20%"; 	
  }
 }
</script>
-->
</html>
<?php }?>
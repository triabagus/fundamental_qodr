<?php
session_start();
if (empty($_SESSION['id_pengguna'])) {
	header('location:../index.php');
}else{
include"../koneksi/koneksi.php";

if (isset($_POST['namamenu'])) {
	if(preg_match("/'`|onion|%27|order|-- -/",$_POST['namamenu'])){
		header('location:404.php');
	}elseif(preg_match("/'`|onion|%27|order|-- -/",$_POST['url'])){
		header('location:404.php');
	}elseif(preg_match("/'`|onion|%27|order|-- -/",$_POST['fileurl'])){
		header('location:404.php');
	}else{
		
		$namamenu=$_POST['namamenu'];
		$url=$_POST['url'];
		$fileurl=$_POST['fileurl'];

		$sql=mysql_query("INSERT INTO menu_bar(nama_menu,url,fileurl)VALUES('$namamenu','$url','$fileurl')") or die (mysql_error());
			echo"<script>alert('Menu Bar berhasil di tambahkan!');window.location='index.php?page=pengaturan'</script>";
	}
}
}
?>
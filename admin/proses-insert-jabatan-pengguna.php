<?php
session_start();
if (empty($_SESSION['id_pengguna'])) {
	header('location:../index.php');
}else{
include"../koneksi/koneksi.php";
if (isset($_POST['idadmin'])) {
	if(preg_match("/'`|onion|%27|order|-- -/",$_POST['idadmin'])){
		header('location:404.php');
	}else{
		$admin=$_POST['idadmin'];
		$jabatan=$_POST['jabatan'];
		$sql=mysql_query("UPDATE grups_pengguna_jabatan SET id_jabatan='$jabatan' WHERE id_pengguna='$admin'") or die (mysql_error());
			echo"<script>alert('Jabatan Pengguna berhasil di ubah!');window.location='index.php?page=pengaturan'</script>";
	}
}
}
?>
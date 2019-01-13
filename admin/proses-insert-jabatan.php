<?php
session_start();
if (empty($_SESSION['id_pengguna'])) {
	header('location:../index.php');
}else{
include"../koneksi/koneksi.php";
if (isset($_POST['namajabatan'])) {
	if(preg_match("/'`|onion|%27|order|-- -/",$_POST['namajabatan'])){
		header('location:404.php');
	}else{
		$jabatan=$_POST['namajabatan'];
		$sql=mysql_query("INSERT INTO jabatan(nama_jabatan)VALUES('$jabatan')") or die (mysql_error());
			echo"<script>alert('Jabatan berhasil di tambahkan!');window.location='index.php?page=pengaturan'</script>";
	}
}
}
?>
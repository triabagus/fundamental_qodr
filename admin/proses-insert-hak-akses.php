<?php
session_start();
if (empty($_SESSION['id_pengguna'])) {
	header('location:../index.php');
}else{
include"../koneksi/koneksi.php";

		$jabatan=$_POST['jabatan'];
		$menu=$_POST['menu'];

	if(!empty($menu)) {
		$sqli=mysql_query("DELETE FROM roles_jabatan_menu WHERE id_jabatan='$jabatan'") or die (mysql_error());
    	foreach($menu as $check) {
			$sql=mysql_query("INSERT INTO roles_jabatan_menu(id_menu,id_jabatan)VALUES('$check','$jabatan')") or die (mysql_error());
		}
	}

	echo"<script>alert('Hak Akses berhasil di tambahkan!');window.location='index.php?page=pengaturan'</script>";
}
?>
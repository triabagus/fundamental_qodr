<?php
include"koneksi/koneksi.php";
session_start();

if(isset($_POST['username']) AND isset($_POST['password'])){
	if(preg_match("/'`|onion|%27|order|-- -/",$_POST['username'])){
		header('location:404.php');
	}elseif(preg_match("/'`|onion|%27|order|-- -/",$_POST['password'])){
		header('location:404.php');
	}else{
		$username=mysql_real_escape_string($_POST['username']);
		$password=md5($_POST['password']);
		
		$query_login=mysql_query("select * from pengguna where username='$username' and password='$password'");
		$mysql_fetch_query_login=mysql_fetch_array($query_login);
		$full_name=$mysql_fetch_query_login['nama_lengkap'];
		
		if($full_name == ''){
			$_SESSION['id_pengguna'] = $mysql_fetch_query_login['id_pengguna'];
			header('location:admin/formulir.php');
		}else if (mysql_num_rows($query_login)==0) {
    		$msg = 'Email anda tidak valid , coba ulangi lagi !';
			$_SESSION["msg"]=$msg;
			header('location:index.php');
		}elseif (mysql_num_rows($query_login)==1){			
			$_SESSION['id_pengguna'] = $mysql_fetch_query_login['id_pengguna'];
			header('location:admin/index.php?halaman=homemenu');
		}else{
			$msg = 'Email anda tidak valid , coba ulangi lagi !';
			$_SESSION["msg"]=$msg;
			header('location:index.php');
		}

	}
}
?>
<?php
include"koneksi/koneksi.php";
session_start();
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$repassword=md5($_POST['repassword']);
	$captha=$_POST['captha'];
	$query_admin=mysql_query("select username,email from pengguna where username='$username'");
	$mysqli_show=mysql_fetch_array($query_admin);
	$query_data_email=$mysqli_show['email'];
	$query_data_username=$mysqli_show['username'];
	
if(isset($_POST['username']) AND isset($_POST['password'])){
	if(preg_match("/'`|onion|%27|order|-- -/",$_POST['email'])){
		header('location:404.php');
	}elseif(preg_match("/'`|onion|%27|order|-- -/",$_POST['username'])){
		header('location:404.php');
	}elseif(preg_match("/'`|onion|%27|order|-- -/",$_POST['password'])){
		header('location:404.php');
	}elseif(preg_match("/'`|onion|%27|order|-- -/",$_POST['repassword'])){
		header('location:404.php');
	}elseif(preg_match("/'`|onion|%27|order|-- -/",$_POST['captha'])){
		header('location:404.php');
	}else{
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
    // Return Error - Invalid Email
    $msg = 'Email anda tidak valid , coba ulangi lagi !';
	$_SESSION["msg"]=$msg;
	header('location:daftar.php');    
}else if($email == $query_data_email){
	$msg = 'Maaf Email ini sudah ada , coba ulangi lagi !';
	$_SESSION["msg"]=$msg;
	header('location:daftar.php');
}else if($username == $query_data_username){
	$msg = 'Maaf Username ini sudah ada , coba ulangi lagi !';
	$_SESSION["msg"]=$msg;
	header('location:daftar.php');
}else if($password != $repassword){
	$msg = 'Password tidak sama , coba ulangi lagi !';
	$_SESSION["msg"]=$msg;
	header('location:daftar.php');
}else if($captha != $_SESSION['captha']){
	$msg = 'Captha salah , coba ulangi lagi !';
	$_SESSION["msg"]=$msg;
	header('location:daftar.php');
}else{
    if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    	$sql_daftar="INSERT INTO pengguna(email,username,password) VALUES ('$email','$username','$password')";
    	$query_daftar=mysql_query($sql_daftar) or die (mysql_error());
    	header('location:index.php');
    }else{
    	$msg = 'Username atau password anda tidak valid !';
    	header('location:index.php');
    }
}
}
}
?>
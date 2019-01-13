<?php
session_start();
if (empty($_SESSION['id_pengguna'])) {
	header('location:../index.php');
}else{
	include"../koneksi/koneksi.php";

$id_pengguna=$_SESSION['id_pengguna'];
$noktp=$_POST['noktp'];
$fullname=$_POST['fullname'];
$jk=$_POST['jk'];
$tmplahir=$_POST['tmplahir'];
$datelahir=$_POST['datelahir'];
$status=$_POST['status'];
$notelp=$_POST['notelp'];
$alamat=$_POST['alamat'];

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
$jenis_gambar=$_FILES['nama_file']['type'];

if(isset($_POST['noktp']) AND isset($_POST['fullname'])){
	if(preg_match("/'`|onion|%27|order|-- -/",$_POST['noktp'])){
		header('location:404.php');
	}else if(preg_match("/'`|onion|%27|order|-- -/",$_POST['fullname'])){
		header('location:404.php');
	}else if(preg_match("/'`|onion|%27|order|-- -/",$_POST['tmplahir'])) {
		header('location:404.php');
	}elseif (preg_match("/'`|onion|%27|order|-- -/",$_POST['notelp'])) {
		header('location:404.php');
	}elseif (preg_match("/'`|onion|%27|order|-- -/",$_POST['alamat'])) {
		header('location:404.php');
	}else{
		$namafolder="imgadmin/";

		if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png" || $jenis_gambar=="image/png"){
			$gambar = $namafolder . basename($_FILES['nama_file']['name']);
			if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
				$sql="UPDATE pengguna SET no_ktp='$noktp',nama_lengkap='$fullname',jenis_kelamin='$jk',tempat_lahir='$tmplahir',tanggal_lahir='$datelahir',alamat='$alamat',no_telepon='$notelp',status='$status',foto='$gambar' WHERE id_pengguna='$id_pengguna'";
					$res=mysql_query($sql) or die (mysql_error());
				$sql_rules="INSERT INTO grups_pengguna_jabatan (id_jabatan,id_pengguna)VALUES('7','$id_pengguna')";
				$resi=mysql_query($sql_rules) or die (mysql_error());
            		header('location:done-formulir.php');	   
			} else {
		  		 header('location:formulir.php');
			}
   		}else{
			echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
	   }		
	}
}
} else {
	echo "Anda belum memilih gambar";
}

}
?>
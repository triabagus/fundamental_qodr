<?php
session_start();
if (empty($_SESSION['id_pengguna'])) {
	header('location:../index.php');
}else{
	include "../koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>T-QODR | Arsip Tugas</title>
	<link href="..\css\style-admin.css" rel="stylesheet" type="text/css">
	<link href="..\css\font-awesome.css" rel="stylesheet" type="text/css">
	<style>
		#regForm {
 			 background-color: #ffffff;
 			 margin: 25px auto;
 			 padding:70px;
 			 width: 70%;
 			 min-width: 300px;
		}
		* {
		  box-sizing: border-box;
		}
		.btn-done{
 			 background-color:#037368;
 			 color: #fff;
 			 font-weight: bold;
 			 font-size:18px;
 			 border: none;
 			 padding: 10px 20px;
 			 cursor: pointer;
 			 text-decoration: none;
 			 float: right;
		}
		.btn-done:hover {
		  opacity: 0.8;
		}
	</style>
</head>
<body style="background-color: #f1f1f1;">
	<div id="headerformulir">
		<center><h2>Data Anda Telah Tersimpan</h2></center>
	</div>
	<div id="content-formulir">
		<?php
			$id_session=$_SESSION['id_pengguna'];
			$query_session_admin=mysql_query("select * from pengguna where id_pengguna='$id_session'");
			$fetch_array_session=mysql_fetch_array($query_session_admin);
		?>
		<div id="regForm">
			<p style="float:right;"><img src="<?php echo $fetch_array_session['foto'];?>" style="height:150px;width:150px;border-radius: 50%;border:5px #000 solid;"></p>
			<p>No KTP : <?php echo $fetch_array_session['no_ktp'];?></p>
			<p>Nama Lengkap : <?php echo $fetch_array_session['nama_lengkap'];?></p>
			<p>
			Jenis Kelamin : <?php if($fetch_array_session['jenis_kelamin']=='l'){echo"Laki-laki";}else{echo"Perempuan";}?>
			</p>
			<p>
			Tempat Tanggal Lahir : <?php echo $fetch_array_session['tempat_lahir'];?> , <?php echo $fetch_array_session['tanggal_lahir'];?>
			</p>
			<p>
			No Telp : <?php echo $fetch_array_session['no_telepon'];?>
			</p>
			<p>
			Alamat : <?php echo $fetch_array_session['alamat'];?>
			</p>
			<p>Status : <?php echo $fetch_array_session['status'];?></p>
			<div><a class="btn-done" href="index.php?halaman=homemenu">Dashboard</a></div>
		</div>
	</div>
<?php }?>
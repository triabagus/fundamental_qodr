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

<div id="content-main">
	<?php include"content.php";?>
<div id="content-matrik">
<div class="header-sub-content-matrik">
		<a href="index.php?halaman=email">Email</a>	
	<div class="control-panel-file">
		<h2>Tambahkan Jabatan</h2>
		<form action="proses-insert-jabatan.php" method="POST">		
		<p><input class="input-matrik" type="text" name="namajabatan" placeholder="Nama Jabatan" required="required"></p>
		<input class="btn-submit green" type="submit" name="submit" value="Simpan">
		</form>
	</div>
	<div class="control-panel-file">
		<h2>Tambahkan Menu</h2>
		<form action="proses-insert-menu-bar.php" method="POST">		
		<p><input class="input-matrik" type="text" name="namamenu" placeholder="Nama Menu" required="required"></p>
		<p><input class="input-matrik" type="text" name="url" placeholder="Url Link" required="required"></p>
		<p><input class="input-matrik" type="text" name="fileurl" placeholder="File Url Link" required="required"></p>
		<input class="btn-submit green" type="submit" name="submit" value="Simpan">
		</form>
	</div>
	<div class="control-panel-file">
		<h2>Jabatan Pengguna</h2>
		<form action="proses-insert-jabatan-pengguna.php" method="POST">
			<?php
				$id_session=$_SESSION['id_pengguna'];
				$query_session_admin=mysql_query("select * from pengguna where id_pengguna=$id_session");
				$fetch_array_session=mysql_fetch_array($query_session_admin);
			?>
			<h5><?php echo $fetch_array_session['nama_lengkap'];?></h5>
			<input type="hidden" name="idadmin" value="<?php echo $id_session ?>">
			<select class="input-matrik" name="jabatan">
				<?php
					/*$sql_query_jabatan=mysql_query("SELECT admin.id_admin,grup.id_jabatan,jabatan.id_jabatan,jabatan.nama_jabatan FROM admin INNER JOIN grup ON admin.id_admin=grup.id_admin JOIN jabatan ON grup.id_jabatan=jabatan.id_jabatan WHERE admin.id_admin=$id_session") or die (mysql_error());*/
					$sql_query_jabatan=mysql_query("SELECT * FROM jabatan") or die (mysql_error());
					while($data_jabatan=mysql_fetch_array($sql_query_jabatan)){
				?>	
					<option value="<?php echo $data_jabatan['id_jabatan'];?>">
						<?php echo $data_jabatan['nama_jabatan'];?>
					</option>
				<?php } ?>
			</select>
			<input class="btn-submit green" type="submit" name="submit" value="Ubah">
		</form>
	</div>
	<div class="control-panel-file">
		<h2>Hak Akses Pengguna</h2>	
		<form action="proses-insert-hak-akses.php" method="POST" enctype="multipart/form-data">
			<table>
			<select class="input-matrik" name="jabatan">
				<?php
					$sql_query_jabatan_hap=mysql_query("SELECT * FROM jabatan") or die (mysql_error());
					while($data_jabatan_hap=mysql_fetch_array($sql_query_jabatan_hap)){
				?>	
					<option value="<?php echo $data_jabatan_hap['id_jabatan'];?>">
						<?php echo $data_jabatan_hap['nama_jabatan'];?>
					</option>
				<?php } ?>
			</select>
			<?php
				$sql_query_hap=mysql_query("SELECT * FROM menu_bar") or die (mysql_error());
				while($data_menu_checked=mysql_fetch_array($sql_query_hap)){
			?>	
				<tr>
					<td>
						<?php echo $data_menu_checked['nama_menu'];?>
					</td>
					<td>
						<input type="checkbox" name="menu[]" value="<?php echo $data_menu_checked['id_menu'];?>" checked>
					</td>
				</tr>
			<?php
				}
			?>
			</table>
			<input class="btn-submit green" type="submit" name="submit" value="Simpan">	
		</form>
	</div>
</div>
</div>
</body>
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
</html>
<?php } ?>


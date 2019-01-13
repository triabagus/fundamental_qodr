<?php
	$id_pengguna=$_SESSION['id_pengguna'];
		$sql_query=mysql_query("SELECT pengguna.id_pengguna,grups_pengguna_jabatan.id_jabatan,roles_jabatan_menu.id_menu,menu_bar.url FROM pengguna INNER JOIN grups_pengguna_jabatan ON pengguna.id_pengguna=grups_pengguna_jabatan.id_pengguna JOIN roles_jabatan_menu ON grups_pengguna_jabatan.id_jabatan=roles_jabatan_menu.id_jabatan JOIN menu_bar ON roles_jabatan_menu.id_menu=menu_bar.id_menu WHERE pengguna.id_pengguna=$id_pengguna") or die (mysql_error());
		
	if(isset($_GET['page'])){
		echo"<div id='content-main'><div id='content-matrik'><div class='header-sub-content-matrik'>";
		while ($data_file_url=mysql_fetch_array($sql_query)) {
		$url  = $data_file_url['url'];
		$page = $_GET['page'];	
		if($url==$page){
		switch ($page) {
			case 'genap':
				include "bilangan-genap.php";
				break;
			case 'ganjil':
				include "bilangan-ganjil.php";
				break;
			case 'prima':
				include "bilangan-prima.php";
				break;
			case 'deret':
				include "bilangan-deret.php";
				break;
			case 'angka1':
				include "perulangan-segitiga-angka1.php";
				break;
			case 'angkasama':
				include "perulangan-segitiga-angka-yg-sama.php";
				break;
			case 'angkaurut':
				include "perulangan-segitiga-angka-yg-berurutan.php";
				break;	
			case 'pascal':
				include "pascal.php";
				break;	
			case 'decbin':
				include "bilangan-biner-desimal.php";
				break;	
			case 'matrik':
				include "matrik-penjumlahan.php";
				break;
			case 'pmatrik':
				include "matrik-perkalian.php";
				break;
			case 'oop':
				include "oop.php";
				break;
			case 'fibonanci':
				include "bilangan-fibonacci.php";
				break;
			case '':
				include "none.php";
				break;		
			default:
				include "none.php";
				break;
				}
			}
		}
		echo"</div></div></div>";
	}

	if(isset($_GET['halaman'])){
		$halaman = $_GET['halaman'];
		echo"<div id='content-main'><div id='content-matrik'><div class='header-sub-content-matrik'>";
		switch ($halaman) {
			case 'email':
				include "email.php";
				break;
			case 'homemenu':
				include "home-menu.php";
				break;
			default:
				include "none.php";
				break;
				}
		echo"</div></div></div>";
	}

	 ?>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-sort-up"></i></button>
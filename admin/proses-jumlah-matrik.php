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
	 <div class="header-sub-content-matrik" ">
		<?php
			$baris1=trim($_POST['baris1']);
			$kolom1=trim($_POST['kolom1']);
				echo"<div style='width:40%;text-align:center;float: left;overflow-x:scroll;border:1px solid #ccc;padding:10px;margin: 0px 240px;'>
					<table style='width:100%;float:left;text-align:center;
            '><h1>Hasil Penjumlahan Matrik </h1>";
					for( $i = 0; $i < $baris1; $i++ ) :
    					echo"<tr>";
    					for( $j = 0; $j < $kolom1; $j++ ) :
    						
    						$matrikA=$_POST['matrikA'.$i.''.$j.''];
							$matrikB=$_POST['matrikB'.$i.''.$j.''];
        					//$matriksC = $matriksA + $matriksB;
        					$matrikC=$matrikA + $matrikB;
        					echo"<td>".$matrikC."</td>";
   						endfor;
   						echo"<tr>";
					endfor;	
				echo"</table></div>";
		?>
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


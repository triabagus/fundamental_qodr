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
			$kolom1=trim($_POST['kolom1']);//matrikA
			$baris2=trim($_POST['baris2']);
			$kolom2=trim($_POST['kolom2']);//matrikB
				echo"<div style='width:40%;text-align:center;float: left;overflow-x:scroll;border:1px solid #ccc;padding:10px;margin: 50px 240px;'>
					<h1>Hasil Perkalian Matrik </h1>";
							for( $i = 0; $i < $baris1; $i++ ) :
    							for( $j = 0; $j < $kolom1; $j++ ) :
    								$matrikA [$i][$j]=$_POST['matrikA'.$i.''.$j.''];				
   								endfor;
   							endfor;
   							////////     MENAMBAHKAN FOR LAGI AGAR BISA SEMUA DIKALIKAN ///////
   							for( $i = 0; $i < $baris2; $i++ ) :
    							for( $j = 0; $j < $kolom2; $j++ ) :	
    								$matrikB [$i][$j]=$_POST['matrikB'.$i.''.$j.''];
   								endfor;
   							endfor;
   							////////  MEMBUAT ARRAY SECARA SEMPURNA DAHULU

   							///////   KEMUDIAN BARU DIOPERASIKAN HASILNYA
   							
   								for( $i = 0; $i < $baris1; $i++ ) :
    							for( $j = 0; $j < $kolom2; $j++ ) :
    								$temp=0;
    								for ($k=0; $k < sizeof($matrikB); $k++) :
    									
    									$temp  +=  $matrikA[ $i ][ $k ] * $matrikB[ $k ][ $j ];//rumus buat perkalian yang ordonya bisa semua.		
    								endfor;
    								echo $hasil[$i][$j]=$temp." ";//// RUMUS BILA ORDO 2 x 2 ,3 x 3 , 4 x 4... dst	
   								endfor;
   								echo "<br>";
   							endfor;
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
<?php }?>


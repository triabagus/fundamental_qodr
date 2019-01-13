<!-- /*/////////////////////////////////////////////////////////////////////////*/ -->
<div class="subs-content-matrik-p">
	<h1>Masukkan Ordo Matrik </h1>
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="push-left-p">
				<input class="input-matrik" type="text" name="baris1" placeholder="Baris 1" required="required"> 
			</div>
			<div class="push-left-p">
				<input id="kolom1" class="input-matrik" type="text" name="kolom1" placeholder="Kolom 1" oninput="myFunctions()" required="required">
			</div>
			<div class="push-left-x">
				x
			</div>
			<div class="push-left-p">
				<input id="baris2" style="cursor:no-drop;background-color:#d9d9d9;box-shadow: none;" class="input-matrik" type="text" name="baris2" placeholder="Baris 2" readonly="readonly" required="required"> 
			</div>
			<div class="push-left-p">
				<input class="input-matrik" type="text" name="kolom2" placeholder="Kolom 2" required="required">
			</div>
			<div class="push-left-p">
				<input class="btn-submit green" type="submit" name="tampil" value="Tampilkan">
			</div>
		</form>
</div>	
<!-- /*/////////////////////////////////////////////////////////////*/ -->
<div class="sub-content-matrik">
	<h1>Inputan Matrik</h1>
		<div class="subs-content-matrik-form">
			<form method='POST' action='proses-perkalian-matrik.php' enctype='multipart/form-data'>
			<?php
				if(isset($_POST['baris1']) || isset($_POST['baris2']) || isset($_POST['kolom1']) || isset($_POST['kolom2'])){
					if(preg_match("/'`|onion|%27|order|-- -/",$_POST['baris1'])){
						header('location:404.php');
					}else if(preg_match("/'`|onion|%27|order|-- -/",$_POST['kolom1'])){
						header('location:404.php');
					}else if(preg_match("/'`|onion|%27|order|-- -/",$_POST['baris2'])){
						header('location:404.php');
					}else if(preg_match("/'`|onion|%27|order|-- -/",$_POST['kolom2'])){
						header('location:404.php');
					}else{
						$BilanganHasil=new operasiPerkalianMatrik($_POST['baris1'],$_POST['kolom1'],$_POST['baris2'],$_POST['kolom2']);
						$BilanganHasil->perkalianMatrik();
					}
				}
			?>	
			</form>
		</div>
</div>
<!-- /*/////////////////////////////////////////////////////////////////////////////*/ -->



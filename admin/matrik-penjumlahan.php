<!-- /*//////////////////////////////////////////////////////////////////////////////////*/ -->
<div class="subs-content-matrik">
	<h1>Masukkan Matrik </h1>
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="push-left">
				<input class="input-matrik" type="text" name="baris1" placeholder="Berapa Baris" required="required"> 
			</div>
			<div class="push-left">
				<input class="input-matrik" type="text" name="kolom1" placeholder="Berapa Kolom" required="required">
			</div>
			<div class="push-left">
				<input class="btn-submit green" type="submit" name="tampil" value="Tampilkan">
			</div>
		</form>
</div>	
<!-- /*////////////////////////////////////////////////////////////////////////////////*/-->
<div class="sub-content-matrik">
	<h1>Inputan Matrik</h1>
		<div class="subs-content-matrik-form">
			<form method='POST' action='proses-jumlah-matrik.php' enctype='multipart/form-data'>
			<?php
			if(isset($_POST['baris1']) || isset($_POST['kolom1']) ){
					if(preg_match("/'`|onion|%27|order|-- -/",$_POST['baris1'])){
						header('location:404.php');
					}else if(preg_match("/'`|onion|%27|order|-- -/",$_POST['kolom1'])){
						header('location:404.php');
					}else{
						$BilanganHasil=new operasiPenjumlahanMatrik($_POST['baris1'],$_POST['kolom1']);
						$BilanganHasil->penjumlahanMatrik();
					}
			}
			?>	
			</form>
		</div>
</div>
<!-- /*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/ -->



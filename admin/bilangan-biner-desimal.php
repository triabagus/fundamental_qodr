<H1>Desimal ke Biner</H1>
	<form method="POST" action="" enctype="type/text">
		<input type="text" name="desimal" required="required">
		<input class="btn-submit green" style="width: inherit;padding: 12px 50px;" type="submit" name="convert" value="Convert">
	</form><br>
	<?php
		if(isset($_POST['desimal'])){
			if(preg_match("/'|onion|%27|order|-- -/",$_POST['desimal'])){
				header('location:404.php');
			}else{
				$BilanganHasil=new desimalBiner($_POST['desimal']);
				$BilanganHasil->desimalBiner();
			}
		}
	?>
<h1>Biner Ke Desimal</h1>
	<form method="POST" action="" enctype="type/text">
		<input type="text" name="biner" required="required">
		<input class="btn-submit green" style="width: inherit;padding: 12px 50px;" type="submit" name="convert" value="Convert">
	</form><br>
	<?php
		if (isset($_POST['biner'])) {
			if(preg_match("/'|onion|%27|order|-- -/",$_POST['biner'])){
				header('location:404.php');
			}else{
				$BilanganHasil=new binerDesimal($_POST['biner']);
				$BilanganHasil->binerDesimal();
			}
		}
	?>

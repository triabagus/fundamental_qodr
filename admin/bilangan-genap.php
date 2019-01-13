<h1>Bilangan Genap</h1>
	<?php
		$HasilBilangan=new Bilangan();
		$HasilBilangan->bilanganGenap();
	?>
	<p class="halt-php">Script PHP</p>
	<div class="script-text">
		<p>
		echo "Bilangan genap berjumlah 10";<br>
		for ($i=1; $i<=10; $i++) { //looping dari angka 1 sampai 10<br>
		echo ($i * 2 )." ";// jumlah variable $i * 2 = 2,4,6,8,10,12,...<br>
		}<br>
		echo"Bilangan genap yang ada pada angka antara 1 sampai 10";<br>
		for ($genap=1; $genap <=10; $genap++) { //looping dari angka 1 sampai 10<br>
		if($genap % 2==0){// jika variable $genap modulus 2 = 0<br>
		echo $genap." ";// maka cetak variabel $genap ; 2,4,6,8,...<br>
		}<br>
		}
		</p>
	</div>

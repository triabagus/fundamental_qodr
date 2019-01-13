<h1>Bilangan Ganjil</h1>
		<?php
			$HasilBilangan=new Bilangan();
			$HasilBilangan->bilanganGanjil();
		?>
	<p class="halt-php">Script PHP</p>
	<div class="script-text">
		<p>
		echo"Bilangan ganjil yang berjumlahkan 10";</br>
		for ($i=1; $i <= 10; $i++) { // looping dari angka 1 sampai 10</br>
		echo ($i * 2 - 1)." ";// cetak $i=3 * 2 - 1 = 1,3,5,...</br>
		}</br>
		echo"Bilangan Ganjil yang ada pada angka antara 1 sampai 10";</br>
		for ($ganjil=0; $ganjil <=10; $ganjil++) {//looping dari angka 0 sampai 10 </br>
		if($ganjil%2==1){// jika $ganajil modulus 2 = 1 </br>
		echo $ganjil." ";// maka cetak $ganjil</br>
		}</br>
		}
		</p>
	</div>

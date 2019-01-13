<h1>Perulangan segitiga angka yang berurutan</h1><br>
	<?php
		$HasilBilangan=new Bilangan();
		$HasilBilangan->bilanganSegitigaAngkaUrut();
	?>
<p class="halt-php">Script PHP</p>
	<div class="script-text">
		<p>
		for ($i=1; $i <= 5 ; $i++) { //perulangan yg menyatakan dari 1 kurang dari sama dengan 5 akan bertambah 1<br><br>
		for ($angka=1; $angka <=$i ; $angka++) { //perulangan yg menyatakan variable $angka kurang dari sama dengan variable $i akan bertambah 1<br>
		echo $angka." ";//tampilkan variable $angka nya<br>
		//if ($angka>=$i) {//codition : jika $angka lebih besar dari $i maka<br>
			//akan menampilkan br untuk membuta segitiga nya<br>
		//}<br>
		}<br>
		echo" br ";	<br>
		}<br>
		/*<br>
		1 <= 5 = ++<br>
		1 <= 1 = ++<br>
		tampilkan 1<br>
		if 1 >= 1 maka buat <br>
		2 <= 5 = ++<br>
		1 <= 2 = ++<br>
		= 1<br>
		2 <= 2 = ++<br>
		= 2<br>
		tampilkan 12<br>
		if 2 >=2 maka buat <br>
		3 <= 5 = ++<br>
		1 <= 3 = ++<br>
		= 1<br>
		2 <= 3 = ++<br>
		= 2<br>
		3 <= 3 = ++<br>
		= 3<br>
		tampilkan 123<br>
		if 3 >= 3 maka buat <br>
		dst...<br>
		*/<br>
		</p>
	</div>

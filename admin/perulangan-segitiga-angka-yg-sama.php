<h1>Perulangan segitiga angka sama</h1><br>
	<?php
		$HasilBilangan=new Bilangan();
		$HasilBilangan->bilanganSegitigaAngkaSama();
	?>
	<p class="halt-php">Script PHP</p>
		<div class="script-text">
			<p>
			for ($i=1; $i <= 5 ; $i++) { //perulangan yg menyatakan dari 1 kurang dari sama dengan 5 akan bertambah 1<br><br>
			for ($a=1; $a <= $i ; $a++) { //perulangan dari 1 kurang dari sama dengan $i maka $a ditambah 1 <br>
			echo $i." ";//menampilkan $i<br>
			}<br>
			//if($i<=$a){//condition: jika $i <= $a maka<br>
			echo" ";//ada br supaya membentuk segitiga<br>
			//}<br>
			}<br>
			/*<br>
			1 <= 5 = ++<br>
			1 <= 1 = ++<br>
			tampilkan 1<br>
			if 1 <= 1 maka buat <br>
			2 <= 5 = ++<br>
			1 <= 2 = ++   ===> tampilkan 2<br>
			2 <= 2 = ++   ===> tampilkan 2<br>
			if 2 <= 2 maka buat <br>
			3 <= 5 = ++<br>
			1 <= 3 = ++   ===> tampilkan 3<br>
			2 <= 3 = ++   ===> tampilkan 3<br>
			3 <= 3 = ++   ===> tampilkan 3<br>
			if 3 <= 3 maka buat <br>
			dst...<br>
			*/
			</p>
	</div>


<h1>Bilangan Prima</h1>
	<?php
		$HasilBilangan=new Bilangan();
		$HasilBilangan->bilanganPrima();
	?>
	<P class="halt-php">Script PHP</P>
	<div class="script-text">
		<p>
		echo"Bilangan prima adalah bilangan asli yang lebih besar dari angka 1, yang faktor pembaginya adalah 1 dan bilangan itu sendiri.  ";<br>
		for ($i=1; $i <= 20; $i++) { //looping $i dimulai dari 1 sampai variable $batas <br>
		$count=0;//Buat variable bernilai 0 untuk mengawali dari mana bilangan prima dimulai <br>
		for ($j=1; $j <= $i /*2*/ ; $j++) { //looping $j diawali dari 1 sampai hasil looping dari variable $i<br>
		if ($i/* 2*/% $j/*1*/  == 0) {//condition : jika variable $i modulus variable $j menghasilkan == 0<br>
		$count++; //maka  variable $count akan bertambah 1 ; (1,2)=>bila prima != (1,2,3,...)=>bila bukan prima<br>
		}<br>
		}<br><br>
		if ($count == 2) {//condition : variable $count == 2 maka akan mencetak variable looping $i untuk menentukan bilangan prima<br>
		echo $i." ";// ini bilangan primanya : 2,3,5,7,11,...<br>
		}<br>
		}
		</p>
	</div>

<h1>Perulangan segitiga angka 1</h1>
	<?php
		$HasilBilangan=new Bilangan();
		$HasilBilangan->bilanganSegitigaAngka1();
	?>
	<p class="halt-php">Script PHP</p>
	<div class="script-text">
		<p>
		for($a=6;$a>0;$a--){ //buat perulangan variable $a=6 lebih dari 0 maka $a dikurangi 1 <br><br>
		for($ulang=6;$ulang>$a;$ulang--){//buat perulangan variable $ulang=6 lebih dari $a maka $ulang dikurangi 1<br>
		echo"1 ";// tampilkan angka 1<br>
		}<br>
		echo"";//perulangan pertama agar dapat mengfungsikan  => untuk membuat segitiganya<br>
		}<br>
		/*<br><br>
		6>0 => --	<br>		
		6>6 => --	<br>
		tampilkan 1	<br>
		5>0 => --
		6>5 => -- 	== 1<br>
		5>5 => --	== 1<br>
		tampilkan 11 <br>
		4>0 => --<br>
		6>4 => --	== 1<br>
		5>4 => --	== 1<br>
		4>4 => --	== 1<br>
		tampilkan 111 <br>
		dst...<br>
		*/
		</p>
	</div>


<center><h1>SEGITIGA PASCAL</h1></center><br>
	<?php
		$HasilBilangan=new Bilangan();
		$HasilBilangan->bilanganSegitigaPascal();
	?>
	<p class="halt-php">Script PHP</p>
		<div class="script-text">
			<p>
			for ($i=1; $i <= 10 ; $i++) { // Pengulangan untuk barisan segitiga<br><br>
			echo"center ";	// untuk memberikan paragraf tenggah agar berbentuk segitiga<br>
			for ($a=1; $a <= $i ; $a++) { // Pengulangan hitungan  <br>
			if ($a==1 || $a==$i) { //condition : jika $a == 1 atau $a == $i dengan bersifat benar  <br>
			$hasil[$i][$a]=1;// maka akan membuat array $hasil yang bernilai $i dan $a pertama<br><br>
			}else{				// jika tidak maka<br>
			$hasil[$i][$a]=$hasil[$i-1][$a]+$hasil[$i-1][$a-1];//akan menggunakan rumus ini untuk menentukan barisan yang ke 2 dst.<br>
			}<br>
			echo $hasil[$i][$a]." ";// tampilkan $hasil <br>
			}	<br>
			echo"center";	<br>
			}
			</p>
		</div>


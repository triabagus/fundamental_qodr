<h1>Bilangan Fibonacci</h1>
	<?php 
		$Fibonacci=new materiPelajaranFibonacci(0,1);
		echo $Fibonacci->hasilFibonacci();
	?>
	<p class="halt-php">Script PHP</P>
		<div class="script-text">
			<p>
			$angka1=0; //buat variabel bernilai 0<br>
			$angka2=1;//buat lagi variabel bernilai 1<br>
			echo"1 ";<br>
			for ($i=0; $i < 20 ; $i++) {  // perulangan dimulai dari nilai 0 sampai 20<br>
			$hasil=$angka1 + $angka2;//buat variabel $hasil untuk nilai penjumlahan variabel $angka1 dan $angka2<br>
			echo $hasil." ";//tampilkan $hasil<br>
			//hasilnya 1,2,3,5,...<br>
			$angka1 = $angka2; // buat looping $angka1 nantinya bernilai sama dengan $angka2<br>
			$angka2 = $hasil;// buat looping juga untuk $angka2 sama dengan $hasil<br>
			}
			</p>
		</div>


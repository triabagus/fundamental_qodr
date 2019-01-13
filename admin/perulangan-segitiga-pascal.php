<?php
echo"<center><h2>Segitiga pascal</h2></center>";
 $n=10; //definisikan banyaknya baris
 for($i=1;$i<=$n;$i++){ // looping baris segitiga
 	 echo "<center>";
 	  for($j=1;$j<=$i;$j++){
 	  	 if($j==1 || $j==$i){ // jika baris pertama definisikan 1 ; tanda || menyatakan atau yg bernilai benar
 	  	 	 $hasil[$i][$j]=1; 
 	  	 }else{
 	  	 	 $hasil[$i][$j]=$hasil[$i-1][$j] + $hasil[$i-1][$j-1]; // rumus penjumlahan baris ke-2 dst
 	  	 } 
 	 echo $hasil[$i][$j]." "; 
 	}
  echo "</center><br>"; 
  }

  /*
	1 <= 10 = ++
		1 <= 1 = ++
		if 1==1 atau 1==1  ===> bernilai benar
		maka 
  */


for ($i=6; $i >0 ; $i--) { 
	for ($a=6; $a >$i ; $a--) { 
echo"1";
	}
	echo"<br>";
}
for ($sama=1; $sama <=5 ; $sama++) { 
	for ($ulang=1; $ulang <=$sama ; $ulang++) { 
		echo $sama." ";
	}
	if ($sama<=$ulang) {
		echo"<br>";
	}
}
for ($urut=1; $urut <=5 ; $urut++) { 
	for ($hasil=1; $hasil <=$urut ; $hasil++) { 
		echo $hasil." ";
	}
	if ($urut <= $hasil) {
		echo"<br>";
	}
}
	?>
<?php
$desimal=10;
$biner="";
while ($desimal > 0) {
			if ($desimal % 2 == 0) {
				$biner .= 0;
				$desimal /=2;
			}else{
				$biner .= 1;
				$desimal=($desimal/2)-0.5;
			}
		}
		// 0101
		$hasil=strrev($biner);	
		//1010
echo "Hasil Angka Biner : ".$hasil."<br>";

/////////////////////////////////////////////////////////////////////////////////////////
/*$bineri=1010;
$jumlah_des=strlen($bineri);
$array=array($bineri);

0101
1010

for ($i=1; $i <=$jumlah_des ; $i++) { 

1010 = 10

// 1*2^3 + 0*2^2 + 1*2^1 + 0*2^0
// 8 + 0 + 2 + 0
// 10
}//////////////////////////////////////////////////////////////////////////////////////

$decimal_code="1 0 1 0";
$jumlah_biner=strlen($decimal_code);
$pecah=explode(" ",$decimal_code);
$a=var_dump($pecah);
echo"<br>";

foreach ($pecah as $value) {
		echo $value * 2 ^ 1 ;
		echo"<br>";
}*/
$biner_code=1010;//1010
$jumlah_biner=strlen($biner_code);//4
echo"<br>";

$no=$jumlah_biner-1;//variable 3
$akhirnya=0;//
for ($i=0; $i<$jumlah_biner ; $i++) { //mengulangi sampai 4x
	$str = substr($biner_code,$i,1); //menyesualikan for , mengambil 1 angka
/*
	1
	0
	1
	0
*/

	$kali= $str * 2;//0
	$set=$no--;//1
	if ($set==0) {
		$set=1;
	}
	$go=$kali ** $set;//0 pangkat 1
	$akhirnya += $go;//8 + 0 + 2 + 0
}
echo $akhirnya;//10
?>
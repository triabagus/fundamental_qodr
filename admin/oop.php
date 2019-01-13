<center><h1>Belajar OOP</h1></center>
	<div>
		<h2>Konsep Dasar OOP</h2>
		<ol>
			<li>Pembungkusan (encapsulation)</li>
				<p>Adalah Konsep data dan fungsi dibungkus atau disatukan dalam entitas tunggal yang disebut kelas</p>
				<ul>
					<li>Tingkat akses PRIVATE</li>
						<p>Hanya dapat diakses oleh kelas bersangkutan</p>
					<li>Tingkat akses PROTECTED</li>
						<p>Hanya dapat diakses oleh kelas bersangkutan dan kelas yang memiliki keturunan</p>
					<li>Tingkat akses PUBLIC</li>
						<p>Data dan fungsi yang bisa diakses sluruh kode yang ada</p>
				</ul>
			<li>Pewarisan (inheritance)</li>
				<p>Proses pembentukan kelas baru yang diturunkan dari kelas lainnnya yang masih ada , dan otomatis mewarisi sifat yang dimiliki kelas induknya</p>
			<li>Polimorfisme (polymorphism)</li>
				<p>Objek memiliki banyak bentuk (dapat melakukan banyak hal yang berbeda melalui cara yang sama) </p>
		</ol>
	</div>
<hr>
	<p>1. Membuat Kelas , Objek dan menampilkannya</p>
	<p>Hasil:</p>
	<?php
		// MENDEFINISIKAN KELAS
		class PersegiPanjang{
			// mendeklarasikan properti , variable atau attribut
			private $panjang; //private = fungsi khusus fungsi dia sendiri.
			private $lebar;

			public function setNilai($p,$l){  // metode atau method untuk rujukan fungsi kelas 
				$this->panjang = $p ;         // referensi ang menunjuk ke objek dari kelas yang bersangkutan dgn var $this
				$this->lebar    = $l ;
			}

			public function getPanjang(){
				return $this->panjang;        // return = mengembalikan nilai fungsi
			}
			public function getLebar(){
				return $this->lebar;
			}
			public function hitungLuas(){
				return $this->panjang * $this->lebar;
			}
			public function cetakLuas(){
				echo "Luas Persegi Panjang = ".
				$this->hitungLuas()."<br>";
			}
		}

		// MEMBUAT OBJEK 
		$obj1=new PersegiPanjang();
		// MENGISI NILAI PROPERTI,VARIABEL ATAU ATTRIBUT
		$obj1->setNilai(2,3);
		//MENAMPILKAN LUAS
		$obj1->cetakLuas(); 
	?>
	<p>2. Mengenal Konstruktor (Metode khusus yang dipanggil otomatis ketika objek dibuat)</p>
	<p>Fungsi __construct()</p>
	<?php
		//MENDEFINISIKAN KELAS
		class Segitiga{
			//MENDEKLARASIKAN PROPERTI , VARIABLE ATAU ATTRIBUT
			private $alas;
			private $tinggi;
			private $rumus;
			//MENDEFINISIKAN KONSTRUKTOR
				public function __construct($alas, $tinggi , $rumus){
					$this->alas=$alas;
					$this->tinggi=$tinggi;
					$this->rumus=$rumus;
				}
				
				public function getAlas(){
					return $this->alas;
				}
				public function getTinggi(){
					return $this->tinggi;
				}
				public function getRumus(){
					return $this->rumus;
				}
				public function hitungLuasSegitiga(){
					return ($this->alas * $this->tinggi) * $this->rumus;
				}
				public function cetakLuasSegitiga(){
					echo "Hasil Jumlah = ".
					$this->hitungLuasSegitiga()."<br>";
				}
		}
		//membuat objek
		$obj=new Segitiga(2,4,0.5);		//Perbedaan dari construct sendiri ada disini ,yaitu tidak perlu membuat function 									  untuk memasukkan data lagi
		//menampilkan luas segitiga
		$obj->cetakLuasSegitiga();
	?>
	<p>3. Mengenal Destruktor (Kebalikan dari CONSTRUCT , Metode khusus yang dipanggil otomatis ketika objek SUDAH TIDAK DIACUKAN OLEH REFENSI MANAPUN)</p>
	<p>Fungsi __destruct()</p>
	<p>Umumnya dipakai untuk menutup sebuah file</p>
	<?php
		class FileTesk{
			private $file;

			//construct
			public function __construct($namafile){
				echo"Membuat dan membuka file...<br>";
				$this->file= fopen($namafile,"w+r");
			}
			public function tulisData($str){
				fputs($this->file,$str."\n");
			}
			public function bacaData(){
				//posisi awal file 
				fseek($this->file,0);
				//membaca per baris
				while (!feof($this->file)) {
					$baris=fgets($this->file);
					echo"<strong>$baris</strong><br>";
				}
			}
			//desctruct
			public function __destruct(){
				echo"Menutup File...<br>";
				fclose($this->file);
			}
		}


		//membuat objek File Teks
		$f=new FileTesk("destruktor.txt");

		//menulis data ke dalam file 
		$f->tulisData("Baris data ke-1");
		$f->tulisData("Baris data ke-2");
		$f->tulisData("Baris data ke-3");
		$f->tulisData("Baris data ke-4");
		//membaca data dari dalam file
		echo"isi file :<br>";
		$f->bacaData();
		//diakhir desctructor akan dipanggil dan menutup file 
	?>
	<p>* MEMBUAT FILE DESTRUKTOR, MENGISI DAN MENAMPILKAN ISI BARIS DATA SERTA MENGITUNGNYA</p>
	<p>3. Overload Terhadap Method</p>
	<p>
		Overload = proses pembuatan beberapa metode (lebih dari 1) didalam satu kelas dengan nama yang sama
		tapi parameternya berbeda.
	</p>
	<p>Fungsi __CALL()</p>
	<P>Mempunyai 2 parameter yang pertama bertipe string yang akan di overload , dan yang kedua bertipe array
	   yang menunjukkan daftar argumen yang dilewatkan pada saat pemangilan metode.
	</P>
	<?php
		class Overload{
			public function __CALL($nama, $param){
				if ($nama=="tulis") {
					for ($i=0; $i <sizeof($param) ; $i++) { 
						echo $param[$i]."<br>";
					}
				}
			}
		}
		//MEMBUAT OBJEK
		$obj3=new Overload();
		//MEMANGGIL TULIS() DENGAN 1 PARAMETER
		echo"Pemangilan dengan 1 parameter<br>";
		$obj3->tulis("PHP");
		ECHO"<BR>";

		echo"Pemangilan dengan 2 parameter<br>";
		$obj3->tulis("PHP","perl");
		ECHO"<BR>";

		echo"Pemangilan dengan 3 parameter<br>";
		$obj3->tulis("PHP","perl","phyton");
		ECHO"<BR>";
	?>
	<p>4. Membuat Salinan Objek (CLONING)</p>
	<P>$objekSalinan = clone $objekAsli</P>
	<?php
		class Lingkaran{
			const pi = 3.14;
			private $jarijari;
			public function __construct($r){
				$this->jarijari=$r;
			}
			public function setJarijari($r){
				$this->jarijari=$r;
			}
			public function getJarijari(){
				return $this->jarijari;
			}
			public function hitungLuasLingkaran(){
				return self::pi * $this->jarijari * $this->jarijari;
			}
			public function cetakLuasLingkaran(){
				echo "Luas Lingkaran = ".
				$this->hitungLuasLingkaran().
				"<br>";
			}
		}

		//MEMBUAT OBJEK 
		$obj4=new Lingkaran(3);

		//$obj5 menunjuk ke $obj4
		$obj5=$obj4;

		//membuat salinan $obj4
		$obj6=clone $obj4;

		echo "KEADAAN AWAL <br>";
		echo"\$obj4 : ";
		$obj4->cetakLuasLingkaran();
		echo"\$obj5 : ";
		$obj5->cetakLuasLingkaran();
		echo"\$obj6 : ";
		$obj6->cetakLuasLingkaran();
		
		//MENGUBAH JARI JARI KE DALAM $obj4
		$obj4->setJarijari(5);

		echo "KEADAAN AKHIR <br>";
		echo"\$obj4 : ";
		$obj4->cetakLuasLingkaran();
		echo"\$obj5 : ";
		$obj5->cetakLuasLingkaran();
		echo"\$obj6 : ";
		$obj6->cetakLuasLingkaran();
	?>
	<p>Mengenal Kata Kunci Statis</p>
	<p>Normalnya : Anggota kelas(baik propertis atau metode) akan bersifat non-statis</p>
	<p>Non-statis        == instance variable</p>
	<p>properti Statis   == class variable</p>
	

	<h1>LATIHAN</h1>
	<?php
		class kendaraan{
			var $jumlahRoda;
			var $warna;
			var $bahanBakar;
			var $harga;
			var $merek;
			var $tahunPembuatan;

			function statusHarga(){
				if($this->harga > 5000000) $status="mahal";
				else $status="murah";
				return $status;
			}
			function setMerek($x){
				$this->merek=$x;
			}
			function bacaMerek(){
				return $this->merek;
			}
			function setHarga($x){
				$this->harga=$x;
			}
			function setBahanBakar($x){
				$this->bahanBakar=$x;
			}
			function setTahunPembuatan($x){
				$this->tahunPembuatan=$x;
			}
			function dapatSubsidi(){
				if($this->bahanBakar=="premium" && $this->tahunPembuatan < 2015) $subsidi="dapat";
				else $subsidi="tidak dapat";
				return $subsidi;
			}
			function hargaSecond(){
				if($this->tahunPembuatan > 2015) $bayar=$this->harga*20/100;
				else if($this->tahunPembuatan > 2000) $bayar=$this->harga*30/100;
				else $bayar=$this->harga*40/100;
				return $bayar;
			}
		}
		//pewarisan sifat
		class pesawat extends kendaraan{
			private $tinggiMax;
			private $kecepatanMax;

			function setTinggiMax($x){
				$this->tinggiMax=$x;
			}
			function setKecepatanMax($x){
				$this->kecepatanMax=$x;
			}
			function bacaTinggiMax(){
				return $this->tinggiMax;
			}
			function bacaKecepatanMax(){
				return $this->kecepatanMax;
			}
			function biayaOperasional(){
				if($this->tinggiMax > 5000 && $this->kecepatanMax > 800) $biayas=$this->harga*30/100;
				else if($this->tinggiMax > 3000 && $this->kecepatanMax > 500) $biayas=$this->harga*20/100;
				else if($this->tinggiMax > 0 && $this->kecepatanMax > 0)$biayas =$this->harga*10/100;
				else $biayas=$this->harga*5/100;
				return $biayas;
			}
		} 
		$pesawat1=new pesawat();
		$pesawat1->setHarga(2000000000);
		$pesawat1->setMerek("Boeing 707");
		$pesawat1->setTinggiMax(7500);
		$pesawat1->setKecepatanMax(650);
		echo "Biaya Operasional Pesawat ".$pesawat1->merek." dengan harga ".$pesawat1->harga." dengan ketinggian ".$pesawat1->bacaTinggiMax()." dan kecepatan Max ".$pesawat1->bacaKecepatanMax()." Harag Operasional nya Rp.".$pesawat1->biayaOperasional()."<br>";
		//membuat objek
		$kendaraan1=new kendaraan();
		$kendaraan1->setHarga(1000000000);
		$kendaraan1->setMerek("Honda MIO");
		$kendaraan1->setBahanBakar("premium");
		$kendaraan1->setTahunPembuatan(2014);
		echo $kendaraan1->statusHarga()."<br>";//MENJALANKAN METHOD
		echo $kendaraan1->dapatSubsidi()."<br>";//MENJALANKAN METHOD
		echo $kendaraan1->hargaSecond()."<br>";//MENJALANKAN METHOD
		
		$kendaraan2=new kendaraan();
		/*
		$kendaraan2->jumlahRoda(4);
		$kendaraan2->warna("hitam");
		*/
		$kendaraan2->setBahanBakar("solar");
		$kendaraan2->setHarga(11200000);
		$kendaraan2->setMerek("yamaha");
		$kendaraan2->setTahunPembuatan(2019);
		echo $kendaraan2->statusHarga()."<br>";//MENJALANKAN METHOD
		echo $kendaraan2->dapatSubsidi()."<br>";//MENJALANKAN METHOD
		echo $kendaraan2->hargaSecond()."<br>";//MENJALANKAN METHOD

		ECHO "HARGA DARI KENDARAAN : ".$kendaraan2->merek." Rp. ".$kendaraan2->harga."<br>";//MENGAKSES PROPERTI atau
		ECHO "HARGA DARI KENDARAAN : ".$kendaraan2->bacaMerek();//MENGAKSES PROPERTI
	?>
	<hr>
	<p>Modularitas class</p>
	<p>Yaitu class yang sudah jadi dijadikan file dan nantinya akan di panggil dengan fungsi include,namun pembuatan objek terpisah dengan file kelas (nantinya akan dipangil dengan include)</p>
	<hr>
	<p>STUDY KASUS OOP</p>
	<p>1. Operasi Bilangan</p>
	<?php
		class operasisBilangan{
			public $bilanganSatu;
			public $bilanganDua;
			//construct
			public function __construct($bilSatu,$bilDua){
				$this->bilanganSatu=$bilSatu;
				$this->bilanganDua=$bilDua;
			}
			function bacaBilanganSatu(){
				return $this->bilanganSatu;
			}
			function bacaBilanganDua(){
				return $this->bilanganDua;
			}
			function jumlahkan(){
				$jumlahkan=$this->bilanganSatu + $this->bilanganDua;
				return $jumlahkan;
			}
			function kalikan(){
				$kalikan=$this->bilanganSatu * $this->bilanganDua;
				return $kalikan;
			}
		}

		$BilanganHasil=new operasisBilangan(2,2);
		echo $BilanganHasil->jumlahkan();
		echo $BilanganHasil->kalikan();
	?>

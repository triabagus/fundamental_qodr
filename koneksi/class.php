<?php
class DataBase{
		//properti,attribut,variable
		private $dbHost;
		private $dbUser;
		private $dbPassword;
		private $dbNamaDatabase;
		//construct
		function __construct($host,$user,$password,$namadatabase){
			$this->dbHost=$host;
			$this->dbUser=$user;
			$this->dbPassword=$password;
			$this->dbNamaDatabase=$namadatabase;
		}
		//method
		function connectMysql(){
			mysql_connect($this->dbHost,$this->dbUser,$this->dbPassword);
			mysql_select_db($this->dbNamaDatabase);
		}
		function profilPengguna(){
			$id_session=$_SESSION['id_pengguna'];
			$query_session_admin=mysql_query("select * from pengguna where id_pengguna='$id_session'");
			$fetch_array_session=mysql_fetch_array($query_session_admin);

			echo"<div class='sub-sub-content'><p style='text-align:center;'><img src=".$fetch_array_session['foto']." style='height:150px;width:150px;border-radius:50%;border:5px #000 solid;'></p>
			<div class='dongker'><p>Username : ".$fetch_array_session['username']."</p>
			<p>Email : ".$fetch_array_session['email']."</p>";
				$sql_query_jabatan=mysql_query("SELECT pengguna.id_pengguna,grups_pengguna_jabatan.id_jabatan,jabatan.id_jabatan,jabatan.nama_jabatan FROM pengguna INNER JOIN grups_pengguna_jabatan ON pengguna.id_pengguna=grups_pengguna_jabatan.id_pengguna JOIN jabatan ON grups_pengguna_jabatan.id_jabatan=jabatan.id_jabatan WHERE pengguna.id_pengguna=$id_session") or die (mysql_error()); 
				$data_jabatan=mysql_fetch_array($sql_query_jabatan);
			echo"<p style='color:#ea9c0b;font-weight:bold';>HAK AKSES : ".$data_jabatan['nama_jabatan']."</p></div></div><div class='sub-sub-content'><p>No KTP : ".$fetch_array_session['no_ktp']."</p><p>Nama Lengkap : ".$fetch_array_session['nama_lengkap']."</p><p>Jenis Kelamin : ";
				if($fetch_array_session['jenis_kelamin']=='l'){echo"Laki-laki";}else{echo"Perempuan";}
			echo"</p><p>Tempat Tanggal Lahir : ".$fetch_array_session['tempat_lahir']." , ".$fetch_array_session['tanggal_lahir']."</p><p>No Telp : ".$fetch_array_session['no_telepon']."</p><p>Alamat : ".$fetch_array_session['alamat']."</p><p>Status : ".$fetch_array_session['status']."</p>	
				</div>";
		}
		function tampilMenu(){
		echo"<center><h3>Latihan Materi Pelajaran</h3></center>";
		$id_pengguna=$_SESSION['id_pengguna'];
		$sql_query=mysql_query("SELECT pengguna.id_pengguna,grups_pengguna_jabatan.id_jabatan,roles_jabatan_menu.id_menu,menu_bar.nama_menu,menu_bar.url FROM pengguna INNER JOIN grups_pengguna_jabatan ON pengguna.id_pengguna=grups_pengguna_jabatan.id_pengguna JOIN roles_jabatan_menu ON grups_pengguna_jabatan.id_jabatan=roles_jabatan_menu.id_jabatan JOIN menu_bar ON roles_jabatan_menu.id_menu=menu_bar.id_menu WHERE pengguna.id_pengguna=$id_pengguna") or die (mysql_error());// untuk hak akses multi user
		
		while($data_menu=mysql_fetch_array($sql_query)):
			if($data_menu['url']==""):
				echo"";
			else:
		echo"<a href='index.php?page=".$data_menu['url']."'><div id='content-menu'>".$data_menu['nama_menu']."</div></a>";
			endif;
		 endwhile; 

		}

		function tampilMenuPengaturan(){
		$id_pengguna=$_SESSION['id_pengguna'];
		$sql_query_admin=mysql_query("SELECT pengguna.id_pengguna,grups_pengguna_jabatan.id_pengguna,grups_pengguna_jabatan.id_jabatan FROM pengguna INNER JOIN grups_pengguna_jabatan ON pengguna.id_pengguna=grups_pengguna_jabatan.id_pengguna WHERE pengguna.id_pengguna=$id_pengguna");
		$data=mysql_fetch_array($sql_query_admin);
		if($data['id_jabatan']=='1'){
		echo"<a href='Pengaturan.php'><i class='fa fa-gears'></i> Pengaturan</a>";
		}else{echo"";}
		
		}

		function AddEmail($penerima,$cc,$bcc,$pengirim,$password,$judul,$pesan,$header){
			include "./phpmailer/classes/class.phpmailer.php";
				$mail             = new PHPMailer();
				$mail->IsSMTP(); // telling the class to use SMTP
				$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           				   // 1 = errors and messages
                                           				   // 2 = messages only
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				$mail->SMTPSecure = "tls";                 
				$mail->Host       = "smtp.gmail.com";      // SMTP server
				$mail->Port       = 587;                   // SMTP port
				$mail->Username   = "$pengirim";  // username     
				$mail->Password   = "$password";  // password
				$mail->SetFrom('$pengirim', $cc);
				$mail->Subject    = $judul;
				$mail->MsgHTML($pesan);
				$address = "$penerima";
				$mail->AddAddress($address, $bbc);
					if(!$mail->Send()) {
  						echo"<script>alert('Email GAGAL dikirim!". $mail->ErrorInfo."');</script>";
					} else {
 						echo"<script>alert('Email berhasil dikirim!');</script>";
					}
			$query_email=mysql_query("INSERT INTO kirim_email_pengguna(penerima,cc,bcc,pengirim,judul,pesan)VALUES('$penerima','$cc','$bcc','$pengirim','$judul','$pesan')") or die (mysql_error());

			if($query_email):
				echo"<script>alert('Email berhasil dikirim!');window.location='index.php?halaman=email'</script>";
			else:
				echo"<script>alert('Email GAGAL dikirim!');window.location='index.php?halaman=email'</script>";
			endif;
		}

		function TampilEmail(){
			echo" Search: <input id='myInput' type='text' onkeyup='Mysearch()' placeholder='Cari Berdasarkan Penerima'><br><br>";
			echo"<table id='myTable' border='1'><tr><th>No</th><th>Penerima</th><th>Pengirim</th><th>Judul</th><th>Option</th></tr>";
			$i=1;
			$batas=5;
			$result=mysql_query("SELECT count(*) FROM kirim_email_pengguna");
			$recordcount=mysql_fetch_row($result)[0];
			$pagecount=ceil($recordcount / $batas);

			if (isset($_GET['halaman'])) {
				if (empty($_GET['hal'])) {
					$activepage= 1 ;
				}else{
					$activepage=$_GET['hal'];
				}
			}

			$mulai= $batas * ($activepage-1);

			$query_email_tampil=mysql_query("SELECT * FROM kirim_email_pengguna LIMIT $mulai,$batas") or die (mysql_error());
			while($data_email=mysql_fetch_array($query_email_tampil)){
				echo"<tr>
						<td>".$i."</td><td>".$data_email['penerima']."</td><td>".$data_email['pengirim']."</td><td>".$data_email['judul']."</td><td><a href='".$_SERVER['PHP_SELF']."?halaman=email&op=edit&id=".$data_email['id_email']."'> Edit </a> | <a href='".$_SERVER['PHP_SELF']."?halaman=email&op=del&id=".$data_email['id_email']."'  onClick=\"return confirm('Are you sure you want to delete?')\"> Hapus</a><td</tr>";
				$i++;
			}echo"</table>";
			for ($i=1; $i <= $pagecount ; $i++) { 
				if ($i != $activepage) {
					echo"<a href='".$_SERVER['PHP_SELF']."?halaman=email&hal=".$i."'>".$i."</a> ";
				}else{
					echo"<strong>".$i."</strong> ";
				}
			}
		}

		function HapusEmail($id){
			$query_email_hapus=mysql_query("DELETE FROM kirim_email_pengguna WHERE id_email='$id'");
			if ($query_email_hapus) {
				echo"<script>alert('Email berhasil dihapus!');window.location='index.php?halaman=email'</script>";
			}else{
				echo"<script>alert('Email GAGAL dihapus!');window.location='index.php?halaman=email'</script>";
			}
		}


		function EditEmail($id,$penerima,$cc,$bcc,$pengirim,$judul,$pesan){

			$query_email_edit=mysql_query("UPDATE kirim_email_pengguna SET penerima='$penerima', cc='$cc', bcc='$bcc' , pengirim='$pengirim',judul='$judul',pesan='$pesan' WHERE id_email='$id'") or die (mysql_error());
			if ($query_email_edit) {
				echo"<script>alert('Email berhasil diubah!');window.location='index.php?halaman=email'</script>";
			}else{
				echo"<script>alert('Email GAGAL diubah!');window.location='index.php?halaman=email'</script>";
			}
		}
}

/*/////////////////////////////////  CLASS PELAJARAN ///////////////////////////////////////////*/
class materiPelajaranFibonacci{
	private $angka_awal;
	private $angka_akhir;

	function __construct($angka_awal,$angka_akhir){
		$this->angka_awal=$angka_awal;
		$this->angka_akhir=$angka_akhir;
	}
	function hasilFibonacci(){
		echo"Barisan Fibonacci adalah sebuah barisan dimana sebuah suku ke – n , merupakan hasil penjumlahan dari suku (n-1) dengan suku (n-2).<br>";
		echo"Barisan Fibonacci adalah sebuah barisan angka dimana suku berikutnya pada barisan tersebut merupakan hasil dari penjumlahan dua suku sebelumnya.<br><br>";
		for($i=0;$i<=10;$i++):
			$hasil_akhir=$this->angka_awal + $this->angka_akhir;
			echo $hasil_akhir." ";
			$this->angka_awal = $this->angka_akhir;
			$this->angka_akhir = $hasil_akhir;
		endfor;
		
	}
}

class bilangan{
	function bilanganGenap(){
		echo "Bilangan genap berjumlah 10<br>";
		for ($i=1; $i<=10; $i++) { //looping dari angka 1 sampai 10
			echo ($i * 2 )." ";// jumlah variable $i * 2 = 2,4,6,8,10,12,...
		}
		echo"<br>Bilangan genap yang ada pada angka antara 1 sampai 10<br>";
		for ($genap=1; $genap <=10; $genap++) { //looping dari angka 1 sampai 10
			if($genap % 2==0){// jika variable $genap modulus 2 = 0
				echo $genap." ";// maka cetak variabel $genap ; 2,4,6,8,...
			}
		}
	}

	function bilanganGanjil(){
		echo"Bilangan ganjil yang berjumlahkan 10</br>";
			for ($i=1; $i <= 10; $i++) { // looping dari angka 1 sampai 10
				echo ($i * 2 - 1)." ";// cetak $i=3 * 2 - 1 = 1,3,5,...
			}
		echo"<br>Bilangan Ganjil yang ada pada angka antara 1 sampai 10</br>";
			for ($ganjil=0; $ganjil <=10; $ganjil++) {//looping dari angka 0 sampai 10 
				if($ganjil%2==1){// jika $ganajil modulus 2 = 1 
					echo $ganjil." ";// maka cetak $ganjil
				}
			}
	}

	function bilanganPrima(){
		echo"Bilangan prima adalah bilangan asli yang lebih besar dari angka 1, yang faktor pembaginya adalah 1 dan bilangan itu sendiri.  <br>";
		for ($i=1; $i <= 20; $i++) { //looping $i dimulai dari 1 sampai variable $batas 
			$count=0;//Buat variable bernilai 0 untuk mengawali dari mana bilangan prima dimulai 
			for ($j=1; $j <= $i /*2*/ ; $j++) { //looping $j diawali dari 1 sampai hasil looping dari variable $i
				if ($i/* 2*/% $j/*1*/  == 0) {//condition : jika variable $i modulus variable $j menghasilkan == 0
					$count++; //maka  variable $count akan bertambah 1 ; (1,2)=>bila prima != (1,2,3,...)=>bila bukan prima
				}
			}
			if ($count == 2) {//condition : variable $count == 2 maka akan mencetak variable looping $i untuk menentukan bilangan prima
				echo $i." ";// ini bilangan primanya : 2,3,5,7,11,...
			}
		}
	}

	function bilanganDeret(){
		echo"Barisan deret aritmatika + 3 <br>";
		for ($deret=0; $deret <=10 ; $deret++) { 
			$barisan=$deret * 3 ;
			echo $barisan." ";			
		}
	}

	function bilanganSegitigaAngka1(){
		for($a=6;$a>0;$a--){ //buat perulangan variable $a=6 lebih dari 0 maka $a dikurangi 1 
			for($ulang=6;$ulang>$a;$ulang--){//buat perulangan variable $ulang=6 lebih dari $a maka $ulang dikurangi 1
				echo"1 ";// tampilkan angka 1
			}
			echo"<br>";//perulangan pertama agar dapat mengfungsikan <br> => untuk membuat segitiganya
		}	
	}

	function bilanganSegitigaAngkaUrut(){
		for ($i=1; $i <= 5 ; $i++) { //perulangan yg menyatakan dari 1 kurang dari sama dengan 5 akan bertambah 1
			for ($angka=1; $angka <=$i ; $angka++) { //perulangan yg menyatakan variable $angka kurang dari sama dengan variable $i akan bertambah 1
				echo $angka." ";//tampilkan variable $angka nya
		//if ($angka>=$i) {//codition : jika $angka lebih besar dari $i maka
			//akan menampilkan br untuk membuta segitiga nya
		//}
			}	
			echo"<br>";	
		}
	}

	function bilanganSegitigaAngkaSama(){
		for ($i=1; $i <= 5 ; $i++) { //perulangan yg menyatakan dari 1 kurang dari sama dengan 5 akan bertambah 1
			for ($a=1; $a <= $i ; $a++) { //perulangan dari 1 kurang dari sama dengan $i maka $a ditambah 1 
				echo $i." ";//menampilkan $i
			}
		//if($i<=$a){//condition: jika $i <= $a maka
			echo"<br>";//ada <br> supaya membentuk segitiga
		//}
		}
	}

	function bilanganSegitigaPascal(){
		for ($i=1; $i <= 10 ; $i++) { // Pengulangan untuk barisan segitiga
			echo"<center> ";	// untuk memberikan paragraf tenggah agar berbentuk segitiga
			for ($a=1; $a <= $i ; $a++) { // Pengulangan hitungan  
				if ($a==1 || $a==$i) { //condition : jika $a == 1 atau $a == $i dengan bersifat benar  
					$hasil[$i][$a]=1;// maka akan membuat array $hasil yang bernilai $i dan $a pertama
				}else{				// jika tidak maka
					$hasil[$i][$a]=$hasil[$i-1][$a]+$hasil[$i-1][$a-1];//akan menggunakan rumus ini untuk menentukan barisan yang ke 2 dst.
				}
				echo $hasil[$i][$a]." ";// tampilkan $hasil 
			}	
		echo"</center>";	
		}
	}
}
/*/////////////////////////////////  CLASS PELAJARAN DESIMAL BINER  ///////////////////////////////////////////*/
class desimalBiner{ 
	public function __construct($desimal){
		$this->desimal=$desimal;
	}
		function desimalBiner(){
				$operasiDesimal=$this->desimal;
				$hasilBiner="";
					while ( $operasiDesimal > 0) {
						if ($operasiDesimal % 2 == 0) {
						$hasilBiner .= 0;
						$operasiDesimal /=2;
					}else{
						$hasilBiner .= 1;
						$operasiDesimal=($operasiDesimal/2)-0.5;
					}
				}
				$convert_biner=strrev($hasilBiner);	//strrev = membalik angka biner	
				echo "Hasil convert Biner = ".$convert_biner;
			}
}

class binerDesimal{
	public function __construct($biner){
		$this->biner=$biner;
	}
		function binerDesimal(){
			$biner=$this->biner;
			$jumlah_barisan_biner=strlen($biner);//menghitung jumlah barisan biner
			$angka=$jumlah_barisan_biner-1;
			$hasil_desimal=0;
			$convert_desimal=0;
			for ($i=0; $i < $jumlah_barisan_biner ; $i++) { 
				$str=substr($biner,$i,1);//mengambil angka yang akan diseleksi
				$kali=$str * 2;
				$set_pangkat=$angka--;
					if ($set_pangkat == 0) {
						$set_pangkat=1;
					}
				$pangkat=$kali ** $set_pangkat;//buat pangkat
				$convert_desimal += $pangkat;//buat sum atau menjumlahkan semua
			}
			echo "Hasil convert Desimal = ".$convert_desimal;
		}
}	
/*/////////////////////////////////  CLASS PELAJARAN MATRIK  ///////////////////////////////////////////*/
class operasiPenjumlahanMatrik{
	public function __construct($baris1,$kolom1){
		$this->baris1=$baris1;
		$this->kolom1=$kolom1;
	}
		function penjumlahanMatrik(){
			$baris1=trim($this->baris1);
			$kolom1=trim($this->kolom1);
				if (is_numeric($baris1) || is_numeric($kolom1) == TRUE) {
					echo"<div class='matrik-input'><table style='width:100%;float:left;'>";
					echo"<input type='hidden' name='baris1' value='".$baris1."'>";
					echo"<input type='hidden' name='kolom1' value='".$kolom1."'>";
						for ($i=0; $i < $baris1; $i++) {
							echo"<tr>";
								for ($j=0; $j < $kolom1 ; $j++) { 
									echo"<td><input class='hasil' type='text' name='matrikA".$i."".$j."'  required='required'></td>";
								}
							echo"</tr>";
						}
					echo"</table></div>";
					echo"<div style='float:left;text-align:center;font-weight:bold;font-size:20px;'>+</div>";
					echo"<div class='matrik-input'><table style='width:100%;float:left;'>";
						for ($i=0; $i < $baris1; $i++) {
							echo"<tr>";
								for ($j=0; $j < $kolom1 ; $j++) { 
									echo"<td><input class='hasil' type='text' name='matrikB".$i."".$j."'  required='required'></td>";
								}	
							echo"</tr>";
						}
					echo"</table>";
					echo"</div>";
					echo"<div style='width:100%;float:left;'><input class='btn-submit green' style='width:20%;' type='submit' name='jumlah' value='Jumlah'></div>";
				}else{
					echo"<h2>Baris </h2><h4>* Tolong Masukkan Angka !</h4>";
				}
		}
}

class operasiPerkalianMatrik{
	public function __construct($baris1,$kolom1,$baris2,$kolom2){
		$this->baris1=$baris1;
		$this->kolom1=$kolom1;
		$this->baris2=$baris2;
		$this->kolom2=$kolom2;
	}
		function perkalianMatrik(){
			$baris1=trim($this->baris1);
			$kolom1=trim($this->kolom1);
			$baris2=trim($this->baris2);
			$kolom2=trim($this->kolom2);
				if (is_numeric($baris1) || is_numeric($kolom1) == TRUE) {
					echo"<div class='matrik-input'><table style='float:left;'>";
					echo"<input type='hidden' name='baris1' value='".$baris1."'>";
					echo"<input type='hidden' name='kolom1' value='".$kolom1."'>";
						for ($i=0; $i < $baris1; $i++) {
							echo"<tr>";
								for ($j=0; $j < $kolom1; $j++) { 
									echo"<td><input class='hasil' type='text' name='matrikA".$i."".$j."'  required='required'></td>";
								}
							echo"</tr>";
						}
					echo"</table></div>";
					echo"<div class='push-left-x' style='float:left;text-align:center;font-weight:bold;font-size:20px;'>x</div>";
					echo"<div class='matrik-input'><table style='float:left;'>";
					echo"<input type='hidden' name='baris2' value='".$baris2."'>";
					echo"<input type='hidden' name='kolom2' value='".$kolom2."'>";
						for ($a=0; $a < $baris2; $a++) {
							echo"<tr>";
								for ($s=0; $s < $kolom2 ; $s++) { 
									echo"<td><input class='hasil' type='text' name='matrikB".$a."".$s."'  required='required'></td>";
								}
							echo"</tr>";
						}
					echo"</table>";
					echo"</div>";
					echo"<div style='width:100%;float:left;'><input class='btn-submit green' style='width:20%;' type='submit' name='jumlah' value='Kalikan'></div>";
					}else{
						echo"<h2>Baris </h2><h4>* Tolong Masukkan Angka !</h4>";
					}
		}
}
/*/////////////////////////////////  CLASS LOGIN DAN REGISTER  ///////////////////////////////////////////*/
class Login{
	public function __construct($usernameLogin,$passwordLogin){
		$this->usernameLogin=$usernameLogin;
		$this->passwordLogin=$passwordLogin;
	}
	function prosesLogin(){
		$query_login=mysql_query("select * from pengguna where username='$usernameLogin' and password='$passwordLogin'");
		$mysql_fetch_query_login=mysql_fetch_array($query_login);
		$full_name=$mysql_fetch_query_login['nama_lengkap'];
		
		if($full_name == ''){
			$_SESSION['id_pengguna'] = $mysql_fetch_query_login['id_pengguna'];
			header('location:admin/formulir.php');
		}else if (mysql_num_rows($query_login)==0) {
    		$msg = 'Email anda tidak valid , coba ulangi lagi !';
			$_SESSION["msg"]=$msg;
			header('location:index.php');
		}elseif (mysql_num_rows($query_login)==1){			
			$_SESSION['id_pengguna'] = $mysql_fetch_query_login['id_pengguna'];
			header('location:admin/index.php?halaman=homemenu');
		}else{
			$msg = 'Email anda tidak valid , coba ulangi lagi !';
			$_SESSION["msg"]=$msg;
			header('location:index.php');
		}
	}
}
?>
<script>
function myFunctions() {
var x = document.getElementById("kolom1").value;
var y = document.getElementById("baris2");
	y.value= + x;
 }

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0; 
}
</script>
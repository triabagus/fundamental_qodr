
	<center><h3>Crud Email</h3></center>
		<div class="control-panel-file">

<?php 

	if(isset($_GET['op'])){
		if($_GET['op'] == 'edit'){
			$id=$_GET['id'];

			$query_baca_emails=mysql_query("SELECT * FROM kirim_email_pengguna WHERE id_email='$id'") or die (mysql_error());
			$bacaemails=mysql_fetch_array($query_baca_emails);
			$id=$bacaemails['id_email'];
			$penerima=$bacaemails['penerima'];
			$cc=$bacaemails['cc'];
			$bcc=$bacaemails['bcc'];
			$pengirim=$bacaemails['pengirim'];
			$judul=$bacaemails['judul'];
			$pesan=$bacaemails['pesan'];
?>
		<form action="" method="POST">
		<input class="input-matrik" type="hidden" name="id"  value="<?php echo $id;?>">
		<p><input class="input-matrik" type="text" name="Penerima" placeholder="Penerima" required="required" value="<?php echo $penerima;?>"><p>
		<p><input class="input-matrik" type="text" name="CC" placeholder="CC" required="required" value="<?php echo $cc;?>"></p>
		<p><input class="input-matrik" type="text" name="BCC" placeholder="BCC" required="required" value="<?php echo $bcc;?>"></p>
		<p><input class="input-matrik" type="text" name="Pengirim" placeholder="Pengirim" required="required" value="<?php echo $pengirim;?>"></p>
		<p><input class="input-matrik" type="text" name="Judul" placeholder="Judul" required="required" value="<?php echo $judul;?>"></p>	
		<p><textarea class="input-matrik-textarea" name="Pesan"><?php echo $pesan;?></textarea></p>	
		<input class="btn-submit green" type="submit" name="submit" value="Edit">
		</form>
<?php
		if(isset($_POST['submit'])){
			$id	=$_POST['id'];
			$Penerima=$_POST['Penerima'];
			$CC	=$_POST['CC'];
			$BCC=$_POST['BCC'];
			$Pengirim=$_POST['Pengirim'];
			$Judul=$_POST['Judul'];
			$Pesan=$_POST['Pesan'];

				$koneksi->EditEmail($id,$Penerima,$CC,$BCC,$Pengirim,$Judul,$Pesan);
			}
		}
	} elseif(empty($_GET['op'])){
		?>
		<form action="" method="POST">		
		<p><input class="input-matrik" type="text" name="Penerima" placeholder="Penerima" required="required"></p>
		<p><input class="input-matrik" type="text" name="BCC" placeholder="BCC" required="required"></p>
		<p><input class="input-matrik" type="text" name="CC" placeholder="CC" required="required"></p>
		<p><input class="input-matrik" type="text" name="Pengirim" placeholder="Pengirim" required="required"></p>
		<p><input class="input-matrik" type="password" name="Password" placeholder="Password" required="required"></p>
		<p><input class="input-matrik" type="text" name="Judul" placeholder="Judul" required="required"></p>	
		<p><textarea class="input-matrik-textarea" name="Pesan"></textarea></p>	
		<input class="btn-submit green" type="submit" name="submit" value="Kirim">
		</form>

		<?php
			if(isset($_POST['submit'])){
			$Penerima=$_POST['Penerima'];
			$CC	=$_POST['CC'];
			$BCC=$_POST['BCC'];
			$Pengirim=$_POST['Pengirim'];
			$Password=$_POST['Password'];
			$Judul=$_POST['Judul'];
			$Pesan=$_POST['Pesan'];

			$header = "CC=$CC\r\n".
					  "BCC=$BCC\r\n".
					  "Pesan=$Pesan\r\n".
					  "From=$Pengirim";
			$koneksi->AddEmail($Penerima,$CC,$BCC,$Pengirim,$Password,$Judul,$Pesan,$header);
			}
	}
		?>
	</div>
	<div class="control-panel-file">
           
		<?php  
			if(isset($_GET['op'])){
				if($_GET['op'] == 'del'){
					$id=$_GET['id'];
					$koneksi->HapusEmail($id);
				}
			}

			$koneksi->TampilEmail();
		?>

	</div>


<script>
	function Mysearch(){
			var input, filter, table, tr, td, i, txtValue;
  			input = document.getElementById("myInput");
  			filter = input.value.toUpperCase();
  			table = document.getElementById("myTable");
  			tr = table.getElementsByTagName("tr");

  			for (i = 0; i < tr.length; i++) {
    			td = tr[i].getElementsByTagName("td")[1];
    			if (td) {
      				txtValue = td.textContent || td.innerText;
      			if (txtValue.toUpperCase().indexOf(filter) > -1) {
       				 tr[i].style.display = "";
     			 } else {
        			tr[i].style.display = "none";
      				}
    			} 
  			}
		}
</script>
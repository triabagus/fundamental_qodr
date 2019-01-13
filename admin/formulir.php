<?php
session_start();
if (empty($_SESSION['id_pengguna'])) {
	header('location:../index.php');
}else{
	include "../koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>T-QODR | Arsip Tugas</title>
	<link href="..\css\style-admin.css" rel="stylesheet" type="text/css">
	<link href="..\css\font-awesome.css" rel="stylesheet" type="text/css">
	<style>
		#regForm {
 			 background-color: #ffffff;
 			 margin: 25px auto;
 			 padding:40px;
 			 width: 70%;
 			 min-width: 300px;
		}
		* {
		  box-sizing: border-box;
		}
		input.invalid {
 			 background-color: #ffdddd;
		}
		.tab {
 			 display:none;
		}
		button {
 			 background-color:#037368;
 			 color: #fff;
 			 font-weight: bold;
 			 font-size:18px;
 			 border: none;
 			 padding: 10px 20px;
 			 cursor: pointer;
		}
		button:hover {
		  opacity: 0.8;
		}
		#prevBtn {
		  background-color: #24292f;
		}
		.step {
  			height: 15px;
  			width: 15px;
  			margin: 0 2px;
  			background-color: #24292f;
  			border: none;  
  			border-radius: 50%;
  			display: inline-block;
  			opacity: 0.5;
		}
		.step.active {
		  opacity: 1;
		}
/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color:#037368;
		}
	</style>
</head>
<body style="background-color: #f1f1f1;">
	<div id="headerformulir">
		<center><h2>Daftar Admin</h2></center>
	</div>
	<div id="content-formulir">
		<?php
			$id_session=$_SESSION['id_pengguna'];
			$query_session_admin=mysql_query("select * from pengguna where id_pengguna='$id_session'");
			$fetch_array_session=mysql_fetch_array($query_session_admin);
		?>
		<form id="regForm" action="proses-formulir.php" method="POST" enctype="multipart/form-data">
			<div class="tab">
				<h2>Hallo ,<span style="color:#ff6b01;"> <?php echo $fetch_array_session['username']; ?></span> . Silahkan menggisikan data ini !</h2>
				<p>
					* Isikan sesuai data pribadi anda , terima kasih
				</p>
			</div>
			<div class="tab"><h2>No Ktp dan Nama Lengkap</h2>
				<p>
					<input class="input-matrik" type="text" name="noktp" placeholder="No KTP" required="required">
				</p>
				<p>
					<input class="input-matrik" type="text" name="fullname" placeholder="Nama Lengkap" required="required">
				</p>
			</div>
			<div class="tab"><h2>Jenis Kelamin</h2>
				<label class="container">Laki laki
					<input type="radio" name="jk" value="l" required="required">
				 	<span class="checkmark"></span> 
				</label>
				<label class="container">Perempuan
					<input type="radio" name="jk" value="p" required="required">
				 	<span class="checkmark"></span>
				</label>
			</div>
			<div class="tab"><h2>Info Kelahiran</h2>
				<p>
					<input class="input-matrik" type="text" name="tmplahir" placeholder="Tempat Lahir" required="required">
				</p>
				<p>
					<input class="input-matrik" type="date" name="datelahir" required="required">
				</p>
			</div>
			<div class="tab"><h2>Info Status</h2>	
				<p><select class="input-matrik" name="status">
					<option value="lajang">Lajang</option>
					<option value="pacaran">Pacaran</option>
					<option value="tunangan">Tunangan</option>
					<option value="menikah">Menikah</option>
					<option value="hts">Hubungan Tanpa Status</option>
					<option value="cerai">Cerai</option>
					<option value="jd">Janda atau Duda</option>
				</select></p>
			</div>
			<div class="tab"><h2>Info Kontak</h2>
				<p>
					<input class="input-matrik" type="text" name="notelp" placeholder="No Telepon" required="required">
				</p>
				<p>
					<input class="input-matrik" type="text" name="alamat" placeholder="Alamat" required="required">
				</p>			
			</div>
			<div class="tab">
				<label style="font-weight: bold;"><h2>Foto</h2>
					<img src="../img/icon/no_image.png" style="border-radius: 50%;width:150px;height:150px;"> * File foto harus bertipe jpg , jpeg , png 
					<input class="input-matrik" type="file" name="nama_file" required="required">
				</label>
			</div>
			  <div style="overflow:auto;">
    			<div style="float:right;">
    			  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Sebelummya</button>
    			  <button type="button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
    			</div>
  			 </div>
  			 <div style="text-align:center;margin-top:40px;">
    			<span class="step"></span>
    			<span class="step"></span>
    			<span class="step"></span>
    			<span class="step"></span>
  				<span class="step"></span>
  				<span class="step"></span>
  				<span class="step"></span>
  				<span class="step"></span>
  			</div>
		</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab
function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Daftar";
  } else {
    document.getElementById("nextBtn").innerHTML = "Selanjutnya";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
	</div>
</body>
</html>
<?php } ?>
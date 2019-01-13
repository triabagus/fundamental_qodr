<?php
session_start();
if (empty($_SESSION['id_pengguna'])) {
	header('location:../index.php');
}else{
include"../koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="..\css\style-admin.css" rel="stylesheet" type="text/css">
	<link href="..\css\font-awesome.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include"menu.php";?>
<div id="content-main">
<?php include"content.php";?>
<div id="content-matrik">
<div class="header-sub-content-profile">	
<div class='header-profile'>
	<div class="content-header-profile"><a id="myBtns" href="#">Setting <i class="	fa fa-sort-down"></i></a></div>
</div>
	<?php
		$koneksi->profilPengguna();
	?>				
</div>
</div>

<div id="myModalEditProfile" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>

</div>
<script>
// Get the modal
var modal = document.getElementById('myModalEditProfile');

// Get the button that opens the modal
var btn = document.getElementById("myBtns");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
<?php } ?>


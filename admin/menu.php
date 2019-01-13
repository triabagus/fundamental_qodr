<div id="menu-bar-left">
	<div class="place-judul">
		
	</div>
	<?php
	/*$koneksi->tampilMenu();☰*/
	?>
</div>
<div id="main">
	<div id="top-menu">	
	<a href="index.php?halaman=homemenu" class="openbtn" > <i class="fa fa-home"></i> </a>
	<div style="float:left;">
		<form >
		<input class="search" type="text" name="search" placeholder="Search ...">
		<button class="btnsearch" type="submit" name="cari"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="dropdown">
	<button style="font-size:30px;" class="dropbtn"><i class="fa fa-user"></i> </button>
		<div class="dropdown-content" style="right:0;">
		<span style="background-color:#3c6382;color:#3c6382;">................................................</span>
		<a href="profil.php"><i class="fa fa-lock"></i> Profil</a>
		<?php
		$koneksi->tampilMenuPengaturan();
		?>
		<a onclick="return confirm('Apakah anda ingin keluar ?');" href="..\logout.php"><i class="fa fa-sign-out"></i> Keluar</a>
		</div>
	</div>
	</div> 
</div>
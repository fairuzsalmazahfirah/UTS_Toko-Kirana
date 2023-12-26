<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['role']!="stock"){
		header("location:../index.php?pesan=belum_login");
		exit();
	}
	// if($_SESSION['level']=="Karyawan"){
	// 	header("location:indexK.php");
	// 	exit();
	// }
	// if($_SESSION['level']=="Manager"){
	// 	header("location:index.php");
	// }
	?>
<?php
session_start();
include 'dbconnect.php';
// include 'controllerUserData.php';

if(isset($_SESSION['role'])){
	header("location:stock");
}

if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Email atau Password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda berhasil keluar dari sistem";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus Login";
		}else if($_GET['pesan'] == "noaccess"){
			echo "Akses Ditutup";
	}
}


if(isset($_POST['btn-login']))
{
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $password = mysqli_real_escape_string($conn,$_POST['password']	);

 // menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from slogin where email='$email' and password='$password';");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
 if($data['role']=="stock"){
		// buat session login dan username
		$_SESSION['user'] = $data['nickname'];
		$_SESSION['user_login'] = $data['username'];
		$_SESSION['level'] = $data['level'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['role'] = "stock";
		header("location:stock");

 }
 else
 {
  header("location:index.php?pesan=gagal");

 }
 if($data['level']=="Manager"){
	$_SESSION['user'] = $data['nickname'];
	$_SESSION['user_login'] = $data['username'];
	$_SESSION['level'] = $data['level'];
	$_SESSION['id'] = $data['id'];
	$_SESSION['role'] = "stock";
	header("location:stockm");
}else{
	$_SESSION['user'] = $data['nickname'];
	$_SESSION['user_login'] = $data['username'];
	$_SESSION['level'] = $data['level'];
	$_SESSION['id'] = $data['id'];
	$_SESSION['role'] = "stock";
 }
 
}

}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Stok</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <script src="jquery.min.js"></script>
	<style>
		body{
			background:#F0E68C;
		}
	</style>
	<link rel="icon" 
      type="image/png" 
      href="favicon.png">
  </head>
  <body>
  <div class="container-fluid vh-100 overflow-auto">
            <div class="row vh-100 ">
                <div class="col-lg-6 bg-gray p-5 text-center" style="background-image: url(bg-green.jpg); height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;">
                </div>
                <div class="col-lg-6 p vh-100">
                   <div class="row d-flex vh-100">
                       <div class="col-md-8 p-4 ikigui m-auto text-center align-items-center">
                           <h4 class="text-center fw-bolder mb-4 fs-2">Login</h4>
						   <h1 class="text-center fw-bolder mb-4 fs-1">Toko Kirana</h1>
						   <form method="POST">
							<div class="form-group">
								<input type="email" class="form-control ps-2 border-start-0 fs-7 inbg form-control-lg mb-0" placeholder="Email" name="email" autofocus>
							</div>
							<div class="form-group">
								<input type="password" class="form-control ps-2 fs-7 border-start-0 form-control-lg inbg mb-0" placeholder="Password" name="password">
							</div>
							<button type="submit" class="btn btn-lg fw-bold fs-7 btn-success  w-100" name="btn-login">Masuk</button>
							</form>
							<a href="forgot-password.php">Forgot Password?</a>
                       </div>
                   </div>
                    
                </div>
            </div>
        </div>
  
	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php 
include '../dbconnect.php';
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$nickname=$_POST['nickname'];
$level=$_POST['level'];
	  
// $query = mysqli_query($conn,"insert into sstock_brg values('','$email','$username','$password','$level')");
$query = mysqli_query($conn,"insert into slogin values(0,'$email','$username','$password', 0,'$nickname','$level', '', 'verified')");
if ($query){

echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= addkaryawan.php'/>  ";
} else { echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= addkaryawan.php'/> ";
}
 
?>
 
  <html>
<head>
  <title>Add Employe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
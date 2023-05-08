<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

</head>
<body>
<?php
//session start()
session_start();

//connection
include('connect.php');


$_SESSION['status']="Active";

//input
$username = mysqli_real_escape_string($con,$_POST['txtuser']);
 $pw = mysqli_real_escape_string($con,$_POST['txtpword1']); 
 
$usernamerc = mysqli_real_escape_string($con,$_POST['txtuser']);
$passw= mysqli_real_escape_string($con,$_POST['txtpword1']);

//Query
$query ="Select * FROM  tbadmin where username='$username'   AND password='$pw'";
$result = mysqli_query($con,$query);
$num = mysqli_num_rows($result);

$query1 ="Select * FROM  tbcustomer where cusername='$usernamerc'   AND cpassword='$passw'";
$result1 = mysqli_query($con,$query1);
$num1 = mysqli_num_rows($result1);

//correct
	if ($num>0){
			//session variables
			$_SESSION['txtuser']=$username;
			$_SESSION['txtpword1']=$pw;
	   header('location:AdminHomepage.php');
	   
}else if($num1 > 0) {
	session_start();
		$_SESSION['txtuser']=$usernamerc;
		$_SESSION['txtpword1']=$passw;
		header("location:customerhomepage.php");
		
}else

echo '<script type="text/javascript">';
echo 'Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "YOUR USERNAME OR PASSWORD WRONG!",
    footer: "<a href=\"login.html\"></a>"
  }).then(function() {
      window.location.href = "login.html";
  });';
echo '</script>';








?>

</body>
</html>
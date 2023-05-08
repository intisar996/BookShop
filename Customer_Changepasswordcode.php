<?php

session_start();
$username= $_SESSION['txtuser'];
include ("connect.php");
$qryname = "select * from  tbcustomer where cusername='$username'  ";
{
  header("location:login.html");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
</head>
	<?php
	session_start();
?>

<body>
<?php
 

 $usernamerc = $_SESSION['txtuser'];
	
 include ("connect.php");
 $opwd = $_POST['opwd'];
 $npwd = $_POST['npwd'];
 $nrpwd = $_POST['nrpwd'];
 
 $query1 = "select * from   tbcustomer where cusername= '$usernamerc'";
 $result1 = mysqli_query($con,$query1);
  while($row = mysqli_fetch_assoc($result1)) {
 $password=$row["cpassword"];
 }
         
 if($password == $opwd){
         
     
     $query1 = "update tbcustomer set  cpassword='$npwd' where  cusername='$usernamerc'";
     mysqli_query($con,$query1);
 

 
 echo '<script type="text/javascript">';
 echo 'Swal.fire({
     icon: "success",
     title: "Success!",
     text: "Your password has been updated.",
     footer: "<a href=\"logout.php\"></a>"
   }).then(function() {
       window.location.href = "logout.php";
   });';
 echo '</script>';


} 

else {
 echo '<script type="text/javascript">';
 echo 'Swal.fire({
     icon: "error",
     title: "Oops...",
     text: "Something went wrong and your password could not be updated.",
     footer: "<a href=\"ChangePW_Customer.php\"></a>"
   }).then(function() {
       window.location.href = "ChangePW_Customer.php";
   });';
 echo '</script>';
}
















?>

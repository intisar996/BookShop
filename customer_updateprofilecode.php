<?php
session_start();
include ("connect.php");

$username = $_SESSION['txtuser'];
$qryname = "SELECT * FROM tbcustomer WHERE cusername='$username'";
$result = mysqli_query($con, $qryname);

if (mysqli_num_rows($result) == 0) {
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


<body>
<?php
 
 include('connect.php');

 
$usernamerc=$_GET["cusername"];


$cname=$_POST["cname"];
$cemailr=$_POST["cemail"];
$cphoner=$_POST["cphone"];
$caddressr=$_POST["caddress"];

include("connect.php");


$query1= "update  tbcustomer set cname='$cname',cemail='$cemailr',cphone='$cphoner',caddress='$caddressr' where cusername='$usernamerc';";
mysqli_query($con,$query1);

echo '<script type="text/javascript">';
echo 'Swal.fire({
    icon: "success",
    title: "Success!",
    text: "Your Profile has been Updated.",
    footer: "<a href=\"Customer_Profile.php\"></a>"
  }).then(function() {
      window.location.href = "Customer_Profile.php";
  });';
echo '</script>';

?>

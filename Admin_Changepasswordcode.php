<?php
session_start();
include ("connect.php");

$username = $_SESSION['txtuser'];
$qryname = "SELECT *  from  tbadmin where username='$username' ";
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
 
 $username = $_SESSION['txtuser'];
 
 include ("connect.php");
 $opwd = $_POST['opwd'];
 $npwd = $_POST['npwd'];
 $nrpwd = $_POST['nrpwd'];
 
 $query1 = "select * from   tbadmin where username= '$username'";
 $result1 = mysqli_query($con,$query1);
  while($row = mysqli_fetch_assoc($result1)) {
 $password=$row["password"];
 }
         
 if($password == $opwd){
         
     
     $query1 = "update tbadmin set  password='$npwd' where  username='$username'";
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
            footer: "<a href=\"ChangePW_Admin.php\"></a>"
          }).then(function() {
              window.location.href = "ChangePW_Admin.php";
          });';
        echo '</script>';
    }
    ?>
 
 
         
 
     










?>

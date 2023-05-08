
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
 
 session_start();
 $username=$_GET["username"];
 $npwd = $_POST['npwd'];
 $_SESSION['txtuser'] = $username;

 
 include ("connect.php");	
 $query1 = "update tbadmin set password='$npwd' where username ='$username'";
 mysqli_query($con,$query1);      
     
        echo '<script type="text/javascript">';
        echo 'Swal.fire({
            icon: "success",
            title: "Success!",
            text: "Your password has been successfully changed",
            footer: "<a href=\"login.html\"></a>"
          }).then(function() {
              window.location.href = "login.html";
          });';
        echo '</script>';



    ?>
 
 
         
 
     










?>

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
$mans=$_POST["ans"];
$username=$_GET["username"];

include ("connect.php");
$query = "select * from  tbadmin where username='$username'";
$result = mysqli_query($con,$query);
 while($row = mysqli_fetch_assoc($result)) {

$anss=$row["answer"];
$sq=$row["seq"];
}

if ($mans==$anss)
    header("Location: NewPwd_Admin.php?username=$username");
    
    else{
echo '<script type="text/javascript">';
echo 'Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "The Answer is invalid. Please try again!",
    footer: "<a href=\"ForgetPassword_User.php\"></a>"
  }).then(function() {
      window.location.href = "ForgetPassword_User.php?username='. $username.'";
  });';
echo '</script>';
}







?>

</body>
</html>
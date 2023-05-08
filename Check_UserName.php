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
include ("connect.php");

//input data 
$username = ($_POST['txtuser']);
 

//serching for details 


$query ="Select * FROM  tbadmin where username='$username' ";
$result = mysqli_query($con,$query);
$count = mysqli_num_rows($result);

$query1 ="Select * FROM  tbcustomer where cusername='$username'";
$result1 = mysqli_query($con,$query1);
$count1 = mysqli_num_rows($result1);

 while($row = mysqli_fetch_assoc($result)) {
 }


if ($count>0)
{
session_start();
$adddname =$row["username"];
$_SESSION['username'] = $adddname;
header ("location:ForgetPassword_User.php?username=$username");
} elseif ($count1>0)
{
session_start();
$adddname =$row["username"];
$_SESSION['cusername'] = $adddname;
header ("location:ForgetPasswords_User.php?cusername=$username");}


else{


echo '<script type="text/javascript">';
echo 'Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "The username is invalid. Please try again!",
    footer: "<a href=\"Forget_Password.php\"></a>"
  }).then(function() {
      window.location.href = "Forget_Password.php";
  });';
echo '</script>';
}







?>

</body>
</html>
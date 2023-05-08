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
<strong>
<?php

include ("connect.php");
 $bill_no=$_GET['bill_no'];
 
$status_bill="Close";
 
 $xquery = "update  tblbill  set status_bill='$status_bill' where bill_no='$bill_no' ";

   $result = mysqli_query($con,$xquery);

    echo '<script type="text/javascript">';
    echo 'Swal.fire({
        icon: "success",
        title: "Success!",
        text: "This order was successfully added to the  delivery order.",
        footer: "<a href=\"adminviewdelvery.php\"></a>"
      }).then(function() {
          window.location.href = "adminviewdelvery.php";
      });';
    echo '</script>';



?>


</strong>


</body>

</html>

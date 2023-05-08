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
<strong>
<?php

include ("connect.php");
 $bill_no=$_GET['bill_no'];
 
$status_bill="In Delivery";
 
 $xquery = "update  tblbill  set status_bill='$status_bill' where bill_no='$bill_no' ";

   $result = mysqli_query($con,$xquery);

    echo '<script type="text/javascript">';
    echo 'Swal.fire({
        icon: "success",
        title: "Success!",
        text: "This order was successfully added to the  delivery order.",
        footer: "<a href=\"adminvieworder.php\"></a>"
      }).then(function() {
          window.location.href = "adminvieworder.php";
      });';
    echo '</script>';



?>


</strong>


</body>

</html>

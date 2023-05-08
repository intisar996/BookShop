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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
</head>
<body>
    

<?php 


error_reporting(0);

include ("connect.php");
$username=$_SESSION['txtuser'];
$total=$_GET['total'];
$card_name=$_POST['card_name'];
$date=$_POST['date'];
$date=$_POST['date'];
$total=$_POST['total'];
$bid =$_GET["book_id"];
$qty =$_GET["Quantity"];
$quantity =$_GET["quantity"];

$OrderDate =date("Y-m-d");

$bill_no=rand(1000000,90000);

$status_bill='Processing';

$query = "insert into tblbill(bill_no,cusername,Total_price,card_name,Expire_Date,OrderDate,status_bill) values('$bill_no','$username','$total','$card_name','$date','$OrderDate','$status_bill')";
mysqli_query($con,$query) or die ("Error in the query: $query".mysqli_error($con));


 $sql = "UPDATE tblcart SET bill_no='$bill_no'  where  username='$username' and bill_no=0";
 mysqli_query($con,$sql);

 $new_quantity =$quantity - $qty; 

 $sqls = "UPDATE tblbbook SET Quantity='$new_quantity' where  book_id='$bid'";
 mysqli_query($con,$sqls);

// use javascript to show Message by using [alert] + move to other page by [window.location.replace]
echo " <script>";
echo " alert(' successfully Place Order');";
echo"window.location.replace('Bill.php')";
echo " </script>";


?>

</body>
</html>
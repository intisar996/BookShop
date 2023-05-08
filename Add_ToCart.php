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
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

</head>
<body>
<?php 

error_reporting(0);

include ("connect.php");
$username=$_SESSION['txtuser'];
$book_id=$_GET['book_id'];


$query = mysqli_query($con, "SELECT * FROM tblbbook where book_id='$book_id'");
while($row = mysqli_fetch_assoc($query)){
  $book_id = $row['book_id'];
  $quantity = $row['quantity'];
  $book_price = $row['book_price'];
  
  $bill_no=0;
  

$qtys=$_POST['qtys'];
$Total=  $qtys * $book_price;

if($quantity < $qtys) {
 echo '<script type="text/javascript">';
echo 'Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "only .'.$quantity.'. Available in stock!",
    footer: "<a href=\"more.php\"></a>"
  }).then(function() {
      window.location.href = "more.php?book_id='.$book_id.'";
  });';
echo '</script>';

}else {


$query = "insert into tblcart(username,book_id,Quantity,price,Total,bill_no) values('$username','$book_id','$qtys','$book_price','$Total','$bill_no')";
mysqli_query($con,$query) or die ("Error in the query: $query".mysqli_error($con));

echo '<script type="text/javascript">';
echo 'Swal.fire({
        icon: "success",
        title: "Success!",
        text: "Added to cart successfully.",
        footer: "<a href=\"cart.php\"></a>"
      }).then(function() {
          window.location.href = "cart.php";
      });';
echo '</script>';

}
}

?>

<body>
    
</html>
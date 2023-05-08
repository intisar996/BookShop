
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

include ("connect.php");
$cart_id=$_GET['cart_id'];
$query = "DELETE FROM tblcart WHERE cart_id='$cart_id' " ;
$r=mysqli_query($con,$query);


if($r) {
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: 'Item deleted successfully.',
      showConfirmButton: false,
      timer: 1500
    }).then(function() {
        window.location.href = 'cart.php';
    });
    </script>";
  }
  else {
    echo "<script>
    Swal.fire({
      icon: 'error',
      title: 'Error!',
      text: 'Failed to delete item.',
      showConfirmButton: false,
      timer: 1500
    }).then(function() {
        window.location.href = 'cart.php';
    });
    </script>";
  }
  

?>

</body>
</html>
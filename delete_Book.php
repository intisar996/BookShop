

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
include("connect.php");

$book_id = $_GET['book_id'];

// Check if the book is in the cart
$query = "SELECT * FROM tblcart WHERE book_id = $book_id";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Book is in the cart, update the Delete_B column
    $query = "UPDATE tblbbook SET Delete_B = '1' WHERE book_id = $book_id";
    $r = mysqli_query($con, $query);

    if ($r) {
        // Show SweetAlert success message
        echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Item deleted successfully.',
          showConfirmButton: false,
          timer: 1500
        }).then(function() {
            window.location.href = 'viewbook.php';
        });
        </script>";
    }

} else {
    // Book is not in the cart, delete it from the tblbbook table
    $query = "DELETE FROM tblbbook WHERE book_id = $book_id AND book_id NOT IN (SELECT book_id FROM tblcart)";
    $r =mysqli_query($con, $query);

    if ($r) {
        // Show SweetAlert success message
        echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Item deleted successfully.',
          showConfirmButton: false,
          timer: 1500
        }).then(function() {
            window.location.href = 'viewbook.php';
        });
        </script>";
    }
}
?>

</body>
</html>
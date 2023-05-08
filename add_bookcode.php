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
	$username= $_SESSION['txtuser'];
	include ("connect.php");
	$qryname = "select * from  tbadmin where username='$username' ";
	$result1 = mysqli_query($con,$qryname);
	while($rows = mysqli_fetch_assoc($result1)) 
	{ $aid=$rows['aid'];
     
include('connect.php');
$book_name  =$_POST['book_name'];
$book_price =$_POST['book_price'];
$book_type  =$_POST['book_type'];
$img=$_FILES['pic']['name'];
$datepp=$_POST['datepp'];
$quantity=$_POST['quantity'];
$book_desc=$_POST['book_desc'];
$book_writer=$_POST['book_writer'];
$language=$_POST['language'];
$Delete_B=0;


$xquery = "INSERT INTO  tblbbook  (book_name,book_price,book_type,image,date_post,quantity,book_desc,book_writer,language,Delete_B,aid) VALUES ('$book_name','$book_price','$book_type','$img','$datepp','$quantity','$book_desc','$book_writer','$language','$Delete_B','$aid')";

$result = mysqli_query($con,$xquery);

move_uploaded_file($_FILES["pic"]["tmp_name"],"image/".$_FILES["pic"]["name"]);

    }
    echo '<script type="text/javascript">';
    echo 'Swal.fire({
        icon: "success",
        title: "Success!",
        text: "Your Book  has been created.",
        footer: "<a href=\"addbook.php\"></a>"
      }).then(function() {
          window.location.href = "addbook.php";
      });';
    echo '</script>';









?>


</strong>


</body>

</html>

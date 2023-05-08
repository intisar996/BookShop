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
 include('connect.php');
    

     $username= $_SESSION['txtuser'];
include ("connect.php");
$qryname = "select * from  tbadmin where username='$username' ";
$result = mysqli_query($con,$qryname);
while($rows = mysqli_fetch_assoc($result)) 
{ 
$aid=$rows['aid'];




$book_id=$_GET['book_id'];


$book_namer=$_POST["book_name"];
$book_pricer=$_POST["book_price"];
$book_typer=$_POST["book_type"];
$img=$_POST["pic"];
$datepp=$_POST['datepp'];
$quantityr=$_POST["quantity"];
$book_descr=$_POST["book_desc"];
$book_writerr=$_POST["book_writer"];
$languager=$_POST["language"];




include("connect.php");

if($img != "")
{
$query= "update  tblbbook set book_name='$book_namer',book_price='$book_pricer',book_type='$book_typer',image='$img',date_post='$datepp',quantity='$quantityr',book_desc='$book_descr',book_writer='$book_writerr',language='$languager' where book_id='$book_id'";
mysqli_query($con,$query);
} else {

$query2= "update  tblbbook set book_name='$book_namer',book_price='$book_pricer',book_type='$book_typer',date_post='$datepp',quantity='$quantityr',book_desc='$book_descr',book_writer='$book_writerr',language='$languager' where book_id='$book_id'";mysqli_query($con,$query2);

}}

    echo '<script type="text/javascript">';
    echo 'Swal.fire({
        icon: "success",
        title: "Success!",
        text: "Your Book  has been Updated.",
        footer: "<a href=\"more_Des.php\"></a>"
      }).then(function() {
          window.location.href = "more_Des.php?book_id='.$book_id.'";
      });';
    echo '</script>';









?>


</strong>


</body>

</html>

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
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>ONLINE SHOPPING BOOK</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content=""> 
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" type="text/css" href="css/normalize.css">
<!-- Animation Using AOS-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">
</head>
<style>
        .pagination{
  display: flex;
  justify-content: center;
  align-items: center;
}
.pagination li{
width: 50px;
background-color: burlywood;
text-align: center;
border-radius: 10px;
margin-right: 9px;
font-size: 20px;
font-weight: 900;
font-family: -webkit-body;
}
.Admin_padding{
  padding-top: 200px;

}
 .row {
    justify-content: center;
  }

</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light nav-bg fixed-top">
    <div class="logo"><a href="home.html"><h1>BOOKS SHOP</h1></a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link active" href="AdminHomepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewbook.php">Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"></a>
        </li>
       
       
        <?php
	$username= $_SESSION['txtuser'];
	include ("connect.php");
	$qryname = "select * from  tbadmin where username='$username' ";
	$result = mysqli_query($con,$qryname);
	while($rows = mysqli_fetch_assoc($result)) 
	{ $namee=$rows['aname'];
	
}
	?> 
<div class="dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="image/profile-user.png" height="35px" width="35px">
    <span class="text-black" style="font-size:20px"><?php echo $namee. "!"; ?></span>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="Admin_Profile.php">Profile</a>
    <a class="dropdown-item" href="ChangePW_Admin.php">Change Password</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
      </ul>
    </div>
 
  </nav>
  
  <div class="Admin_padding"></div>


  
  <form method="Post" class="flitter" action="Flitter_Customer.php">
      <div class="form-row">
    <div class="form-group">
      <label for="CustomerName">Name</label>
      <input type="text" class="form-control" id="CustomerName" name="CustomerName">
    </div>
    <div class="form-group">
      <label for="CustomerPhone">Phone</label>
      <input type="text" class="form-control" id="CustomerPhone" name="CustomerPhone">
    </div>
    <div class="form-group">
      <label for="CustomerAddress">Address</label>
      <input type="text" class="form-control" id="CustomerAddress" name="CustomerAddress">
    </div>
    <div class="form-group">
      <label for="CustomerEmail">Email</label>
      <input type="email" class="form-control" id="CustomerEmail" name="CustomerEmail">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Filter</button>
  <a href="Viewcustomer.php"  class="btn btn-danger">Clear</a>
</form>
  <div class="container">


<div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <div class="table-responsive">
<?php
include('connect.php');
$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
$records_per_page = 16;
$offset = ($pageno - 1) * $records_per_page;

$query_count = "SELECT COUNT(*) AS total FROM tbcustomer";
$result_count = mysqli_query($con, $query_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_records = $row_count['total'];
$total_pages = ceil($total_records / $records_per_page);

$q="select * from  tbcustomer  order by cname LIMIT $offset, $records_per_page";

$r=mysqli_query($con,$q);
$num=mysqli_num_rows($r);
	if ($num > 0){

$i=0;
echo "<br>";
		echo "<table  id='productSizes' class='table' border='1'  style='width:100%;' align=center  cellspacing=2>";
	echo "<tr>";
	echo "<br>";
	echo "<tr bgcolor='#D57E7E'> ";

		echo "<td   width=100 align=center  colspan=9><font color='#ffffff' > <h2>CUSTOMER LIST</h2></font></td>";
	echo"</tr>";

echo"<th >  CUSTOMER NAME";
echo"<th > CUSTOMER EMAIL";
echo"<th>  MOBILE NUMBER";
echo"<th > CUSTOMER USERNAME";
echo"<th> CUSTOMER ADDRESS";


echo"<tr>";
while($row = mysqli_fetch_assoc($r)) {
$cname=$row["cname"];
$email=$row["cemail"];
$phone=$row["cphone"];
$cusernamerc=$row["cusername"];
$caddress=$row["caddress"];
$cid=$row["cid"];




echo"<tr >";
echo"<td >$cname";
echo"<td >$email";
echo"<td >$phone";
echo"<td >$cusernamerc";
echo"<td >$caddress";






echo"</tr>";

$i++;


}

echo"</table><br>";
}
else{
	echo "<center>No Customer Yet! <br>";
	echo "Click <a href='AdminHomepage.php'>here</a> To Back !</a></center>";
}
?>

<br/><br/><br/>



</div>
</div>
</div>
</div>

<ul class="pagination">
    <?php if($pageno > 1): ?>
        <li>
            <a href="?pageno=<?php echo $pageno - 1; ?>">Prev</a>
        </li>
    <?php endif; ?>
    
    <?php for($i = 1; $i <= $total_pages; $i++): ?>
        <li class="<?php if($pageno == $i) echo 'active'; ?>">
            <a href="?pageno=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
    <?php endfor; ?>
    
    <?php if($pageno < $total_pages): ?>
        <li>
            <a href="?pageno=<?php echo $pageno + 1; ?>">Next</a>
        </li>
    <?php endif; ?>
</ul>

<div class="total">
    Page <?php echo $pageno; ?> of <?php echo $total_pages; ?>
</div>
</div>





   





    <!--footer section  -->
    <div class="footer_section layout_padding">
      <div class="container">
        <div class="row">
        </div>
        <!-- copyright section start -->
        <div class="copyright_section">
          <div class="copyright_text" align="center">Copyright 2023 All Right Reserved By <a href="Home.html">Online Book Library</a></div>
        </div>
        <!-- copyright section end -->
      </div>
    </div>
    
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <!-- sidebar -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

</body>
</html>
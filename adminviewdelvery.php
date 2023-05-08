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
     .table-responsive {
    margin-bottom: 20px;
  }
  
  .credit-card-form {
    background-color: #f5f5f5;
    padding: 20px;
  }
  
  .credit-card-form label {
    font-weight: bold;
  }
  
  .credit-inputs {
    width: 100%;
    margin-bottom: 10px;
  }
  .row {
    justify-content: center;
  }

  @media only screen and (max-width: 768px) {
    .credit-card-form {
      margin-top: 20px;
    }
  }
  .Admin_padding{
  padding-top: 200px;
  }
</style>
<body>

     <!--header section start -->
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

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <div class="table-responsive">
	  
 <?php
	
	include ("connect.php");
	
	
	$query1 = "select * from tblbill where   status_bill='In Delivery' ";
    $result1 = mysqli_query($con,$query1);
	$num = mysqli_num_rows($result1);
	if ($num > 0){
	$i = 0;
	echo "<table  id='productSizes' class='table' border='1'  style='width:100%;border:1px' align=center  cellspacing=2>";
	echo "<tr class='d-flex'>";
	echo "<br>";
	echo "<tr class=table-danger> ";
	echo "<td  width=100 align=center  colspan=8> <h1>Customer Orders</h1></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<br>";
	echo "<th  class='col-1'><font face =arial size =2>Bill No";
	echo "<th  class='col-3' ><font face =arial size =2>Customer User Name";	
	echo "<th  class='col-3' ><font face =arial size =2>ORDER DATE";
		echo "<th class='col-3' ><font face =arial size =2>TOTAL";
	 echo "<th class='col-5' ><font face =arial size =2>PAYMENT STATUS";

		echo "<th  colspan='2'  class='col-5'><font face =arial size =2>OPTIONS";
     while($row = mysqli_fetch_assoc($result1)) {
		$bill_no =$row["bill_no"];
		$username =$row["cusername"];
		$OrderDate =$row["OrderDate"];
		$Total_price =$row["Total_price"];
		$status_bill =$row["status_bill"];
		
		echo "<tr>";
		echo "<td align=center><font face =arial size =2>$bill_no";
		echo "<td align=center><font face =arial size =2>$username";
		echo "<td align=center><font face =arial size =2>$OrderDate";
	    echo"<td align=center><font face =arial size =2> $Total_price";
	    echo"<td align=center><font face =arial size =2> $status_bill";

		echo "<td align=center><a href='Admin_ListBill.php?bill_no=$bill_no&&cusername=$username'><font face =arial size =2 color=red>VIEW BILL</a><br>";
		echo "<td align=center><a href='Close.php?bill_no=$bill_no&&cusername=$username'><font face =arial size =2 color=red>Close</a><br>";

		$i++;
		}
 		echo  "</table>";
}
else{
	echo "<center>No Transaction yet! <br>";
	echo "Click <a href='customerHomepage.php'>here</a> to order Product!</a></center>";
}


?>
		</span>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
   </form>
   <br />
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
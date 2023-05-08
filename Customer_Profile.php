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

.product {
  margin-top: 100px;
}
.dropdown {
  margin-left: 390px;
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
          <a class="nav-link active" href="customerhomepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allBook.php">All Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Bill.php">Bill</a>
        </li>
       
        <?php
	$usernamerc= $_SESSION['txtuser'];
	include ("connect.php");
	$qryname = "select * from  tbcustomer where cusername='$usernamerc'  ";
	$result = mysqli_query($con,$qryname);
	while($rows = mysqli_fetch_assoc($result)) 
	{ $namee=$rows['cname'];
	
}
	?> 
<div class="dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="image/profile-user.png" height="35px" width="35px">
    <span class="text-black" style="font-size:20px"><?php echo $namee. "!"; ?></span>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="Customer_Profile.php">Profile</a>
    <a class="dropdown-item" href="ChangePW_Customer.php">Change Password</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
      </ul>
    </div>
 
  </nav>
  <?php

include("connect.php");

$query = "select * from tbcustomer where cusername='$usernamerc'";
$result= mysqli_query($con,$query);
$num = mysqli_num_rows($result);
 while($row = mysqli_fetch_assoc($result)) {

$cemailr=$row["cemail"];
$cphoner=$row["cphone"];
$caddressr=$row["caddress"];
$cname=$row["cname"];
}

?>
  
  
  <div class="demo-container">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
              <div class="text-center image-size-small position-relative">
              <img src="image/user.png" class="rounded-circle p-2 bg-white">
              </div>
              <div class="p-5 bg-white rounded shadow-lg">
                <h3 class="mb-2 text-center pt-5">Profile</h3>
                <form id="form2" name="form2" method="post" action="<?php echo"customer_updateprofilecode.php?cusername=$usernamerc" ;?>" onsubmit="return validate(this);">
                <label class="font-500">User Name</label>
                <input name="cusername"  id ="cusername" class="form-control form-control-lg mb-3" value="<?php echo "$usernamerc"; ?>" type="text" readonly>
                 <label class="font-500">Name</label>
                  <input name="cname" class="form-control form-control-lg mb-3" value="<?php echo "$cname"; ?>" placeholder="Enter Your Name" type="text" required>			
                <label class="font-500">Email</label>
                  <input name="cemail" value="<?php echo "$cemailr"; ?>" class="form-control form-control-lg mb-3" placeholder="Enter Your Email" type="email" required>
                <label class="font-500">Phone Number</label>
                  <input name="cphone" value="<?php echo "$cphoner"; ?>" class="form-control form-control-lg mb-3" placeholder="Enter Your Phone" type="text" required>
                <label class="font-500">Address</label>
                  <input name="caddress" value="<?php echo "$caddressr"; ?>" class="form-control form-control-lg mb-3" placeholder="Enter Your Address" type="text" required>
              
                  <p class="m-0 py-4"><a href="" class="text-muted"></a></p>
                  <button class="btn btn-primary btn-lg w-100 shadow-lg" type="submit" value="submit">Save</button>
                </form>
               <div class="text-center pt-4">
              </div>          
              </div>        
            </div>
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
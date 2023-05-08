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

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

</head>
<style>
  
</style>
<body>
  <!--header section start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="logo"><a href="home.html"><h1>BOOKS SHOP</h1></a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link active" href="home.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="our_product.php">Our Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.html">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Register.html">Sign Up</a>
        </li>
      </ul>
    </div>
  </nav>
    <div class="header_section  parallax">
      <div class="header_left">
        <div class="banner_main">
          <h1 class="banner_taital"><br>WELCOME TO  <br> BOOKS SHOP</h1>
          <p class="banner_text">Today a reader, tomorrow a leader </p>
          <div class="btn_main">
          <div class="more_bt"><a href="Register.html">Register </a></div>
            <div class="contact_bt"><a href="Contact.html">Contact Us</a></div>
          </div>
        </div>
      </div>
      <div class="header_right first_img" >
        <img src="image/header.png">
          <img src="image/header2.png" alt="image2">
       </div>
      </div>
    </div>
    
    <!--header section end -->

    <!--Login section start -->
           
 <?php
include('connect.php');
$username=$_GET['username'];
$q="select * from  tbadmin where username='$username'";
$result = mysqli_query($con,$q);
while($row = mysqli_fetch_assoc($result)) {

$sq=$row["seq"];

}


?>

  

    <div class="demo-container">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
              <div class="text-center image-size-small position-relative">
              <img src="image/forget.png" class="rounded-circle p-2 bg-white">
              </div>
              <div class="p-5 bg-white rounded shadow-lg">
                <h3 class="mb-2 text-center pt-5">Forget Password</h3>
                <form   method="post"  action="<?php echo "CheckAdmin_Answer.php?username=$username";?>" id="form2"   name="form2"  onsubmit="return validate(this);"  enctype="multipart/form-data"  >                
                 <label class="font-500">Security Question</label>
                  <input name="txtuser" class="form-control form-control-lg mb-3" value="<?php echo $sq ?>" type="text" readonly>
                <label class="font-500">Answer</label>
                  <input name="ans" class="form-control form-control-lg mb-3" placeholder="Enter Your Answer" type="text" required>
                  <p class="m-0 py-4"></p>
                  <button class="btn btn-primary btn-lg w-100 shadow-lg">Submit</button>
                </form>
               <div class="text-center pt-4">
                <p class="m-0">Do not have an account? <a href="Register.html" class="text-dark font-weight-bold">Sign Up</a></p>
              </div>          
              </div>        
            </div>
          </div>
        </div>







    <!--Login section start -->
   



















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
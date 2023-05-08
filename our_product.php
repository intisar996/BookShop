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
.btn-more {
    background-color:#A2CDCD;
    text-align: center;
    box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),    7px 7px 20px 0px rgba(0,0,0,.1),    4px 4px 5px 0px rgba(0,0,0,.1);
    padding: 10px 0px;
    width: 137px;
    text-align: center;
    border-radius: 12px;
    font-size: 18px;
    font-weight: 900;
    font-family: monospace;
    margin-left: 50%;
    margin-right: 50%;
    margin-top: -51px;
}
.btn-more:hover {
    color: #181818;
    background-color: #f0e7e1;
}

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
          <a class="nav-link " href="home.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="our_product.php">Our Product</a>
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
   <div class="product layout_padding">
   <!--Classics Book section start -->
   <div class="row">
  <div class="container">

  <h1>Classics Book</h1>
  <div class="card-container" id="card-container">
    <?php
      include('connect.php');
      $query = "select * from tblbbook where  book_type='Classics'  and Delete_B = '0' Limit 5";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_price = $row['book_price'];
        $image = $row['image'];
        $quantity = $row['quantity'];
        $book_type = $row['book_type'];
    ?>
    <div class="card">
      <img src="<?php echo "image/$image"; ?>" alt="book cover">
      <div class="details">
        <h3><a href="more_Details.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="login.html" class="btn buy_bt btn-block">Add To Cart </a>
            <?php 
            }else {
            ?>
             <a class="btn buy-dis btn-block" style="color:#333333">Out of stock </a>
             <?php 
              } 
            ?>

        </div>     
         </div>
    </div>
    <?php } ?>
  </div>
  <div class="btn-more">
    <a href="book_lists.php?book_type=<?php echo $book_type ?>">View More</a>
   </div>
    <!--END Classics Book section start -->

    <!--Start Horror Book section start -->

  <h1>Horror Book</h1>
  <div class="card-container" id="card-container">
    <?php
      include('connect.php');
      $query = "select * from tblbbook where  book_type='Horror' and Delete_B = '0' Limit 5";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_price = $row['book_price'];
        $image = $row['image'];
        $quantity = $row['quantity'];
        $book_type = $row['book_type'];
    ?>
    <div class="card">
      <img src="<?php echo "image/$image"; ?>" alt="book cover">
      <div class="details">
        <h3><a href="more_Details.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="login.html" class="btn buy_bt btn-block">Add To Cart </a>
            <?php 
            }else {
            ?>
             <a class="btn buy-dis btn-block" style="color:#333333">Out of stock </a>
             <?php 
              } 
            ?>

        </div>  
          </div>
    </div>
    <?php } ?>
  </div>
   <div class="btn-more">
   <a href="book_lists.php?book_type=<?php echo $book_type ?>">View More</a>
   </div>
    <!--End Horror Book section start -->

    <!--Start Literary Fiction Book section start -->
    <h1>Literary Fiction Book</h1>
  <div class="card-container" id="card-container">
    <?php
      include('connect.php');
      $query = "select * from tblbbook where  book_type='Literary Fiction' and Delete_B = '0' Limit 5";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_price = $row['book_price'];
        $image = $row['image'];
        $quantity = $row['quantity'];
        $book_type = $row['book_type'];
    ?>
    <div class="card">
      <img src="<?php echo "image/$image"; ?>" alt="book cover">
      <div class="details">
        <h3><a href="more_Details.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="login.html" class="btn buy_bt btn-block">Add To Cart </a>
            <?php 
            }else {
            ?>
             <a class="btn buy-dis btn-block" style="color:#333333">Out of stock </a>
             <?php 
              } 
            ?>

        </div>    
      </div>
    </div>

    <?php } ?>

  </div>
  <div class="btn-more">
  <a href="book_lists.php?book_type=<?php echo $book_type ?>">View More</a>
   </div>
    <!--End Literary Fiction Book section start -->

    <!--Start Fantasy Book section start -->
    <h1>Fantasy Book</h1>
  <div class="card-container" id="card-container">
    <?php
      include('connect.php');
      $query = "select * from tblbbook where  book_type='Fantasy' and Delete_B = '0' Limit 5";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_price = $row['book_price'];
        $image = $row['image'];
        $quantity = $row['quantity'];
        $book_type = $row['book_type'];
    ?>
    <div class="card">
      <img src="<?php echo "image/$image"; ?>" alt="book cover">
      <div class="details">
        <h3><a href="more_Details.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
          <a href="login.html" class="btn buy_bt btn-block">Add To Cart</a>
        </div> 
           </div>
    </div>
    <?php } ?>
  </div>
  <div class="btn-more">
  <a href="book_lists.php?book_type=<?php echo $book_type ?>">View More</a>
   </div>
    <!--End Fantasy Book section start -->

    <!--Start Romance Book section start -->
    <h1>Romance Book</h1>
  <div class="card-container" id="card-container">
    <?php
      include('connect.php');
      $query = "select * from tblbbook where  book_type='Romance' and Delete_B = '0' Limit 5";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_price = $row['book_price'];
        $image = $row['image'];
        $quantity = $row['quantity'];
        $book_type = $row['book_type'];
    ?>
    <div class="card">
      <img src="<?php echo "image/$image"; ?>" alt="book cover">
      <div class="details">
        <h3><a href="more_Details.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="login.html" class="btn buy_bt btn-block">Add To Cart </a>
            <?php 
            }else {
            ?>
             <a class="btn buy-dis btn-block" style="color:#333333">Out of stock </a>
             <?php 
              } 
            ?>

        </div>  
            </div>
    </div>
    <?php } ?>
  </div>
  <div class="btn-more">
    <a href="book_lists.php?book_type=<?php echo $book_type ?>">View More</a>
   </div>
    <!--End Romance Book section start -->

    <!--Start Short Stories Book section start -->
    <h1>Short Stories Book</h1>
  <div class="card-container" id="card-container">
    <?php
      include('connect.php');
      $query = "select * from tblbbook where  book_type='Short Stories' and Delete_B = '0' Limit 8";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_price = $row['book_price'];
        $image = $row['image'];
        $quantity = $row['quantity'];
        $book_type = $row['book_type'];
    ?>
    <div class="card">
      <img src="<?php echo "image/$image"; ?>" alt="book cover">
      <div class="details">
        <h3><a href="more_Details.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="login.html" class="btn buy_bt btn-block">Add To Cart </a>
            <?php 
            }else {
            ?>
             <a class="btn buy-dis btn-block" style="color:#333333">Out of stock </a>
             <?php 
              } 
            ?>

        </div>  
            </div>
    </div>
    <?php } ?>
  </div>
  <div class="btn-more">
    <a href="book_lists.php?book_type=<?php echo $book_type ?>">View More</a>
   </div>
    <!--End Romance Book section start -->
    <!--Start Other Book section start -->
    <h1>Other Book</h1>
  <div class="card-container" id="card-container">
    <?php
      include('connect.php');
      $query = "select * from tblbbook where  (book_type!='Romance' and  book_type!='Short Stories' and book_type!='Literary Fiction' and book_type!='Fantasy' and  book_type!='Classics' and book_type!='Horror') and Delete_B = '0' Limit 5";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_price = $row['book_price'];
        $image = $row['image'];
        $quantity = $row['quantity'];
        $book_type = $row['book_type'];
    ?>
    <div class="card">
      <img src="<?php echo "image/$image"; ?>" alt="book cover">
      <div class="details">
        <h3><a href="more_Details.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="login.html" class="btn buy_bt btn-block">Add To Cart </a>
            <?php 
            }else {
            ?>
             <a class="btn buy-dis btn-block" style="color:#333333">Out of stock </a>
             <?php 
              } 
            ?>

        </div>  
            </div>
    </div>
    <?php } ?>
  </div>
  <div class="btn-more">
    <a href="book_lists.php?book_type=<?php echo $book_type ?>">View More</a>
   </div>
    <!--End Romance Book section start -->

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
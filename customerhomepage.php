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
  
        <!--header section end -->
        <div class="Admin_padding"></div>
   
   <!--Classics Book section start -->
  <div class="row">
  <div class="container">

  <h1>Classics Book</h1>
  <div class="card-container" id="card-container">
    <?php
      include('connect.php');
      $query = "select * from tblbbook where  book_type='Classics' and Delete_B = '0' Limit 5";
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
        <h3><a href="more.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></a></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="more.php?book_id=<?php echo $book_id ?>" class="btn buy_bt btn-block">Add To Cart </a>
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
    <a href="book_list.php?book_type=<?php echo $book_type ?>">View More</a>
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
        <h3><a href="more.php?book_id=<?php echo $book_id ?>"><a href="more.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></a></a></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="more.php?book_id=<?php echo $book_id ?>" class="btn buy_bt btn-block">Add To Cart </a>
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
   <a href="book_list.php?book_type=<?php echo $book_type ?>">View More</a>
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
        <h3><a href="more.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></a></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="more.php?book_id=<?php echo $book_id ?>" class="btn buy_bt btn-block">Add To Cart </a>
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
  <a href="book_list.php?book_type=<?php echo $book_type ?>">View More</a>
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
        <h3><a href="more.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></a></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
          <a href="more.php?book_id=<?php echo $book_id ?>" class="btn buy_bt btn-block">Add To Cart</a>
        </div> 
           </div>
    </div>
    <?php } ?>
  </div>
  <div class="btn-more">
  <a href="book_list.php?book_type=<?php echo $book_type ?>">View More</a>
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
        <h3><a href="more.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></a></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="more.php?book_id=<?php echo $book_id ?>" class="btn buy_bt btn-block">Add To Cart </a>
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
    <a href="book_list.php?book_type=<?php echo $book_type ?>">View More</a>
   </div>
    <!--End Romance Book section start -->

    <!--Start Short Stories Book section start -->
    <h1>Short Stories Book</h1>
  <div class="card-container" id="card-container">
    <?php
      include('connect.php');
      $query = "select * from tblbbook where  book_type='Short Stories'  and Delete_B = '0' Limit 8";
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
        <h3><a href="more.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></a></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="more.php?book_id=<?php echo $book_id ?>" class="btn buy_bt btn-block">Add To Cart </a>
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
    <a href="book_list.php?book_type=<?php echo $book_type ?>">View More</a>
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
        <h3><a href="more.php?book_id=<?php echo $book_id ?>"><?php echo $book_name; ?></a></h3>
        <p>Price: <?php echo $book_price; ?></p>
        <p>Stock: <?php echo $quantity; ?></p>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="more.php?book_id=<?php echo $book_id ?>" class="btn buy_bt btn-block">Add To Cart </a>
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
    <a href="book_list.php?book_type=<?php echo $book_type ?>">View More</a>
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
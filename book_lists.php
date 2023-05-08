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
 

  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>


    <?php 
  $book_type=$_GET['book_type'];
  ?>

    <form method="Post" class="flitter" action="books_filtter.php?book_type=<?php echo $book_type ?>">
      <div class="form-row">
    <div class="form-group">
      <label for="minPrice">Minimum Price</label>
      <input type="number" class="form-control" id="minPrice" name="minPrice">
    </div>
    <div class="form-group">
      <label for="maxPrice">Maximum Price</label>
      <input type="number" class="form-control" id="maxPrice" name="maxPrice">
    </div>
    <div class="form-group">
      <label for="bookSearch">Search for Book Name</label>
      <input type="text" class="form-control" id="bookSearch" name="bookSearch">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Filter</button>
  <button type="cancel" class="btn btn-danger">Clear</button>
</form>





        <!--header section end -->
        <div class="container">


  <h1><?php echo $book_type ?> Book</h1>
  <div class="row">
    <?php
      include('connect.php');
      $pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
      $book_type=$_GET['book_type'];
      $offset = ($pageno - 1) * 2;


     $q="select count(*) as total from tblbbook  where  book_type='$book_type'  ";
     $r=mysqli_query($con,$q);
     $row = mysqli_fetch_assoc($r);
     $total_records = $row['total'];
     $total_pages = ceil($total_records / 12); // assuming 10 records per page

      $query = "select * from tblbbook where  book_type='$book_type' and Delete_B = '0' limit $offset, 12";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        $book_idH = $row['book_id'];
        $book_name = $row['book_name'];
        $book_price = $row['book_price'];
        $image = $row['image'];
        $quantity = $row['quantity'];
    ?>
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="<?php echo "image/$image"; ?>" alt="book cover">
        <div class="card-body">
          <h4 class="card-title"><?php echo $book_name; ?></h4>
          <h5>Price: <?php echo $book_price; ?></h5>
          <h6>Stock: <?php echo $quantity; ?></h6>
        </div>
        <div class="card-footer">
               <?php
        if($quantity > 0 ) {
            ?>
            <a href="cart.php" class="btn buy_bt btn-block">Add To Cart </a>
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
  <br/><br/><br/>
  <ul class="pagination">
    <?php if($pageno > 1): ?>
        <li>
            <a href="?pageno=<?php echo $pageno - 1; ?>&&book_type=<?php echo $book_type?>">Prev</a>
        </li>
    <?php endif; ?>
    
    <?php for($i = 1; $i <= $total_pages; $i++): ?>
        <li class="<?php if($pageno == $i) echo 'active'; ?>">
            <a href="?pageno=<?php echo $i; ?>&&book_type=<?php echo $book_type?>"><?php echo $i; ?></a>
        </li>
    <?php endfor; ?>
    
    <?php if($pageno < $total_pages): ?>
        <li>
            <a href="?pageno=<?php echo $pageno + 1; ?>&&book_type=<?php echo $book_type?>">Next</a>
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
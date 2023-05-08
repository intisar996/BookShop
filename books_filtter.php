
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
</style>
<body>

       <!--header section start -->
       <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
 
  <h1> Book</h1>
  <div class="row">
    <?php
      include('connect.php');
      $min_price = $_POST['minPrice'];
      $max_price = $_POST['maxPrice'];
      $book_search = $_POST['bookSearch'];
      $book_type=$_GET['book_type'];

      
      
      $query = "SELECT * FROM tblbbook WHERE  book_type='$book_type' and   Delete_B = '0' and 1=1";
      
      if ($min_price && $max_price) {
        $query .= " AND book_price BETWEEN $min_price AND $max_price";
      }
      
      if ($book_search) {
        $query .= " AND book_name LIKE '%$book_search%'";
      }
      
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
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
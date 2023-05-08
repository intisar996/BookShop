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
 

  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>


    <?php 
  $book_type=$_GET['book_type'];
  ?>

    <form method="Post" class="flitter" action="book_filtter.php?book_type=<?php echo $book_type ?>">
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
      $records_per_page = 16;
      $offset = ($pageno - 1) * $records_per_page;


      $query_count="select count(*) as total from tblbbook  where  book_type='$book_type' ";
      $result_count = mysqli_query($con, $query_count);
      $row_count = mysqli_fetch_assoc($result_count);
      $total_records = $row_count['total'];
      $total_pages = ceil($total_records / $records_per_page);

      $query = "select * from tblbbook where  book_type='$book_type' and Delete_B = '0' LIMIT $offset, $records_per_page";
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
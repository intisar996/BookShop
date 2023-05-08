<?php
session_start();
include ("connect.php");

$username = $_SESSION['txtuser'];
$qryname = "SELECT * FROM tbcustomer WHERE cusername='$username'";
$result = mysqli_query($con, $qryname);

if (mysqli_num_rows($result) == 0) {
  header("location:login.html");
}




require_once('auto_delete1.php');
require_once('auto_delete.php');
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Animation Using AOS-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
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
  <br/><br/><br/>







  <br /><br /><br /><br /><br />
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <div class="table-responsive">
        <?php	
                  $usernamerc = $_SESSION['txtuser'];
                  include ("connect.php");
                 $qryname = "select * from  tbcustomer where cusername='$usernamerc'";
                 $resultqry=mysqli_query($con,$qryname);
                 while($row = mysqli_fetch_assoc($resultqry)) {
                 $cid =$row["cid"];
                 }
              

                include ("connect.php");
               $query1 = "select * from tblcart C, tblbbook B where  C.book_id=B.book_id and  	bill_no=0 and C.username='$usernamerc' ";
               $result1=mysqli_query($con,$query1);
               $num = mysqli_num_rows( $result1);
  
               if ($num > 0){
              $i = 0;
              $total = 0;
              echo "<br>";
              echo "<table align='center'  id='card-item' class='table table-striped'  border='0' width='50px' hight='50px'>";
              echo "<thead>";
              echo "<tr>";  
              echo "<tr>";
              echo "<th width=200  >Book";
              echo "<th width=200  >";
              echo "<th width=100  >Qty";
              echo "<th width=100 >PRICE";
              echo "<th width=100 >TOTAL";
              echo "<th>OPTIONS";
  
           while($row = mysqli_fetch_assoc($result1)) {
            $bid =$row["book_id"];
           $rno =$row["cart_id"];
  
        $query2 = "select * from   tblbbook where Quantity!='0' and  book_id ='$bid' ";
        $result2=mysqli_query($con,$query2);
        while($rows = mysqli_fetch_assoc($result2)) {
        $image =$rows["image"];
        $book_name =$rows["book_name"];
        $quantity =$rows["quantity"];
        $bid =$rows["book_id"];
        $qty =$row["Quantity"];
        $price =$row["price"];
        $stotal =$row["Total"];


            
        echo "<tr>";
        echo "<td  class='cart-image'><img src ='image/$image' height ='100' width ='125'></td>";
        echo "<td><h3>$book_name</h3></td>";
        echo "<td align=center> <input type='number' name='qty_no' id='qty" . $rno . "' min='1' max='$quantity'   value='$qty' oninput='updateQty($rno, this.value);' class='qty-input'>
        </td>";
        echo "<td align=center>$price .OMR</td>";
        echo "<td align=center>$stotal .OMR</td>";
        echo "<td align=center><a href='deleteCart.php' onclick=\"Swal.fire({
          title: 'Are you sure?',
          text: 'You will not be able to recover this item!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'deleteCart.php?cart_id=$rno';
          }
          else {
            return false;
          }
        }); return false;\">
        <i class='fa fa-trash'></i></a><br>";
                echo "</tr>";
            $total = $total + $stotal;
             echo"<tr></tr>";
                  
        $i++;
      }}	
     
       
      echo "<tfoot>";
      echo "<tr>";
      echo "<td colspan='10' align='center' id='total' class='table-danger' ><b>Final Total = " . number_format($total, 2) . " .OMR</b></td>";
      echo "</tr>";
      echo "</tfoot>";
      echo "</table>";  
    
  ?>
        </div>
      </div>
      <div class="col-md-4">             
        <form action="place_Order.php?Quantity=<?php echo $qty ?>&&book_id=<?php echo $bid ?>&&quantity=<?php echo $quantity ?>" method="post" class="credit-card-form">
        <div class="credit-card-section">
                      <div>
                          <label class="credit-card-label" style="height: 33px">Name on card</label>
                          <input id="card_name" name="card_name" type="text" class="form-control credit-inputs"  placeholder="Enter Card Name"  pattern="[a-zA-Z]+(\s[a-zA-Z]+)*" title="Please enter a valid name">
                      </div>
                      <div>
                          <label class="credit-card-label">Card number</label>
                          <input type="text" class="form-control" placeholder="0000 0000 0000 0000" maxlength="19" id="cardnum" name="cardnum" oninput="formatCardNum()" required>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <label class="credit-card-label">Expiration date</label>
                              <input type="Date" class="form-control" placeholder="MM/YY"  min="{{ date('Y-m-d') }}"  id="date"  name="date" required>
                          </div>
                          <div class="col-md-6">
                              <label class="credit-card-label">CVV</label>
                              <input type="text" class="form-control credit-inputs" placeholder="000" id="sequritycode" maxlength="3" name="sequritycode" required>
                          </div>
                          <div class="col-md-6">
                              <label class="credit-card-label">Total</label>
                              <input type="text" class="form-control credit-inputs" value="<?php echo $total ?>" id="total" name="total"  readonly>
                          </div>
                          <div class="d-flex justify-content-between information"></div>
				              <button class="btn btn-primary btn-block d-flex justify-content-between mt-3"  type="submit"><span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span></button>
                        </div>
                      </div>
                      <hr class="line">
                  </div>      </form>
      </div>
    </div>
  </div> 
  <div id="result" style="width: 103px"></div>				

<?php
 }
 else{
      echo "<table align='center' class='table table-striped'  style='width: 100%'>";
 
       echo "<thead>";
        echo "<tr colspan='10'>";
                 
        echo "<td width='200'  align='center' ><center>The shopping cart is empty! <br></center><br />";
      echo  "</table>";
 }
?>


    <!--footer section  -->
    <div class="footer_section layout_padding"></div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/cart.js"></script>
  

</body>
</html>
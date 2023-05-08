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

.bill-table {
    height: 458px;
    width: 100%;
    border: 2px solid burlywood;
    text-align: center;
 }
 .bill-table h1{
   margin: 0;
   padding: 5px;
 }
 .con-bill {
    display:flex;
    justify-content: space-between;


 }
.row {
    justify-content: center;
}
hr {
    border:2px solid #333;
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
        <div class="logo"><a href="home.html">
                <h1>BOOKS SHOP</h1>
            </a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="customerhomepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allBook.php">All Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Bill.php">Bill</a>
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
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
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
    <br /><br /><br />


    <br /><br /><br /><br /><br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="table-responsive">
                    <?php
	
	if(!isset($_SESSION['txtuser']))
		header("Location: login.php");
	
	$bill_no=$_GET["bill_no"];
	$username = $_SESSION['txtuser'];
	include("connect.php");
	
		include ("connect.php");
	$qryname = "select * from  tbcustomer where cusername='$username'  ";
	$result = mysqli_query($con,$qryname);
	while($rows = mysqli_fetch_assoc($result)) 
	{$cname=$rows['cname'];
	$cemail=$rows['cemail'];
	$cphone=$rows['cphone'];
	$caddress=$rows['caddress'];


	
}

	
	
	
	$query1 = "select * from tblbill where bill_no = '$bill_no'";
      $result = mysqli_query($con,$query1);
      while($row = mysqli_fetch_assoc($result)) {
	$bill_no=$row["bill_no"];
	$OrderDate= $row["OrderDate"];
	$status_bill= $row["status_bill"];
	$Total_price= $row["Total_price"];
	}
?>

                    <table align="center" class="bill-table">                  
                        <tr>
                            <th colspan="4" scope="row">
                                 <h1>BOOK SHOP</h1>
                                 <h3>Oman, Alburimi</h3> 
                             </th>                              
                        </tr>
                        <tr>
                            <td colspan="4" scope="row">
                                 <p align="left" style="width:fit-content;">Phone Number:+968 96857412</p>
                                 <p align="right" style="width:fit-content;">Email: OnlineBook@gamil.com</p>  
                               </td>                             
                        </tr>
                        <tr>
                            <td colspan="4" height="40px" style="border-top:1px solid #E8E8E8" >
                               </td>                             
                        </tr>
                        <tr>
                            <td bgcolor="FFFFFF" scope="row">
                                <h3>Bill No</h3>
                            </td>
                            <td bgcolor="FFFFFF">
                                <h3>ORDER DATE</h3>
                            </td>
                            <td bgcolor="FFFFFF">
                                <h3>Bill Total</h3>    
                            </td>
                            <td bgcolor="FFFFFF">
                                <h3>STATUTS</h3>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="FFFFFF" scope="row" class="auto-style3" style="width: 175px"><?php 
			echo "<font face='Arial, Helvetica, sans-serif' size='3'>".$bill_no;
		 ?></td>
                            <td bgcolor="FFFFFF" scope="row" class="auto-style3"> <?php 
			echo $OrderDate; 
		?>
                            </td>
                            <td bgcolor="FFFFFF" style="width: 156px" class="auto-style3"> <?php 
			echo $Total_price; 
		?>
                            </td>
                            <td bgcolor="FFFFFF" class="auto-style3"> <?php 
			echo $status_bill; 
		?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4" height="10px" style="border-top:1px solid #E8E8E8" >
                               </td>                             
                        </tr>
                        <tr>
                            <td scope="row" class="auto-style5" colspan="4"><h2>CUSTOMER
                                    INFORMATION</h2></td>
                        </tr>
                        <tr>
                            <td colspan="4" height="10px" style="border-top:1px solid #E8E8E8" >
                               </td>                             
                        </tr>
                        <tr>
                            <td bgcolor="FFFFFF" scope="row" >
                                <h3>Customer Name:</h3>
                            </td>
                            <td bgcolor="FFFFFF" scope="row"> <h3>Phone Number:</h3></td>
                            <td bgcolor="FFFFFF">
                                <h3>Email:</h3>
                            </td>
                            <td bgcolor="FFFFFF"> <h3>Address</h3></td>
                        </tr>

                        <tr>
                            <td bgcolor="FFFFFF" scope="row" class="auto-style3" style="width: 175px">
                                <?php 
			echo "<font face='Arial, Helvetica, sans-serif' size='3'>".$cname;
		 ?>&nbsp;</td>
                            <td bgcolor="FFFFFF" scope="row" class="auto-style3"> <?php 
			echo "<font face='Arial, Helvetica, sans-serif' size='3'>".$cphone;
		 ?>&nbsp;</td>
                            <td bgcolor="FFFFFF" style="width: 156px" class="auto-style3"> <?php 
			echo "<font face='Arial, Helvetica, sans-serif' size='3'>".$cemail;
		 ?>&nbsp;</td>
                            <td bgcolor="FFFFFF" class="auto-style3"> <?php 
			echo "<font face='Arial, Helvetica, sans-serif' size='3'>".$caddress;
		 ?>&nbsp;</td>
                        </tr>

                        <tr>
                            <td colspan="4" bgcolor="#FFFFFF" scope="row" style="height: 127px" class="auto-style3">
                                &nbsp;
                                <?php
	include('connect.php');
	
    $bill_no=$_GET['bill_no'];
	
	$query="select * from  tblbbook a, tblbill b,tbcustomer d,tblcart c  where  a.book_id=c.book_id  and b.bill_no=c.bill_no and b.cusername=d.cusername  and c.bill_no='$bill_no'"; 
    $result = mysqli_query($con,$query);
	$num=mysqli_num_rows($result);
	
	
	
	echo "<table  id='productSizes' class='table' border='1'  style='width:100%;border:1px' align=center  cellspacing=2>";
	echo "<th>Book NAME</th>";
	echo "<th>Book  PRICE</th>";
	echo "<th>Quantity</th>";
	echo "<th>total price</th>";
	echo "<th>Book  PICTUER</th>";
		
	
	while($row = mysqli_fetch_assoc($result)) {
	
	       $bill_no =$row["bill_no"];
	       $book_id =$row["book_id"];
	       $book_name=$row["book_name"];
	       $book_price =$row["book_price"];
	       $qty =$row["Quantity"];
	       $Total_price =$row["Total_price"];
	       $vimage =$row["image"];
	
		    			

		
		echo"<tr align=center background='images/0.jpg' >";
		echo "<td>$book_name</td>";
		echo "<td>$book_price</td>";
		echo "<td>$qty</td>";
		echo "<td>$Total_price</td>";
	

	    echo "<td align=center><img src='image/$vimage' height=114 width=105>";
		
		echo"</tr>";	
	}
	echo "</table>";
	

?> </td>
                        </tr>
                        <tr>
                            <th colspan="4" bgcolor="#FFFFFF" scope="row" class="auto-style3">
                                <br class="button2"><span class="button2">Thank You For Choose</span><br
                                    class="button2">
                                <span class="button2">
                                    BOOK SHOP</span>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4" scope="row" class="auto-style4">&nbsp;</th>
                        </tr>
                    </table>
                    <p align="left" class="style5"> &nbsp;</span>
                    <p align="left" class="style5">&nbsp;</p>
                    <p class="style5"></p>
                    <p align="left" class="style5">&nbsp;</p>
                    <p align="left" class="style5"> </p>
                    </td>
                    </tr>
                    </table>
                    <br /><br />


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
                <div class="copyright_text" align="center">Copyright 2023 All Right Reserved By <a
                        href="Home.html">Online Book Library</a></div>
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
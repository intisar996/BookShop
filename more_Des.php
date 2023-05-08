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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
  </head>
<style>
.text_align_center .cancel-btn {
  border-radius: 20px;
  font-size: 22px;
  padding: 5px;
  background-color:#b81427;
  font-weight: 800;
  font-family: auto;
  width: 23%;
  height: 47px;
  text-align:center;
  border:1px solid #000000;
}
.text_align_center .cancel-btn:hover {
  background-color: #f0e7e1;

}
</style>
<body>

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
  <br/><br/><br/>



  <div class="text_align_center">
	 <br>
	 
	  <?php
	//if(isset($_SESSION['p_name'])){
		$book_id = $_GET['book_id'];
		include ("connect.php");
   		
	
		$query  = "select * from    tblbbook where 	book_id ='$book_id'";
        $result=mysqli_query($con,$query);
         while($row = mysqli_fetch_assoc($result)) {
			  $book_id = $row['book_id'];
                 $book_name = $row['book_name'];
                 $book_price = $row['book_price'];
                 $book_desc = $row['book_desc'];
                 $image = $row['image'];
                  $book_writer = $row['book_writer'];
                 $language = $row['language'];
                 $quantity = $row['quantity'];
	
		}
		?>

	 
	 
	 
    	<form id="form1" name="form1" method="post" action="<?php echo "Update_Book.php?book_id=$book_id"; ?>" onsubmit="">
    <div class="text-start">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
           <h1><?php echo $book_name;?></h1>
        </div>
        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
             <?php echo"<img src ='image/$image'  class='border p-3' >";?>

              </div>
            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12 lan">
                           <h5>Writer:</h5> <h2 class="m-0 p-0"><?php echo $book_writer;?></h2>
                            <h2 class="m-0 p-0"><?php echo  $book_name;?></h2>
                        </div>
                        <div class="col-lg-12 lan">
                        <h5>Price:</h5> <h2 class="m-0 p-0"><?php echo $book_price;?>.OMR</h2>

                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Book Describtion:</h5>
                             <p><?php echo $book_desc;?></p>
                             <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12 lan">
                           <h5>language :</h5> <h2 class="m-0 p-0"> <?php echo $language ;?></h2>
                        </div>
                        <div class="col-lg-12 lan">
                            <h5>In Stock : </h5> <h2 class="m-0 p-0"> <?php echo $quantity ;?></h2>
                        </div>
                    <div class="col-lg-12" style="justify-content: center;display: flex;">
                    <input type="submit" name="Submit" value="Update"  class="about-btn scrollto"  />
                    <a href='delete_Book.php' class="cancel-btn scrollto" onclick="return confirmDelete();">
    Delete
</a>

<script>
function confirmDelete() {
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'delete_Book.php?book_id=<?php echo $book_id ?>';
        }
    });
    return false;
}
</script>
                </span></span></div>

      </div>
      </div>
     


      

                            </div>
                        </div>
                    </div>
                </div>
     </div>
                    </div>
                </div>
 </div>
 <br /><br />


   
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





















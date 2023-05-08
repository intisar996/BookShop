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

<link rel="stylesheet" href="css/owl.carousel.min.css">
</head>
<style>
    .Admin_padding{
  padding-top: 200px;

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

  
<?php
$adate=date('Y/m/d');
?>
  <div class="Admin_padding"></div>
  
  <div class="demo-container">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
              <div class="text-center image-size-small position-relative">
              <img src="image/add.png" class="rounded-circle p-2 bg-white">
              </div>
              <div class="p-5 bg-white rounded shadow-lg">
                <h3 class="mb-2 text-center pt-5">Add Book </h3>
                <form   method="post" id="form2"   name="form2"  onsubmit="return validate(this);"  enctype="multipart/form-data"  action="add_bookcode.php">                
                <label class="font-500">Book Name</label>
                  <input name="book_name"  id ="book_name" class="form-control form-control-lg mb-3" placeholder="Enter Book Type Name" type="text" required>
                <label class="font-500">Book Price</label>
                  <input name="book_price"  id ="book_price" class="form-control form-control-lg mb-3" placeholder="Enter Book Price"  pattern="\d+(\.\d+)?" type="number" required>
                <label class="font-500">Book Type:</label>
                <select id="book_type"  name="book_type"  class="form-control" required>
				 <option value="">Select Book Type </option>
				 <?php
				  include("connect.php");
				  $query = "select*from  tbbooktype";
				  $result= mysqli_query($con,$query);
				  $num   = mysqli_num_rows($result);  
				  while($row = mysqli_fetch_assoc($result)) {
				  $typ_id =$row["typ_id"];
				  $typ_name =$row["typ_name"];
				  echo "<option value='$typ_name'>$typ_name</option>";
				  }				  
		         ?>
				</select>
                <label class="font-500">Book Image</label>
				<input id="pic" class="form-control form-control-lg mb-3" name="pic" type="file" required>
                <label class="font-500">Post Date</label>
				<input id="DATE_OR" class="form-control form-control-lg mb-3" name="datepp" type="text" value="<?php echo $adate;?>" readonly="readonly">
                <label class="font-500">Quantity</label>
                <input name="quantity"  id ="quantity" class="form-control form-control-lg mb-3" placeholder="Enter Book Quantity" type="number" required>
                <label class="font-500">Description:</label>
                <textarea name="book_desc"  id ="book_desc" class="form-control form-control-lg mb-3" placeholder="Enter Description" type="text" required></textarea>
                <label class="font-500">Book Writer:</label>
                <input name="book_writer"  id ="book_writer" class="form-control form-control-lg mb-3" placeholder="Enter Book  Writer" type="text" required>
                <label class="font-500">Language:</label>
                <select id="language" class="form-control" name="language" required>
				<option value="">Select Language</option>
				<option value="Arabic">Arabic</option>
				<option value="English">English</option>
				<option value="Spanish">Spanish</option>
				<option value="French">French</option>
				<option value="Chinese">Chinese</option>
				<option value="Turkish">Turkish</option>
				</select>
                  <div id="result" style="width: 103px"></div>				
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
</head>
	<?php
	session_start();
?>

<body>
<strong>
<?php
	

	     
include('connect.php');
   

$cnamee  =$_POST['cname'];
$usernamerc  =$_POST['cusername'];
$cemaile  =$_POST['cemail'];
$cphonee  =$_POST['cphone'];
$caddresse  =$_POST['caddress'];
$cseqe  =$_POST['cseq'];
$canse  =$_POST['cans'];
$cpassworde  =$_POST['cpassword'];


  	
  	$sql_u = "SELECT * FROM tbadmin WHERE username='$usernamerc'";
  	$sql_e = "SELECT * FROM tbcustomer WHERE cusername='$usernamerc'";


  	$res_u = mysqli_query($con, $sql_u);
  	 $res_e = mysqli_query($con, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
echo '<script type="text/javascript">';
echo 'Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "User Name Is  already taken.. Try Again!",
    footer: "<a href=\"Register.html\"></a>"
  }).then(function() {
      window.location.href = "Register.html";
  });';
echo '</script>';
  	 	
  	}
  	 	elseif (mysqli_num_rows($res_e) > 0) {
            echo '<script type="text/javascript">';
            echo 'Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "User Name Is  already taken.. Try Again!",
                footer: "<a href=\"Register.html\"></a>"
              }).then(function() {
                  window.location.href = "Register.html";
              });';
            echo '</script>';
	
  	 	
  	}
  	
 
  	
  	
  	else{



  	
  	
  	
  	$servername = "localhost";
$dbname = "dbsbook";

// Create connection
$con = new mysqli($servername,"root","", $dbname);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
  	



 $sqlx="insert into tbcustomer(cname,cusername,cemail,cphone,caddress,cseq,cans,cpassword) values('$cnamee','$usernamerc','$cemaile','$cphonee','$caddresse','$cseqe','$canse','$cpassworde')";

                                                     
if ($con->query($sqlx) === TRUE) {
    echo '<script type="text/javascript">';
    echo 'Swal.fire({
        icon: "success",
        title: "Success!",
        text: "Your account has been created.",
        footer: "<a href=\"login.html\"></a>"
      }).then(function() {
          window.location.href = "login.html";
      });';
    echo '</script>';
    
} else {
  echo "Error: " . $sqlx . "<br>" . $con->error;
}
$con->close();

}







?>


</strong>


</body>

</html>

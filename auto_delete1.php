<?php

include ("connect.php");
$query = "DELETE FROM tblcart WHERE Quantity=0 " ;
$r=mysqli_query($con,$query);

?>
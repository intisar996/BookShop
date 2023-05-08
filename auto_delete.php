<?php
include("connect.php");
$sql = "DELETE FROM tblcart WHERE bill_no = 0 AND EXISTS (SELECT * FROM tblbbook WHERE tblbbook.book_id = tblcart.book_id AND tblbbook.quantity = 0)";
$resultqry = mysqli_query($con, $sql);
?>

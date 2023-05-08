<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
</head>
<body>
    <?php
    if (isset($_POST['rno']) && isset($_POST['qty'])) {
        $rno = $_POST['rno'];
        $qty = $_POST['qty'];
    
        // Query the database to get the item details
        include("connect.php");
        $query = "SELECT book_id, Quantity, price FROM tblcart WHERE cart_id = $rno";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $bookId = $row['book_id'];
        $price = $row['price'];
    
        // Query the database to get the available stock for the item
        $query = "SELECT * FROM tblbbook WHERE book_id = $bookId";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['quantity'];
    
        // Check if the requested quantity exceeds the available stock
        if ($qty > $quantity) {
            $update_failed = true;

        } else {
            // Update the cart item quantity in the database
            $query = "UPDATE tblcart SET Quantity = $qty, Total = $price * $qty WHERE cart_id = $rno";
            mysqli_query($con, $query);
        
        }
    }
    
    ?>
</body>
</html>

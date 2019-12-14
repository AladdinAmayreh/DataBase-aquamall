<?php

include('../includes/connect.php');

$query = "DELETE FROM product WHERE product_id = {$_GET['product_id']}";
    
mysqli_query($conn,$query);
//prevent refresh for adding same record on database
header("location:manage_product.php");
exit;

?>
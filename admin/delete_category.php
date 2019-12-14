<?php

include('../includes/connect.php');

$query = "DELETE FROM category WHERE category_id = {$_GET['category_id']}";
    move_uploaded_file($tmp_name, $path.$category_image);

unlink(upload);
mysqli_query($conn,$query);
//prevent refresh for adding same record on database
header("location:manage_category.php");
exit;

?>
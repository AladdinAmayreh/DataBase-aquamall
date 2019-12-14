<?php

include('../includes/connect.php');

$query = "DELETE FROM admin WHERE admin_id = {$_GET['admin_id']}";

mysqli_query($conn,$query);
//prevent refresh for adding same record on database
header("location:manage.php");
exit;

?>
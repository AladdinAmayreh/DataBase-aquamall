<?php
	session_start();
	
	$i = 0; 
		foreach($_SESSION["product_id"] as $key => $value) {
			if($_GET['product_id'] == $value){
				$i++;
				if ($i==1) {				
					unset($_SESSION["product_id"][$key]);
					echo "<script> window.top.location='single-product-details.php?product_id={$_GET['product_id']}' </script>";
				}else{
					echo "<script> window.top.location='single-product-details.php?product_id={$_GET['product_id']}' </script>";
				}
			}
		
		}		
	
?>
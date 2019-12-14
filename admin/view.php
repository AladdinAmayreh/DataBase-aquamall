<?php 
include("../includes/connect.php");
//the action will start if user press on button
if (isset($_POST['submet'])) {
// fetch Data from web form

    $product_name  =$_POST['product_name']; 
    $product_price =$_POST['product_price']; 
    $product_desc  =$_POST['product_desc']; 
    $category_id =$_POST['Scategory_name'];

    $product_image =$_FILES['product_image']['name'];
    $tmp_name      =$_FILES['product_image']['tmp_name'];
    $path          ="upload/";
    move_uploaded_file($tmp_name, $path.$product_image);

/*
    $query="SELECT product.product_id, category.category_name
               FROM product
          INNER JOIN category ON product.product_id = category.category_id";
                                           */
/*$query = "SELECT * FROM product  WHERE category_id ={$_GET['category_id']}" ;
$result= mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
echo "$query";die;*/





    //perform query
mysqli_query($conn,$query);
     //prevent refresh for adding same record on database
header('location:manage_product.php');
exit;

}



include("../includes/admin_header.php");

$query = "SELECT * FROM category  WHERE category_id ={$_GET['category_id']}" ;
$result= mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">




                    </div>


                    <br>

                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <h2 style="text-align:center"><?php echo $_GET['category_name']; ?></h2>
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Descreption</th>

                                        <th>Product Image</th>
                                        <!--   <th>Back</th> -->


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query="SELECT category_name FROM category WHERE category_id ={$_GET['category_id']}";
                                    $result= mysqli_query($conn,$query);
                                    $row=mysqli_fetch_assoc($result);


                                    ?>
                                    <?php
                                    $query = "SELECT * FROM product  WHERE category_id ={$_GET['category_id']}";      
                                    $result= mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){

                                        echo "<tr>";
                                        echo "<td>{$row['product_id']}</td>";
                                        echo "<td>{$row['product_name']}</td>"; 
                                        echo "<td>{$row['product_price']}</td>";
                                        echo "<td>{$row['product_desc']}</td>";

                                        echo "<td><img hight='50px' width='50px' src='upload/{$row['product_image']}'></td>";


                                        echo "</tr>";   

                                    }


                                    ?>
                                </tbody>
                            </table>



                            <div class="card">

                             <?php
                             echo "<a href='manage_category.php?category_id={$row['category_id']}' class='btn
                             btn-success'>Go Back";
                             ?>
                         </a>      
                     </div>

                 </div>
             </div>
         </div>
     </div>


</div>


<?php include("../includes/admin_footer.php"); ?>
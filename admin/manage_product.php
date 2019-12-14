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


          
    $query ="INSERT into product(product_name , product_price,product_desc,category_id,product_image) 
          values('$product_name','$product_price','$product_desc','$category_id','$product_image')";

         
    //perform query
          mysqli_query($conn,$query);
     //prevent refresh for adding same record on database
          header('location:manage_product.php');
          exit;

      }



      include("../includes/admin_header.php"); 


      ?>
      <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Add Product</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">New Product </h3>
                                </div>
                                <hr>
                                <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label  for="cc-payment" class="control-label mb-1">Product Name</label>
                                        <input id="cc-pament" name='product_name' type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                    </div>  
                                    <div class="form-group">
                                        <label  for="cc-payment" class="control-label mb-1">Product Price</label>
                                        <input id="cc-pament" name='product_price' type="number" class="form-control" aria-required="true" aria-invalid="false" >
                                    </div>
                                    <div class="form-group">
                                        <label  for="cc-payment" class="control-label mb-1">Product Descreption</label>
                                        <input id="cc-pament" name='product_desc' type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                    </div> 
                                    <div class="form-group">
                                                <label  for="cc-payment" class="control-label mb-1">Product image</label>
                                                <input id="cc-pament" name='product_image' type="file" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                    <div class="col-12 col-md-9">
                                       <label  for="cc-payment" class="control-label mb-1">Select category</label>
                                       <select name="Scategory_name" class="form-control">

                                        <?php
                                        $query = "SELECT * FROM category";
                                        $result= mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($result)){

                                            echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";

                                        }


                                        ?>

                                    </select>
                                </div>

                                <br>



                                <div>
                                    <button name="submet" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                        <span id="payment-button-amount">Add</span>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Descreption</th>
                                        <th>Category Name</th>
                                        <th>Product Image</th>
                                        <th>Edit Product</th>
                                        <th>Delete Product</th>

                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $query = "SELECT * FROM product
                                 INNER JOIN category ON
                                 category.category_id=product.category_id";      
                                 $result= mysqli_query($conn,$query);
                                 while($row=mysqli_fetch_assoc($result)){

                                    echo "<tr>";
                                    echo "<td>{$row['product_id']}</td>";
                                    echo "<td>{$row['product_name']}</td>"; 
                                    echo "<td>{$row['product_price']}</td>";
                                    echo "<td>{$row['product_desc']}</td>";
                                    echo "<td>{$row['category_name']}</td>";
                                    echo "<td><img hight='50px' width='50px' src='upload/{$row['product_image']}'></td>";

                                    echo "<td><a href='edit_product.php?product_id={$row['product_id']}' class='btn
                                    btn-warning'> EDIT</a></td>";
                                    echo "<td><a href='delete_product.php?product_id={$row['product_id']}' class='btn
                                    btn-danger'>DELETE</td>";
                                    echo "</tr>";                                               
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include("../includes/admin_footer.php"); ?>
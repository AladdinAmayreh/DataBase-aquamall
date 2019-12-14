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
if ($_FILES['product_image']['error']==0) {
    # code...
     $query ="UPDATE product SET product_name  =' $product_name',
                                product_price ='$product_price',
                                product_desc  = '$product_desc',
                                product_image = '$product_image'
                    
                            WHERE product_id ={$_GET['product_id']}";
} else {
    # code...
     $query ="UPDATE product SET product_name  =' $product_name',
                                product_price ='$product_price',
                                product_desc  = '$product_desc'
                               
                    
                            WHERE product_id ={$_GET['product_id']}";
}

          
    /*$query ="UPDATE product SET product_name  =' $product_name',
                                product_price ='$product_price',
                                product_desc  = '$product_desc',
                                product_image = '$product_image'
                    
                            WHERE product_id ={$_GET['product_id']}";*/
         
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
                            <div class="card-header">Update Product</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit Product </h3>
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

                                        <span id="payment-button-amount">Update</span>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                             </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include("../includes/admin_footer.php"); ?>
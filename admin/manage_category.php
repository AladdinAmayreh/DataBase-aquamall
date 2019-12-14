<?php 
include("../includes/connect.php");
//the action will start if user press on button
if (isset($_POST['submet'])) {
// fetch Data from web form
   
    $category       =$_POST['category_name']; 
    //$category_image =$_FILES['category_image'];
//get data from file
    $category_image =$_FILES['category_image']['name'];
    $tmp_name       =$_FILES['category_image']['tmp_name'];
    $path           ="upload/";
    move_uploaded_file($tmp_name, $path.$category_image);

    
    $query ="INSERT into category(category_name , category_image) values('$category','$category_image')";
    
    //perform query
    mysqli_query($conn,$query);
     //prevent refresh for adding same record on database
    header('location:manage_category.php');
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
                                    <div class="card-header">Add category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Category </h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group">
                                                <label  for="cc-payment" class="control-label mb-1">Category name</label>
                                                <input id="cc-pament" name='category_name' type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group">
                                                <label  for="cc-payment" class="control-label mb-1">Category image</label>
                                                <input id="cc-pament" name='category_image' type="file" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            
                                            
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
                                                <th>Category Name</th>
                                                <th>Category images</th>
                                                <th>View Product</th>
                                                <th>Edit Category</th>
                                                <th> Delete Category </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            $query = "SELECT * FROM category";
                                            $result= mysqli_query($conn,$query);
                                            while($row=mysqli_fetch_assoc($result)){

                                                echo "<tr>";
                                                echo "<td>{$row['category_id']}</td>";
                                                echo "<td>{$row['category_name']}</td>";
                                                echo "<td><img hight='50px' width='50px' src='upload/{$row['category_image']}'></td>";
                                               echo "<td><a href='view.php?category_id={$row['category_id']} & category_name={$row['category_name']}' class='btn
                                                             btn-success'> view product</a></td>";
                                                echo "<td><a href='edit_category.php?category_id={$row['category_id']}' class='btn
                                                             btn-warning'> EDIT</a></td>";
                                                echo "<td><a href='delete_category.php?category_id={$row['category_id']}' class='btn
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
          <!--  -->

<?php include("../includes/admin_footer.php"); ?>
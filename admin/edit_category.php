<?php 
include("../includes/connect.php");
//the action will start if user press on button
if (isset($_POST['submet'])) {
// fetch Data from web form
   
    $category       =$_POST['category_name'];
    $category_image =$_FILES['category_image']['name'];
    $tmp_name       =$_FILES['category_image']['tmp_name'];
    $path           ="upload/";
   

      move_uploaded_file($tmp_name, $path.$category_image);
if ($_FILES['category_image']['error']==0) {
    # code...
      $query ="UPDATE category SET category_name  ='$category',
                                 category_image ='$category_image'
                    
                            WHERE category_id ={$_GET['category_id']}";
} else {
    # code...
      $query ="UPDATE category SET category_name  ='$category'
                                
                    
                            WHERE category_id ={$_GET['category_id']}";
}

	//perform query
	mysqli_query($conn,$query);
	//prevent refresh for adding same record on database
    header("location:manage_category.php");
    exit;
	




    }




	
    //fetch old data
    $query   = "SELECT * FROM category WHERE category_id={$_GET['category_id']}";
    $result  = mysqli_query($conn,$query);
    $row     =mysqli_fetch_assoc($result);



include("../includes/admin_header.php"); 


?>
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Category </h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group">
                                                <label  for="cc-payment" class="control-label mb-1">Category name</label>
                                                <input id="cc-pament" name='category_name' type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                             <div class="form-group">
                                                <label  for="cc-payment" class="control-label mb-1">Category image</label>
                                                <input id="cc-pament" name='category_image' type="file" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['category_image']?>" >
                                            </div>
                                            
                                            <div>
                                                <button name="submet" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="payment-button-amount">Update</span>
                                                
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

<?php include("../includes/admin_footer.php"); ?>
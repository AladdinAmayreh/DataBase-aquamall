<?php 
include("../includes/connect.php");
//the action will start if user press on button
if (isset($_POST['submet'])) {
// fetch Data from web form
	$email   =$_POST['admin_email'];
	$password=$_POST['admin_password'];
	$fullname=$_POST['fullname'];
	
    $query ="UPDATE admin SET admin_email='$email',
                            admin_password='$password',
                            fullname='$fullname'
                            WHERE admin_id ={$_GET['admin_id']}";
	
	//perform query
	mysqli_query($conn,$query);
	//prevent refresh for adding same record on database
    header("location:manage.php");
    exit;
	




    }




	
    //fetch old data
    $query   = "SELECT * FROM admin WHERE admin_id={$_GET['admin_id']}";
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
                                    <div class="card-header">Update Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Admin </h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label  for="cc-payment" class="control-label mb-1">Admin Email</label>
                                                <input id="cc-pament" name='admin_email' type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['admin_email']?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label  for="cc-name" class="control-label mb-1">Admin Paswword</label>
                                                <input id="cc-name" name= 'admin_password' type="password" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $row['admin_password']?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Admin Full Name</label>
                                                <input id="cc-number" name= 'fullname' type="tel" class="form-control cc-number identified visa"value="<?php echo $row['fullname']?>"data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number" >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                               
                                            </div>
                                            <div>
                                                <button name="submet" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="payment-button-amount">Update</span>
                                                
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                          

                           
                                <!-- END DATA TABLE-->
                            </div>
                          </div>

<?php include("../includes/admin_footer.php"); ?>
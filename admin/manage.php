<?php 
include("../includes/connect.php");
//the action will start if user press on button
if (isset($_POST['submet'])) {
// fetch Data from web form
	$email   =$_POST['admin_email'];
	$password=$_POST['admin_password'];
	$fullname=$_POST['fullname'];
	
	$query ="insert into admin(admin_email,admin_password,fullname) values('$email','$password','$fullname')";
	
	//perform query
	mysqli_query($conn,$query);
     //prevent refresh for adding same record on database
	header('location:manage.php');
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
                                    <div class="card-header">Create Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Admin </h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label  for="cc-payment" class="control-label mb-1">Admin Email</label>
                                                <input id="cc-pament" name='admin_email' type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label  for="cc-name" class="control-label mb-1">Admin Paswword</label>
                                                <input id="cc-name" name= 'admin_password' type="password" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Admin Full Name</label>
                                                <input id="cc-number" name= 'fullname' type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                               
                                            </div>
                                            <div>
                                                <button name="submet" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="payment-button-amount">Save</span>
                                                
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                           	$query = "SELECT * FROM admin";
                                           	$result= mysqli_query($conn,$query);
                                           	while($row=mysqli_fetch_assoc($result)){

                                           		echo "<tr>";
                                           		echo "<td>{$row['admin_id']}</td>";
                                           		echo "<td>{$row['admin_email']}</td>";
												echo "<td>{$row['fullname']}</td>";
												echo "<td><a href ='edit_admin.php?admin_id={$row['admin_id']}' class='btn
												             btn-warning'> EDIT</a></td>";
												echo "<td><a href ='delete_admin.php?admin_id={$row['admin_id']}' class='btn
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

<?php include("../includes/admin_footer.php"); ?>
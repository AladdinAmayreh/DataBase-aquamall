<?php
    include('includes/public_header.php'); 
    if (!isset($_SESSION['customer_id'])) {
        echo "<script> window.top.location='checkout.php'; </script>";
        exit();
    }
    
?>
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Your order</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 col-lg-5 m-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>
                            <?php
                                $query  = "SELECT * FROM product ";
                                $result = mysqli_query($conn,$query);
                                 while ( $row = mysqli_fetch_assoc($result) ) {
                                    foreach($_SESSION["product_id"] as $key => $value) {
                                        if ($row['product_id'] == $value) {
                                            echo "<li><span>{$row['product_name']}</span>
                                                    <span>{$row['product_price']} $</span></li>";
                                        }
                                    }
                                }  
                                
                            ?>
                        
                            <li><span>Subtotal</span> 
                                <span>
                                    <?php 
                              if (isset($price)) {
                                    echo $price . "$";
                               }else{
                                     echo 0;
                                    }
                                ?>     
                                </span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>Total</span> <span>
                                <?php 
                              if (isset($price)) {
                                    echo $price . "$";
                               }else{
                                     echo 0;
                                    }
                                ?>     
                            </span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Paypal</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>

                        <button class="btn essence-btn"> Place Order </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
<?php
    include('includes/public_footer.php'); 
?>
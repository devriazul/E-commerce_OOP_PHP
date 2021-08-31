<?php 
    include('layout/header.php'); 
    include('../function/helper.php');
?>         

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-search">
                                                <input type="email" value="Search">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Newest</a>
                                                        <a href="#" class="dropdown-item">Popular</a>
                                                        <a href="#" class="dropdown-item">Most sale</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">$0 to $50</a>
                                                        <a href="#" class="dropdown-item">$51 to $100</a>
                                                        <a href="#" class="dropdown-item">$101 to $150</a>
                                                        <a href="#" class="dropdown-item">$151 to $200</a>
                                                        <a href="#" class="dropdown-item">$201 to $250</a>
                                                        <a href="#" class="dropdown-item">$251 to $300</a>
                                                        <a href="#" class="dropdown-item">$301 to $350</a>
                                                        <a href="#" class="dropdown-item">$351 to $400</a>
                                                        <a href="#" class="dropdown-item">$401 to $450</a>
                                                        <a href="#" class="dropdown-item">$451 to $500</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <?php

                                $cat_id = $_GET['cat_id'];
                                if(!isset($_GET['page'])){
                                    $ini = 0;
									
                                }else{
                                    $ini = $_GET['page'];
                                }

                                $sql = "SELECT * FROM products where category_id='$cat_id' limit $ini,3";
                                $connection = db_config::DBConnect();
                                $resource_data = $connection->view($sql);
                                while($resource_obj = $resource_data->fetch_object()){  
                                  
                                ?>

                            
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="product-detail.php?product_id=<?php echo $resource_obj->id; ?>"><?php echo $resource_obj->name; ?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image" style="height:240px;">
                                        <?php 
                                            $helper = Helper::HelperConnect(); 
                                            $image_obj = $helper->ProductIDToImage($resource_obj->id);
                                            $pro_image = $image_obj->fetch_object();
                                        ?>
                                        <a href="product-detail.html">
                                            <img src="../image/<?php echo $pro_image->product_image_name; ?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price" style="color:white;">
                                        <h5>$<del><?php echo $resource_obj->selling_price; ?></del>&nbsp;<span>$</span><?php echo $resource_obj->selling_price - ($resource_obj->selling_price * $resource_obj->discount)/100; ?> <?php echo " (-". $resource_obj->discount ."%)"; ?></h5>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
							

                            

							<!--Pagination Code Start-->
							
							
							<?php 

								$sql = "SELECT * FROM products where category_id='$cat_id'";
								$connection = db_config::DBConnect();
								$resource_data = $connection->view($sql);
																
								$loop_counter = $resource_data->num_rows/3;
								for ($i=1; $i <= $loop_counter; $i++) { ?>
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center">
										<li class="page-item">
											<a class="page-link" href="?cat_id=<?php echo $cat_id; ?>&page=<?php echo $i*3-3; ?>">
												<?php echo $i; ?>
											</a>
										</li>
									</ul>
								</nav>
							<?php } ?>
							
							
							<!--Pagination Code end-->
							
							
							

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        


<?php include('layout/footer.php'); ?>
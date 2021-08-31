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
                    <li class="breadcrumb-item active">Wishlist</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Wishlist Start -->
        <div class="wishlist-page">
            <div class="container-fluid">
                <div class="wishlist-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Add to Cart</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <?php
                                                                
                                        $user_id = $_SESSION['login']->user_id;
                                        $sql = "SELECT * FROM wishlist WHERE user_id='$user_id'";
                                        $connection = db_config::DBConnect();
                                        $resource_data = $connection->view($sql);
                                        while($resource_obj = $resource_data->fetch_object()){ 


                                        $helper = Helper::HelperConnect();
                                        $pro_info = $helper->ProductIDToProductAllInfo($resource_obj->product_id);
                                        $products = $pro_info->fetch_object();
                                        
                                        $pro_img_resource = $helper->ProductIDToImage($resource_obj->product_id);
                                        $pro_img = $pro_img_resource->fetch_object();

                                    ?>

                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="../image/<?php echo $pro_img->product_image_name; ?>" alt="Image"></a>
                                                    <p><?php echo $products->name; ?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $products->selling_price * $resource_obj->qty; ?></td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="<?php echo $resource_obj->qty; ?>">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td><button class="btn-cart">Add to Cart</button></td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist End -->
 
<?php include('layout/footer.php'); ?>
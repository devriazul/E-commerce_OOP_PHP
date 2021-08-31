<?php include('layout/header.php'); ?>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Login & Register</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <?php 
                        if(isset($_SESSION['msg'])){
                            echo "<p>".$_SESSION['msg']."</p>";
                            unset($_SESSION['msg']);
                        }
                    ?>
                    <div class="col-lg-6">   

                        <form action="../function/functions.php" method="post" enctype="multipart/form-data"> 
                        <div class="register-form">
                            <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" name="fname" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name"</label>
                                        <input class="form-control" name="lname" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" name="email" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" name="mobile" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input class="form-control" type="text" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Retype Password</label>
                                        <input class="form-control" type="text" name="retype_password" placeholder="Password">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Image</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" name="register">Submit</button>
                                    </div>
                                
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form action="../function/functions.php" method="post"> 
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail / Username</label>
                                    <input class="form-control" type="text" name="email" placeholder="E-mail / Username">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="text" name="password" placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn" name="login">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
        
                
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.html" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="cart.html" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->  
        
<?php include('layout/footer.php'); ?>
  
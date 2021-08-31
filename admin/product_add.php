<?php include('layout/header.php'); 
  include('../function/db_config.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <h2>Add Product</h2>
            
            <form action="../function/functions.php" method="post" enctype="multipart/form-data">
              
              <select name="category_id" class="form-control">
                <option>Select Category</option>
                <?php 

                  $sql = "SELECT * FROM categories";
                  $connection = db_config::DBConnect();
                  $resource_data = $connection->view($sql);
                  while($resource_obj = $resource_data->fetch_object()){
                ?>  
                  <option value="<?php echo $resource_obj->id; ?>"><?php echo $resource_obj->name; ?></option>
              <?php } ?>
              </select> <br>

              <select name="subcategory_id" class="form-control">
                <option>Select Sub Category</option>  
                <?php 

                  $sql = "SELECT * FROM subcategories";
                  $connection = db_config::DBConnect();
                  $resource_data = $connection->view($sql);
                  while($resource_obj = $resource_data->fetch_object()){
                ?>  
                  <option value="<?php echo $resource_obj->id; ?>"><?php echo $resource_obj->name; ?></option>
              <?php } ?>
              </select> <br>

              <input type="text" class="form-control" placeholder="product_name" name="product_name"> <br>
              <input type="text" class="form-control" placeholder="product_description" name="product_description"> <br>
              <input type="text" class="form-control" placeholder="buying_price" name="buying_price"> <br>
              <input type="text" class="form-control" placeholder="selling_price" name="selling_price"> <br>
              <input type="text" class="form-control" placeholder="discount" name="discount"> <br>
              <input type="text" class="form-control" placeholder="vat" name="vat"> <br>
              XL: <input type="checkbox" class="form-control" name="size[]" value="xl">XXL: <input type="checkbox" class="form-control" name="size[]" value="xxl"> Small: <input type="checkbox" class="form-control" name="size[]" value="small"> <br>

              <input type="text" class="form-control" placeholder="product_qty" name="product_qty"> <br>

              Red: <input type="checkbox" class="form-control" name="color[]" value="red">Green: <input type="checkbox" class="form-control" name="color[]" value="green"> Blue: <input type="checkbox" class="form-control" name="color[]" value="blue"> <br>

              Main image: <input type="file" name="image1"> <br><br>
              Sub image: <input type="file" name="image2"> <br><br>
              Sub image: <input type="file" name="image3"> <br><br>

              <input type="submit" value="product add" name="product_submit">
            </form>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include('layout/footer.php'); ?>
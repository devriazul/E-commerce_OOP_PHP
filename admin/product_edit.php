<?php 
  include('layout/header.php'); 
  include('../function/db_config.php');

  $id = $_GET['id'];

  $sql = "SELECT * from products where id='$id'";

  $connection = db_config::DBConnect();
  $resource_data = $connection->view($sql);
  $pro_resource_obj = $resource_data->fetch_object();
  //print_r($resource_obj);
  //die();
?>
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
            
            <form action="../function/functions.php" method="post">
              
              <select name="category_id" class="form-control">
                <option>Select Category</option>
                <?php 

                  $sql = "SELECT * FROM categories";
                  $connection = db_config::DBConnect();
                  $resource_data = $connection->view($sql);
                  while($resource_obj = $resource_data->fetch_object()){
                ?>  
                  <option value="<?php echo $resource_obj->id; ?>" <?php if($pro_resource_obj->category_id == $resource_obj->id){ echo "Selected"; } ?>><?php echo $resource_obj->name; ?></option>
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
                  <option value="<?php echo $resource_obj->id; ?>"  <?php if($pro_resource_obj->sub_category_id == $resource_obj->id){ echo "Selected"; } ?>><?php echo $resource_obj->name; ?></option>
              <?php } ?>
              </select> <br>

              <input type="text" class="form-control" placeholder="product_name" name="product_name" value="<?php echo $pro_resource_obj->name; ?>"> <br>
              <input type="text" class="form-control" placeholder="product_description" name="product_description" value="<?php echo $pro_resource_obj->description; ?>"> <br>
              <input type="text" class="form-control" placeholder="buying_price" name="buying_price" value="<?php echo $pro_resource_obj->buying_price; ?>"> <br>
              <input type="text" class="form-control" placeholder="selling_price" name="selling_price" value="<?php echo $pro_resource_obj->selling_price; ?>"> <br>
              <input type="text" class="form-control" placeholder="discount" name="discount" value="<?php echo $pro_resource_obj->discount; ?>"> <br>
              
              <input type="text" class="form-control" placeholder="vat" name="vat" value="<?php echo $pro_resource_obj->vat; ?>"> <br>
              
              <input type="hidden" name="id" value="<?php echo $pro_resource_obj->id; ?>"> <br>
              
              <?php //print_r(json_decode($pro_resource_obj->size));die(); ?>
              XL: <input type="checkbox" class="form-control" name="size[]" value="xl" <?php if(in_array("xl",json_decode($pro_resource_obj->size))){ echo "checked"; } ?>>

              XXL: <input type="checkbox" class="form-control" name="size[]" value="xxl" <?php if(in_array("xl",json_decode($pro_resource_obj->size))){ echo "checked"; } ?>> 

              Small: <input type="checkbox" class="form-control" name="size[]" value="small" <?php if(in_array("small",json_decode($pro_resource_obj->size))){ echo "checked"; } ?>> <br>

              <input type="text" class="form-control" placeholder="product_qty" name="product_qty" value="<?php echo $pro_resource_obj->stock_qty; ?>"> <br>

              Red: <input type="checkbox" class="form-control" name="color[]" value="red" <?php if(in_array("red",json_decode($pro_resource_obj->color))){ echo "checked"; } ?>>

              Green: <input type="checkbox" class="form-control" name="color[]" value="green" <?php if(in_array("green",json_decode($pro_resource_obj->color))){ echo "checked"; } ?>>

               Blue: <input type="checkbox" class="form-control" name="color[]" value="blue" <?php if(in_array("blue",json_decode($pro_resource_obj->color))){ echo "checked"; } ?>> <br>

              <input type="submit" value="product Update" name="product_update">
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
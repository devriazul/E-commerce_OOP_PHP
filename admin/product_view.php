<?php 
  include('layout/header.php'); 
  include('../function/helper.php');
?>

  <div class="content-wrapper">
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
            <?php 
               if(isset($_SESSION['test_sess'])){
                  echo "<p>".$_SESSION['test_sess']."</p>";
                  unset($_SESSION['test_sess']);
               } 
            ?>
            <h2>Product View</h2>
            <table class="table table-bordered">
              <tr>
                <th>ID</th>
                <th>Sku</th>
                <th>Image</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
              
                <?php 
                  $sql = "SELECT products.id,products.name,products.sku,subcategories.name,categories.name FROM products LEFT JOIN subcategories ON products.sub_category_id=subcategories.id LEFT JOIN categories ON products.category_id=categories.id";

                  $connection = db_config::DBConnect();
                  $HelperConnect = Helper::HelperConnect();
                  $resource_data = $connection->view($sql);
                  while($resource_obj = $resource_data->fetch_object()){ ?>
                    <tr>
                      <td><?php echo $resource_obj->id; ?></td>
                      <td><?php echo $resource_obj->sku; ?></td>
                      <td>
						  <?php
						   if($HelperConnect->ProductIDToImage($resource_obj->id) == null){
							echo "no image found";
						   }else{ ?>
							<img src="../image/<?php 
								
								$img_obj = $HelperConnect->ProductIDToImage($resource_obj->id);
								$pro_img = $img_obj->fetch_object();
								echo $pro_img->product_image_name;
								
							?>" height="50px">
						  <?php } ?>
					  </td>
                      <td><?php echo $resource_obj->name; ?></td>
                      <td><a href="product_edit.php?id=<?php echo $resource_obj->id; ?>">Edit</a>
                        <a onclick="imgdeletealert(<?php echo $resource_obj->id; ?>)">Delete</a></td>
                    </tr>
                 <?php } ?>
            </table>

          </section>
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript">
    
    function imgdeletealert(id){
      value = confirm("Do you sure want to delete?");
          if(value == true){
            window.location.href = '../function/functions.php?pro_delete_id='+id;
      }  
    }

  </script>
<?php include('layout/footer.php'); ?>
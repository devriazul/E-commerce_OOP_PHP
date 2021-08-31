<?php include('layout/header.php'); ?>
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
            <h2>Add Category</h2>
            <?php 

              include('../function/db_config.php');
              if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "SELECT * FROM categories where id='$id'";
                $connection = db_config::DBConnect();
                $resource_data = $connection->view($sql);
                $resource_obj = $resource_data->fetch_object();
              
              }
            ?>
            <form action="../function/functions.php" method="post">
              <input type="text" class="form-control" name="category_name" value="<?php echo $resource_obj->name; ?>"> <br>
              <input type="hidden" name="id" value="<?php echo $resource_obj->id; ?>">
              <input type="submit" name="category_update">
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
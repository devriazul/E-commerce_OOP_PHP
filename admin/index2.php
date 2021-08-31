<?php 
  include('layout/header.php'); 
  include('../function/db_config.php');
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
            <?php 
               if(isset($_SESSION['test_sess'])){
                  echo "<p>".$_SESSION['test_sess']."</p>";
                  unset($_SESSION['test_sess']);
               } 
            ?>
            <h2>Category View</h2>
            <table class="table table-bordered">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
              
                <?php 
                  $sql = "SELECT * FROM categories";
                  $connection = db_config::DBConnect();
                  $resource_data = $connection->view($sql);
                  while($resource_obj = $resource_data->fetch_object()){ ?>
                    <tr>
                      <td><?php echo $resource_obj->id; ?></td>
                      <td><?php echo $resource_obj->name; ?></td>
                      <td><a href="cat_edit.php?id=<?php echo $resource_obj->id; ?>">Edit</a>
                        <a onclick="deletealert(<?php echo $resource_obj->id; ?>)">Delete</a></td>
                    </tr>
                 <?php } ?>
            </table>
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
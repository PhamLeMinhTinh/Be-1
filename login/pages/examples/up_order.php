
  <?php
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/productsModel.php");
require("../../../models/protypesModel.php");
require("../../../models/manufactures.php");
require("../../../models/userModel.php");
require("../../../models/orderModel.php");
// Products
$Products = new Products;
$getAllProductsNew = $Products->getAllProducts();

//var_dump($getProductsById[0]['id']); exit;
$order=new orderModel;
$getAllOrder=$order->getAllOrders();
// Protypes
$Protypes = new Protypes;

$getAllProtypes = $Protypes->getAllProtypes();
if(isset($_GET['id'])){
  $id = $_GET['id']; 
}
$getAllOrder=$order->getAllOrders();
$getProtypesById = $Protypes->getProtypesById($id );

// Manufactures
$Manufactures = new Manufactures;
$getAllManufactures = $Manufactures->getAllManufactures();
 
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $addressid = $_POST['addressid'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $note = $_POST['note'];
    $total = $_POST['total'];
    $time = $_POST['time'];
    $updateOrder = $order->updateOrder("#".''.$id,$user_id,$name,$addressid,$email,$telephone,$note,$total,$time);
    header('Location: order.php');
  }
?>

<?php include("header.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="products.php"></i>Order</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="up_order.php?id=<?php echo $id?>" method="post">
    <section class="content">
      <div class="row">
      <div class="col-md-3">
       
          <div class="card-header">
            
            <div class="card-tools">
               
              </div>
          </div>
          <div class="card-body">
          <div class="form-group">
           
            </div>
            <div class="form-group">
              
            </div>
            <div class="form-group">
           
             
            </div>
        
        </div>
      </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Order</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">MHD</label>
                <input type="text" id="inputName" name="name" value="<?= $getAllOrder[0]['id'] ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Name</label>               
                <input name="name" type="text" id="inputClientCompany" value="<?= $getAllOrder[0]['name'] ?>" class="form-control">               
              </div>
              <div class="form-group">
                <label for="inputStatus">Addressid</label>               
                <input name="addressid" type="text" id="inputClientCompany" value="<?= $getAllOrder[0]['addressid'] ?>" class="form-control">              
              </div>
              <div class="form-group">
                <label for="inputDescription">Email</label>
                <textarea name="email" id="inputDescription" class="form-control" rows="4"><?= $getAllOrder[0]['email'] ?></textarea>
              </div>  
              <div class="form-group">
                <label for="inputClientCompany">Telephone</label>
                <input name="telephone" type="text" value="<?= $getAllOrder[0]['telephone'] ?>" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription"> Note</label>
                <textarea name="note" id="inputDescription" class="form-control" rows="4"><?= $getAllOrder[0]['note'] ?></textarea>
              </div>  
              <div class="form-group">
                <label for="inputStatus">Total</label>               
                <input  name="total" type="text" id="inputProjectLeader" value="<?= $getAllOrder[0]['total'] ?>" class="form-control">             
              </div>
              <div class="form-group">
                <label for="inputStatus">Time</label>               
                <input  name="time" type="text" id="inputProjectLeader" value="<?= $getAllOrder[0]['time'] ?>" class="form-control">             
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
      <div class="col-3"></div>
        <div class="col-6">
          <a href="order.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Updata Product" class="btn btn-success float-right">
      </div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>

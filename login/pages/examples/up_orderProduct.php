
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
if(isset($_GET['id']) && isset($_GET['product_id'])){
    $id = $_GET['id'] ;
    $product_id=$_GET['product_id'];
}
$getAllProductOrdersByOrderIDAndProductID=$order->getAllProductOrdersByOrderIDAndProductID("#".''.$id ,$product_id);
// Protypes
$Protypes = new Protypes;

$getAllProtypes = $Protypes->getAllProtypes();



 
  if(isset($_POST['submit']))
  {
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $discount = $_POST['discount'];
    $amount = $_POST['amount'];
    $updateProductOfOrder = $order->updateProductOfOrder("#".''.$id,$product_id,$price,$quantity,$discount,$amount);
     header("Location: orderProducts.php?id=$id");
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
    <form action="up_orderProduct.php?id=<?php echo $id?>&product_id=<?php echo $product_id ?>" method="post">
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
                <input type="order_id" id="inputName" name="order_id" value="<?= $getAllProductOrdersByOrderIDAndProductID[0]['order_id'] ?>" class="form-control" disabled>
              </div>
              <div class="form-group">
                <label for="inputStatus">Product_id</label>               
                <input name="product_id" type="text" id="inputClientCompany" value="<?= $getAllProductOrdersByOrderIDAndProductID[0]['product_id'] ?>" class="form-control" disabled>               
              </div>
              <div class="form-group">
                <label for="inputStatus">Price</label>               
                <input name="price" type="text" id="inputClientCompany" value="<?= $getAllProductOrdersByOrderIDAndProductID[0]['price'] ?>" class="form-control">              
              </div>
              <div class="form-group">
                <label for="inputStatus">Quantity</label>               
                <input name="quantity" type="text" id="inputClientCompany" value="<?= $getAllProductOrdersByOrderIDAndProductID[0]['quantity'] ?>" class="form-control">              
              </div>
              <div class="form-group">
                <label for="inputStatus">Discount</label>               
                <input name="discount" type="text" id="inputClientCompany" value="<?= $getAllProductOrdersByOrderIDAndProductID[0]['discount'] ?>" class="form-control">              
              </div>
              <div class="form-group">
                <label for="inputStatus">Amount</label>               
                <input name="amount" type="text" id="inputClientCompany" value="<?= $getAllProductOrdersByOrderIDAndProductID[0]['amount'] ?>" class="form-control">              
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
          <a href="<?php if(isset($_GET['id']))
           {?> orderProducts.php?id=<?php echo $_GET['id'];
            }
            else
            {
            ?>
            order.php
            <?php
            }
            ?>" class="btn btn-secondary">Cancel</a>
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

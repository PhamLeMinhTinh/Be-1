
<?php include("header.php") ?>


<?php
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/productsModel.php");
require("../../../models/protypesModel.php");
require("../../../models/manufactures.php");
require("../../../models/userModel.php");
require("../../../models/orderModel.php");
$order=new orderModel;
if(isset($_GET['id'])){
  $id = $_GET['id']; 
}
$getAllProductOrdersByOrderID=$order->getAllProductOrdersByOrderID("#".''.$id);

// Products
$Products = new Products;
$getAllProductsNew = $Products->getAllProductsNew();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="products-add.php"></i>Create new Product</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Products_Order</h3>         
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 8%">
                         Order_id
                      </th>
                      <th style="width: 18%">
                         product_id
                      </th>
                      <th style="width: 18%">
                          Price
                      </th>
                      <th style="width: 10%;">
                          Quantity
                      </th>
                      <th style="width: 10%" class="text-center">
                          Discount
                      </th>
                      <th style="width: 12%" class="text-center">
                          Amount
                      </th>
                      
                      <th style="width: 24%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach($getAllProductOrdersByOrderID as $value):?>              
                  <tr>
                      <td>
                          <?php echo $value['order_id'] ?>
                      </td>
                      <td>
                          <a>
                            <?php echo $value['product_id'] ?>
                          </a>
                         
                      </td>
                      <td>
                     <?php echo number_format($value['price'])?> VNĐ
                      </td>
                      <td nowrap style="overflow: hidden; text-overflow: ellipsis; max-width: 20ch;"> <!--style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"-->
                        <?php echo $value['quantity'] ?>
                      </td>
                      <td class="project-state">
                      <?php echo $value['discount'] ?>
                      </td>
                      <td class="project-state">
                         <?php echo $value['amount'] ?>
                      </td>
                      
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="up_orderProduct?id=<?php echo $id?>&product_id=<?php echo $value['product_id']?>">
                              <i class="fas fa-pencil-alt">   
                              </i>
                              Update
                          </a>
                          <a class="btn btn-danger btn-sm" href="del_orderProduct?id=<?php echo $id?>&product_id=<?php echo $value['product_id']?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
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

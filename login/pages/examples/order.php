
<?php
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/productsModel.php");
require("../../../models/protypesModel.php");
require("../../../models/manufactures.php");
require("../../../models/userModel.php");
require("../../../models/orderModel.php");
//orders
$orderModel=new orderModel;
$order=$orderModel->getAllOrders();
// Products
$Products = new Products;
$getAllProductsNew = $Products->getAllProductsNew();
?>
<?php include("header.php") ?>



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
          <h3 class="card-title">Products</h3>         
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
                      <th style="width: 4%">
                          MHD
                      </th>
                      <th style="width: 1%">
                          User_Id
                      </th>
                      <th style="width: 12%">
                          Name
                      </th>
                      <th style="width: 16%;">
                      Addressid
                      </th>
                      <th style="width: 12%" class="text-center">
                      Email
                      </th>
                      <th style="width: 8%" class="text-center">
                      Telephone
                      </th>
                      <th style="width: 4%" class="text-center">
                      Note
                      </th>
                      <th style="width: 13%" class="text-center">
                      Total
                      </th>
                      <th style="width: 6%" class="text-center">
                      Time
                      </th>
                      <th style="width: 24  %">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach($order as $value):?>              
                  <tr>
                      <td>
                          <?php echo $value['id'] ?>
                      </td>
                      <td>
                          <a>
                            <?php echo $value['user_id'] ?>
                          </a>
                          <!-- <br/>
                          <small>
                              Created <?php //echo $value['created_at'] ?>
                          </small> -->
                      </td>
                      <td>
                      <?php echo $value['name'] ?>
                      </td>
                      <td nowrap style="overflow: hidden; text-overflow: ellipsis; max-width: 20ch;"> <!--style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"-->
                        <?php echo $value['addressid'] ?>
                      </td>
                      <td class="project-state">
                        <?php echo $value['email']?> 
                      </td>
                      <td class="project-state">
                         <?php echo $value['telephone'] ?>
                      </td>
                      <td class="project-state">
                         <?php echo $value['note'] ?>
                      </td>
                      <td class="project-state">
                      <?php echo number_format($value['total'])?> VNĐ
                      </td>
                      <td class="project-state">
                          <?php echo $value['time'] ?>
                      </td>
                      <?php $id=trim($value['id'],"#")?>
                      <td>
                      <a class="btn btn-warning btn-sm" href="orderProducts.php?id=<?= $id?>">
                        <i class="bi bi-eye-fill"></i>
                              </i>
                              Detail
                          </a>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="up_order.php?id=<?= $id?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Update
                          </a>
                          </td> 
                          <td>

                          
                          <a class="btn btn-danger btn-sm" href="del_order.php?id=<?= $id ?>">
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

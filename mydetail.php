<?php session_start(); ?>
<?php
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");
require("models/userModel.php");
require("models/orderModel.php");
// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();
$getAllProductsNew = $Products->getAllProductsNew();
$getProductsLimit3 = $Products->getProductsLimit3();
$getProductsLimit6 = $Products->getProductsLimit6();
$getProductsLimit66 = $Products->getProductsLimit66();
$getProductsLimit12 = $Products->getProductsLimit12();
$getAllProductsSelling = $Products->getAllProductsSelling();
$user=new User;
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
$order=new orderModel;
$getOrderByOrderID=$order->getOrderByOrderID("#".''.$id);
$getAllProductOrdersByOrderID=$order->getAllProductOrdersByOrderID("#".''.$id);

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();

?>

<!-- HEADER -->
<?php include("header.php"); ?>
<!-- /HEADER -->

<!-- SECTION -->
<main class="">
						
<input id="get_id_order" type="hidden" value="#250965">
<div class="layout-info-account account-order">
	<div class="title-infor-account text-center">
		<h1>Chi tiết đơn hàng </h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-3 sidebar-account">
				<div class="AccountSidebar">
	<h3 class="AccountTitle titleSidebar">Tài khoản</h3>
	<div class="AccountContent">
		<div class="AccountList">
			<ul class="list-unstyled">			
				<li class="current"><a href="/account">Thông tin tài khoản</a></li>
				<li><a href="/account/addresses">Danh sách địa chỉ</a></li>
				<li class="last"><a href="/account/logout">Đăng xuất</a></li>
			</ul>
		</div>
	</div>
</div>
			</div>	
			<div class="col-xs-12 col-sm-9">
				<div id="control-order-tracking-acc">
					<div class="order-tracking--info">
						<div class="order-tracking--info-desc">
							<div class="row">
								<div class="col-md-12 col-sm-6 col-xs-12">
									<div class="order-col">
										<h3>Địa chỉ đơn hàng</h3>
										<div class="list-info">
											<div class="item-info">
												<span class="title">Khách hàng:</span>
												<span class="desc">
													
                                               <?php echo $getOrderByOrderID['name'] ?>
													
												</span>
											</div>
											<div class="item-info">
												<span class="title">Điện thoại:</span>
												<span class="desc"><?php echo $getOrderByOrderID['telephone'] ?></span>
											</div>
											<div class="item-info">
												<span class="title">Địa chỉ:</span>
												<span class="desc">
													
                                                <?php echo $getOrderByOrderID['addressid'] ?>
												</span>
											</div>
											
										</div>
									</div>
								</div>
                                
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="order-col">
										<h3>Mã đơn hàng</h3>
										<div class="order-code">
											<span><?php echo $getOrderByOrderID['id'] ?></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="order-col">
										<h3>Ngày đặt hàng</h3>
										<div class="order-date">
											<span><?php echo $getOrderByOrderID['time'] ?></span>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					
					 
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 ">
						<div class="content-page customer-table-wrap detail-table-order">
							<div class="customer-table-bg">						
								<p class="title-detail">Chi tiết đơn hàng	</p>
								<div class="table-responsive">
									<table id="order_details" class="table tableOrder">
										<tbody><tr height="40px">
											<th class="">Sản phẩm</th>
											<th class="text-center">Mã sản phẩm</th>
											<th class="text-center">Đơn giá</th>
											<th class="text-center">Số lượng</th>
											<th class="total text-right">Thành tiền</th>
										</tr>
										<?php foreach ($getAllProductOrdersByOrderID as  $value) {
                                            # code...
                                        ?>
										<tr height="40px" id="1403114074" class="odd">
											<td class="title">
											
												<span class="variant_acc">
													<?php echo $a=($Products->getProductsById($value['product_id']))[0]['name']?>
												</span>
												
											</td>
											<td class="sku text-center"><?php echo $value['product_id']?></td>
											<td class="money text-center"><?php echo $value['price']?>₫</td>
											<td class="quantity center text-center"><?php echo $value['quantity']?></td>
											<td class="total money text-right"><?php echo $value['amount']?>₫</td>
										</tr>
										<?php
                                        }
                                        ?>
										
										
										<tr height="40px" class="order_summary">
											<td class="text-right" colspan="4"><b>Giá sản phẩm</b></td>
											<td class="total money text-right"><b><?php echo $getOrderByOrderID['total']?>₫</b></td>
										</tr>   

										
										<tr height="40px" class="order_summary ">
											<td class="text-right" colspan="4"><b>Phí vận chuyển </b></td>
											<td class="total money text-right"><b>0₫</b></td>
										</tr>

										<tr height="40px" class="order_summary order_total">
											<td class="text-right" colspan="4"><b>Tổng tiền</b></td>
											<td class="total money text-right"><b><?php echo $getOrderByOrderID['total']?>₫ </b></td>
										</tr>    
									</tbody>
                                    </table>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xs-12">
						<a href="myorder.php" id="return_to_store">Quay lại trang tài khoản </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





					</main>
<!-- FOOTER -->
<?php include("footer.php"); ?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>
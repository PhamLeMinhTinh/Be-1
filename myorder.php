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
$user = new User;
$order = new orderModel;
$getAllOrders = $order->getAllOrdersByUserID($_SESSION['user']['user_id']);
// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();
$orderCancel = [];
if (isset($_COOKIE['orderCancel'])) {
	$arrId = json_decode($_COOKIE['orderCancel'], true);

	// $orderCancel = $order->getOrderByIds($arrId);
}
?>

<!-- HEADER -->
<?php include("header.php"); ?>
<!-- /HEADER -->

<!-- SECTION -->
<form action="order.php" method="post">
	<main class="">

		<div class="layout-info-account">
			<br>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-1 sidebar-account">

					</div>
					<div class="col-xs-12 col-sm-11">
						<div class="row">
							<div class="col-xs-12" id="customer_sidebar">
								<h2 class="title-detail">Thông tin tài khoản <a href="#" class="cta-btn"><i
											class="bi bi-gear"></i></a></h2>

								<p class="name_account">Name acount: <?php echo $_SESSION['username'] ?></p>


								<p class="email ">Email:
									<?php echo $user->getAllUserByID($_SESSION['user']['user_id'])[0]['email'] ?></p>
								<div class="address ">

									<p>Address:
										<?php echo $user->getAllUserByID($_SESSION['user']['user_id'])[0]['address'] ?>
									</p>


									<p> Vietnam</p>
									<p>Telephone:
										<?php echo $user->getAllUserByID($_SESSION['user']['user_id'])[0]['telephone'] ?>
									</p>


								</div>
							</div>
							<div class="col-xs-12" id="customer_orders">
								<div class="customer-table-wrap">
									<div class="customer_order customer-table-bg">

										<p class="title-detail">
											Danh sách đơn hàng mới nhất
										</p>
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th class="order_number text-center">Mã đơn hàng</th>
														<th class="date text-center">Ngày đặt</th>
														<th class="total text-right">Thành tiền</th>
														<th class="payment_status text-center">Trạng thái thanh toán
														</th>
														<th class="fulfillment_status text-center">Trạng Thái đặt hàng
														</th>
														<th class="fulfillment_status text-center">Hủy đơn </th>

													</tr>
												</thead>
												<?php foreach ($getAllOrders as $value) {

													?>
													<tbody>

														<tr>
															<?php $id = trim($value['id'], "#") ?>
															<td class="text-center"><a
																	href="mydetail.php?id=<?php echo $id ?>" title="">
																	<?php echo $value['id'] ?>
																</a></td>
															<td class="text-center">
																<span>
																	<?php echo $value['time'] ?>
																</span>
															</td>
															<td class="text-right"><span class="total money">
																	<?php echo $value['total'] ?>đ
																</span>
															</td>
															<td class="text-center"><span class="status_paid">Chưa thanh
																	toán</span></td>
															<td class="text-center"><span class="status_fulfilled">Đã đặt
																	hàng</span></td>
															<td class="text-center btn-dark"><span class="status_fulfilled">
																	<?php
																	foreach ($arrId as $key) {
																		$i = 0;
																		if ($key == $value['id']) {
																			$order_id = trim($value['id'], "#")
																				?>

																			<a href="cancelOrder.php?id=<?php echo $order_id ?>"><i
																					class="bi bi-x-circle-fill"  onclick="return confirm('Bạn có muốn hủy không??')" >Cancel</i></a>

																			<?php
																			$i = 1;
																			break;

																		}
																	}
																	if ($i == 0) {
																		?>
																		Không thể hủy
																	<?php
																	}

																	?>
																</span></td>

														</tr>




													</tbody>
												<?php }
												?>

											</table>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>


	</main>
</form>
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
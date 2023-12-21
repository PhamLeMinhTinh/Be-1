<?php session_start();

require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");

// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();
$getCountProducts = $Products->getCountProducts();
$getAllProductsNew = $Products->getAllProductsNew();
$getProductsLimit3 = $Products->getProductsLimit3();
$getProductsLimit6 = $Products->getProductsLimit6();
$getProductsLimit66 = $Products->getProductsLimit66();
$getProductsLimit12 = $Products->getProductsLimit12();
$getAllProductsSelling = $Products->getAllProductsSelling();

if (isset($_POST['likedId'])) {
	$id = $_POST['likedId'];
	if (isset($_SESSION['user']['user_id'])) {
		$userId = $_SESSION['user']['user_id'];
		$r = $Products->likeProductUser($id, $userId);
	}
}


if (isset($_POST['cartId'])) {
	if (!isset($_SESSION['user']['user_id'])) {
		header('Location: login/login.php');
	}
	$id = $_POST['cartId'];
	if (isset($_SESSION['user']['user_id'])) {
		$userId = $_SESSION['user']['user_id'];
		$r = $Products->addCart($id, $userId);
	}
}

?>

<!-- HEADER -->
<?php include("header.php"); ?>
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<?php include("aside.php"); ?>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<!-- <div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div> -->
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					<?php $page = $_GET['page'];
                    $offset = ($page - 1) * 6;
                    $getProductsForPage = $Products->getProductsForPage($offset);
                    $totalPages = ceil($getCountProducts[0]['COUNT(*)'] / 6); // 6: là số product 1 trang
                    //var_dump($totalPages); => check tổng số trang
                    ?>

					<?php foreach ($getProductsForPage as $key => $value): ?>
					<!-- product -->
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img  style="height: 200px;" src="./img/<?= $value['image'] ?>" alt="">
								<div class="product-label">
									<?php if ($value1['feature'] == 1): ?>
									<span class="sale">-8%</span>
									<?php endif; ?>
									<span class="new">NEW</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="product.php?id= <?php echo $value['id'] ?>"><?= $value['name'] ?>"</a></h3>
								<?php if ($value1['feature'] == 1): ?>
								<h4 class="product-price"> <?php echo number_format($value['price'] * 0.8); ?>VNĐ<del
										class="product-old-price"><?php echo number_format($value1['price']); ?>VNĐ</del>
								</h4>
								<?php else: ?>
								<h4 class="product-price"> <?php echo number_format($value['price']); ?>VNĐ</h4>
								<?php endif; ?>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="product-btns">


									<form action="all.php?page=1" method="post">
										<input type="hidden" name="likedId" value="<?php echo $value['id']; ?>">
										<button class="btn badge btn-danger"><i class="fa fa-heart-o"></i>
											<?php echo $value['pLike'] ?></button>
									</form>

									<button class="quick-view"><a href="product.php?id=<?php echo $value['id'] ?>"><i
												class="fa fa-eye"></i><span class="tooltipp">quick view</span></a>
										<?php echo $value['product_view'] ?></button>
								</div>
							</div>

							<div class="add-to-cart">
								<form action="all.php?page=1" method="post">
									<input type="hidden" name="cartId" value="<?php echo $value['id']; ?>">
									<button class="add-to-cart-btn "><i class="fa fa-shopping-cart"></i>
										add to cart</button>
								</form>
							</div>
						</div>
					</div>
					<!-- /product -->
					<?php if ($key == 1 || $key == 3): ?> <div class="clearfix visible-sm visible-xs"></div>
					<?php endif; ?>
					<?php if ($key == 2): ?> <div class="clearfix visible-lg visible-md"></div> <?php endif; ?>
					<?php if ($key == 5): ?> <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
					<?php endif; ?>
					<?php endforeach; ?>

				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<span class="store-qty">Showing 20-100 products</span>
					<ul class="store-pagination">
						<?php include("page.php"); ?>
					</ul>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

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
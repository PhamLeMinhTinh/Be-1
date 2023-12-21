<?php session_start(); ?>
<?php
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");
require("models/userModel.php");

// User
$User = new User;

// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();
$getProductsLimit3 = $Products->getProductsLimit3();
// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();

if (isset($_POST['likedId'])) {
	$id = $_POST['likedId'];
	if (isset($_SESSION['user']['user_id'])) {
		$userId = $_SESSION['user']['user_id'];
		$r = $Products->likeProductUser($id, $userId);
		
	$kq=$Products->countwish($userId);
		
	}
	header("Location: index.php");
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
                    <?php
                   
                    if (isset($_GET['keyword'])):
	                    if (isset($_GET['prototype']) && $_GET['prototype'] != 0) {
		                    $search = $Products->searchWithProtype($_GET['keyword'], $_GET['prototype']);
		                   
	                    } else {
		                    $search = $Products->search($_GET['keyword']);
							
	                    }
	                    foreach ($search as $value1): foreach ($getAllProtypes as $value2):
			                    if ($value1['type_id'] == $value2['type_id']): ?>
					<!-- product -->
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img style="height: 200px;" src="./img/<?php echo $value1['image'] ?>" alt="">
								<div class="product-label">
									<!-- <span class="sale">-30%</span><span class="new">NEW</span> -->
								</div>
							</div>
							<div class="product-body">
								<p class="product-category"><?php echo $value2['type_name'] ?></p>
								<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"><?php echo $value1['name'] ?></a>
								</h3>
								<h4 class="product-price"><?php echo number_format($value1['price']) ?>VNĐ
									<!--<del class="product-old-price">VNĐ</del>-->
								</h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="product-btns">
									<form action="store.php?prototype=&keyword=" method="post">
										<input type="hidden" name="likedId" value="<?php echo $value1['id']; ?>">
										<button class="btn badge btn-danger"><i class="fa fa-heart-o"></i>
											<?php echo $value1['pLike'] ?></button>
									</form>

									<button class="quick-view"><a href="product.php?id=<?php echo $value1['id'] ?>"><i
												class="fa fa-eye"></i><span class="tooltipp">quick view</span></a>
										<?php echo $value1['product_view'] ?></button>
								</div>
							</div>
							<div class="add-to-cart">
								
								<form action="store.php?prototype=&keyword=" method="post">
									<input type="hidden" name="cartId" value="<?php echo $value1['id']; ?>">
									<button class="add-to-cart-btn "><i class="fa fa-shopping-cart"></i>
										add to cart</button>
								</form>
							</div>
						</div>
					</div>

					<!-- /product -->
					<!-- <?php if ($key == 1 || $key == 3): ?> <div class="clearfix visible-sm visible-xs"></div> <?php endif; ?>
							<?php if ($key == 2): ?> <div class="clearfix visible-lg visible-md"></div> <?php endif; ?>
							<?php if ($key == 5): ?> <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div> <?php endif; ?> -->
					<?php endif; endforeach; endforeach; endif; ?>


				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<span class="store-qty">Showing 20-100 products</span>
					<ul class="store-pagination">
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
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
<?php session_start();

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
$getAllProductsNew = $Products->getAllProductsNew();
$getProductsLimit3 = $Products->getProductsLimit3();
$getProductsLimit6 = $Products->getProductsLimit6();
$getProductsLimit66 = $Products->getProductsLimit66();
$getProductsLimit12 = $Products->getProductsLimit12();
$getAllProductsSelling = $Products->getAllProductsSelling();

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
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Laptop<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Tai nghe<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Smartphone<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">All</a></li>
								<li><a data-toggle="tab" href="#tab2">Tivi</a></li>
								<li><a data-toggle="tab" href="#tab3">Tai nghe</a></li>
								<li><a data-toggle="tab" href="#tab4"> Smartphone</a></li>	
								<li><a data-toggle="tab" href="#tab5"> Laptop</a></li>
								<li><a data-toggle="tab" href="#tab6"> Chuột</a></li>							
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<?php include("products_type.php"); ?>
					<!-- Products tab & slick -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab7">All</a></li>
								<li><a data-toggle="tab" href="#tab8">Tivi</a></li>
								<li><a data-toggle="tab" href="#tab8">Tai nghe</a></li>
								<li><a data-toggle="tab" href="#tab10"> Smartphone</a></li>
								<li><a data-toggle="tab" href="#tab11">Laptop</a></li>
								<li><a data-toggle="tab" href="#tab12">Chuột</a></li>	
							</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<?php include("best_selling_products.php"); ?>
					<!-- Products tab & slick -->
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">					
								<!-- product widget -->							 
								<?php foreach ($getProductsLimit6  as $key => $value1):?>
									<?php if ($key % 3 == 0) echo "<div>"; ?>													
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value1['image'] ?>" alt="">									
									</div>
									<div class="product-body">
										<?php $getProtypesById = $Protypes->getProtypesById($value1['type_id']);
										foreach($getProtypesById as $value): ?>
										<p class="product-category"><?php echo $value['type_name'] ?> </p>
										<?php endforeach; ?>
										<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"> <?php echo $value1['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value1['price']) ?>VNĐ<!--<del class="product-old-price">VNĐ</del>--> </h4>
									</div>
								</div>
								<?php if($key % 3 == 2) echo "</div>" ?>
								<?php endforeach; ?>								
								<!-- /product widget -->
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<!-- product widget -->							 
							<?php foreach ($getProductsLimit66  as $key => $value1):?>
									<?php if ($key % 3 == 0) echo "<div>"; ?>													
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value1['image'] ?>" alt="">									
									</div>
									<div class="product-body">
										<?php $getProtypesById = $Protypes->getProtypesById($value1['type_id']);
										foreach($getProtypesById as $value): ?>
										<p class="product-category"><?php echo $value['type_name'] ?> </p>
										<?php endforeach; ?>
										<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"> <?php echo $value1['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value1['price']) ?>VNĐ<!--<del class="product-old-price">VNĐ</del>--> </h4>
									</div>
								</div>
								<?php if($key % 3 == 2) echo "</div>" ?>
								<?php endforeach; ?>								
							<!-- /product widget -->
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<!-- product widget -->							 
							<?php foreach ($getProductsLimit12  as $key => $value1):?>
									<?php if ($key % 3 == 0) echo "<div>"; ?>													
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value1['image'] ?>" alt="">									
									</div>
									<div class="product-body">
										<?php $getProtypesById = $Protypes->getProtypesById($value1['type_id']);
										foreach($getProtypesById as $value): ?>
										<p class="product-category"><?php echo $value['type_name'] ?> </p>
										<?php endforeach; ?>
										<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"> <?php echo $value1['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value1['price']) ?>VNĐ<!--<del class="product-old-price">VNĐ</del>--> </h4>
									</div>
								</div>
								<?php if($key % 3 == 2) echo "</div>" ?>
								<?php endforeach; ?>								
							<!-- /product widget -->			
						</div>
					</div>

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

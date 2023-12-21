<?php
if (isset($_SESSION['username'])) {
	//echo "<script>alert('Logged in successfully!');</script>";
}

if (isset($_SESSION['user']['user_id'])) {
	$userId = $_SESSION['user']['user_id'];
	$kqWish = $Products->countwish($userId);
	$kqCart = $Products->countCart($userId);
	$kq = $kqWish["countWish"];
	$kq1 = $kqCart["countCart"];
} else {
	$kq = 0;
	$kq1 = 0;
}

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();
$getNameAndCountProtypes = $Protypes->getNameAndCountProtypes();

// Manufactures
$Manufactures = new Manufactures;
$getAllManufactures = $Manufactures->getAllManufactures();
$getManuNameAndCountManu = $Manufactures->getManuNameAndCountManu();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<style>
		table,
		th,
		td {
			border: 1px solid black;
			text-align: center;
			padding: 8px 20px;
		}
	</style>

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +84 845 455 584</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> admin@gmail.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> 53 Võ Văn Ngân

						</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
					<?php if (!isset($_SESSION['username'])): ?>
					<li><a href="./login/login.php"><i class="fa fa-user-o"></i> My Account</a></li>
					<?php else: ?>
					<li><a href="myorder.php"><i class="fa fa-user-o"></i><?= $_SESSION['username'] ?></a></li>
					<li><a onclick="return confirm('Bạn có muốn đăng xuất không?')" href="./login/logout.php"><i
								class="fa fa-sign-out"></i> Logout</a></li>
					<?php endif; ?>

				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php" class="logo">
								<img src="./img/logooo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form action="store.php" method="get">
								<select class="input-select" name="prototype">
									<option value="0">All Categories</option>

									<?php foreach ($getAllProtypes as $value): ?>
									<option value="<?php echo $value['type_id'] ?>">
										<?php echo $value['type_name'] ?>
									</option>

									<?php endforeach; ?>
								</select>

								<input class="input" name="keyword" placeholder="Search here">


								<button type="submit" class="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<div>
								<a href="yourwishlist.php">
									<i class="fa fa-heart-o"></i>
									<span>Your Wishlist</span>
									<div class="qty"><?php echo $kq ?> </div>
								</a>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="qty"><?php echo $kq1 ?></div>
								</a>
								
								<div class="cart-dropdown">
									<div class="cart-list">
										
									<div class="cart-btns" style="margin: 0px 0px 0px;">
										<a  href="blank.php">View Cart</a>
										<a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>


							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="all.php?page=1">All</a></li>
					<?php foreach ($getAllProtypes as $value): ?>
					<li><a href="store_menu.php?typeid=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a></li>
					<?php endforeach; ?>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->
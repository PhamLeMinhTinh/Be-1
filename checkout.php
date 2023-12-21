<?php session_start(); ?>
<?php
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");

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
?>

<!-- HEADER -->
<?php include("header.php"); ?>
<!-- /HEADER -->

<!-- SECTION -->
<form action="order.php" method="post">
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Billing address</h3>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="first-name" placeholder="First Name">
					</div>
					<div class="form-group">
						<input class="input" type="text" name="last-name" placeholder="Last Name">
					</div>
					<div class="form-group">
						<input class="input" type="email" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<input class="input" type="text" name="address" placeholder="Address" >
					</div>
					<div class="form-group">
						<input class="input" type="text" name="city" placeholder="City">
					</div>
					<div class="form-group">
						<input class="input" type="text" name="country" placeholder="Country">
					</div>
					<div class="form-group">
						<input class="input" type="tel" name="tel" placeholder="Telephone">
					</div>
					
				</div>
				<!-- Order notes -->
				<div class="order-notes">
					<textarea class="input" name="note" placeholder="Order Notes"></textarea>
				</div>
				<!-- /Order notes -->
				<!-- /Billing Details -->

				

				
			</div>

			<!-- Order Details -->
			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Your Order</h3>
				</div>

				<div class="order-summary">
					<div class="order-col">
						<div><strong>PRODUCT</strong></div>
						<div><strong>TOTAL</strong></div>
					</div>


					<div class="order-products">
						<?php $totalP = 0;
                                if (isset($_SESSION['user']['user_id'])) {
	                                $userId = $_SESSION['user']['user_id'];
	                                $getCart = $Products->getCart($userId);

                                ?>
						<!-- product -->
						<?php
	                        foreach ($getCart as $key => $cart) {
                        ?>
						<div class="order-col">
								
							<div><?= $cart['quantity'] ?> <?php echo $cart['name']; ?></div>
							<?php if ($cart['feature'] == 1): ?>
							<div><?php echo number_format($cart['price'] * 0.8 * $cart['quantity']); ?>VNĐ</div>
							<?php $totalP += ($cart['price'] * 0.8) * $cart['quantity'];$_SESSION['total']=$totalP ?>
							<?php else: ?>
							<div><?php echo number_format($cart['price']* $cart['quantity']); ?>VNĐ</div>
							<?php $totalP += ($cart['price']* $cart['quantity'] );$_SESSION['total']=$totalP ?>	
							<?php endif;

                            ?>
						</div>
						
						<?php }
					}?>
						<!-- /product -->
					</div>


					<div class="order-col">
						<div>Shiping</div>
						<div><strong>FREE</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
						<div><strong class="order-total"><?php echo number_format($totalP); ?>VNĐ</strong></div>
					</div>
				</div>

				<div class="payment-method">
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-1">
						<label for="payment-1">
							<span></span>
							Direct Bank Transfer
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-2">
						<label for="payment-2">
							<span></span>
							Cheque Payment
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-3">
						<label for="payment-3">
							<span></span>
							Paypal System
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
				<div class="input-checkbox">
					<input type="checkbox" id="terms">
					<label for="terms">
						<span></span>
						I've read and accept the <a href="#">terms & conditions</a>
					</label>
				</div>
				<button class="primary-btn order-submit">Place order</button> 
			</div>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
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
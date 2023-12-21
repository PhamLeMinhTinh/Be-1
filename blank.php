<?php session_start();

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

<!-- NEWSLETTER -->
<div id="" class="">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1>Your cart</h1>
                    <?php
                    if (isset($_SESSION['user']['user_id'])) {
	                    $userId = $_SESSION['user']['user_id'];
	                    $getCart = $Products->getCart($userId);
	                    if ($getCart != null) {
                    ?>
                    <table border="1" cellspacing="0" cellpadding="5" style="margin: 50px 0px 0px 120px;">
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Add</th>
                            <th>Remove</th>
                        </tr>
                        <?php foreach ($getCart as $key => $cart) {

                        ?>

                        <tr>
                            <td><img src="./img/<?php echo $cart['image']; ?>" alt=""
                                    width="100"><?php echo $cart['name'] ?>
                            </td>
                            <td> <?php echo $cart['quantity']; ?></td>
                            <?php if ($cart['feature'] == 1): ?>
                            <td><?php echo number_format($cart['price'] * 0.8 * $cart['quantity']) ?></td>
                            <?php else: ?>
                            <td><?php echo number_format($cart['price'] * $cart['quantity']) ?></td>
                            <?php endif; ?>

                            <td>
                                <form style="margin-bottom: 30px;" action="quantityProductCart.php" method="post">
                                    <input type="hidden" name="idCart+" value="<?php echo $cart['id']; ?>">
                                    <button class="btn btn-info "><i class="bi bi-arrow-bar-up"></i></i></button>
                                </form>

                                <form action="quantityProductCart.php" method="post">
                                    <input type="hidden" name="idCart-" value="<?php echo $cart['id']; ?>">
                                    <button class="btn btn-info "><i class="bi bi-arrow-bar-down"></i></button>
                                </form>
                            </td>



                            <td>
                                <form action="deleteCart.php" method="post">
                                    <input type="hidden" name="idDeleteCart" value="<?php echo $cart['id']; ?>">
                                    <button class="btn btn-danger "onclick="return confirm('Bạn có muốn xóa không??')" >Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
			                    
		                    }

	                    } else {
                        ?>
                        <h3 style="color:green">EMPTY CARTLIST</h3>
                        <?php

	                    }
                        ?>
                    </table>
                    <?php
                    }
					else{
						?>
                    <a href="login/login.php"><h3 style="color:red">PLEASE LOGIN TO VIEW CARTLIST</h3></a>
                    <?php
					}
                    ?>
                    <a style="margin: 50px 0px 0px;" class="primary-btn cta-btn" href="checkout.php">Thanh toán</a>


                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

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
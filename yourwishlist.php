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
                    <h1>YOUR WISHLIST</h1>

                    <?php if (isset($_SESSION['user']['user_id'])) {
                        $userId = $_SESSION['user']['user_id'];
                        $getWishlist = $Products->getWishlist($userId);

                        if ($getWishlist != null) {
                    ?>
                    <table border="1" cellspacing="0" cellpadding="5" style="margin: 50px 0px 0px 120px;">
                        <tr>
                            <th>Name</th>
                            <th>Remove</th>
                        </tr>

                        <?php
                            foreach ($getWishlist as $key => $wish) {
                                
                        ?>

                        <tr>
                            <td><img src="./img/<?php echo $wish['image']; ?>" alt="" width="100"><a
                                    href="product.php?id=<?php echo $wish['id']; ?>"><?php echo $wish['name'] ?></a>
                            </td>

                            <td>
                                <form action="deletewish.php" method="post">
                                    <input type="hidden" name="idDeleteWish" value="<?php echo $wish['id']; ?>">
                                    <button class="btn btn-danger "
                                        onclick="return confirm('Bạn có muốn xóa không??')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <?php
                            }
                        ?>
                    </table>

                    <?php
                        } else {
                    ?>
                    <h3 style="color:green">EMPTY WISHLIST</h3>
                    <?php
                        }
                    } else {
                    ?>
                    <a href="login/login.php">
                        <h3 style="color:red">PLEASE LOGIN TO VIEW WISHLIST</h3>
                    </a>
                    <?php
                    }
                    
                    ?>

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
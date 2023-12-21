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


 $user_id = $_SESSION['user']['user_id'];

$ProductUser = $user->getUserByUserId($user_id);

//$edituser = $user->editUser($username,$password,$email,$telephone,$address,$user_id);

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();


?>

<!-- HEADER -->
<?php include("header.php"); ?>
<!-- /HEADER -->

<!-- SECTION -->
<div class="container">
<form action="edituser.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nameuser" class="form-label">username</label>
        <input type="text" class="form-control" id="nameuser" name="nameuser"
            value="<?php echo $ProductUser['username'] ?>">
    </div>
    <div class="mb-3">
        <label for="emailuser" class="form-label">Email</label>
        <input type="text" class="form-control" id="emailuser" name="emailuser"
            value="<?php echo $ProductUser['email'] ?>">
    </div>
    <div class="mb-3">
        <label for="telephoneuser" class="form-label">telephone</label>
        <input type="text" class="form-control" id="telephoneuser" name="telephoneuser"
            value="<?php echo $ProductUser['telephone'] ?>">
    </div>
    <div class="mb-3">
        <label for="addressuser" class="form-label">address</label>
        <input type="text" class="form-control" id="addressuser" name="addressuser"
            value="<?php echo $ProductUser['address'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
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
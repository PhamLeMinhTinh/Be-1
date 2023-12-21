<?php
session_start();
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");

$Products = new Products;

if (isset($_POST['idCart+'])) {
    $id = $_POST['idCart+'] + 0;
	$a = "+";
    if (isset($_SESSION['user']['user_id'])) {
        $userId = $_SESSION['user']['user_id'];

        $kq1 = $Products->setQuantityCart(1,$userId, $id);
		
    }
}
if (isset($_POST['idCart-'])) {
    $id = $_POST['idCart-'] + 0;
    if (isset($_SESSION['user']['user_id'])) {
        $userId = $_SESSION['user']['user_id'];

        $kq2 = $Products->setQuantityCart(-1,$userId, $id);
        $getCart = $Products->getCart($userId);

        foreach ($getCart as $key => $cart) {
            if ($cart['quantity'] < 1) {
                $Products->deleteCart($userId, $id );
            }
        }
    }
}



header("location: blank.php");
?>

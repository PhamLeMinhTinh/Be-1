<?php
session_start();
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");

$Products = new Products;


if (isset($_POST['idDeleteWish'])) {
    $id = $_POST['idDeleteWish'] + 0;
    if (isset($_SESSION['user']['user_id'])) {
        $userId = $_SESSION['user']['user_id'];

        $kq = $Products->deleteWish($userId, $id);
      
    }
}


header("location: yourwishlist.php");
?>
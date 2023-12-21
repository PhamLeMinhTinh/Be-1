<?php
session_start();
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");

$Products = new Products;


if (isset($_POST['idDeleteCart'])) {
    $id = $_POST['idDeleteCart'] + 0;
    if (isset($_SESSION['user']['user_id'])) {
        $userId = $_SESSION['user']['user_id'];

        $kq = $Products->deleteCart($userId, $id);
      
    }
}


header("location: blank.php");
?>
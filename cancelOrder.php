<?php 
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");
require("models/userModel.php");
require("models/orderModel.php");

if(isset($_GET['id'])){
    $order_id = intval($_GET['id']) ;
}

$orderModel=new orderModel;
$orderModel->deleteOrder("#".''.$order_id);
$orderModel->deleteOrderProduct("#".''.$order_id);
header('location: myorder.php');
?>
<?php 
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/orderModel.php");

if(isset($_GET['id'])){
    $id = intval($_GET['id']) ;
}

$order = new orderModel;
$deleteOrder = $order->deleteOrder("#".''.$id);

header('location: order.php');
?>
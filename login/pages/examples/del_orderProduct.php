<?php 
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/orderModel.php");

if(isset($_GET['id']) && isset($_GET['product_id'])){
    $id = $_GET['id'] ;
    $product_id=$_GET['product_id'];
}
var_dump($id);
var_dump($product_id);
$order = new orderModel;
$deleteDetailOfOrder = $order->deleteDetailOfOrder("#".''.$id,$product_id);

header("location: orderProducts.php?id=$id");
?>
<?php 
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/productsModel.php");

if(isset($_GET['id'])){
    $id = intval($_GET['id']) ;
}

$Products = new Products;
$deleteProducts = $Products->deleteProducts($id);

header('location: products.php');
?>
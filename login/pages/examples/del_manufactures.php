<?php 
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/manufactures.php");

if(isset($_GET['manuid'])){
    $manu_id = intval($_GET['manuid']) ;
}

$Manufactures = new Manufactures;
$deleteManufactures = $Manufactures->deleteManufactures($manu_id);

header('location: manufactures.php');
?>
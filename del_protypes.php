<?php 
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/protypesModel.php");

if(isset($_GET['typeid'])){
    $type_id = intval($_GET['typeid']) ;
}

$Protypes = new Protypes;   
$deleteProtypes = $Protypes->deleteProtypes($type_id);

header('location: protypes.php');
?>
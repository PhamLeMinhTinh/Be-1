<?php session_start(); ?>
<?php
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");
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

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();
//Order
$order = new orderModel();

if(!empty($_POST['first-name']) && !empty($_POST['last-name']) && !empty($_POST['email']) &&!empty($_POST['address'])&&!empty($_POST['city'])&&!empty($_POST['country'])&&!empty($_POST['tel']) ) {
  $id="#".''.rand(100000,999999);
  while ( $order->checkOrder($id)!=null) {
    $id="#".''.rand(100000,999999);
  }
    
    $name = $_POST['first-name'].' '.$_POST['last-name'];
    $addressid = $_POST['address'].' '.$_POST['city'].' '.$_POST['country'];
    $email = $_POST['email'];
    $telephone = $_POST['tel'];
    $note=$_POST['note'];
     $datetime = time();  
     date_default_timezone_set("Asia/Ho_Chi_Minh");
    $time=date("d/m/Y G:i:s",$datetime);
    putenv("TZ=Asia/Bangkok");  
    $orderid=$id;
    // var_dump($time);
    //insert order
     $order->insertOrder($id,$_SESSION['user']['user_id'],$name,$addressid,$email,$telephone,$note,$_SESSION['total'], $time); 
     //gio hang
     $cartuser=$Products->getCart($_SESSION['user']['user_id']);
     //insert tung san pham vao order
     foreach ($cartuser as $key => $value) {
      if($value['feature']==1)
      {
        $discount=20;
        $amount=$value['price']*$value['quantity']*0.8;
      }
      else
      {
        $discount=0;
        $amount=$value['price']*$value['quantity'];
      }
      $order->insertProductOfOrder($orderid,$value['product_id'],$value['price'],$value['quantity'],$discount,$amount);
      
     }
    foreach ($cartuser as $key => $product) {
      $Products->deleteCart($_SESSION['user']['user_id'], $product['product_id']);
    }
      if(!isset($_COOKIE['orderCancel'])) {
        $value = [$id];
        setcookie('orderCancel', json_encode($value), time() + 43200);
      }
      else {
        $orderCancel = json_decode($_COOKIE['orderCancel'], true);
        if(!in_array($id, $orderCancel)) {
            // if(count($orderCancel) == 5) {
            //     array_shift($orderCancel);
            // }
            array_push($orderCancel, $id);
            setcookie('orderCancel', json_encode($orderCancel), time() + 43200);
        }
        else {
            unset($orderCancel[array_search($id, $orderCancel)]);
            array_push($orderCancel, $id);
            setcookie('orderCancel', json_encode($orderCancel), time() + 43200);
        }
    }
      header('Location: index.php');
  }
  else
  {
    echo "Them that bai";  
  }
?>


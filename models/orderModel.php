<?php
class orderModel extends Model
{
    public function insertOrder($id,$userid,$name,$addressid,$email,$telephone,$note,$total,$time)
    {
        $sql = parent::$connection->prepare('INSERT INTO `order`( `id`,`user_id`, `name`, `addressid`, `email`, `telephone`, `note`,`total`,`time`)  VALUES (?,?,?,?,?,?,?,?,?)');
        $sql->bind_param('sisssssis',$id,$userid,$name,$addressid,$email,$telephone,$note,$total,$time);
        return $sql->execute();
        
    }
    public function insertProductOfOrder($order_id,$product_id,$price,$quantity,$discount,$amount)
    {
        $sql = parent::$connection->prepare('INSERT INTO `order_product`(`order_id`, `product_id`, `price`, `quantity`, `discount`, `amount`) VALUES (?,?,?,?,?,?)');
        $sql->bind_param('siiiii',$order_id,$product_id,$price,$quantity,$discount,$amount);
        return $sql->execute();
    }
   
    public function checkOrder($id)
    {
        $sql = parent::$connection->prepare('SELECT * FROM `order` WHERE `id`=?');
        $sql->bind_param('s',$id);
        // var_dump(parent::select($sql));
        return parent::select($sql);
        
    }
    public function getAllOrdersByUserID($user_id)
    {
        $sql = self::$connection->prepare('SELECT * FROM `order` WHERE `user_id`=? ORDER BY `time` DESC');
        $sql->bind_param('i',$user_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllOrders()
    {
        $sql = self::$connection->prepare('SELECT * FROM `order`  ORDER BY `time` DESC');
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllProductOrdersByOrderID($order_id)
    {
        $sql = self::$connection->prepare('SELECT * FROM `order_product` WHERE `order_id`=? ');
        $sql->bind_param('s',$order_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function deleteOrder($id)
    {
        $sql = parent::$connection->prepare('DELETE FROM `order` WHERE `id`=?');
        $sql->bind_param('s',$id);
        return $sql->execute();
    }
    public function deleteOrderProduct($id)
    {
        $sql = parent::$connection->prepare('DELETE FROM `order_product` WHERE `order_id`=?');
        $sql->bind_param('s',$id);
        return $sql->execute();
    }
    public function updateOrder($id,$user_id,$name,$addressid,$email,$telephone,$note,$total,$time)
    {
        $sql = parent::$connection->prepare('UPDATE `order` SET `user_id`=?,`name`=?,`addressid`=?,`email`=?,`telephone`=?,`note`=?,`total`=?,`time`=? WHERE `id`=?');
        $sql->bind_param('isssisiss',$user_id,$name,$addressid,$email,$telephone,$note,$total,$time,$id);
        return $sql->execute();
    }
    public function updateProductOfOrder($order_id,$product_id,$price,$quantity,$discount,$amount)
    {
        $sql = parent::$connection->prepare('UPDATE `order_product` SET `price`=?,`quantity`=?,`discount`=?,`amount`=? WHERE `order_id`=? AND`product_id`=?');
        $sql->bind_param('iiiisi',$price,$quantity,$discount,$amount,$order_id,$product_id);
        return $sql->execute();
    }
  public function deleteDetailOfOrder($id,$product_id)
{
    $sql = parent::$connection->prepare('DELETE FROM `order_product` WHERE `order_id`=? AND`product_id`=?');
    $sql->bind_param('si',$id,$product_id);
    return $sql->execute();
}
public function getAllProductOrdersByOrderIDAndProductID($order_id,$product_id)
{
    $sql = self::$connection->prepare('SELECT * FROM `order_product` WHERE `order_id`=? AND `product_id`=?');
    $sql->bind_param('si',$order_id,$product_id);
    $sql->execute(); //return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items; //return an array
}
public function getOrderByOrderID($id)
{
    $sql = self::$connection->prepare('SELECT * FROM `order` WHERE `id`=? ');
    $sql->bind_param('s',$id);
    $sql->execute(); //return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items[0]; //return an array
}

}
?>

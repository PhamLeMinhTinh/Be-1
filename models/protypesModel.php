<?php
class Protypes extends Model
{
    public function updataProtypes($type_id, $type_name)
    {
        $sql = self::$connection->prepare("UPDATE `protypes` SET type_name=? WHERE type_id= ?");
        $sql->bind_param("si", $type_name, $type_id);
        $sql->execute(); //return an object
    }
    public function deleteProtypes($type_id)
    {
        $sql = self::$connection->prepare("DELETE FROM protypes  where  type_id = ?");
        $sql->bind_param("i", $type_id );
        $sql->execute(); //return an object
    }
    public function insertProtype($type_name)
    {
        $sql = self::$connection->prepare("INSERT INTO `protypes` (`type_id`, `type_name`) VALUES (NULL, ?)");
        $sql->bind_param("s",$type_name);
        $sql->execute(); //return an object
        $items = array();
        return $items; //return an array
    }
    public function getAllProtypesNew()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes ORDER BY type_id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllProtypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes ORDER BY type_id");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProtypesById($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); 
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; 
    }
    public function getNameAndCountProtypes()
    {
        $sql = parent::$connection->prepare(' SELECT protypes.*, COUNT(*) AS Tong FROM `products` INNER JOIN protypes ON products.type_id = protypes.type_id GROUP by products.type_id');
       return parent::select($sql);
    }
   
}
?>
<?php
class User extends Model
{
    public function checkLogin($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $password = md5($password); // ma hoa md5
        $sql->bind_param("ss", $username, $password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getUserByUserId($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE user_id = ?");
        $sql->bind_param('i',$user_id);
        return parent::select($sql)[0];
    }
    public function getAllUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM user ORDER BY user_id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function insertUser($username, $password, $email,$telephone,$address)
    {
        $sql = self::$connection->prepare("INSERT INTO `user` (`user_id`, `username`, `password`, `email`,`telephone`,`address`, `role_id`) VALUES (null, ?, MD5(?), ?,?,?, 0)");
        $sql->bind_param("sssis", $username, $password, $email,$telephone,$address);
        $sql->execute(); //return an object
        $items = array();  
        return $items; //return an array
    }
    public function getIdByUsername($username)
    {
        $sql = parent::$connection->prepare('SELECT user_id FROM user WHERE username=?');
        $sql->bind_param('s', $username);
        return parent::select($sql)[0]['user_id'];
    }
    public function getAllUserByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE `user_id`=? ORDER BY user_id DESC ");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function editUser($username,$email,$telephone,$address,$user_id)
    {
        $sql = parent::$connection->prepare('UPDATE `user` SET `username`=?,`email`=?,`telephone`=?,`address`=? WHERE user_id =?');
        $sql->bind_param('sssisi', $username,$password,$email,$telephone,$address,$user_id);
        return $sql->execute();
    }
    

}
?>
<!-- INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES (NULL, 'user3', MD5('user3'), 'user3@gmail.com');  -->
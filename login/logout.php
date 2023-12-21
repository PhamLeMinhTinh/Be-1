<?php session_start(); ?>
<?php
unset($_SESSION['username']);
unset($_SESSION['user']['user_id']);
header("location: ../index.php");	
?>
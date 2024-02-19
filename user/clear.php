<?php 
session_start();

unset($_SESSION['cart']);
header("location:user_product.php");


?>
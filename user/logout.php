<?php
session_start();
session_destroy();
unset($_SESSION['user']);
unset($_SESSION['cart']);
header("location:../user/user_home.php");

?>
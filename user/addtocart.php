<?php
session_start();

if (empty($_SESSION['User'])) {
    header('location: ../login.php');
    exit();
} else {

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {

        $product_id = intval($_GET['id']);

        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = 1;
        } else {
            $_SESSION['cart'][$product_id]++;
        }
        header('location: cart.php');
        exit();
    } else {

        echo "Invalid product ID.";
        exit();
    }
}
?>
<?php
session_start();
include '../connection.php';
$user_id = $_POST['userId'];
$user_name = $_POST['username'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$payment = $_POST['paymentType'];
$payNo = $_POST['payNo'];
$query = "insert into orders(orderdate,user_id,deli_name,phone,address,payment_type,payment_number,status)";
$query .= "values(now(),'$user_id','$user_name','$phone','$address','$payment','$payNo',0)";
$go_query = mysqli_query($connection, $query);



// to add data into orderdetail table
$order_id = mysqli_insert_id($connection);
foreach ($_SESSION['cart'] as $id => $qty) {
	$getprice = mysqli_query($connection, "SELECT * FROM products WHERE product_id='$id'");
	while ($out = mysqli_fetch_array($getprice)) {
		$db_price = $out['price'];
	}
	$amount = $db_price * $qty;
	$query = "INSERT INTO orderlists(orderid,product_id,quantity,total_amount) VALUES ('$order_id','$id','$qty','$amount')";

	$go_query = mysqli_query($connection, $query);

}
$_SESSION['order_id'] = $order_id;
unset($_SESSION['cart']);
header("location:show_success.php");
?>
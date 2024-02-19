<?php
session_start();
global $connection;
include '../../connection.php';
include '../function.php';

$num_per_page = 5;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start = ($page - 1) * $num_per_page;

$pgresult = mysqli_query($connection, "SELECT * FROM orders order by orderid desc limit $start , $num_per_page");



if (isset($_POST['delete'])) {
    deleteProduct();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../style.css">
</head>


<body class="bg-light">
    <?php include '../../layouts/header.php' ?>

    <div class="container-fluid ">
        <div class="row justify-content-center mt-3 ">
            <div class="">
                <div class="d-flex justify-content-between bg-light  mb-3 border-2 border-bottom border-danger p-2">
                    <div>
                        <h2 class=" m-2">Order List</h2>
                    </div>

                </div>
                <div class="col-12 ms-2">
                    <table class="table table-striped table-hover">
                        <tr class="text-center fw-bolder">
                            <td>Order ID</td>
                            <td>Customer Name</td>
                            <td>Phone</td>
                            <td>Address</td>
                            <td>Payment</td>
                            <td>Payment No:</td>
                            <td>Item Names</td>
                            <td>Order Date</td>
                            <td>Deliver Date</td>
                            <td>Action</td>
                        </tr>

                        <?php

                        while ($out = mysqli_fetch_array($pgresult)) {
                            $check = $out['status']; {
                                if ($check > 0) {
                                    $show = '<tr class="mark">';
                                } else {
                                    $show = '<tr>';
                                }
                                $show .= '<td>' . $out['orderid'] . '</td>';
                                $show .= '<td class="col-1">' . $out['deli_name'] . '</td>';
                                $show .= '<td>' . $out['phone'] . '</td>';
                                $show .= '<td class="col-3">' . $out['address'] . '</td>';
                                $show .= '<td>' . $out['payment_type'] . '</td>';
                                $show .= '<td>' . $out['payment_number'] . '</td>';
                                $show .= '<td>';
                                $orderid = $out['orderid'];
                                $order = mysqli_query($connection, "select orderlists.*,products.* from orderlists left join products on orderlists.product_id=products.product_id where orderlists.orderid='$orderid'");
                                while ($row = mysqli_fetch_assoc($order)) {
                                    $show .= '<ul><li>' . $row['name'] . '<span style="color:red;">
														[' . $row['quantity'] . ']</span></li></ul>';
                                }
                                $show .= '</td>';
                                $show .= '<td>' . $out['orderDate'] . '</td>';

                                $chesec = $out['status'];
                                if ($chesec > 0) {
                                    $show .= '<td>' . $out['sendDate'] . '</td>';
                                } else {
                                    $show .= '<td>----/--/--</td>';
                                }

                                if ($out['status']) {
                                    $show .= '<td><a href="status.php?id=' . $out['orderid'] . '&status=0" class="btn btn-danger">
																	Undo</a></td>';
                                } else {
                                    $show .= '<td><a href="status.php?id=' . $out['orderid'] . '&status=1" class="btn btn-outline-success text-black"><i class="fa-solid fa-truck"></i>Delivery</a></td>';
                                }
                                $show .= '</tr>';
                                echo $show;
                            }
                        }
                        ?>
                    </table>

                </div>

            </div>
        </div>
    </div>


    <ul class="pagination justify-content-center mt-2 g-2 ">
        <?php
        $sql = "SELECT * FROM orders";
        $pgresult = mysqli_query($connection, $sql);
        $total_records = mysqli_num_rows($pgresult);

        $total_pages = ceil($total_records / $num_per_page);

        for ($i = 1; $i <= $total_pages; $i++) {
            $activeClass = $i == $page ? 'active' : '';
            echo "<li class='page-item {$activeClass}'><a class='page-link' href='orderedList.php?page={$i}'>{$i}</a></li>";


        }
        ?>
    </ul>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>

</html>
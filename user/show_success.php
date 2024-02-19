<?php
session_start();
include '../connection.php';

$order_id = $_SESSION['order_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order and Customer's Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    include '../layouts/user_header.php';
    ?>
    <div class=" d-flex col-11 justify-content-end align-content-center p-4  mt-2 ">
        <a href="./user_product.php">
            <i class="fa-solid fa-circle-left btn btn-success "> Back</i>

        </a>
    </div>
    <div class="container mt-2" style="height: 100%vh;">

        <div class="row">

            <div class="col-md-5 ">
                <?php

                $query = "SELECT * FROM orders WHERE orderid='$order_id' ";

                $go_query = mysqli_query($connection, $query);
                while ($out = mysqli_fetch_array($go_query)) {
                    $db_name = $out['deli_name'];
                    $db_phone = $out['phone'];
                    $db_address = $out['address'];
                    $db_paymentType = $out['payment_type'];
                    $db_paymentNo = $out['payment_number'];
                }
                ?>
                <div class="card">
                    <div class="card-header bg-light ">
                        <h4 class="card-title text-center">Customer Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3 ">
                            <div class="col-7 me-2 "><i class="fa-solid fa-user-tie fs-4 me-1 "> :</i>
                                <span class="fs-3">
                                    <?php echo $db_name; ?>
                                </span>
                            </div>
                            <div class="col-5"><i class="fa-solid fa-mobile-screen-button fs-4"> :</i>
                                <span class="fs-4 ">
                                    <?php echo $db_phone; ?>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex mb-3 ">
                            <div class="col-7 me-2 "><i class="fa-solid fa-cash-register fs-4 me-1 "> :</i>
                                <span class="fs-3">
                                    <?php echo $db_paymentType; ?>
                                </span>
                            </div>
                            <div class="col-5"><i class="fa-solid fa-hashtag fs-4"> :</i>
                                <span class="fs-4 ">
                                    <?php echo $db_paymentNo; ?>
                                </span>
                            </div>
                        </div>
                        <p class="card-text"><i class="fa-solid fa-address-card fs-4"> :</i>
                            <span class="fs-5">
                                <?php echo $db_address; ?>
                            </span>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-7 mt-3 mb-5">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="4" class=" bg-opacity-75 bg-dark  fs-4 text-white text-center">Order
                                Information</th>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Qty</th>
                            <th>Unit Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $query = "SELECT orderlists.*,products.* from orderlists left join products on orderlists.product_id=products.product_id where orderlists.orderid='$order_id'";
                        $go_query = mysqli_query($connection, $query);
                        while ($out = mysqli_fetch_array($go_query)) {
                            $product_name = $out['name'];
                            $price = $out['price'];
                            $qty = $out['quantity'];
                            $unit_price = $qty * $price;
                            $total += $unit_price;

                            echo "<tr>
                        <td>{$product_name}<br></td>
                        <td>{$price} MMK<br></td>
                        <td>{$qty}<br></td>
                        <td>{$unit_price} MMK</td>
                        </tr>";
                        }
                        ?>
                        <tr>
                            <td colspan="3" align="right"><strong>Total Amount:</strong></td>
                            <td class='fw-bolder fs-5'>
                                <?php echo $total; ?> MMK
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class=" mt-lg-5 ">
        <?php
        include '../layouts/user_footer.php';
        ?>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>

</html>
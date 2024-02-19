<?php
session_start();
include '../connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
    <div class="container-fluid p-3">
        <div class="row mt-5">
           
                    <div class="row">
                        <div class="container">
                            <div class="card col-lg-8 col-md-10 col-sm-12 m-auto  ">
                                <div class="card-header text-center">
                                    <h2>Shopping Cart</h2>
                                </div>
                                <?php if (!empty($_SESSION['cart'])): ?>
                                    <div class="card-body">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($_SESSION['cart'] as $id => $qty) {
                                                    $id = mysqli_real_escape_string($connection, $id);
                                                    $result = mysqli_query($connection, "SELECT * FROM products WHERE product_id='$id'");

                                                    if ($result) {
                                                        $row = mysqli_fetch_assoc($result);
                                                        ?>
                                                        <tr>
                                                            <td><img src="../admin/uploads/<?php echo $row['image'] ?>" width="100"
                                                                    height="100" class="img img-thumbnail" /></td>
                                                            <td>
                                                                <?php echo $row['name'] ?>
                                                            </td>
                                                            <td class="col-2">

                                                                <span>
                                                                    <a href="change-qty.php?id=<?php echo $id; ?>&action=increase"
                                                                        class="btn btn-outline-primary btn-sm">+</a>
                                                                    <div class="btn">
                                                                        <?php echo $qty ?>
                                                                    </div>
                                                                    <a href="change-qty.php?id=<?php echo $id; ?>&action=decrease"
                                                                        class="btn btn-outline-secondary btn-sm">-</a>

                                                                </span>
                                                            </td>
                                                            <td class="col-2">
                                                                <?php echo $row['price'] ?> - MMK
                                                            </td>
                                                            <td class="col-2">
                                                                <?php echo $row['price'] * $qty ?> - MMK
                                                            </td>
                                                            <td class="col-1">
                                                                <a href="remove.php?id=<?php echo $id ?>"
                                                                    class="btn btn-outline-danger btn-sm">Remove</a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $total += $row['price'] * $qty;
                                                    } else {
                                                        echo "Error in query: " . mysqli_error($connection);
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" align="right"><b>Total:</b></td>
                                                    <td>
                                                        <?php echo $total; ?> - MMK
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <a href="clear.php" class="btn btn-danger">Clear Cart</a>
                                        <a href="user_product.php" class="btn btn-default">Back</a>
                                        <a href="submit-order.php" class="btn btn-primary">Submit Order</a>
                                    </div>
                                <?php else: ?>
                                    <div class="card-body">
                                        <h3 class="text-danger lead text-center fw-bold mb-3 fs-3">You have not selected any products yet!
                                        </h3>
                                        <p class="text-center"><a href="user_product.php"
                                                class="btn btn-outline-warning fw-bold ">Shop Now</a>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
               
        </div>
    </div>
    <div class="mt-5">
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
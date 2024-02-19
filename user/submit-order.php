<?php
session_start();
include '../connection.php';


if (!empty($_SESSION['User'])) {
    $user_name = $_SESSION['User'];
    $query = "select * from users where username='$user_name'";
    $go_query = mysqli_query($connection, $query);

    while ($out = mysqli_fetch_array($go_query)) {
        $user_id = $out['id'];
        $user_name = $out['username'];
        $phone = $out['phone'];

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filling Order Receiver's Info</title>
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
        <a href="./user_product.php" class="d-flex text-decoration-none text-black-50  ">
            <i class="fa-solid fa-circle-left fs-5 pt-3 me-1"></i>
            <p class=" pt-3">Did you forget to buy something? Click me!</p>

        </a>
    </div>
    <div class="container  mb-5">
        <h1 class="text-center text-capitalize">Fill your Info to Process Order</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3 border  border-success p-3 rounded-1 ">
                <form action="submit.php" method="post">
                    <div class="d-flex mb-3">
                        <div class="me-3 col-5">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" value="<?php if (isset($user_name)) {
                                echo $user_name;
                            } ?>" name="username" class="form-control" required/>
                        </div>

                        <div class="me-3 col-5">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" value="<?php if (isset($phone)) {
                                echo $phone;
                            } ?>" name="phone" class="form-control" required/>
                        </div>
                    </div>



                    <div class="mb-3 d-flex flex-column ">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" required></textarea>
                    </div>

                  
                    <div class="mb-3 d-flex ">
                        <div class="mb-3 col-6">
                            <label for="paymentType" class="form-label">Payment Type</label>
                            <select name="paymentType" class="form-select" required>
                                <option value="Kpay">Kpay</option>
                                <option value="WavePay">Wave Pay</option>
                                <option value="CBPay">CB Pay</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="payNo" class="form-label">Payment Number</label>
                            <input type="text" name="payNo" class="form-control" />
                        </div>
                    </div>

                    <input type="hidden" value="<?php echo $user_id ?>" name="userId" />
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary" />

                </form>
            </div>
        </div>
    </div>

    <div class="mt-3">
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
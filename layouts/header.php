<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../../style.css">
</head>


<body class=" bg-light ">

    <!-- start of Navbar  -->
    <section class="bg-white  sticky-lg-top">

        <div class="menu-sidebar d-flex justify-content-around align-items-center  p-2">

            <div class="col-3 row border-end border-2 ">
                <div class="">

                    <a href="../products/productList.php"
                        class="d-flex text-decoration-none justify-content-center align-items-center border-2 text-dark ">
                        <!-- <img src="../../image/laptop1.jpg" name="Laptop"
                            class="logo border rounded-2 text-center w-25 h-25 me-3" /> -->
                        <i class="fa-solid fa-house-laptop  text-center  me-3 fs-3"></i>

                        <h1
                            class="text-center d-flex justify-content-center align-items-center text-capitalize fw-bolder">
                            G3 Sale
                        </h1>
                    </a>
                </div>
            </div>


            <!-- Right side of Navbar  -->
            <div class="col-9  ">
                <div class="row">
                    <div class="d-flex justify-content-around align-items-center">
                        <!-- <div class=" col-5   ms-2">
                            <h3 class="text-center">Welcome to the Admin Dashboard</h3>
                        </div> -->
                        <div class=" col-9 ">

                            <ul class=" mt-2 d-flex ">
                                <li class=" list-unstyled w-100 text-center fs-5 fw-bold ">
                                    <a href="../carousel/hotSaleList.php" class=" text-decoration-none text-dark">
                                        Hot Sale </a>
                                </li>
                                <li class=" list-unstyled w-100 text-center fs-5 fw-bold ">
                                    <a href="../brand/brandList.php" class=" text-decoration-none text-dark">
                                        Brand </a>
                                </li>
                                <li class=" list-unstyled w-100 text-center fs-5 fw-bold ">
                                    <a href="../products/productList.php" class=" text-decoration-none text-dark">
                                        Product </a>
                                </li>

                                <li class=" list-unstyled  w-100 text-center fs-5 fw-bold ">
                                    <a href="../order/orderedList.php" class=" text-decoration-none text-dark">
                                        Order </a>
                                </li>
                                <li class=" list-unstyled w-100 text-center fs-5 fw-bold ">
                                    <a href="../comments/letters.php" class=" text-decoration-none text-dark">
                                        Feedback </a>
                                </li>

                                <li class=" list-unstyled  w-100 text-center fs-5 fw-bold ">
                                    <a href="../user/userList.php" class=" text-decoration-none text-dark">
                                        User</a>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center col-2  ">

                            <i class="fa-solid fa-circle-user fs-2 mb-2"></i>

                            <div class="dropdown ">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    if (isset($_SESSION['Admin'])) {
                                        echo $_SESSION['Admin'];
                                    } else {
                                        $_SESSION['Admin'] = "";
                                    }
                                    ?>'s Profile
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownButton">
                                    <li><a class="dropdown-item fw-bold " href="../logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of Right side of Navbar  -->

    </section>
    <!-- End of Navbar  -->


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
    integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</html>
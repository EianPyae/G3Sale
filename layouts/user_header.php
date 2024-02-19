<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>User Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>

<body class=" bg-light ">


    <!-- start of Navbar  -->
    <section class="bg-white  sticky-lg-top">
        <div class="menu-sidebar d-flex justify-content-around align-items-center  p-2">
            <div class="col-3  border-end border-2 ">

                <div class="">
                    <a href="../user/user_home.php"
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


            <div class="col-9  ">
                <div class="row">
                    <div class="d-flex justify-content-end align-items-center me-2">
                        <div class="col-5 justify-content-center align-items-center">

                            <ul class="  d-flex justify-content-around  ">
                                <li class=" list-unstyled w-100 text-center fs-5 fw-bold me-2 ">
                                    <a href="../user/user_home.php" class=" text-decoration-none text-dark">
                                        Home </a>
                                </li>
                                <li class=" list-unstyled w-100 text-center fs-5 fw-bold me-2">
                                    <a href="../user/user_product.php" class=" text-decoration-none text-dark">
                                        Product </a>
                                </li>
                                <li class=" list-unstyled  w-100 text-center fs-5 fw-bold me-2">
                                    <a href="../user/contact.php" class=" text-decoration-none text-dark">
                                        Contact</a>
                                </li>
                            </ul>

                        </div>

                        <div class="col-3 justify-content-end ms-2">

                            <?php
                            if (empty($_SESSION['User'])):
                                ?>

                                <div class="col-10 ms-3">
                                    <div class="  d-flex justify-content-center align-items-center flex-column ">
                                        <div class=" border-bottom border-danger ">
                                            <a class="btn  text-dark me-1" href="../login.php"><i
                                                    class="fa-solid fa-right-to-bracket me-1"></i>Sign in</a>
                                        </div>
                                        <div class="">
                                            <a class=" text-decoration-none   text-dark" href="../register.php">Sign Up</a>

                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>

                                <div class="d-flex flex-column justify-content-center align-items-center ">
                                    <i class=" fa-solid fa-circle-user text-black fs-2 mb-2"></i>

                                    <div class="dropdown ">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php
                                            if (isset($_SESSION['User'])) {
                                                echo $_SESSION['User'];
                                            } else {
                                                $_SESSION['User'] = "User";
                                            }
                                            ?>'s Profile
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownButton">
                                            <li><a class="dropdown-item" href="../user/logout.php">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End of Navbar  -->



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>

</html>
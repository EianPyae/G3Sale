<?php

session_start();
include '../connection.php';


$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$setrecord = ($page - 1) * $limit;
$getquery = "SELECT * FROM products LIMIT {$setrecord}, {$limit}";

$result = mysqli_query($connection, $getquery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>


<body class="bg-light">

    <?php include '../layouts/user_header.php' ?>

    <div class="container-fluid ">
        <div class="row">
            <div class="d-flex mt-5 justify-content-center align-items-center  ">
                <div class="col-lg-6 col-md-8  col-sm-8 ms-4 me-2">
                    <a href="https://www.google.com/maps/place/KMD+Institute+(YUDE+Campus)/@16.8205164,96.1038455,14z/data=!4m10!1m2!2m1!1skmd+myanmar!3m6!1s0x30c1eb0d08bca6a7:0x8bc81800ff9e0354!8m2!3d16.8205203!4d96.1359053!15sCgtrbWQgbXlhbm1hcpIBGGNvbXB1dGVyX3RyYWluaW5nX3NjaG9vbOABAA!16s%2Fg%2F11h7prgsft?entry=ttu"
                        class=" rounded-2 " target="_blank">
                        <img src="../image/shops/KMDYUDE.png" alt="KMD branches' Locations"
                            style="width: 100%;height:80%;border:1px solid blue;">
                    </a>
                </div>
                <div class=" column col-lg-5 col-md-4 col-sm-4">
                    <div class="col-lg-10 col-md-8 col-sm-10 mb-2">
                        <div class="card">
                            <h2 class="card-header">Shop on Campus I</h2>
                            <div class="card-body">
                                <h4 class="card-title">KMD Institute (YUDE Campus)</h4>
                                <div class="mb-2 mt-1">
                                    <p class="card-text "><i class="fa-solid fa-mobile-screen-button me-2"></i>01501243
                                    </p>
                                    <p class="card-text "><i class="fa-solid fa-map-location me-2"></i>R4CP+692, Tha
                                        Htone St, Yangon</p>
                                </div>

                                <a href="https://www.google.com/maps/place/KMD+Institute+(YUDE+Campus)/@16.8205164,96.1038455,14z/data=!4m10!1m2!2m1!1skmd+myanmar!3m6!1s0x30c1eb0d08bca6a7:0x8bc81800ff9e0354!8m2!3d16.8205203!4d96.1359053!15sCgtrbWQgbXlhbm1hcpIBGGNvbXB1dGVyX3RyYWluaW5nX3NjaG9vbOABAA!16s%2Fg%2F11h7prgsft?entry=ttu"
                                    class="btn btn-primary" target="_blank"><i
                                        class="fa-solid fa-person-walking me-2"></i>Go to
                                    Campus</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-10 col-md-8 col-sm-10 mb-2">
                        <div class="card">
                            <h2 class="card-header">Shop on Campus II</h2>
                            <div class="card-body">
                                <h4 class="card-title">KMD University (Myae Ni Gone-Mahar Myine Campus)</h4>
                                <div class="mb-2 mt-1">
                                    <p class="card-text "><i class="fa-solid fa-mobile-screen-button me-2"></i>01502233
                                    </p>
                                    <p class="card-text "><i class="fa-solid fa-map-location me-2"></i>331, Pyay Rd,
                                        Yangon</p>
                                </div>

                                <a href="https://www.google.com/maps/place/KMD+University+(Myae+Ni+Gone-Mahar+Myine+Campus)/@16.8069887,96.1338426,16.25z/data=!4m10!1m2!2m1!1skmd+myanmar!3m6!1s0x30c1eb9b61c393d7:0xafbef56407ef91f!8m2!3d16.8090768!4d96.1355731!15sCgtrbWQgbXlhbm1hcpIBCnVuaXZlcnNpdHngAQA!16s%2Fg%2F11rqckm8_r?entry=ttu"
                                    class="btn btn-primary" target="_blank"><i
                                        class="fa-solid fa-person-walking me-2"></i>Go to
                                    Campus</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="mt-4">
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
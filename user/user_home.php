<?php
session_start();
include '../connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G3 Sale Home Page</title>
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

    $query = mysqli_query($connection, "SELECT * FROM hot_sale ORDER By id DESC LIMIT 3");
    if (mysqli_num_rows($query) > 0)
    ?>
    <div id="carouselFade" class="carousel slide carousel-fade mt-2 mb-5 " data-bs-ride="carousel">
        <div class="carousel-inner">

            <?php

            foreach ($query as $q):
                ?>
                <div class="carousel-item active  ">
                    <img src='../admin/uploads/<?php echo $q['carousel_image'] ?>' class="d-block w-75 h-75  "
                        style="margin: auto;" alt="<?php echo $q['carousel_name'] ?>">
                </div>
            <?php endforeach ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>




    <div class="container-fluid mt-5">
        <div class="row  justify-content-center">
            <?php
            $query = mysqli_query($connection, "SELECT * FROM category");
            while ($out = mysqli_fetch_array($query)) {
                ?>
                <div class=" col-sm-2 col-md-3 col-lg-1 mb-4 text-center brandLogo">
                    <img src='../admin/uploads/<?php echo $out['img'] ?>' class='img-thumbnail '
                        style='width: 350px;height: 100px; ' alt=<?php echo $out['brand'] ?>>
                </div>

                <?php
            }
            ?>
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
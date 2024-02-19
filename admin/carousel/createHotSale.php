<?php
session_start();
include '../../connection.php';
include '../function.php';


if (isset($_POST['carousel'])) {
    createCarousel();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hot Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <?php include '../../layouts/header.php' ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class=" p-2">
                <div class="d-flex justify-content-between bg-light  mb-3 border-2 border-bottom border-danger p-2">
                    <div>
                        <h2 class=" ms-1 mt-1">Hot Sale Carousel</h2>
                    </div>
                    <ul class="d-flex text-decoration-none mt-1">

                        <a href="hotSaleList.php" class="text-decoration-none text-dark btn btn-dark text-white me-2">
                            <li class=" list-unstyled fw-bolder fs-3 ">Hot Sale List </li>
                        </a>
                    </ul>
                </div>
                <div class="d-flex justify-content-center  align-items-center ">
                    <div class="card col-6 rounded rounded-3">
                        <div class="card-header">
                            <p class="m-3 text-center fw-bolder fs-1">Create Hot Sale Carousel</p>
                        </div>

                        <div class="card-body">
                            <form class="" action="" method="post" enctype="multipart/form-data">
                                <div class="mb-2 border border-success p-1">
                                    <div class="mb-2">
                                        <label for="carouselName" class="form-label fs-5 ms-1"> Carousel
                                            Name</label>
                                        <input type="text" name="carouselName" class="form-control" required>
                                    </div>
                                    <div class="">
                                        <label for="description" class="form-label fs-5 ms-1">
                                            Description</label>
                                        <textarea name="carouselDescription" placeholder="Describe carousel description"
                                            cols="20" rows="5" class="form-control" required></textarea><br>
                                    </div>
                                    <div class="mb-2">
                                        <label for="file" class="form-label fs-5 ms-1">Carousel Image</label>
                                        <input type="file" name="file" class="form-control" required>
                                    </div>
                                </div>

                                <div class="d-flex ">
                                    <button type="submit" name="carousel" class="btn btn-success w-25 me-2"> Create
                                        Carousel</button>
                                    <a href="./hotSaleList.php" class="w-50 "><button type="button" name="cancel"
                                            class="btn btn-secondary "> Cancel</button>
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>

</html>
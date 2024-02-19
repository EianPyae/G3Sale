<?php
session_start();
include '../../connection.php';
include '../function.php';

$id = $_GET["id"];
$edit = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM hot_sale WHERE id = $id"));

if (isset($_POST['updateCarousel'])) {
    updateCarousel();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hot Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                        <h2 class=" ms-1 mt-1">Edit Carousel</h2>
                    </div>
                    <ul class="d-flex text-decoration-none mt-1">
                        <a href="hotSaleList.php" class="text-decoration-none btn btn-dark text-white me-2">
                            <li class=" list-unstyled fw-bolder fs-4 me-2">Carousel List</li>
                        </a>
                    </ul>
                </div>
                <div class="d-flex justify-content-center  align-items-center ">
                    <div class="card col-6 border-warning rounded rounded-3">
                        <div class="card-header">
                            <p class="m-3 text-center fw-bolder fs-1">Edit Carousel's Info </p>
                        </div>
                        <div class="card-body">
                            <form class="" action="" method="post" enctype="multipart/form-data">
                                <div class=" mb-3">
                                    <div class="col-12">
                                        <label for="carouselName" class="form-label  fs-5 ms-1">Carousel Name</label>
                                        <input type="text" name="carouselName"
                                            value="<?php echo $edit['carousel_name']; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="carouselDescription" class="form-label ms-1 fs-5">Description</label>
                                    <textarea name="carouselDescription" placeholder="Write about your PC" cols="20"
                                        rows="5" class="form-control"
                                        required><?php echo $edit['carousel_description']; ?></textarea><br>
                                </div>

                                <div class="mb-3 d-flex flex-column">
                                    <label for="" class="form-label  fs-5">Image</label>
                                    <input type="file" name="file">
                                </div>


                                <div class="d-flex ">
                                    <button type="submit" name="updateCarousel" class="btn btn-success w-25 me-2"> Update
                                        Carousel</button>
                                    <a href="./hotSaleList.php" class=""><button type="button" name="cancel"
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
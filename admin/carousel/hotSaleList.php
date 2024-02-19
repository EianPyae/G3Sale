<?php
session_start();
include '../../connection.php';
include '../function.php';

$num_per_page = 3;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start = ($page - 1) * $num_per_page;
$pgresult = mysqli_query($connection, "SELECT * FROM hot_sale ORDER BY id DESC LIMIT $start , $num_per_page");

if (isset($_POST['delete'])) {
    deleteCarousel();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hot Sale List</title>
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

    <div class="container-fluid ">
        <div class="row justify-content-center mt-3 ">
            <div class="">
                <div class="d-flex justify-content-between bg-light  mb-3 border-2 border-bottom border-danger p-2">
                    <div>
                        <h2 class=" m-2">Hot Sale List </h2>
                    </div>
                    <ul class="d-flex text-decoration-none ">

                        <a href="createHotSale.php" class="text-decoration-none btn-dark rounded btn text-white ">
                            <li class=" list-unstyled fw-bolder fs-4">Create Hot Sale </li>
                        </a>


                    </ul>
                </div>
                <div class="col-10 offset-1 mb-2 ">
                    <table class="table table-striped table-hover">
                        <tr class="text-center fw-bolder">
                            <td>ID</td>
                            <td>Carousel Image</td>
                            <td>Carousel Name</td>
                            <td>Carousel Description</td>
                            <td>Action</td>
                            <td>Created At</td>
                        </tr>
                        <?php

                        while ($crl = mysqli_fetch_array($pgresult)) {
                            ?>
                            <tr class="text-center">
                                <td>
                                    <?php echo $crl["id"]; ?>
                                </td>
                                <td>
                                    <img src="../uploads/<?php echo $crl["carousel_image"]; ?>" width="150"
                                        class="img-thumbnail">
                                </td>
                                <td class="col-3">
                                    <?php echo $crl["carousel_name"]; ?>
                                </td>
                                <td class="col-3">
                                    <?php echo $crl["carousel_description"]; ?>
                                </td>


                                <td class=" d-flex justify-content-center">
                                    <a href="editHotSale.php?id=<?php echo $crl['id']; ?>" class="btn">
                                        <i class="fa-solid fa-square-pen  fs-5"></i>

                                    </a>

                                    <form action="" method="post">
                                        <button type="submit" class="btn" name="delete" value=<?php echo $crl['id']; ?>
                                            onclick="return  confirm('Are you sure you want to DELETE!')">
                                            <i class="fa-solid fa-trash-can text-danger fs-5"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <?php echo $crl["created_at"]; ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>

                </div>


            </div>
        </div>
    </div>

    <ul class="pagination justify-content-center mt-2 g-2 fixed-bottom ">
        <?php
        $sql = "SELECT * FROM hot_sale";
        $pgresult = mysqli_query($connection, $sql);
        $total_records = mysqli_num_rows($pgresult);

        $total_pages = ceil($total_records / $num_per_page);

        for ($i = 1; $i <= $total_pages; $i++) {
            $activeClass = $i == $page ? 'active' : '';
            echo "<li class='page-item {$activeClass}'><a class='page-link' href='hotSaleList.php?page={$i}'>{$i}</a></li>";


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
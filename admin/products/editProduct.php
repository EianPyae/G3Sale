<?php
session_start();
include '../../connection.php';
include '../function.php';

$id = $_GET["id"];
$edit = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM products WHERE product_id = $id"));
$categoryId = $edit['category_id'];

if (isset($_POST['updateProduct'])) {
    edit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
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
                        <h2 class=" ms-1 mt-1">Edit Product Page</h2>
                    </div>
                    <ul class="d-flex text-decoration-none mt-1">
                        <a href="productList.php" class="text-decoration-none btn btn-dark text-white me-2">
                            <li class=" list-unstyled fw-bolder fs-4 me-2">Product Lists</li>
                        </a>
                    </ul>
                </div>
                <div class="d-flex justify-content-center  align-items-center ">
                    <div class="card col-6 border-warning rounded rounded-3">
                        <div class="card-header">
                            <p class="m-3 text-center fw-bolder fs-1">Edit Your Product's Info </p>
                        </div>
                        <div class="card-body">
                            <form class="" action="" method="post" enctype="multipart/form-data">
                                <div class="d-flex mb-3">
                                    <div class=" col-md-4">
                                        <!--  fetch brand name from brand in db -->
                                        <label for="" class="form-label fs-5"> Brand Name
                                        </label>
                                        <select class="form-select" name="brand" aria-label="Floating label select">
                                            <option selected value="<?php echo $categoryId; ?>">---Select One---
                                            </option>
                                            <?php
                                            $query = "SELECT * from category";
                                            $go_query = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_array($go_query)) {
                                                $brandId = $row['id'];
                                                $brandName = $row['brand'];
                                                $selected = ($brandId == $categoryId) ? 'selected' : '';
                                                echo "<option value='{$brandId}' {$selected}>{$brandName}</option>";

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-8">
                                        <label for="name" class="form-label  fs-5 ms-1">Model</label>
                                        <input type="text" name="name" value="<?php echo $edit['name']; ?>"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="processor" class="form-label  fs-5">Processor</label>
                                    <input type="text" name="processor" value="<?php echo $edit['processor']; ?>"
                                        class="form-control" required>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class=" col-6">
                                        <label for=" ram" class="form-label ms-1 fs-5">RAM</label>
                                        <input type="text" name="ram" value="<?php echo $edit['memory']; ?>"
                                            class="form-control" required>
                                    </div>
                                    <div class=" col-6">
                                        <label for=" storage" class="form-label ms-1 fs-5">Storage</label>
                                        <input type="text" name="storage" value="<?php echo $edit['storage']; ?>"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="d-flex mb-3 ">
                                    <div class="col-6">
                                        <label for="graphic" class="form-label ms-1 fs-5">Graphic</label>
                                        <input type="text" name="graphic" value="<?php echo $edit['graphics']; ?>"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="price" class="form-label  fs-5">Price</label>
                                        <input type="text" name="price" value="<?php echo $edit['price'] . " MMK"; ?>"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="description" class="form-label ms-1 fs-5">Description</label>
                                    <textarea name="description" id="description" placeholder="Write about your PC"
                                        cols="20" rows="5" class="form-control"
                                        required><?php echo $edit['description']; ?></textarea><br>
                                </div>

                                <div class="d-flex mb-2">
                                    <div class=" col-md-4">
                                        <!--  fetch brand name from brand in db -->
                                        <label for="" class="form-label fs-5"> Promotion Type
                                        </label>
                                        <select class="form-select" name="promo" aria-label="Default select example"
                                            required>
                                            <?php
                                            $promoType = ["Cash Back", "New Arrival", "Hot Item"];

                                            foreach ($promoType as $promo) {
                                                $selected = ($edit['promo'] == $promo) ? "selected='selected'" : "";
                                                echo "<option value=\"$promo\" $selected>$promo</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 d-flex flex-column ms-4">
                                        <label for="" class="form-label  fs-5">Image</label>
                                        <input type="file" name="file">
                                    </div>
                                </div>


                                <div class="d-flex ">
                                    <button type="submit" name="updateProduct" value="updateProduct"
                                        class="btn btn-success w-20 me-2"> Update
                                        Product</button>
                                    <a href="./productList.php" class="w-50 "><button type="button" name="cancel"
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
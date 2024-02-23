<?php
session_start();
include '../../connection.php';
include '../function.php';


if (isset($_POST['addproduct'])) {
    addProduct();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Products</title>
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
                        <h2 class=" ms-1 mt-1">Create Product Page</h2>
                    </div>
                    <ul class="d-flex text-decoration-none mt-1">

                        <a href="productList.php" class="text-decoration-none text-dark btn btn-dark text-white me-2">
                            <li class=" list-unstyled fw-bolder fs-3 ">Product List </li>
                        </a>
                    </ul>
                </div>
                <div class="d-flex justify-content-center  align-items-center ">
                    <div class="card col-lg-6 col-md-8 rounded rounded-3">
                        <div class="card-header">
                            <p class="m-3 text-center fw-bolder fs-1">Add Info about Your Product</p>
                        </div>
                        <div class="card-body">
                            <form class="" action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3 d-flex justify-content-around ">
                                    <div class=" col-md-4">
                                        <!--  fetch brand name from brand in db -->

                                        <label for="" class="form-label fs-5"> Brand Name
                                        </label>
                                        <select class="form-select" name="brand"
                                            aria-label="Floating label select example">
                                            <option selected>---Select One---</option>
                                            <?php
                                            $query = "Select * from category";
                                            $go_query = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_array($go_query)) {
                                                $brandId = $row['id'];
                                                $brandName = $row['brand']; {
                                                    echo "<option value={$brandId}>{$brandName}</option>";
                                                }
                                            }
                                            ?>

                                        </select>

                                    </div>
                                    <div class="col-8">
                                        <label for="name" class="form-label fs-5 ms-1">Model</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex ">
                                    <div class="col-6">
                                        <label for="processor" class="form-label fs-5 ms-1">Processor</label>
                                        <input type="text" name="processor" class="form-control" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="ram" class="form-label fs-5 ms-1">RAM</label>
                                        <input type="text" name="ram" class="form-control" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="storage" class="form-label fs-5 ms-1">Storage</label>
                                        <input type="text" name="storage" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex ">
                                    <div class="col-7">
                                        <label for="graphic" class="form-label fs-5 ms-1 ">Graphic</label>
                                        <input type="text" name="graphic" class="form-control" required>
                                    </div>
                                    <div class="col-5">
                                        <label for="price" class="form-label fs-5 ms-1 ">Price</label>
                                        <input type="text" name="price" class="form-control" placeholder="MMK price"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label for="description" class="form-label fs-5 ms-1">Description</label>
                                    <textarea name="description" id="description" placeholder="Fill the product info"
                                        cols="20" rows="5" class="form-control" required></textarea><br>
                                </div>
                                <div class="mb-3 d-flex ">
                                    <div class=" form-control ">
                                        <label for="promo" class="mb-2 fw-bold ">Select a Promotion Type</label>
                                        <select class="form-select me-5" name="promo" id='promo'
                                            aria-label=" label select">
                                            <option value="" selected></option>
                                            <option value="Cash Back">Cashback</option>
                                            <option value="New Arrival">NewArrival</option>
                                            <option value="Hot Item">HotItem</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 d-flex flex-column col-6">
                                        <label for="" class="form-label fs-5 ms-1">Image</label>
                                        <input type="file" name="file1">
                                    </div>

                                </div>
                                <div class="d-flex ">
                                    <button type="submit" name="addproduct" value="addproduct"
                                        class="btn btn-success w-20 me-2"> Create
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
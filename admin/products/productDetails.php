<?php
session_start();
include '../../connection.php';
include '../function.php';

$id = $_GET["id"];
$d = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM products WHERE product_id = $id"));


if (isset($_POST['delete'])) {
    deleteProduct();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../style.css">
</head>


<body class="bg-light">
    <?php include '../../layouts/header.php' ?>

    <div class="container-fluid ">
        <div class="row justify-content-center mt-3 ">
            <div class="">
                <div class="d-flex justify-content-between bg-light  mb-3 border-2 border-bottom border-danger p-2">
                    <div>
                        <h2 class=" m-2">Product's Information</h2>
                    </div>
                    <ul class="d-flex text-decoration-none ">

                        <a href="createProduct.php" class="text-decoration-none btn-dark rounded btn text-white me-2 ">
                            <li class=" list-unstyled fw-bolder fs-4"> Add Product </li>
                        </a>
                        <a href="productList.php"
                            class="text-decoration-none btn-secondary btn-dark rounded btn text-white">
                            <li class=" list-unstyled fw-bolder fs-4">Product List</li>
                        </a>

                    </ul>
                </div>
                <div class="col-8  offset-2">
                    <div class="row ">
                        <div class="d-flex ">

                            <div class="d-flex justify-content-center flex-column col-4 m-2 p-2 border   border-2">
                                <img src="../uploads/<?php echo $d["image"]; ?>" width="350" class="img-thumbnail">
                                <h4 class="m-2">Price -
                                    <?php echo $d["price"] . " MMK"; ?>
                                </h4>
                                <?php
                                if(empty($d['promo'])){
                                
                                }else {
                                    $promo = $d['promo'];
                                    echo "<h5 class='m-2'>Type -
                                   <span class='text-danger'>{$promo}</span>
                                </h5>";
                                }
                                ?>
                            </div>
                            <div class="col-7 m-2 p-2 border w-50 border-2">
                                <div class="ms-2">
                                    <h4>Name
                                        <?php echo $d["name"]; ?>
                                    </h4>
                                    <h4>
                                        <?php
                                        if ($d) {
                                            // print_r($d);
                                            $getId = $d['category_id'];
                                            $query = mysqli_query($connection, "SELECT * from category WHERE id = '$getId' ");
                                            while ($out = mysqli_fetch_assoc($query)) {
                                                $getBrand = $out['brand'];
                                                echo "Brand - " . $getBrand;
                                            }
                                        }
                                        ?>
                                    </h4>
                                    <h4>CPU -
                                        <?php echo $d["processor"]; ?>
                                    </h4>
                                    <h4>Memory -
                                        <?php echo $d["memory"]; ?>
                                    </h4>
                                    <h4>Storage -
                                        <?php echo $d["storage"]; ?>
                                    </h4>
                                    <h4>Graphics -
                                        <?php echo $d["graphics"]; ?>
                                    </h4>

                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="p-2 form-text">
                        <textarea name="description" id="" cols="70" rows="10" class="p-2 fs-4"
                            style="text-align: justify;"><?php echo $d["description"]; ?></textarea>
                    </div>

                </div>

                <div class="col-8 d-flex justify-content-center">
                    <div class="row">
                        .
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
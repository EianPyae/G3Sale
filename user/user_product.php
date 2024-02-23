<?php
session_start();
include '../connection.php';


// *********************
$num_per_page = 3;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start = ($page - 1) * $num_per_page;
$sql = "SELECT * FROM products order by product_id DESC limit $start , $num_per_page";
$pgresult = mysqli_query($connection, $sql);


// *********************
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- header page -->
    <?php
    include '../layouts/user_header.php';
    ?>

    <!-- products -->
    <div class="container-fluid mt-5 mb-5">
        <div class="row mt-5 justify-content-center ">
            <div class="d-flex  ">
                <div class="col-lg-2 col-md-3  col-sm-4 border border-secondary rounded-2 p-1 me-3 ms-lg-3">
                    <!-- Categories / filter -->
                    <h5 class=" mb-2 mt-3 ms-2 fs-3">Filter</h5>

                    <hr>

                    <div class="">
                        <form action="" method="GET">
                            <div class="card shadow mt-3">
                                <div class="card-body">
                                    <h5>Brand List</h5>
                                    <?php
                                    $con = mysqli_connect("localhost", "root", "", "laptop1");
                                    $brand_query = "SELECT * FROM category";
                                    $brand_query_run = mysqli_query($con, $brand_query);

                                    if (mysqli_num_rows($brand_query_run) > 0) {

                                        foreach ($brand_query_run as $brandlist) {
                                            $checked = [];
                                            if (isset($_GET['brands'])) {
                                                $checked = $_GET['brands'];
                                            }
                                            ?>
                                            <div>
                                                <input type="checkbox" name="brands[]" value="<?= $brandlist['id']; ?>" <?php if (in_array($brandlist['id'], $checked)) {
                                                      echo "checked";
                                                  } ?>>
                                                <?= $brandlist['brand']; ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <button type="submit" class="btn btn-primary btn-sm float-end">Search for the
                                        Item</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Categories / filter -->

                <div class=" col-10 ">
                    <div class="row row-cols-2 row-cols-md-3 g-3 ms-5 ">
                        <?php
                        if (isset($_GET['brands'])) {
                            $branchecked = [];
                            $branchecked = $_GET['brands'];

                            $noItemsFound = true; // check if no items were found for any brand in the database
                        
                            foreach ($branchecked as $rowbrand) {
                                $products = "SELECT * FROM products WHERE category_id IN ($rowbrand)";
                                $products_run = mysqli_query($con, $products);
                                if (mysqli_num_rows($products_run) > 0) {
                                    foreach ($products_run as $proditems):
                                        $product_name = $proditems['name'];
                                        $photo = $proditems['image'];
                                        $product_id = $proditems['product_id'];
                                        $price = $proditems['price'];
                                        $processor = $proditems['processor'];
                                        $memory = $proditems['memory'];
                                        $storage = $proditems['storage'];
                                        $graphics = $proditems['graphics'];
                                        $promo = $proditems['promo'];
                                        echo "<div class='col-lg-3 col-md-5 col-sm-7  me-lg-4 g-2 '>";
                                        echo "<div class='card bg-white ms-2 me-3' style='width: 20rem; height:38rem;'>";
                                        echo "<img src='../admin/uploads/{$photo}' class='card-img-top ' alt='{$product_name}' width='150' height='160'>";
                                        echo "<div class='card-body'>";
                                        echo "<h4 class='card-title text-center border-bottom border-secondary mx-2 pb-2 border-opacity-25 fw-bolder'>{$product_name}</h4>";
                                        echo "<div class='d-flex flex-column mt-3 '>";
                                        echo "<p class=''><span class='fw-bold fs-5'> Processor:</span> {$processor} </p>";
                                        echo "<p class=''><span class='fw-bold fs-5'> Memory:</span> {$memory} </p>";
                                        echo "<p class=''><span class='fw-bold fs-5'> Storage:</span> {$storage} </p>";
                                        echo "<p class=''><span class='fw-bold fs-5'>Graphics:</span> {$graphics} </p>";
                                        echo "<p class=''><span class='fw-bold fs-5'>Price:</span> {$price} MMK </p>";
                                        echo "<p class='fw-bold fs-4 text-danger  text-center text-uppercase'> {$promo}</i> </p>";
                                        echo "</div>";
                                        echo "<a href='addtocart.php?id={$product_id}' class='btn btn-primary position-absolute bottom-0 mb-2 start-10'>Add to Cart</a>";
                                        echo "</div></div></div>";

                                    endforeach;

                                    $noItemsFound = false;

                                }

                            }
                            if ($noItemsFound) {
                                echo '<p class="d-flex flex-column justify-content-center text-center mt-5 m-auto  mb-3 fs-3 fw-bold">
                                         <i class="fa-regular fa-face-sad-tear fs-1 text-danger"> </i>There is no item you are searching for right now. Thank you for visiting our website.</p>';
                            }
                        } else {
                            // *********************
                            while ($out = mysqli_fetch_array($pgresult)) {
                                $product_name = $out['name'];
                                $photo = $out['image'];
                                $product_id = $out['product_id'];
                                $price = $out['price'];
                                $processor = $out['processor'];
                                $memory = $out['memory'];
                                $storage = $out['storage'];
                                $graphics = $out['graphics'];
                                $promo = $out['promo'];
                                echo "<div class='col-lg-3 col-md-5 col-sm-8  me-4 g-4  '>";
                                echo "<div class='card bg-white ms-2 me-3' style='width: 20rem; height:38rem;'>";
                                echo "<img src='../admin/uploads/{$photo}' class='card-img-top ' alt='{$product_name}' width='150' height='160'>";
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title text-center border-bottom border-secondary mx-2 pb-2 border-opacity-25 fw-bolder'>{$product_name}</h5>";
                                echo "<div class='d-flex flex-column mt-3 '>";
                                echo "<p class=''><span class='fw-bold fs-5'> Processor:</span> {$processor} </p>";
                                echo "<p class=''><span class='fw-bold fs-5'> Memory:</span> {$memory} </p>";
                                echo "<p class=''><span class='fw-bold fs-5'> Storage:</span> {$storage} </p>";
                                echo "<p class=''><span class='fw-bold fs-5'>Graphics:</span> {$graphics} </p>";
                                echo "<p class=''><span class='fw-bold fs-5'>Price:</span> {$price} MMK </p>";
                                echo "<p class='fw-bold fs-4 text-danger  text-center text-uppercase'> {$promo} </p>";
                                echo "</div>";
                                echo "<a href='addtocart.php?id={$product_id}' class='btn btn-primary position-absolute bottom-0 mb-2 start-10'>Add to Cart</a>";
                                echo "</div></div></div>";



                            }
                            // *********************
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <?php
    // Show pagination only when the filter is not set
    if (!isset($_GET['brands'])) {
        ?>

        <ul class="pagination justify-content-center mt-2 g-2 ">
            <?php
            $sql = "SELECT * FROM products";
            $pgresult = mysqli_query($connection, $sql);
            $total_records = mysqli_num_rows($pgresult);
            //   echo $total_records;
            $total_pages = ceil($total_records / $num_per_page);

            for ($i = 1; $i <= $total_pages; $i++) {
                $activeClass = $i == $page ? 'active' : '';
                echo "<li class='page-item {$activeClass}'><a class='page-link' href='user_product.php?page={$i}'>{$i}</a></li>";
                //  echo "<a href ='user_product.php?page=".$i."'>".$i."</a>   "; 
        
            }
            ?>
        </ul>
        <?php
    }
    ?>


    <!-- footer page  -->
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
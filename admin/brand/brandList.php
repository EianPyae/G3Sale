<?php
session_start();
include '../../connection.php';
include '../function.php';

//Add Button
if (isset($_POST['btnBrand'])) {
    addBrand();
}

//Edit Button
if (isset($_POST['updateBrand'])) {
    updateBrand();
}

//Delete button
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    deleteBrand();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Brand List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    <?php include '../../layouts/header.php' ?>
    <div class="container">
        <div class="row">
            <div class="  d-flex  justify-content-center g-1 mt-5">
                <div class="col-6 ">
                    <div class="border border-info p-2 rounded-2 col-8 ">
                        <form method="post" enctype="multipart/form-data">
                           
                            <div class="mb-3">
                                <label for="Username" class="form-label fs-5 ">Brand Name</label>
                                <input type="text" name="brand" id="brandName" class="form-control fw-bold" required>

                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label fs-5 ">Image</label>
                                <input type="file" name="photo" id="" class="form-control fw-bold">

                            </div>
                            <button class="btn bg-info" name="btnBrand" type="submit">Add Brand</button>
                        </form>
                    </div>

                    <?php
                    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                        $brand_id = $_GET['id'];
                        $query = "SELECT * FROM category WHERE id='$brand_id'";
                        $go_query = mysqli_query($connection, $query);
                        while ($out = mysqli_fetch_array($go_query)) {
                            $brandName = $out['brand'];                 
                    
                            ?>

                            <div class="border border-danger p-2 rounded-2 col-8 bg-light mt-5">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <div class="mb-3">
                                            <label for="updateBrandName" class="form-label  fs-4 fw-bold mt-2">Update
                                                Brand</label>
                                            <input type="text" name="updateBrandName" class="form-control  fw-bold"
                                                value="<?php echo $brandName ?>">
                                        </div>
                                        <div class=" mb-3">
                                            <label for="logo" class="form-label fs-5 ">Image</label>
                                            <input type="file" name="photo" id="logo" class="form-control fw-bold"
                                                placeholder="Username">

                                        </div>
                                    </div>
                                    <div><button class="btn btn-outline-info" name="updateBrand" type="submit">Update
                                    Brand</button>
                                    </div>
                                </form>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-6">
                    <table class="table table-striped table-hover border-info ">
                        <tr class="fs-4 fw-semibold ">
                            <th class="col-4">Brand Name</th>
                            <th>Brand Logo</th>
                            <th class="col-3">Action</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM category";
                        $go_query = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($go_query)) {
                            $id = $row['id'];
                            $name = $row['brand'];
                            $img = $row['img'];
                            echo "<tr class='col-10'>";
                           
                            echo "<td class='fs-5 text-center pt-5 '>{$name}</td>";
                            echo "<td class='fs-5' > <img src='../uploads/{$img}' class='img-thumbnail w-50 '>";
                            echo "<td><a href='brandList.php?action=edit&id={$id}' class='btn'> <i class='fa-solid fa-square-pen fs-5'></i></a><a href='brandList.php?action=delete&id={$id}' class='btn'><i class='fa-solid fa-trash-can text-danger fs-5'></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <img src="../uploads/" alt="">
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>

</html>
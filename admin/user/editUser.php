<?php
session_start();
include '../../connection.php';
include '../function.php';

$id = $_GET["id"];
$edit = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM users WHERE id = $id"));


if (isset($_POST['updateUser'])) {
    editUser();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                        <h2 class=" ms-1 mt-1">Edit User Account</h2>
                    </div>
                    <ul class="d-flex text-decoration-none mt-1">

                        <a href="userList.php" class="text-decoration-none btn-dark rounded btn text-white ">
                            <li class=" list-unstyled fw-bolder fs-4">User List</li>
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
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" value="<?php echo $edit['username']; ?>"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" value="<?php echo $edit['email']; ?>"
                                        class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" value="" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirmPassword" value="" class="form-control"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" value="<?php echo $edit['phone']; ?>"
                                        class="form-control" required>
                                </div>
                                <div class="d-flex  justify-content-start">
                                    <div class="mb-3 col-6">
                                        <select class="form-select" name="town" aria-label="Default select example"
                                            required>
                                            <?php
                                            $townships = ["Ahlone", "Bahan", "Dagon", "Hlaing", "Kamayut", "Kyauktada", "Kyimyindaing", "Lanmadaw", "Latha", "Mayangon", "Pabedan", "Sanchaung", "Seikkan"];

                                            foreach ($townships as $township) {
                                                $selected = ($edit['town'] == $township) ? "selected='selected'" : "";
                                                echo "<option value=\"$township\" $selected>$township</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <select class="form-select" name="role" aria-label="Default select example"
                                            required>
                                            <?php
                                            $roles = ["Admin", "User"];

                                            foreach ($roles as $role) {
                                                $selected = ($edit['role'] == $role) ? "selected='selected'" : "";
                                                echo "<option value=\"$role\" $selected>$role</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="file" name="file1" id="image">
                                </div>

                                <div class="d-flex ">
                                    <button type="submit" name="updateUser" class="btn btn-success w-20 me-2">
                                        Update</button>
                                    <a href="./userList.php" class="w-50 "><button type="button" name="cancel"
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
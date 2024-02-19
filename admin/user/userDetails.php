<?php
session_start();
include '../../connection.php';
include '../function.php';

$id = $_GET["id"];
$users = mysqli_query($connection, "SELECT * FROM users WHERE id = '$id'");

if (isset($_POST['delete'])) {
    deleteUser();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                        <h2 class=" m-2">User's Infomation</h2>
                    </div>
                    <ul class="d-flex text-decoration-none ">

                        <a href="createUser.php" class="text-decoration-none btn-dark rounded btn text-white me-2">
                            <li class=" list-unstyled fw-bolder fs-4"> Add User</li>
                        </a>
                        <a href="userList.php" class="text-decoration-none btn-dark rounded btn text-white ">
                            <li class=" list-unstyled fw-bolder fs-4">User List</li>
                        </a>

                    </ul>
                </div>
                <div class="col-10 offset-1">
                    <table class="table table-striped table-hover">
                        <tr class="text-center fw-bolder">
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Township</td>
                            <td>Image</td>
                            <td>Role</td>
                            <td>Action</td>
                            <td>Created At</td>
                        </tr>
                        <?php
                      

                        foreach ($users as $u):
                            ?>
                            <tr class="text-center">
                                <td>
                                    <?php echo $u["id"]; ?>
                                </td>
                                <td>
                                    <?php echo $u["username"]; ?>
                                </td>
                                <td>
                                    <?php echo $u["email"]; ?>
                                </td>
                                <td>
                                    <?php echo $u["phone"]; ?>
                                </td>
                                <td>
                                    <?php echo $u["town"]; ?>
                                </td>
                                <td> <img src="../uploads/<?php echo $u["img"]; ?>" width="100" class="img-thumbnail"></td>


                                <td>
                                    <?php echo $u["role"]; ?>
                                </td>
                                <td class="">
                                    <a href="editUser.php?id=<?php echo $u['id']; ?>" class="btn">
                                        <i class="fa-solid fa-square-pen  fs-5"></i>

                                    </a>
                                    <form action="" method="post">
                                        <button type="submit" class="btn" name="delete" value=<?php echo $u['id']; ?>
                                            onclick="return  confirm('Are you sure you want to DELETE!')">
                                            <i class="fa-solid fa-trash-can text-danger fs-5"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <?php echo $u["created_at"]; ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </table>

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
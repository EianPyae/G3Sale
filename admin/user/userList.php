<?php
session_start();
include '../../connection.php';
include '../function.php';

// *********************
$num_per_page = 5;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start = ($page - 1) * $num_per_page;
$sql = "SELECT * FROM users ORDER BY id desc limit $start , $num_per_page";
$pgresult = mysqli_query($connection, $sql);

// *********************

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
    <title>User List</title>
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
                        <h2 class=" m-2">User List </h2>
                    </div>
                    <ul class="d-flex text-decoration-none ">

                        <a href="createUser.php" class="text-decoration-none btn-dark rounded btn text-white ">
                            <li class=" list-unstyled fw-bolder fs-4"> Add User </li>
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

                            <td>Role</td>
                            <td>Action</td>
                            <td>Created At</td>
                        </tr>
                        <?php
                        while ($u = mysqli_fetch_array($pgresult)) {
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


                                <td>
                                    <?php echo $u["role"]; ?>
                                </td>
                                <td class=" d-flex justify-content-center">
                                    <a href="editUser.php?id=<?php echo $u['id']; ?>" class="btn">
                                        <i class="fa-solid fa-square-pen  fs-5"></i>

                                    </a>
                                    <a href="userDetails.php?id=<?php echo $u['id']; ?>" class="btn">
                                        <i class="fa-solid fa-eye fs-4"></i>
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

                            <?php
                        }


                        ?>
                    </table>

                </div>

            </div>
        </div>
    </div>

    <!-- *************** -->

    <ul class="pagination justify-content-center mt-2 g-2 fixed-bottom  ">
        <?php
        $sql = "SELECT * FROM users";
        $pgresult = mysqli_query($connection, $sql);
        $total_records = mysqli_num_rows($pgresult);
        //   echo $total_records;
        $total_pages = ceil($total_records / $num_per_page);

        for ($i = 1; $i <= $total_pages; $i++) {
            $activeClass = $i == $page ? 'active' : '';
            echo "<li class='page-item {$activeClass}'><a class='page-link' href='userList.php?page={$i}'>{$i}</a></li>";
            //  echo "<a href ='user_product.php?page=".$i."'>".$i."</a>   "; 
        
        }
        ?>
    </ul>
    <!-- *************** -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>

</html>
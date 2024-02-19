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
$sql = "SELECT * FROM commentbox order by id desc limit $start , $num_per_page";
$pgresult = mysqli_query($connection, $sql);

// *********************


if (isset($_POST['delete'])) {

    deleteComment();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
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
                        <h2 class=" m-2">Letters</h2>
                    </div>

                </div>
                <div class="col-10 offset-1">
                    <?php
                    $comments = mysqli_query($connection, "SELECT * FROM commentbox");

                    if (mysqli_num_rows($comments) > 0) {
                        ?>
                        <table class="table table-striped table-hover">
                            <tr class="text-center fw-bolder">
                                <td>ID</td>
                                <td>Email</td>
                                <td>Note</td>
                                <td>Created At</td>
                                <td>Action</td>
                            </tr>
                            <?php


                            while ($cmt = mysqli_fetch_array($pgresult)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $cmt["id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $cmt["email"]; ?>
                                    </td>
                                    <td class="col-6" style="text-align: justify;">
                                        <?php echo $cmt["note"]; ?>
                                    </td>

                                    <td class="text-center">
                                        <?php echo $cmt["created_at"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <form action="" method="post">
                                            <button type="submit" name="delete" class="btn" value=<?php echo $cmt['id']; ?>
                                                onclick="return  confirm('Are you sure you want to DELETE!')">
                                                <i class="fa-solid fa-trash-can text-danger fs-5"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <?php
                            }


                            ?>
                        </table>
                        <?php
                    } else {
                        echo "<div class='text-center fs-2'>";
                        echo "<i class='fa-regular fa-face-sad-tear fs-4 me-3'>";
                        echo "</i>No comments received yet.";
                        echo "</div>";
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>

    <!-- *************** -->

    <ul class="pagination justify-content-center mt-2 g-2">
        <?php
        $sql = "SELECT * FROM commentbox";
        $pgresult = mysqli_query($connection, $sql);
        $total_records = mysqli_num_rows($pgresult);
        //   echo $total_records;
        $total_pages = ceil($total_records / $num_per_page);

        for ($i = 1; $i <= $total_pages; $i++) {
            $activeClass = $i == $page ? 'active' : '';
            echo "<li class='page-item {$activeClass}'><a class='page-link' href='letters.php?page={$i}'>{$i}</a></li>";
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
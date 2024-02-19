<?php
session_start();
include 'connection.php';
include_once('admin/function.php');

if (isset($_POST['login'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    $errors = array(
        'username' => '',
        'password' => ''
    );

    if ($name == '') {
        $errors['username'] = 'This Field could not be empty';
    }

    if ($password == '') {
        $errors['password'] = 'This field could not be empty';
    }

    $hpass = md5($password);
    $query = "SELECT * FROM users WHERE username = '$name'";
    $go_query = mysqli_query($connection, $query);
    while ($out = mysqli_fetch_array($go_query)) {
        $db_user_name = $out['username'];
        $db_password = $out['password'];
        $db_user_role = $out['role'];
        if ($db_user_name == $name && $db_password == $hpass && $db_user_role == 'Admin') {
            $_SESSION['Admin'] = $name;
            header("Location: ./admin/products/productList.php");
        } elseif ($db_user_name == $name && $db_password == $hpass && $db_user_role == 'User') {
            $_SESSION['User'] = $name;
            header("location:./user/user_home.php");


        } else {
            echo "<script>winddow.alert('Please Enter the Correct Username and Password!')</script>";
            header("location:login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../style.css">
</head>


<body class=" bg-light">
    <section>

        <div class="container-fluid mt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-6 ">
                    <div class="text-center card-header mb-1">
                        <h1 class=" m-5 p-10 text-center text-dark">Welcome to the G3 Sale</h1>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card border border-warning rounded rounded-3">
                                <div class="card-header">
                                    <h2 class="text-center">Login</h2>
                                </div>
                                <div class="card-body ">
                                    <form action="#" method="post">
                                        <div class="form-floating mb-3">

                                            <input type="text" name="username" id="floatingUsername"
                                                class="form-control" required placeholder="Username">
                                            <label for="floatingUsername" class="form-label fs-5">Username</label>
                                        </div>

                                        <div class="form-floating mb-3">

                                            <input type="password" name="password" id="floatingPassword"
                                                class="form-control " placeholder="Password" required>
                                            <label for="floatingPassword" class="form-label fs-5">Password</label>
                                        </div>

                                        <div class="d-flex flex-column  justify-content-between">
                                            <div class="mb-3">
                                                <button type="submit" name="login"
                                                    class="btn btn-dark text-warning fs-5 w-100">Login</button>
                                            </div>
                                            <div class="mb-3 text-center">
                                                <p>Don't you have an account?
                                                    <span> <a href="register.php">Register</a> </span>
                                                    Here!
                                                </p>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></scriplocation.href=>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
    integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
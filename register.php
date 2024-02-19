<?php

session_start();
include 'admin/function.php';
include 'connection.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $phone = $_POST['phone'];
    $town = $_POST['town'];

    $errors = array(
        'username' => '',
        'email' => '',
        'password' => '',
        'confirmPassword' => '',
        'phone' => '',
        'town' => '',

    );

    if (empty($username)) {
        $errors['username'] = 'Username must be entered!';
    } else {
        if (strlen($username) < 3) {
            $errors['username'] = 'Username must be atleast 3 characters!';
        }
    }

    if (empty($email)) {
        $errors['email'] = 'Email must be entered!';
    }

    if (empty($password)) {
        $errors['password'] = 'password must be entered!';
    } else {
        if (strlen($password) < 5) {
            $errors['password'] = 'password must be atleast 3 characters!';
        }
    }

    if (empty($confirm_password)) {
        $errors['confirmPassword'] = 'This field could not be empty';
    } else {
        if ($password != $confirm_password) {
            $errors['match_password'] = 'Password Do not match';
        }
    }

    if (empty($phone)) {
        $errors['phone'] = 'Phone Number must be entered!';
    }


    $town = filter_input(INPUT_POST, 'town', FILTER_SANITIZE_STRING);
    if (empty($town)) {
        $errors['town'] = 'Please select a town from the list!';
    }

    foreach ($errors as $key => $value) {
        if (empty($value)) {
            unset($errors[$key]);

        }
    }

    if (empty($errors)) {
        create();
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<!-- <?php
// include 'layouts/header.php';
?> -->

<body class=" bg-light">
    <section>
        <div class="container-fluid mt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-8">
                    <div class="text-center card-header mb-1">
                        <h1 class=" m-5 p-10 text-center text-dark">Welcome to the G3 Sale</h1>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-7">
                            <div class="card border border-warning rounded rounded-3">
                                <div class="card-header">
                                    <h3 class="text-center">Registration</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="d-flex mb-3">
                                            <div class=" me-3">

                                                <!-- <label for="Username" class=" fw-bold ">Username</label> -->
                                                <input type="text" name="username" id="Username" class="form-control "
                                                    placeholder="Username" required>
                                            </div>

                                            <div class="">
                                                <!-- <label for="Email" class=" fw-bold ">Email</label> -->
                                                <input type="email" name="email" id="Email" class="form-control me-3"
                                                    placeholder="example@gmail.com" required>

                                            </div>
                                        </div>

                                        <div class="d-flex mb-3">
                                            <div class=" me-3">
                                                <!-- <label for="Password" class=" fw-bold ">Password</label> -->
                                                <input type="password" name="password" id="Password"
                                                    class="form-control me-3" placeholder="Password" required>

                                            </div>

                                            <div class=" me-3">
                                                <!-- <label for="ConfirmPassword" class=" fw-bold ">Confirm Password</label> -->
                                                <input type="password" name="confirmPassword" class="form-control "
                                                    id="ConfirmPassword" placeholder="Confirm Password"
                                                    required>

                                            </div>
                                        </div>

                                        <div class="d-flex mb-3">
                                            <div class=" ">
                                                   <!-- <label for="Phone" class=" fw-bold ">Phone</label> -->
                                                <input type="text" name="phone" id="Phone" class="form-control " required
                                                    placeholder="eg. 09876543210">
                                             
                                            </div>

                                            <div class="ms-3  ">
                                                 <!-- <label for="Town" class=" fw-bold ">Select a Downtown</label> -->
                                                <select class="form-select me-5" name="town" id='Town'
                                                    aria-label=" label select">
                                                    <option value="" selected>You live in </option>
                                                    <option value="Ahlone">Ahlone</option>
                                                    <option value="Bahan">Bahan</option>
                                                    <option value="Dagon">Dagon</option>
                                                    <option value="Hlaing">Hlaing</option>
                                                    <option value="Kamayut">Kamayut</option>
                                                    <option value="Kyauktada">Kyauktada</option>
                                                    <option value="Kyimyindaing">Kyimyindaing</option>
                                                    <option value="Lanmadaw">Lanmadaw</option>
                                                    <option value="Latha">Latha</option>
                                                    <option value="Mayangon">Mayangon</option>
                                                    <option value="Pabedan">Pabedan</option>
                                                    <option value="Sanchaung">Sanchaung</option>
                                                    <option value="Seikkan">Seikkan</option>
                                                </select>
                                               
                                            </div>
                                        </div>

                                        <!-- <div class=" mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" name="role" id="role" class="form-control" disabled>
                                </div> -->

                                        <!-- <div class=" mb-3">
                                    <input type="file" name="image" id="image">
                                </div> -->


                                        <div class="d-flex flex-column  justify-content-between">
                                            <div class=" mb-3">
                                                <button type="submit" name="register" class="btn btn-info w-100">Sign
                                                    In</button>
                                            </div>
                                            <div class=" text-center">
                                                <p>Already have an account?
                                                    <span> <a href="login.php">Login</a> </span>
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
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>



</html>
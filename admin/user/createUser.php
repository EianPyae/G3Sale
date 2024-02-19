<?php

session_start();
include '../function.php';
include '../../connection.php';

if (isset($_POST['createUser'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $phone = $_POST['phone'];
    $town = $_POST['town'];
    $role = $_POST['role'];

    $errors = array(
        'username' => '',
        'email' => '',
        'password' => '',
        'confirmPassword' => '',
        'phone' => '',
        'town' => '',
        'role' => '',

    );

    if (empty($username)) {
        $errors['username'] = 'Username must be entered!';
    } else {
        if (strlen($username) < 3) {
            $errors['username'] = 'Username must be at least 3 characters!';
        }
    }

    if (empty($email)) {
        $errors['email'] = 'Email must be entered!';
    }

    if (empty($password)) {
        $errors['password'] = 'password must be entered!';
    } else {
        if (strlen($password) < 5) {
            $errors['password'] = 'password must be at least 5 characters!';
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

    $town = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
    if (empty($role)) {
        $errors['role'] = 'Please select a role from the list!';
    }

    foreach ($errors as $key => $value) {
        if (empty($value)) {
            unset($errors[$key]);

        }
    }

    if (empty($errors)) {
        addUser();
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
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
                        <h2 class=" ms-1 mt-1">Create User Page</h2>
                    </div>
                    <ul class="d-flex text-decoration-none mt-1">

                        <a href="userList.php" class="text-decoration-none btn-dark rounded btn text-white ">
                            <li class=" list-unstyled fw-bolder fs-4">User List</li>
                        </a>

                    </ul>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card border border-warning rounded rounded-3">
                            <div class="card-header">
                                <h3 class="text-center">Create New User Here!</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" required>

                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="example@gmail.com" required>

                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            required>

                                    </div>

                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="confirmPassword" class="form-control"
                                            placeholder="Please enter password again" required>


                                    </div>

                                    <div class="mb-4">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" name="phone" id="phone" class="form-control" required
                                            placeholder="eg. 09876543210">

                                    </div>

                                    <div class="d-flex  justify-content-start">
                                        <div class="mb-3 col-6">
                                            <select class="form-select" name="town" id='town'
                                                aria-label="Default select example" required>
                                                <option value="null" selected>Select a Downtown</option>
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

                                        <div class="mb-3 col-6">
                                            <select class="form-select" name="role" id='role'
                                                aria-label="Default select example" required>
                                                <option value="null" selected>Select a Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <input type="file" name="file">
                                    </div>


                                    <div class="d-flex ">
                                        <button type="submit" name="createUser" class="btn btn-success w-20 me-2">
                                            OK</button>
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
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>


</html>
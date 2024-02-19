<?php
function create()
{
    global $connection;
    global $username;
    global $password;
    global $email;
    global $phone;
    global $town;

    $hashedPassword = md5($password);

    $query = "SELECT * FROM users WHERE username = '$username' and password='$hashedPassword'";
    $user_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($user_query);

    if ($count > 0) {
        echo "<script>window.alert('User already exists')</script>";
    } else {
        $query = "INSERT INTO users (username, email, password, phone, town, role) VALUES ('$username', '$email', '$hashedPassword', '$phone', '$town', 'User') ";

        $go_query = mysqli_query($connection, $query);

        if (!$go_query) {
            die("QUERY FAILED!" . mysqli_error($connection));
        } else {
            echo "<script>window.alert('You have created an account successfully!')</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
    }

}

function addProduct()
{
    global $connection;

    $name = $_POST["name"];
    $brandId = $_POST["brand"];
    $cpu = $_POST["processor"];
    $ram = $_POST["ram"];
    $storage = $_POST["storage"];
    $gpu = $_POST["graphic"];
    $price = $_POST["price"];
    $note = $_POST["description"];

    $fileName = $_FILES["file1"]["name"];
    $tmpName = $_FILES["file1"]["tmp_name"];
    $fileError = $_FILES['file1']["error"];


    $fileExtension = explode('.', $fileName);
    $fileExtensionName = strtolower(end($fileExtension));
    if ($fileError === 0) {
        $newfilename = uniqid('', true) . "." . $fileExtensionName;

        move_uploaded_file($tmpName, '../uploads/' . $newfilename);

        $query = "INSERT INTO products (category_id,name,processor,memory, storage,graphics,price,description,image) VALUES('$brandId','$name','$cpu','$ram','$storage','$gpu','$price','$note','$newfilename')";

        mysqli_query($connection, $query);


        echo "<script>window.alert('Created a Product Successfully!')</script>";
        echo "<script>window.location.href='./productList.php'</script>";
    } else {
        echo "Error found!";
        print_r($fileError);
    }
}

function edit()
{
    global $connection;
    $id = $_GET["id"];
    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $cpu = $_POST["processor"];
    $ram = $_POST["ram"];
    $storage = $_POST["storage"];
    $gpu = $_POST["graphic"];
    $price = $_POST["price"];
    $note = $_POST["description"];

    if ($_FILES["file"]["error"] != 4) {
        $fileName = $_FILES["file"]["name"];
        $tmpName = $_FILES["file"]["tmp_name"];

        $fileExtension = explode('.', $fileName);
        $fileExtensionName = strtolower(end($fileExtension));


        $newfilename = uniqid('', true) . "." . $fileExtensionName;
        move_uploaded_file($tmpName, '../uploads/' . $newfilename);

        $query = "UPDATE products SET image = '$newfilename' WHERE product_id ='$id'";
        mysqli_query($connection, $query);
    }
    $query = "UPDATE products SET name = '$name', category_id = '$brand', processor ='$cpu' , memory ='$ram' , storage ='$storage' ,graphics ='$gpu' , price ='$price' , description ='$note'
    
     WHERE product_id = $id";
    mysqli_query($connection, $query);

    echo "<script>window.alert('Edited the Product Successfully!')</script>";
    echo "<script>window.location.href='./productList.php'</script>";
}
function deleteProduct()
{
    global $connection;
    $id = $_POST["delete"];
    $query = "DELETE FROM products WHERE product_id = $id";
    mysqli_query($connection, $query);
    echo
        "<script> alert ('Deleted a Product successfully'); </script> ";

}
function addUser()
{
    global $connection;

    $username = $_POST['username'];
    $email = $_POST['email'];

    //check password match (start)
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password != $confirmPassword) {
        echo "<script>winddow.alert('Password and Confirm Password do not match!')</script>";
        //check password match (end)
    }

    // check record duplicate (start)
    else if ($password != "" && $username != "" && $email != '') {
        $query = "SELECT * from users WHERE username='$username' and password='$password' and email='$email'";
        $ch_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($ch_query);
        if ($count > 0) {
            echo "<script>window.alert('Username & Password & email already exist!')</script>";
        }

        // check record duplicate (end)
        else
        //insert record user table
        {
            $hashedPassword = md5($password);
            $phone = $_POST['phone'];
            $town = $_POST['town'];
            $role = $_POST['role'];

            $fileName = $_FILES["file"]["name"];
            $tmpName = $_FILES["file"]["tmp_name"];
            $fileError = $_FILES['file']["error"];

            $fileExtension = explode('.', $fileName);
            $fileExtensionName = strtolower(end($fileExtension));
            // $newfilename = '';
            if ($fileError === 0) {
                $newfilename = uniqid('', true) . "-" . $fileExtensionName;

                move_uploaded_file($tmpName, '../uploads/' . $newfilename);

                $query = "INSERT INTO users(username,email,password,phone,town,img,role) VALUES('$username','$email','$hashedPassword','$phone','$town','$newfilename','$role')";
                $go_query = mysqli_query($connection, $query);

                if (!$go_query) {
                    die("QUERY FAILED " . mysqli_error($connection));
                }
                echo "<script>window.alert('Created a user Successfully!')</script>";
                echo "<script>window.location.href='./userList.php'</script>";
                // header("location:userList.php");
            } else {
                echo "Error found!";
                print_r($fileError);
            }
        }

    }
}

function editUser()
{
    global $connection;
    $id = $_GET["id"];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password != $confirmPassword) {
        echo "<script>winddow.alert('Password and Confirm Password do not match!')</script>";
        //check password match (end)
    }
    $hashedPassword = md5($password);
    $phone = $_POST['phone'];
    $town = $_POST['town'];
    $role = $_POST['role'];

    $fileName = $_FILES["file1"];
    $tmpName = $_FILES["file1"]["tmp_name"];
    $newfilename = uniqid() . "-" . $fileName;
    move_uploaded_file($tmpName, '../uploads/' . $newfilename);


    $query = "UPDATE users SET img = '$newfilename' WHERE id =$id";
    mysqli_query($connection, $query);

    $query = "UPDATE users SET username = '$username', email ='$email', password ='$hashedPassword' , phone ='$phone' , town ='$town' ,img ='$newfilename' , role ='$role'
    
     WHERE id = $id";
    mysqli_query($connection, $query);

    echo "<script>window.alert('Edited the user info Successfully!')</script>";
    echo "<script>window.location.href='./userList.php'</script>";



}
function deleteUser()
{
    global $connection;
    $userId = $_POST['delete'];
    $query = "DELETE FROM users WHERE id=$userId";
    mysqli_query($connection, $query);

    echo "<script>window.alert('Deleted a user Successfully!')</script>";
    echo "<script>window.location.href='./userList.php'</script>";

    // session_destroy();
    // unset($_SESSION['admin']);
    // header('location:register.php');

}


function addBrand()
{
    global $connection;

    $brandName = $_POST['brand'];

    if ($brandName == " ") {
        echo "<script>window.alert('Please Enter a Brand Name')</script>";
    } elseif ($brandName != " ") {
        $query = "Select * from category where brand='$brandName' ";
        $ch_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($ch_query);
        if ($count > 0) {
            echo "<script>window.alert('This Brand  already exists.')</script>";
        } else {

            $fileName = $_FILES['photo']['name'];
            $tmpName = $_FILES['photo']['tmp_name'];


            $fileExtension = explode('.', $fileName);
            $fileExtensionName = strtolower(end($fileExtension));

            $newfileName = '';
            $newfileName = uniqid('', true) . "." . $fileExtensionName;

            move_uploaded_file($tmpName, '../uploads/' . $newfileName);

            $query = "INSERT INTO category(brand, img) VALUES ('$brandName', '$newfileName')";
            $go_query = mysqli_query($connection, $query);
            if (!$go_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
    }
}

function updateBrand()
{
    global $connection;
    $brandName = $_POST['updateBrandName'];

    $brandId = $_GET['id'];
    $fileName = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];


    $fileExtension = explode('.', $fileName);
    $fileExtensionName = strtolower(end($fileExtension));

    $newfileName = '';
    $newfileName = uniqid('', true) . "." . $fileExtensionName;

    move_uploaded_file($tmpName, '../uploads/' . $newfileName);
    $query = "UPDATE category SET brand='$brandName', img = '$newfileName' WHERE id =$brandId";
    // mysqli_query($connection, $query);

    // $query = "UPDATE category set brand='$brandName',  where id='$brandId'";
    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location:brandlist.php");
}
function deleteBrand()
{
    global $connection;
    $catid = $_GET['id'];
    $query = "delete from category where id='$catid'";
    $go_query = mysqli_query($connection, $query);
    header("location:brandList.php");
}

function commentBox()
{
    global $connection;

    $commentSender = $_POST['adviceMail'];
    $commentText = $_POST['adviceText'];

    $query = "INSERT INTO commentbox (email,note) VALUES ('$commentSender','$commentText')";


    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUERY FAILED!" . mysqli_error($connection));
    } else {
        echo "<script>window.alert('Your comments have been saved successfully! We will try to be better next time. Thank you for your patient!')</script>";
        echo "<script>window.location.href='../user/user_home.php'</script>";
    }
}

function deleteComment()
{
    global $connection;
    $id = $_POST["delete"];

    $query = "DELETE FROM commentbox WHERE id = $id";
    mysqli_query($connection, $query);
    header("location:letters.php");

}

function createCarousel()
{
    global $connection;

    $carouselName = $_POST["carouselName"];
    $carouselDescription = $_POST["carouselDescription"];

    $ImageFile = $_FILES["file"]["name"];
    $tmpName = $_FILES["file"]["tmp_name"];
    $fileError = $_FILES["file"]["error"];

    $fileExtension = explode('.', $ImageFile);
    $fileExtensionName = strtolower(end($fileExtension));

    $newfileName = '';
    if ($fileError === 0) {
        $newfileName = uniqid('', true) . "." . $fileExtensionName;

        move_uploaded_file($tmpName, '../uploads/' . $newfileName);
        $query = "INSERT INTO hot_sale(carousel_name,carousel_description,carousel_image) VALUES ('$carouselName','$carouselDescription', '$newfileName')";
    }

    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUERY FAILED!" . mysqli_error($connection));
    } else {
        echo "<script>window.alert('Created a Carousel Successfully!')</script>";
        echo "<script>window.location.href='./hotSaleList.php'</script>";
    }

}

function updateCarousel()
{
    global $connection;

    $id = $_GET['id'];
    $carouselName = $_POST['carouselName'];
    $carouselDescription = $_POST['carouselDescription'];

    if ($_FILES['file']['error'] != 4) {

        $ImageFile = $_FILES["file"]['name'];
        $tmpName = $_FILES['file']['tmp_name'];

        $fileExtension = explode('.', $ImageFile);
        $fileExtensionName = strtolower(end($fileExtension));

        $newfileName = '';
        $newfileName = uniqid('', true) . "." . $fileExtensionName;

        move_uploaded_file($tmpName, '../uploads/' . $newfileName);
        $query = "UPDATE hot_sale SET carousel_image ='$newfileName' WHERE id='$id'";

        mysqli_query($connection, $query);
    }

    $query = "UPDATE hot_sale SET carousel_name = '$carouselName',  carousel_description ='$carouselDescription' WHERE id = $id";
    mysqli_query($connection, $query);

    echo "<script>window.alert('Edited the carousel Successfully!')</script>";
    echo "<script>window.location.href='./hotSaleList.php'</script>";
}



function deleteCarousel()
{
    global $connection;

    // $id = $_POST['id'];
    $id = $_POST["delete"];

    $query = "DELETE FROM hot_sale WHERE id = $id";
    mysqli_query($connection, $query);
    header("location:hotSaleList.php");
}
<?php
include '../connection.php';
include '../admin/function.php';
// include_once('./user_function.php');

if (isset($_POST['adviceSend'])) {
    commentBox();
    // $commentSender = $_POST['adviceMail'];
    // $commentText = $_POST['adviceText'];



    // $query = "INSERT INTO commentbox (email,note) VALUES ('$commentSender','$commentText')";


    // $go_query = mysqli_query($connection, $query);
    // if (!$go_query) {
    //     die("QUERY FAILED!" . mysqli_error($connection));
    // }
    // else {
    //     echo "<script>window.alert('Your comments have been saved successfully! We will try to be better next time. Thank you for your patient!')</script>";
    // }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 ">
                    <div class="row mt-3 ">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">

                            <div class="d-flex justify-content-around">

                                <div class="me-3">
                                    <div class="fs-3 text-center">
                                        Brands
                                    </div>

                                    <div class="mt-2">
                                        <?php
                                        $products = mysqli_query($connection, "SELECT * FROM category");
                                        foreach ($products as $pdt):
                                            ?>
                                            <div class="mb-2" style="font-size: 15px;">
                                                <?php echo $pdt["brand"]; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>



                                <div>
                                    <div class="fs-3 text-center">
                                        SERVICES
                                    </div>

                                    <div class="mt-2">
                                        <ul class="list-unstyled" style="font-size: 13px;">
                                            <li class=" mb-2">Home Services</li>
                                            <li class=" mb-2">Software Installation</li>
                                            <li class=" mb-2">Hardware Setup</li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-3 text-center">
                                        About
                                    </div>

                                    <div class="mt-2">
                                        <ul class="list-unstyled" style="font-size: 13px;">
                                            <li class=" mb-2">FAQ</li>
                                            <li class=" mb-2">NEWS</li>
                                            <li class=" mb-2">PARTNERS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal Items</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span> This is just Modal</span> <i class="fa-regular fa-face-smile-wink"></i>
                                    <p>Thank you for clicking me and for interesting our products. </p>
                                    <h4>"Please explore other cool features."</h4>
                                    <strong>BYE!</strong>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">BACK</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-6 ">
                    <div class="row d-flex justify-content-center mt-2">
                        <!-- user feedback -->
                        <div class="col-lg-6 col-sm-10 card border-end bg-transparent me-2 mb-2">
                            <form action="" method="post">
                                <h3 class="text-center fs-5 ">Leave Your Comments Here!</h3>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Your Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        name="adviceMail" placeholder="name@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Give us advice</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="adviceText" required></textarea>
                                </div>
                                <button type="submit" class="form-control w-25 bg-success"
                                    name="adviceSend">Send</button>
                            </form>
                        </div>
                        <!-- user feedback -->
                        <div class="col-lg-5 col-sm-10">
                            <h2 class="text-center mb-3 fs-5 ">G3 Laptop Sale</h2>
                            <div class="mb-5"><strong>Address:</strong> <div class="mt-3">KMD Institute (YUDE Campus), Hledan, Mayangone, Yangon</div>
                            </div>
                            <div class="mb-1"><strong>Contact:</strong> <div class="mt-3">01501243</div>
                            </div>
                            <div class=" d-flex justify-content-end">
                                <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Facebook">
                                    <a href="https://en.wikipedia.org/wiki/Main_Page" target="_blank"> <i
                                            class="fa-brands fa-facebook fs-4 text-dark"></i></a>
                                </button>
                                <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="LinkIn">
                                    <a href=" https://liquipedia.net/dota2/Main_Page " target="_blank"><i
                                            class="fa-brands fa-linkedin fs-4 text-dark"></i></a>
                                </button>
                                <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Youtube">
                                    <a href="https://youtu.be/SLqJvzCf2Pg?t=78" target="_blank"><i
                                            class="fa-brands fa-youtube fs-4 text-dark"></i></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>

</html>
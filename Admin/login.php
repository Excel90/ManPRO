<?php
    session_start();
    require_once 'connect.php';

    if (isset($_SESSION['id']) && $_SESSION['id'] != "" && isset($_SESSION['status']) && $_SESSION['status'] == "Teacher") {
        header("Location: homeT.php");
        exit();
    }
    if (isset($_SESSION['id']) && $_SESSION['id'] != "" && isset($_SESSION['status']) && $_SESSION['status'] == "Admin") {
        header("Location: admin.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <?php include 'include/IncluderL.php'; ?>
    <link rel="stylesheet" href="MainAssets/style/login.css">    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                            <input type="button" value="Login" id="Login" class="btn btn-primary btn-user btn-block">
                                        <hr>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<script>
     $('#Login').on('click', function () {
        var email=$('#email').val();
        var password=$('#password').val();
        if(typeof(email) != "undefined" && email != null && email != "" && typeof(password) != "undefined" && password != null && password != "")
        {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if(!emailReg.test(email)) {
                Swal.fire({
                    title: 'Login Failed !',
                    text: 'Email Format Not Valid',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                $.ajax({
                    url: "ajax/loginajax.php",
                    method: "POST",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function (result) {
                        if (result == 1) {
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Just kidding, Press Ok to Continue',
                                icon: 'error',
                                confirmButtonText: 'Ok',
                                willClose: goadmin
                            })    
                        }
                        else{
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Email Format Not Valid',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                        function goadmin(){
                            window.location.href = "admin.php";
                        }
                    },
                    error: function () {
                    }
                })
            }
            else 
            if($('#password').val().length < 8){
                Swal.fire({
                    title: 'Login Failed !',
                    text: 'Password too short (Minimum 8 Characters)',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
            else {
                $.ajax({
                    url: "ajax/loginajax.php",
                    method: "POST",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function (result) {
                        if (result == 1) {
                            Swal.fire({
                                title: 'Login Success !',
                                text: 'Press Close To Continue',
                                icon: 'success',
                                confirmButtonText: 'Close',
                                onClose: direct
                            })
                            function direct(){
                                window.location.href = "homeT.php";
                            }
                        }
                        else if (result == 2) {
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Email or Password is wrong',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                        else if (result == 3) {
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Email Format Not Valid',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                            window.location.href = "admin.php";
                        }
                    },
                    error: function () {
                        Swal.fire({
                            title: 'Login Failed !',
                            text: 'Server Down, Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    }
                });
            }
        }
        else {
            Swal.fire({
                title: 'Login Failed !',
                text: 'Incomplete Data',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        }
    });
</script>

</html>
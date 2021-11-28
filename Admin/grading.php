<?php
    require_once 'connect.php';
    session_start();
    if (!isset($_SESSION['id']) || $_SESSION['id'] == "" || !isset($_SESSION['status']) || $_SESSION['status'] != "Teacher") {
        header("Location: logout.php");
        exit();
    }
    $id=$_SESSION['id']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include.php'; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Class</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeT.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="homeT.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>
            <!-- Nav Item - Grading -->
            <li class="nav-item active">
                <a class="nav-link" href="grading.php">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Class</span></a>
            </li>

            <!-- Nav Item - Grading -->
            <li class="nav-item">
                <a class="nav-link" href="Level.php">
                    <i class="fas fa-fw fa-level-up-alt"></i>
                    <span>Level</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['first_name']?> <?php echo $_SESSION['last_name']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Class</h1>
                    </div>
                    <div class="card-body mr-3">
                        <div style="overflow-x: auto;">
                            <table id="table_id" class="table display nowrap mb-3" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Class</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="classlist">
                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body mr-3">
                        <div id="liststudent" style="overflow-x: auto;">
                            
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content" id="studentmodal">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit data student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary update" data-bs-dismiss="modal">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
<script>
    $(document).ready(function(){
        $.ajax({
            url: "ajax/getclass.php",
            method: "POST",
            data: {
                id: <?php echo $_SESSION['id']; ?>
            },
            success: function (result) {
                $("#classlist").html(result);
            },
            error: function () {
                alert("Server Not Responding");
            }
        });
        $(document).on("click", ".viewA", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/classajax.php",
                method: "POST",
                data: {
                    id: data,
                    status:1
                },
                success: function (result) {
                    $("#liststudent").html(result);
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });
        $(document).on("click", ".viewS", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/classajax.php",
                method: "POST",
                data: {
                    id: data,
                    status:2
                },
                success: function (result) {
                    $("#liststudent").html(result);
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });
        $(document).on("click", ".editA", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            var idclass = $("#idclass").val();
            $.ajax({
                url: "ajax/getmodalattendance.php",
                method: "POST",
                data: {
                    id: data
                },
                success: function (result) {
                    $("#studentmodal").html(result);
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });
        $(document).on("click", ".editS", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/getmodalscore.php",
                method: "POST",
                data: {
                    id: data
                },
                success: function (result) {
                    $("#studentmodal").html(result);
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });  
        $(document).on("click", ".updateA", function(){
            var ida = $("#ida").val();
            var attn = $('#attn').val();
            var date = $('#date').val();
            var topic = $('#topic').val();
            var x = document.getElementsByName('s');
            var y = document.getElementsByClassName('form-label name');
            var bool = true;
            var name;
            var status;
             $.ajax({
                url: "ajax/editattendance.php",
                method: "POST",
                data: {
                    ida: ida,
                    attn: attn,
                    date: date,
                    topic: topic,
                    number: 1
                },
                success: function (result) {

                },
                error: function () {
                    alert("Server Not Responding");
                },
                async: false
            });
            for (let i = 0; i < x.length; i++) {
                name = y[i].innerHTML;
                status = x[i].value;
                $.ajax({
                    url: "ajax/editattendance.php",
                    method: "POST",
                    data: {
                        ida: ida,
                        name: name,
                        status: status,
                        number: 2
                    },
                    success: function (result) {

                    },
                    error: function () {
                        if (bool) {
                            alert("Server Not Responding");
                            bool = false;   
                        }
                    },
                    async: false
                });
            }
            if(bool){
                alert("Success");
                window.location.href = "grading.php";
            }
        });
        $(document).on("click", ".updateS", function(){
            var ids = $("#ids").val();
            var scrf = $('#scrf').val();
            var percent = $('#percent').val();
            var x = document.getElementsByClassName('form-control score');
            var y = document.getElementsByClassName('form-label name');
            var bool = true;
            var name;
            var score;
             $.ajax({
                url: "ajax/editscore.php",
                method: "POST",
                data: {
                    ids: ids,
                    scrf: scrf,
                    percent: percent,
                    number: 1
                },
                success: function (result) {

                },
                error: function () {
                    alert("Server Not Responding");
                },
                async: false
            });
            for (let i = 0; i < x.length; i++) {
                name = y[i].innerHTML;
                score = x[i].value;
                $.ajax({
                    url: "ajax/editscore.php",
                    method: "POST",
                    data: {
                        ids: ids,
                        name: name,
                        score: score,
                        number: 2
                    },
                    success: function (result) {

                    },
                    error: function () {
                        if (bool) {
                            alert("Server Not Responding");
                            bool = false;   
                        }
                    },
                    async: false
                });
            }
            if(bool){
                alert("Success");
                window.location.href = "grading.php";
            }
        });
        $(document).on("click", ".deleteA", function(){
            Swal.fire({
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-success',
                title: 'Are you sure?',
                text: 'Please Double Check',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr("id");
                    var data = $("#" + id).data("val");
                    $.ajax({
                        url: "ajax/deleteattendance.php",
                        method: "POST",
                        data: {
                            id: data
                        },
                        success: function (result) {
                            swal.fire({
                                title: 'Deleted',
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                willClose:reload
                            })
                        },
                        error: function () {
                            alert("Server Not Responding");
                        }
                    });
                }
            })
            function reload(){
                window.location.href = "grading.php";
            }
        });
        $(document).on("click", ".deleteS", function(){
            Swal.fire({
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-success',
                title: 'Are you sure?',
                text: 'Please Double Check',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr("id");
                    var data = $("#" + id).data("val");
                    $.ajax({
                        url: "ajax/deletescore.php",
                        method: "POST",
                        data: {
                            id: data
                        },
                        success: function (result) {
                            swal.fire({
                                title: 'Deleted',
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                willClose:reload
                            })
                        },
                        error: function () {
                            alert("Server Not Responding");
                        }
                    });
                }
            })
            function reload(){
                window.location.href = "grading.php";
            }
        });
        $(document).on("click", ".createA", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/createmodalattendance.php",
                method: "POST",
                data: {
                    id:data
                },
                success: function (result) {
                    $("#studentmodal").html(result);
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });
        $(document).on("click", ".createS", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/createmodalscore.php",
                method: "POST",
                data: {
                    id:data
                },
                success: function (result) {
                    $("#studentmodal").html(result);
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });
        $(document).on("click", ".submitA", function(){
            var idc = $("#idc").val();
            var attn = $('#attn').val();
            var date = $('#date').val();
            var topic = $('#topic').val();
            var x = document.getElementsByName('s');
            var y = document.getElementsByClassName('form-label name');
            var bool = true;
            var name;
            var status;
             $.ajax({
                url: "ajax/createattendance.php",
                method: "POST",
                data: {
                    idc: idc,
                    attn: attn,
                    date: date,
                    topic: topic,
                    number: 1
                },
                success: function (result) {

                },
                error: function () {
                    alert("Server Not Responding");
                },
                async: false
            });
            for (let i = 0; i < x.length; i++) {
                name = y[i].innerHTML;
                status = x[i].value;
                $.ajax({
                    url: "ajax/createattendance.php",
                    method: "POST",
                    data: {
                        idc: idc,
                        attn: attn,
                        date: date,
                        topic: topic,
                        name: name,
                        status: status,
                        number: 2
                    },
                    success: function (result) {
                        
                    },
                    error: function () {
                        if (bool) {
                            alert("Server Not Responding");
                            bool = false;   
                        }
                    },
                    async: false
                });
            }
            if(bool){
                alert("Success");
                window.location.href = "grading.php";
            }
        });
        $(document).on("click", ".submitS", function(){
            var idc = $("#idc").val();
            var scrf = $('#scrf').val();
            var percent = $('#percent').val();
            var x = document.getElementsByClassName('form-control score');
            var y = document.getElementsByClassName('form-label name');
            var bool = true;
            var name;
            var score;
             $.ajax({
                url: "ajax/createscore.php",
                method: "POST",
                data: {
                    idc: idc,
                    scrf: scrf,
                    percent: percent,
                    number: 1
                },
                success: function (result) {

                },
                error: function () {
                    alert("Server Not Responding");
                },
                async: false
            });
            for (let i = 0; i < x.length; i++) {
                name = y[i].innerHTML;
                score = x[i].value;
                $.ajax({
                    url: "ajax/createscore.php",
                    method: "POST",
                    data: {
                        idc: idc,
                        scrf: scrf,
                        percent: percent,
                        name: name,
                        score: score,
                        number: 2
                    },
                    success: function (result) {
                        
                    },
                    error: function () {
                        if (bool) {
                            alert("Server Not Responding");
                            bool = false;   
                        }
                    },
                    async: false
                });
            }
            if(bool){
                alert("Success");
                window.location.href = "grading.php";
            }
        });
    });     
</script>
</html>
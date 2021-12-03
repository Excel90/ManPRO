<?php
    session_start();
    require_once 'connect.php';
    if (!isset($_SESSION['id']) || $_SESSION['id'] == "" || !isset($_SESSION['status']) || $_SESSION['status'] != "Admin") {
        header("Location: logout.php");
        exit();
    }
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

    <title>SB Admin 2 - Verify</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Verify -->
            <li class="nav-item active">
                <a class="nav-link" href="verify.php">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Verify member</span></a>
            </li>
            <!-- Nav Item - Company Profile -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOffice"
                    aria-expanded="true" aria-controls="collapseOffice">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Back Office</span>
                </a>
                <div id="collapseOffice" class="collapse" aria-labelledby="headingOffice"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="TAA.php">Terms and Agreement</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Manage Database -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDatabase"
                    aria-expanded="true" aria-controls="collapseDatabase">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Manage Database</span>
                </a>
                <div id="collapseDatabase" class="collapse" aria-labelledby="headingDatabase"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage People</h6>
                        <a class="collapse-item" href="Student.php">Student</a>
                        <a class="collapse-item" href="Teacher.php">Teacher</a>
                        <h6 class="collapse-header">Manage Course</h6>
                        <a class="collapse-item" href="Class.php">Class</a>
                        <a class="collapse-item" href="Schedule.php">Schedule</a>
                        <h6 class="collapse-header">Manage Price</h6>
                        <a class="collapse-item" href="Course.php">Course Price</a>
                    </div>
                </div>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                        <h1 class="h3 mb-0 text-gray-800">Verify</h1>
                    </div>
                    <div class="card-body mr-3">
                        <div style="overflow-x: auto;">
                            <table id="table_id" class="table display nowrap mb-3" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Upload</th>
                                        <th>Verification</th>
                                        <th>Class Progress</th>
                                    </tr>
                                </thead>
                                <tbody id="verifylist">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content" id="verifymodal">
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
            url: "ajax/getverify.php",
            method: "POST",
            data: {
                
            },
            success: function (result) {
                $("#verifylist").html(result);
            },
            error: function () {
                alert("Server Not Responding");
            }
        });
        $(document).on("click", ".view", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/getpathuploadmodal.php",
                method: "POST",
                data: {
                    id: data
                },
                success: function (result) {
                    $("#verifymodal").html(result);
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });
        $(document).on("click", ".verify", function(){
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
                        url: "ajax/updateupload.php",
                        method: "POST",
                        data: {
                            id: data,
                            status:1
                        },
                        success: function (result) {
                            swal.fire({
                                title: 'Verified',
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
                window.location.href = "verify.php";
            }
        });
        $(document).on("click", ".reject", function(){
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
                        url: "ajax/updateupload.php",
                        method: "POST",
                        data: {
                            id: data,
                            status:2
                        },
                        success: function (result) {
                            swal.fire({
                                title: 'Rejected',
                                icon: 'error',
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
                window.location.href = "verify.php";
            }
        });
        $(document).on("click", ".submit", function(){
            var fname = $("#fn").val();
            var lname = $("#ln").val();
            var add = $("#add").val();
            var email = $("#email").val();
            var bd = $("#bd").val();
            var bp = $("#bp").val();
            var pass = $("#password").val();
            $.ajax({
                url: "ajax/createstudent.php",
                method: "POST",
                data: {
                    fn: fname,
                    ln: lname,
                    add: add,
                    email: email,
                    bd: bd,
                    bp: bp,
                    pass: pass
                },
                success: function (result) {
                    alert("Success");
                    window.location.href = "Student.php";
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });
    });
</script>
</html>
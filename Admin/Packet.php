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

    <title>SB Admin 2 - Packet</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .btn-sweet:focus {
            outline: none;
        }

        .btn-sweet {
            border: 0px;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
            min-width: 30%;
            font-family: 'Coontinum', sans-serif;
            font-weight: 500;
            color: rgb(32, 31, 31);
        }
        
        .btn-gradient {
            background-image: linear-gradient(to right, #5b86e5, #36d1dc, #ff9190, #ffdca2);
            text-align: center;
            background-size: 300% 100%;
            -moz-transition: all .4s ease-in-out;
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
            font-size: 14pt;
        }

        .btn-gradient:hover {
            cursor: pointer;
            background-position: 100% 0;
            -moz-transition: all .4s ease-in-out;
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        .accordion-item{
            margin-bottom: 10px;
        }

        .form-label{
            font-weight: bold;
        }

        #button-log {
            margin-top: 8px;
            margin-right: 8px;
            position:absolute;
            top: 0;
            right: 0;
        }

        .img-custom {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            max-height: 280px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 3px solid #555;
        }

        .modal-baru {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content-baru {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 500px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content-baru,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content-baru {
                width: 100%;
            }
        }

        @media(min-width: 767px) {
            .desc-movie li {
                padding-left: 100px;
                position: relative;
                text-align: justify;
                line-height: 1.8;
                padding-top: 10px;
            }

            .desc-movie li span {
                min-width: 100px;
                position: absolute;
                left: 0;
                top: 0;
                display: inline-block;
                font-weight: bold;
            }
        }

        @media screen and (max-width: 992px) {
            #btnLogin, #btnLogout {
                float: right;
            }
        }
    </style>
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
            <li class="nav-item">
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
                        <a class="collapse-item" href="company.php">Company Profile</a>
                        <a class="collapse-item" href="TAA.php">Terms and Agreement</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Manage Database -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseDatabase"
                    aria-expanded="true" aria-controls="collapseDatabase">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Manage Database</span>
                </a>
                <div id="collapseDatabase" class="collapse show" aria-labelledby="headingDatabase"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage People</h6>
                        <a class="collapse-item" href="Student.php">Student</a>
                        <a class="collapse-item" href="Teacher.php">Teacher</a>
                        <h6 class="collapse-header">Manage Course</h6>
                        <a class="collapse-item" href="Class.php">Class</a>
                        <a class="collapse-item" href="Attendance.php">Attendance</a>
                        <a class="collapse-item" href="Schedule.php">Schedule</a>
                        <h6 class="collapse-header">Manage Price</h6>
                        <a class="collapse-item active" href="Packet.php">Packet Price</a>
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
                        <h1 class="h3 mb-0 text-gray-800">Packet</h1>
                    </div>
                    <div class="card-body mr-3">
                        <div style="overflow-x: auto;">
                            <table id="table_id" class="table display nowrap mb-3" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="packetlist">
                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit course</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="packetmodal">

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
            url: "ajax/getpacket.php",
            method: "POST",
            data: {
                
            },
            success: function (result) {
                $("#packetlist").html(result);
            },
            error: function () {
                alert("Server Not Responding");
            }
        });
        $(document).on("click", ".edit", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/getmodalpacket.php",
                method: "POST",
                data: {
                    id: data
                },
                success: function (result) {
                    $("#packetmodal").html(result);
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        }); 
        $(document).on("click", ".update", function(){
            var id = $("#id").val();
            var name = $("#name").val();
            var price = $("#price").val();
            $.ajax({
                url: "ajax/editpacket.php",
                method: "POST",
                data: {
                    id: id,
                    name: name,
                    price: price
                },
                success: function (result) {
                    alert("Success");
                    window.location.href = "Packet.php";
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        }); 
    });
</script>
</html>
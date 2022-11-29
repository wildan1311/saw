<!DOCTYPE html>
<html lang="en">
<?php
$title = "index";
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DDS - SAW</title>

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
        <?php
        include('navbar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php
                include('topbar.php');
                ?>
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Form Murid</h1>
                    <p class="mb-4">Form untuk menambahkan data murid baru</p>
                    <div class=" row">
                        <div class="card col" style="width: 18rem;">
                            <div class="card-body">
                                <form action="storeMurid.php" method="POST">
                                    <div class="form-group">
                                        <label for="nama" class="form-label">Nama : </label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-label">NISN : </label>
                                        <input type="text" class="form-control" name="nisn">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-label">Kelas : </label>
                                        <input type="text" class="form-control" name="kelas">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-label">Nama Orangtua / Wali : </label>
                                        <input type="text" class="form-control" name="namaOrtu">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-label">Gaji Orang Tua / Wali : </label>
                                        <input type="text" class="form-control" name="gaji">
                                    </div>
                                    <div class="form-group justify-content-end d-flex">
                                        <a href="formPenilaian.php" class="btn btn-secondary" style="margin-right: 20px;">Process to rating</a>
                                        <input type="submit" class="btn btn-primary" name="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include('footer.php');
            ?>
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current
                    session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

</html>
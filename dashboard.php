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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">

                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title">Penilaian</h1>
                                        <!-- <hr /> -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- Button trigger modal -->
                                        <a href="index.php?module=form_lanjutan" class="btn btn-primary mb-4">TAMBAH</a>
                                        <hr />
                                        <div class="row">

                                            <?php
                                            $no = 0;
                                            include "koneksi.php";
                                            $querynilai = mysqli_query($con, "SELECT DISTINCT periode,status_penilaian,tgl_daftar FROM tbl_penilaian");
                                            while ($nl = mysqli_fetch_array($querynilai)) {
                                            ?>


                                                <div class="col-lg-4 ">
                                                    <div class="card card-body text-center">
                                                        <h4 class="card-title mt-0">Penilaian <?= $nl['tgl_daftar']; ?> / <?= $nl['periode']; ?> </h4>
                                                        <span class="info-box-number text-center text-muted mb-0"><?= $nl['status_penilaian']; ?></span><br>
                                                        <a href="detailPenilaian.php?&tgl=<?php echo $nl['tgl_daftar']; ?>&priode=<?= $nl['periode']; ?>&status_penilaian=<?= $nl['status_penilaian']; ?>" class="btn btn-primary" <?php if ($nl['status_penilaian'] == "belum selesai") {
                                                                                                                                                                                                                                                            echo "hidden";
                                                                                                                                                                                                                                                        } ?>>Lihat Detail Penilaian</a>
                                                    </div>
                                                    <!--end card-->
                                                </div>
                                                <!--end col-->
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
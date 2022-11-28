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
                    <?php
                    include "koneksi.php";
                    $date = date('Y');
                    ?>
                    <!-- Content Wrapper. Contains page content -->
                    <div class="page-content">
                        <div class="container-fluid">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="float-right">
                                                <i class="mdi mdi-account font-24 text-secondary"></i>
                                            </div>
                                            <!-- Main content -->
                                            <section class="content">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="penilaian.php" method="post">
                                                            <div class="card-box table-responsive">
                                                                <h2 class="m-t-0 header-title"><b>Form Penilaian</b></h2>
                                                                <hr />
                                                                <div class="item form-group">
                                                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                                                        <h4 class="m-t-0 header-title">Periode <span class="required">*</span></h4>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" class="form-control" name="priode" placeholder="" value="<?= date('Y'); ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <table id="datatable" class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Nama Murid</th>
                                                                            <?php
                                                                            $querykriteria = mysqli_query($con, "SELECT nama_kriteria FROM tbl_kriteria");
                                                                            while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                            ?>

                                                                                <th><?php echo $krt['nama_kriteria']; ?></th>

                                                                            <?php } ?>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $no = 0;
                                                                        $querykar = mysqli_query($con, "SELECT * FROM tbl_peserta");
                                                                        while ($kar = mysqli_fetch_array($querykar)) {
                                                                            $id = $kar['nisn'];
                                                                            $no++;
                                                                        ?>
                                                                            <tr>
                                                                                <td><?= $no; ?></td>
                                                                                <td><?php echo $kar['nama']; ?></td>
                                                                                <?php
                                                                                $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria");
                                                                                while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                                    $id_krt = $krt['id_kriteria'];
                                                                                ?>

                                                                                    <td>
                                                                                        <div class="m-b-0">
                                                                                            <select name="nilai[<?php echo $id; ?>][<?php echo $id_krt; ?>]" id="" class="form-control" data-style="btn-custom">
                                                                                                <option value="0">-- Pilih --</option>
                                                                                                <?php
                                                                                                $queryparam = mysqli_query($con, "SELECT * FROM tbl_parameter where id_kriteria = $id_krt");
                                                                                                while ($param = mysqli_fetch_array($queryparam)) {
                                                                                                    $nama_param = $param['nama_parameter'];
                                                                                                    $nilai_param = $param['nilai_parameter'];
                                                                                                ?>
                                                                                                    <option value="<?= $nilai_param ?>"><?= $nama_param ?></option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php } ?>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                                <div class="ln_solid"></div>
                                                                <div class="item form-group">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Proses Penilaian </button>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
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
<!DOCTYPE html>
<html lang="en">
<?php
$title = "index";
$priode = $_GET['priode'];
$tgl = $_GET['tgl'];
$date = date('Y');
include "koneksi.php";
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
                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/penilaian/aksi_edit.php" method="post">
                                                    <div class="item form-group">
                                                        <h3 class="font-32 font-weight-bold mt-0 mb-4">Detail Penilaian</h3>
                                                        <hr />
                                                        <h4 class="header-title mt-0">Periode Penilaian<span class="required">*</span></h4>
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="text" class="form-control" name="priode" placeholder="" value="<?= $priode; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="card-box table-responsive">
                                                        <br>
                                                        <h3 class="">MATRIKS PENILAIAN</h3>
                                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Murid</th>
                                                                    <?php
                                                                    
                                                                    $querykriteria = mysqli_query($con, "SELECT nama_kriteria FROM tbl_kriteria WHERE tgl_ubah<'$tgl'");
                                                                    while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                    ?>

                                                                        <th><?php echo $krt['nama_kriteria']; ?></th>

                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 0;
                                                                
                                                                $querykar = mysqli_query($con, "SELECT * FROM tbl_peserta WHERE tgl_update < '$tgl'");
                                                                while ($kar = mysqli_fetch_array($querykar)) {
                                                                    $id = $kar['nisn'];
                                                                    $no++;
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?php echo $kar['nama']; ?></td>
                                                                        <?php
                                                                        
                                                                        $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria WHERE tgl_ubah<'$tgl'");
                                                                        while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                            $id_krt = $krt['id_kriteria'];
                                                                            $queruynilaiparam = mysqli_query($con, "SELECT nilai_kriteria FROM tbl_penilaian where nisn = $id and id_kriteria = $id_krt AND periode  = $priode ");
                                                                            $nilai = mysqli_fetch_array($queruynilaiparam);
                                                                        ?>

                                                                            <td>
                                                                                <?php
                                                                                
                                                                                $queryparam = mysqli_query($con, "SELECT * FROM tbl_parameter where id_kriteria = $id_krt AND nilai_parameter = ".$nilai['nilai_kriteria']);
                                                                                $param = mysqli_fetch_array($queryparam);
                                                                                ?>
                                                                                <input type="text" class="form-control" value="<?= $param['nama_parameter']; ?>" readonly>
                                                                            </td>

                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-box table-responsive">
                                                        <br>
                                                        <H3>MATRIKS NORMALISASI</H3>
                                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Siswa</th>
                                                                    <?php
                                                                    
                                                                    $querykriteria = mysqli_query($con, "SELECT nama_kriteria FROM tbl_kriteria WHERE tgl_ubah<'$tgl'");
                                                                    while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                    ?>

                                                                        <th><?php echo $krt['nama_kriteria']; ?></th>

                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 0;
                                                                
                                                                $querykar = mysqli_query($con, "SELECT * FROM tbl_peserta WHERE tgl_update<'$tgl'");
                                                                while ($kar = mysqli_fetch_array($querykar)) {
                                                                    $id = $kar['nisn'];
                                                                    $no++;
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?php echo $kar['nama']; ?></td>
                                                                        <?php
                                                                        
                                                                        $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria WHERE tgl_ubah<'$tgl'");
                                                                        while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                            $id_krt = $krt['id_kriteria'];
                                                                            $queruynormalisasi = mysqli_query($con, "SELECT nilai_normalisasi FROM tbl_penilaian where nisn = $id and id_kriteria = $id_krt AND  periode  = $priode ");
                                                                            $nilai_normalisasi = mysqli_fetch_array($queruynormalisasi);
                                                                            $hasil1 = number_format($nilai_normalisasi['nilai_normalisasi'], 4);
                                                                        ?>

                                                                            <td>
                                                                                <input type="text" class="form-control" value="<?= $hasil1; ?>" readonly>
                                                                            </td>

                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-box table-responsive">
                                                        <br>
                                                        <H3>RANKING NILAI</H3>
                                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Murid</th>
                                                                    <th>Hasil</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 0;
                                                                $queryv = mysqli_query($con, "SELECT DISTINCT pnl.nilai_v,pnd.nama,pnl.tgl_daftar FROM tbl_penilaian pnl LEFT JOIN tbl_peserta pnd ON pnl.nisn = pnd.nisn WHERE pnl.periode = $priode AND pnl.tgl_daftar='$tgl' GROUP BY pnd.nama ORDER BY pnl.nilai_v DESC");
                                                                while ($v = mysqli_fetch_array($queryv)) {
                                                                    $hasil = number_format($v['nilai_v'], 4);

                                                                    $no++;
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?php echo $v['nama']; ?></td>
                                                                        <td>
                                                                            <input type="text" class="form-control" value="<?php echo $hasil; ?>" readonly>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="item form-group">
                                                        <a href="../lib/print/cetak_penilaian.php" class="more-39291">
                                                            <button type="button" class="btn btn-warning btn-bordered waves-effect w-md waves-light m-b-5"><i class="fa fa-print m-r-5"></i> &nbsp;Cetak</button> </a>
                                                    </div>
                                                </form>
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
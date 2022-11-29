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
                    <h1 class="h3 mb-2 text-gray-800">DATA MAHASISWA</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                            <div class="col d-flex justify-content-end">
                                <div class="col-">
                                    <a href="#" data-toggle="modal" data-target="#add_data_modal"
                                        class="btn btn-primary btn-sm">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NAMA</th>
                                            <th>NISN</th>
                                            <th>KELAS</th>
                                            <th>NAMA ORANG TUA / WALI</th>
                                            <th>GAJI ORANG TUA</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once('koneksi.php');
                                        $no = 1;
                                        $result = mysqli_query($con, "select * from tbl_peserta");
                                        while($tbl_peserta = mysqli_fetch_array($result)){
                                        ?>

                                        </tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $tbl_peserta['nama']; ?></td>
                                        <td><?php echo $tbl_peserta['nisn']; ?></td>
                                        <td><?php echo $tbl_peserta['kelas']; ?></td>
                                        <td><?php echo $tbl_peserta['nama_wali']; ?></td>
                                        <td><?php echo $tbl_peserta['gaji']; ?></td>
                                        <td>
                                            <a href="edit.php?nisn=<?php echo $tbl_peserta['nisn']; ?>"
                                                data-toggle="modal" data-target="#edit_data_modal"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="deleteData.php?nisn=<?php echo $tbl_peserta['nisn']; ?>"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- add data -->
            <div class="modal fade" id="add_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="tambah.php" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input type="text" name="nisn" class="form-control"
                                                placeholder="Masukkan NISN">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <input type="text" name="kelas" class="form-control"
                                                placeholder="Masukkan Kelas">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nama Orang Tua</label>
                                            <input type="text" name="namaortu" class="form-control"
                                                placeholder="Masukkan Nama Orang Tua">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>GAJI ORANG TUA</label>
                                            <input type="number" name="gaji" class="form-control"
                                                placeholder="Masukkan Gaji">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end add data -->

            <!-- edit  data-->
            <div class="modal fade" id="edit_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="edit.php" method="post">
                                <?php
                                include_once('koneksi.php');
                                $result = mysqli_query($con, "select * from tbl_peserta");  
                                while($tbl_peserta = mysqli_fetch_array($result)){
                                    $nisn = $tbl_peserta['nisn'];  
                                ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input type="text" name="nisn" class="form-control"
                                                placeholder="Masukkan NISN">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <input type="text" name="kelas" class="form-control"
                                                placeholder="Masukkan Kelas">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nama Orang Tua</label>
                                            <input type="text" name="namaortu" class="form-control"
                                                placeholder="Masukkan Nama Orang Tua">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>GAJI ORANG TUA</label>
                                            <input type="number" name="gaji" class="form-control"
                                                placeholder="Masukkan Gaji">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Edit Data</button>
                                    </div>
                                </div>
                                <?php
                                }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
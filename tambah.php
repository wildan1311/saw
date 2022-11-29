<?php
include 'koneksi.php';
// menangkap data yang di kirim dari form
$nisn = $_POST['nisn'];     
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$namaortu = $_POST['namaortu'];
$gaji = $_POST['gaji'];
// menambah data ke database
mysqli_query($con,"INSERT INTO tbl_peserta VALUES('$nisn','$nama','$kelas','$namaortu','$gaji')");
// mengalihkan halaman kembali ke index.php
header("location:tampilData.php");
?>
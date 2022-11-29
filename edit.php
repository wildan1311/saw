<?php
include 'koneksi.php';
// menangkap data yang di kirim dari form
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$namaortu = $_POST['namaortu'];
$gaji = $_POST['gaji'];
// update data ke database
mysqli_query($con,"UPDATE tbl_peserta SET nama='$nama', kelas='$kelas', nama_wali='$namaortu', gaji='$gaji' WHERE nisn='$nisn'");
// mengalihkan halaman kembali ke index.php
header("location:tampilData.php");

?>
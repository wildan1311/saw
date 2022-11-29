<!-- delete data -->
<?php 
include 'koneksi.php';
$nisn = $_GET['nisn'];
mysqli_query($con,"delete from tbl_peserta where nisn='$nisn'");
header("location:tampilData.php");

?>
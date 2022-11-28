<?php
    include_once('koneksi.php');

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas']; 
    $nisn = $_POST['nisn'];
    $namaOrtu = $_POST['namaOrtu'];
    $gaji = $_POST['gaji'];
    $date = date("Y-m-d H:i:s");

    mysqli_query($con, "insert into tbl_peserta values(
        '$nisn', '$nama', '$kelas', '$namaOrtu', '$gaji', '$date'
    )");

    header('location: formMurid.php?success=true');
?>
<?php
    include_once('koneksi.php');

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas']; 
    $nisn = $_POST['nisn'];
    $namaOrtu = $_POST['namaOrtu'];
    $gaji = $_POST['gaji'];

    mysqli_query($con, "insert into tbl_peserta values(
        '$nisn', '$nama', '$kelas', '$namaOrtu', '$gaji'
    )");

    header('location: formMurid.php?success=true');
?>
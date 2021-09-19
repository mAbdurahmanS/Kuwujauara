<?php

    error_reporting(0);

    include '../../../controllers/connect.php';

    session_start();

    if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih:(');document.location='../../../index.php'</script>";
    }
    // Logic
    $username = $_SESSION['nama_pengguna'];

    // Dashboard
    include '../../../controllers/dbdashboard.php';
    // Dashboard

    // User
    include '../../../controllers/dbuser.php';
    // User

    // RW | RT
    include '../../../controllers/dbrtrw.php';
    // RW | RT

    // Strategi
    include '../../../controllers/dbstrategi.php';
    // Strategi

    //QC
    include '../../../controllers/dbcounting.php';
    //QC

?>
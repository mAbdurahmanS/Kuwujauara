<?php

include "connect.php";

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

$sql_user = mysqli_query($db, "SELECT * FROM tb_akun WHERE username = '$username' ");
$data_user = mysqli_fetch_array($sql_user);

$sql = mysqli_query($db, "SELECT * FROM tb_akun where username = '$username' and password='$password'");
$data = mysqli_fetch_array($sql);
$cek=mysqli_num_rows($sql);

if ($data_user){

    if ($password == $data_user['password']){
        session_start();
        $_SESSION['ids'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_pengguna'] = $data['nama'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['desa'] = $data['desa'];
        
        if($data_user['level'] == "admin" && $data_user['desa'] == "kalideres")
        {
            header('location:../users/desa/admin/dashboard.php');
        }
        else if($data_user['level'] == "inter" && $data_user['desa'] == "kalideres")
        {
            header('location:../users/desa/inter/dashboard.php');
        }
        else if($data_user['level'] == "member" && $data_user['desa'] == "kalideres")
        {
            header('location:../users/desa/member/dashboard.php');
        }

        else if($data_user['level'] == "admin" && $data_user['desa'] == "gegesik_kidul")
        {
            header('location:../users/desa/admin/dashboard_gegesik.php');
        }
        else if($data_user['level'] == "inter" && $data_user['desa'] == "gegesik_kidul")
        {
            header('location:../users/desa/inter/dashboard_gegesik.php');
        }
        else if($data_user['level'] == "member" && $data_user['desa'] == "gegesik_kidul")
        {
            header('location:../users/desa/member/dashboard.php');
        }

        else if($data_user['level'] == "admin" && $data_user['desa'] == "panunggul")
        {
            header('location:../users/desa/admin/dashboard_panunggul.php');
        }
        else if($data_user['level'] == "inter" && $data_user['desa'] == "panunggul")
        {
            header('location:../users/desa/inter/dashboard_panunggul.php');
        }
        else if($data_user['level'] == "member" && $data_user['desa'] == "panunggul")
        {
            header('location:../users/desa/member/dashboard.php');
        }
    }else{
        echo "<script>alert('Maaf, Login Gagal, Password Anda Tidak Terdaftar!');document.location='../index.php'</script>";
    }
}else{
    echo "<script>alert('Maaf, Login Gagal, Username Anda Tidak Terdaftar!');document.location='../index.php'</script>";
}


?>
<?php
@session_start();

include "connect.php";

$nama = $_POST['nama'];
$password = $_POST['password'];
$username = $_POST['username'];
$wilayah = $_POST['wilayah'];
$level = $_POST['level'];

$user = mysqli_query($db, "select id_pendaftar from pendaftar where id_pendaftar ='$username'");

$jlh_user = mysqli_num_rows($user);

if($jlh_user>1)
{
    
?>
    <script type="text/javascript">
        alert("Maaf username sudah ada");
        window.location = "../registernewaccount.php";
    </script>

<?php
}
else
{
    if($password)
    {
        $sql = "insert into pendaftar(id_pendaftar,nama) values('".$username."','".$nama."')";
        $sql2 = "insert into tuser(username,password,kode_pendaftar,level,wilayah) values('".$username."','".$password."','".$username."','".$level."','".$wilayah."')";
        mysqli_query($db,$sql);
        mysqli_query($db,$sql2);
        echo '<script language="javascript">
            window.location="../index.php?page=simpan";
            </script>';
    }else{
        echo '<script type="text/javascript">
		    alert("Maaf Password anda salah");
		    window.location="../registernewaccount.php";
	    </script>';
    }
}
?>
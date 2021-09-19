<?php

session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_pengguna']);
unset($_SESSION['level']);
unset($_SESSION['desa']);

session_destroy();
echo "<script>alert('Anda telah logout');document.location='index.php'</script>";

?>
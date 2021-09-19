<?php
    // Dashboard
    $desa1 = mysqli_query($db, "SELECT * FROM t_input_kalideres");
    $kalideres = mysqli_fetch_array($desa1);

    $desa2 = mysqli_query($db, "SELECT * FROM t_input_gegesik");
    $gegesik = mysqli_fetch_array($desa2);
    // Dashboard
?>
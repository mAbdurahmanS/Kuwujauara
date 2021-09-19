<?php

    //Strategi
        $s1 = mysqli_query($db, "SELECT * FROM tb_strategi WHERE bagian = 'profil' ");
        $profil = mysqli_fetch_array($s1);

        $s2 = mysqli_query($db, "SELECT * FROM tb_strategi WHERE bagian = 'survei' ");
        $survei = mysqli_fetch_array($s2);

        $s3 = mysqli_query($db, "SELECT * FROM tb_strategi WHERE bagian = 'tahapan' ");
        $tahapan = mysqli_fetch_array($s3);

        $s4 = mysqli_query($db, "SELECT * FROM tb_strategi WHERE bagian = 'strategi' ");
        $fokus = mysqli_fetch_array($s4);

    //Strategi

?>
<?php

    //Desa

      //Kalideres
        $ks1 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_pilihan = 'Kadina'");
        $kskuwu1 = mysqli_num_rows($ks1);

        $ks2 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_pilihan = 'Hj. Suherni'");
        $kskuwu2 = mysqli_num_rows($ks2);

        $ks7 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_pilihan = 'ragu'");
        $kskuwu7 = mysqli_num_rows($ks7);

        $ks3 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_pilihan = 'Kadina' and input_jenis_kelamin = 'pria' ");
        $kskuwu3 = mysqli_num_rows($ks3);

        $ks4 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_pilihan = 'Hj. Suherni' and input_jenis_kelamin = 'pria' ");
        $kskuwu4 = mysqli_num_rows($ks4);

        $ks5 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_pilihan = 'Kadina' and input_jenis_kelamin = 'wanita' ");
        $kskuwu5 = mysqli_num_rows($ks5);

        $ks6 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_pilihan = 'Hj. Suherni' and input_jenis_kelamin = 'wanita' ");
        $kskuwu6 = mysqli_num_rows($ks6);
      //Kalideres

    //Desa



    // RW | RT

        //RW 01 | RT 01
        $get7 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '01' and input_pilihan = 'Kadina'");
        $kadinart1 = mysqli_num_rows($get7);

        $get8 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '01' and input_pilihan = 'Hj. Suherni'");
        $suhernirt1 = mysqli_num_rows($get8);

        $get1r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '01' and input_pilihan = 'ragu'");
        $ragu1 = mysqli_num_rows($get1r);

        $a = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '01' ");
        $b = mysqli_fetch_array($a);

        //RW 01 | RT 02
        $get9 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '01' and input_pilihan = 'Kadina'");
        $kadinart2 = mysqli_num_rows($get9);

        $get10 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '01' and input_pilihan = 'Hj. Suherni'");
        $suhernirt2 = mysqli_num_rows($get10);

        $get2r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '01' and input_pilihan = 'ragu'");
        $ragu2 = mysqli_num_rows($get2r);

        $a2 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '01' ");
        $b2 = mysqli_fetch_array($a2);

        //RW 01 | RT 03
        $get11 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '01' and input_pilihan = 'Kadina'");
        $kadinart3 = mysqli_num_rows($get11);

        $get12 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '01' and input_pilihan = 'Hj. Suherni'");
        $suhernirt3 = mysqli_num_rows($get12);

        $get3r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '01' and input_pilihan = 'ragu'");
        $ragu3 = mysqli_num_rows($get3r);

        $a3 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '01' ");
        $b3 = mysqli_fetch_array($a3);

        //RW 02 | RT 01
        $get13 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '02' and input_pilihan = 'Kadina'");
        $kadinart4 = mysqli_num_rows($get13);

        $get14 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '02' and input_pilihan = 'Hj. Suherni'");
        $suhernirt4 = mysqli_num_rows($get14);

        $get4r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '02' and input_pilihan = 'ragu'");
        $ragu4 = mysqli_num_rows($get4r);

        $a4 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '02' ");
        $b4 = mysqli_fetch_array($a4);

        //RW 02 | RT 02
        $get15 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '02' and input_pilihan = 'Kadina'");
        $kadinart5 = mysqli_num_rows($get15);

        $get16 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '02' and input_pilihan = 'Hj. Suherni'");
        $suhernirt5 = mysqli_num_rows($get16);

        $get5r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '02' and input_pilihan = 'ragu'");
        $ragu5 = mysqli_num_rows($get5r);

        $a5 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '02' ");
        $b5 = mysqli_fetch_array($a5);

        //RW 02 | RT 03
        $get17 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '02' and input_pilihan = 'Kadina'");
        $kadinart6 = mysqli_num_rows($get17);

        $get18 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '02' and input_pilihan = 'Hj. Suherni'");
        $suhernirt6 = mysqli_num_rows($get18);

        $get6r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '02' and input_pilihan = 'ragu'");
        $ragu6 = mysqli_num_rows($get6r);

        $a6 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '02' ");
        $b6 = mysqli_fetch_array($a6);

        //RW 03 | RT 01
        $get19 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '03' and input_pilihan = 'Kadina'");
        $kadinart7 = mysqli_num_rows($get19);

        $get20 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '03' and input_pilihan = 'Hj. Suherni'");
        $suhernirt7 = mysqli_num_rows($get20);

        $get7r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '03' and input_pilihan = 'ragu'");
        $ragu7 = mysqli_num_rows($get7r);

        $a7 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '03' ");
        $b7 = mysqli_fetch_array($a7);

        //RW 03 | RT 02
        $get21 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '03' and input_pilihan = 'Kadina'");
        $kadinart8 = mysqli_num_rows($get21);

        $get22 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '03' and input_pilihan = 'Hj. Suherni'");
        $suhernirt8 = mysqli_num_rows($get22);

        $get8r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '03' and input_pilihan = 'ragu'");
        $ragu8 = mysqli_num_rows($get8r);

        $a8 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '03' ");
        $b8 = mysqli_fetch_array($a8);

        //RW 03 | RT 03
        $get23 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '03' and input_pilihan = 'Kadina'");
        $kadinart9 = mysqli_num_rows($get23);

        $get24 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '03' and input_pilihan = 'Hj. Suherni'");
        $suhernirt9 = mysqli_num_rows($get24);

        $get9r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '03' and input_pilihan = 'ragu'");
        $ragu9 = mysqli_num_rows($get9r);

        $a9 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '03' ");
        $b9 = mysqli_fetch_array($a9);

        //RW 04 | RT 01
        $get25 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '04' and input_pilihan = 'Kadina'");
        $kadinart10 = mysqli_num_rows($get25);

        $get26 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '04' and input_pilihan = 'Hj. Suherni'");
        $suhernirt10 = mysqli_num_rows($get26);

        $get10r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '04' and input_pilihan = 'ragu'");
        $ragu10 = mysqli_num_rows($get10r);

        $a10 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '04' ");
        $b10 = mysqli_fetch_array($a10);

        //RW 04 | RT 02
        $get27 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '04' and input_pilihan = 'Kadina'");
        $kadinart11 = mysqli_num_rows($get27);

        $get28 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '04' and input_pilihan = 'Hj. Suherni'");
        $suhernirt11 = mysqli_num_rows($get28);

        $get11r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '04' and input_pilihan = 'ragu'");
        $ragu11 = mysqli_num_rows($get11r);

        $a11 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '04' ");
        $b11 = mysqli_fetch_array($a11);

        //RW 04 | RT 03
        $get29 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '04' and input_pilihan = 'Kadina'");
        $kadinart12 = mysqli_num_rows($get29);

        $get30 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '04' and input_pilihan = 'Hj. Suherni'");
        $suhernirt12 = mysqli_num_rows($get30);

        $get12r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '04' and input_pilihan = 'ragu'");
        $ragu12 = mysqli_num_rows($get12r);

        $a12 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '04' ");
        $b12 = mysqli_fetch_array($a12);

        //RW 05 | RT 01
        $get31 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '05' and input_pilihan = 'Kadina'");
        $kadinart13 = mysqli_num_rows($get31);

        $get32 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '05' and input_pilihan = 'Hj. Suherni'");
        $suhernirt13 = mysqli_num_rows($get32);

        $get13r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '05' and input_pilihan = 'ragu'");
        $ragu13 = mysqli_num_rows($get13r);

        $a13 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '05' ");
        $b13 = mysqli_fetch_array($a13);

        //RW 05 | RT 02
        $get33 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '05' and input_pilihan = 'Kadina'");
        $kadinart14 = mysqli_num_rows($get33);

        $get34 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '05' and input_pilihan = 'Hj. Suherni'");
        $suhernirt14 = mysqli_num_rows($get34);

        $get14r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '05' and input_pilihan = 'ragu'");
        $ragu14 = mysqli_num_rows($get14r);

        $a14 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '05' ");
        $b14 = mysqli_fetch_array($a14);

        //RW 05 | RT 03
        $get35 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '05' and input_pilihan = 'Kadina'");
        $kadinart15 = mysqli_num_rows($get35);

        $get36 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '05' and input_pilihan = 'Hj. Suherni'");
        $suhernirt15 = mysqli_num_rows($get36);

        $get15r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '05' and input_pilihan = 'ragu'");
        $ragu15 = mysqli_num_rows($get15r);

        $a15 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '05' ");
        $b15 = mysqli_fetch_array($a15);

        //RW 06 | RT 01
        $get37 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '06' and input_pilihan = 'Kadina'");
        $kadinart16 = mysqli_num_rows($get37);

        $get38 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '06' and input_pilihan = 'Hj. Suherni'");
        $suhernirt16 = mysqli_num_rows($get38);

        $get16r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '06' and input_pilihan = 'ragu'");
        $ragu16 = mysqli_num_rows($get16r);

        $a16 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '06' ");
        $b16 = mysqli_fetch_array($a16);

        //RW 06 | RT 02
        $get39 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '06' and input_pilihan = 'Kadina'");
        $kadinart17 = mysqli_num_rows($get39);

        $get40 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '06' and input_pilihan = 'Hj. Suherni'");
        $suhernirt17 = mysqli_num_rows($get40);

        $get17r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '06' and input_pilihan = 'ragu'");
        $ragu17 = mysqli_num_rows($get17r);

        $a17 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '06' ");
        $b17 = mysqli_fetch_array($a17);

        //RW 06 | RT 03
        $get41 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '06' and input_pilihan = 'Kadina'");
        $kadinart18 = mysqli_num_rows($get41);

        $get42 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '06' and input_pilihan = 'Hj. Suherni'");
        $suhernirt18 = mysqli_num_rows($get42);

        $get18r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '06' and input_pilihan = 'ragu'");
        $ragu18 = mysqli_num_rows($get18r);

        $a18 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '06' ");
        $b18 = mysqli_fetch_array($a18);

        //RW 07 | RT 01
        $get43 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '07' and input_pilihan = 'Kadina'");
        $kadinart19 = mysqli_num_rows($get43);

        $get44 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '07' and input_pilihan = 'Hj. Suherni'");
        $suhernirt19 = mysqli_num_rows($get44);

        $get19r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '07' and input_pilihan = 'ragu'");
        $ragu19 = mysqli_num_rows($get19r);

        $a19 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '07' ");
        $b19 = mysqli_fetch_array($a19);

        //RW 07 | RT 02
        $get45 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '07' and input_pilihan = 'Kadina'");
        $kadinart20 = mysqli_num_rows($get45);

        $get46 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '07' and input_pilihan = 'Hj. Suherni'");
        $suhernirt20 = mysqli_num_rows($get46);

        $get20r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '07' and input_pilihan = 'ragu'");
        $ragu20 = mysqli_num_rows($get20r);

        $a20 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '07' ");
        $b20 = mysqli_fetch_array($a20);

        //RW 07 | RT 03
        $get47 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '07' and input_pilihan = 'Kadina'");
        $kadinart21 = mysqli_num_rows($get47);

        $get48 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '07' and input_pilihan = 'Hj. Suherni'");
        $suhernirt21 = mysqli_num_rows($get48);

        $get21r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '07' and input_pilihan = 'ragu'");
        $ragu21 = mysqli_num_rows($get21r);

        $a21 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '07' ");
        $b21 = mysqli_fetch_array($a21);

        //RW 08 | RT 01
        $get49 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '08' and input_pilihan = 'Kadina'");
        $kadinart22 = mysqli_num_rows($get49);

        $get50 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '08' and input_pilihan = 'Hj. Suherni'");
        $suhernirt22 = mysqli_num_rows($get50);

        $get22r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '08' and input_pilihan = 'ragu'");
        $ragu22 = mysqli_num_rows($get22r);

        $a22 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '08' ");
        $b22 = mysqli_fetch_array($a22);

        //RW 08 | RT 02
        $get51 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '08' and input_pilihan = 'Kadina'");
        $kadinart23 = mysqli_num_rows($get51);

        $get52 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '08' and input_pilihan = 'Hj. Suherni'");
        $suhernirt23 = mysqli_num_rows($get52);

        $get23r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '08' and input_pilihan = 'ragu'");
        $ragu23 = mysqli_num_rows($get23r);

        $a23 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '08' ");
        $b23 = mysqli_fetch_array($a23);

        //RW 08 | RT 03
        $get53 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '08' and input_pilihan = 'Kadina'");
        $kadinart24 = mysqli_num_rows($get53);

        $get54 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '08' and input_pilihan = 'Hj. Suherni'");
        $suhernirt24 = mysqli_num_rows($get54);

        $get24r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '08' and input_pilihan = 'ragu'");
        $ragu24 = mysqli_num_rows($get24r);

        $a24 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '08' ");
        $b24 = mysqli_fetch_array($a24);

        //RW 09 | RT 01
        $get55 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '09' and input_pilihan = 'Kadina'");
        $kadinart25 = mysqli_num_rows($get55);

        $get56 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '09' and input_pilihan = 'Hj. Suherni'");
        $suhernirt25 = mysqli_num_rows($get56);

        $get25r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '09' and input_pilihan = 'ragu'");
        $ragu25 = mysqli_num_rows($get25r);

        $a25 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '01' and input_rw = '09' ");
        $b25 = mysqli_fetch_array($a25);

        //RW 09 | RT 02
        $get57 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '09' and input_pilihan = 'Kadina'");
        $kadinart26 = mysqli_num_rows($get57);

        $get58 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '09' and input_pilihan = 'Hj. Suherni'");
        $suhernirt26 = mysqli_num_rows($get58);

        $get26r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '09' and input_pilihan = 'ragu'");
        $ragu26 = mysqli_num_rows($get26r);

        $a26 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '02' and input_rw = '09' ");
        $b26 = mysqli_fetch_array($a26);

        //RW 09 | RT 03
        $get59 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '09' and input_pilihan = 'Kadina'");
        $kadinart27 = mysqli_num_rows($get59);

        $get60 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '09' and input_pilihan = 'Hj. Suherni'");
        $suhernirt27 = mysqli_num_rows($get60);

        $get27r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '09' and input_pilihan = 'ragu'");
        $ragu27 = mysqli_num_rows($get27r);

        $a27 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '03' and input_rw = '09' ");
        $b27 = mysqli_fetch_array($a27);

    // RW | RT

    // TPS

      // TPS 1
        $tps1 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '01' and input_pilihan = 'Kadina'");
        $ktps1 = mysqli_num_rows($tps1);
        
        $tps2 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '01' and input_pilihan = 'Hj. Suherni'");
        $stps1 = mysqli_num_rows($tps2);

        $tps1r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '01' and input_pilihan = 'ragu'");
        $stpsr1 = mysqli_num_rows($tps1r);
      // TPS 1
      
      // TPS 2
        $tps30 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '02' and input_pilihan = 'Kadina'");
        $ktps2 = mysqli_num_rows($tps30);
        
        $tps3 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '02' and input_pilihan = 'Hj. Suherni'");
        $stps2 = mysqli_num_rows($tps3);

        $tps2r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '02' and input_pilihan = 'ragu'");
        $stpsr2 = mysqli_num_rows($tps2r);
      // TPS 2
      
      // TPS 3
        $tps4 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '03' and input_pilihan = 'Kadina'");
        $ktps3 = mysqli_num_rows($tps4);
        
        $tps5 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '03' and input_pilihan = 'Hj. Suherni'");
        $stps3 = mysqli_num_rows($tps5);

        $tps3r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '03' and input_pilihan = 'ragu'");
        $stpsr3 = mysqli_num_rows($tps3r);
      // TPS 3
      
      // TPS 4
        $tps6 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '04' and input_pilihan = 'Kadina'");
        $ktps4 = mysqli_num_rows($tps6);
        
        $tps7 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '04' and input_pilihan = 'Hj. Suherni'");
        $stps4 = mysqli_num_rows($tps7);

        $tps4r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '04' and input_pilihan = 'ragu'");
        $stpsr4 = mysqli_num_rows($tps4r);
      // TPS 4
      
      // TPS 5
        $tps8 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '05' and input_pilihan = 'Kadina'");
        $ktps5 = mysqli_num_rows($tps8);
        
        $tps9 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '05' and input_pilihan = 'Hj. Suherni'");
        $stps5 = mysqli_num_rows($tps9);

        $tps5r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '05' and input_pilihan = 'ragu'");
        $stpsr5 = mysqli_num_rows($tps5r);
      // TPS 5
      
      // TPS 6
        $tps10 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '06' and input_pilihan = 'Kadina'");
        $ktps6 = mysqli_num_rows($tps10);
        
        $tps11 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '06' and input_pilihan = 'Hj. Suherni'");
        $stps6 = mysqli_num_rows($tps11);

        $tps6r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '06' and input_pilihan = 'ragu'");
        $stpsr6 = mysqli_num_rows($tps6r);
      // TPS 6
      
      // TPS 7
        $tps12 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '07' and input_pilihan = 'Kadina'");
        $ktps7 = mysqli_num_rows($tps12);
        
        $tps13 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '07' and input_pilihan = 'Hj. Suherni'");
        $stps7 = mysqli_num_rows($tps13);

        $tps7r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '07' and input_pilihan = 'ragu'");
        $stpsr7 = mysqli_num_rows($tps7r);
      // TPS 7
      
      // TPS 8
        $tps14 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '08' and input_pilihan = 'Kadina'");
        $ktps8 = mysqli_num_rows($tps14);
        
        $tps15 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '08' and input_pilihan = 'Hj. Suherni'");
        $stps8 = mysqli_num_rows($tps15);
        
        $tps8r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '08' and input_pilihan = 'ragu'");
        $stpsr8 = mysqli_num_rows($tps8r);
      // TPS 8
      
      // TPS 9
        $tps16 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '09' and input_pilihan = 'Kadina'");
        $ktps9 = mysqli_num_rows($tps16);
        
        $tps17 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '09' and input_pilihan = 'Hj. Suherni'");
        $stps9 = mysqli_num_rows($tps17);

        $tps9r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '09' and input_pilihan = 'ragu'");
        $stpsr9 = mysqli_num_rows($tps9r);
      // TPS 9
      
      // TPS 10
        $tps18 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '10' and input_pilihan = 'Kadina'");
        $ktps10 = mysqli_num_rows($tps18);
        
        $tps19 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '10' and input_pilihan = 'Hj. Suherni'");
        $stps10 = mysqli_num_rows($tps19);

        $tps10r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '10' and input_pilihan = 'ragu'");
        $stpsr10 = mysqli_num_rows($tps10r);
      // TPS 10
      
      // TPS 11
        $tps20 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '11' and input_pilihan = 'Kadina'");
        $ktps11 = mysqli_num_rows($tps20);
        
        $tps21 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '11' and input_pilihan = 'Hj. Suherni'");
        $stps11 = mysqli_num_rows($tps21);

        $tps11r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '11' and input_pilihan = 'ragu'");
        $stpsr11 = mysqli_num_rows($tps11r);
      // TPS 11
      
      // TPS 12
        $tps22 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '12' and input_pilihan = 'Kadina'");
        $ktps12 = mysqli_num_rows($tps22);
        
        $tps23 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '12' and input_pilihan = 'Hj. Suherni'");
        $stps12 = mysqli_num_rows($tps23);

        $tps12r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '12' and input_pilihan = 'ragu'");
        $stpsr12 = mysqli_num_rows($tps12r);
      // TPS 12
      
      // TPS 13
        $tps24 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '13' and input_pilihan = 'Kadina'");
        $ktps13 = mysqli_num_rows($tps24);
        
        $tps25 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '13' and input_pilihan = 'Hj. Suherni'");
        $stps13 = mysqli_num_rows($tps25);

        $tps13r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '13' and input_pilihan = 'ragu'");
        $stpsr13 = mysqli_num_rows($tps13r);
      // TPS 13
      
      // TPS 14
        $tps26 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '14' and input_pilihan = 'Kadina'");
        $ktps14 = mysqli_num_rows($tps26);
        
        $tps27 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '14' and input_pilihan = 'Hj. Suherni'");
        $stps14 = mysqli_num_rows($tps27);

        $tps14r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '14' and input_pilihan = 'ragu'");
        $stpsr14 = mysqli_num_rows($tps14r);
      // TPS 14
      
      // TPS 15
        $tps28 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '15' and input_pilihan = 'Kadina'");
        $ktps15 = mysqli_num_rows($tps28);
        
        $tps29 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '15' and input_pilihan = 'Hj. Suherni'");
        $stps15 = mysqli_num_rows($tps29);

        $tps15r = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '15' and input_pilihan = 'ragu'");
        $stpsr15 = mysqli_num_rows($tps15r);
      // TPS 15

    // TPS

?>
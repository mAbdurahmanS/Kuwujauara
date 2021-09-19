<?php

    // User
        $o1 = mysqli_query($db, "SELECT * FROM tb_akun WHERE level = 'admin' ");
        $admin = mysqli_fetch_array($o1);

        $user2 = mysqli_query($db, "SELECT * FROM tb_akun WHERE level = 'member' ");
        $member = mysqli_fetch_array($user2);

        $user3 = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_tps = '1'");
        $pria = mysqli_num_rows($user3);
    // User

?>
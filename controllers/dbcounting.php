<?php


  // Logic
  $username = $_SESSION['nama_pengguna'];
  $desa = $_SESSION['desa'];

    //Desa
        $desa1 = mysqli_query($db, "SELECT * FROM tb_kuwu WHERE desa = 'kalideres' ");
        $kalideres = mysqli_fetch_array($desa1);
        
        $desa2 = mysqli_query($db, "SELECT * FROM tb_kuwu WHERE desa = 'gegesik_kidul' ");
        $gegesik = mysqli_fetch_array($desa2);

        $desa3 = mysqli_query($db, "SELECT * FROM tb_kuwu WHERE desa = 'panunggul' ");
        $panunggul = mysqli_fetch_array($desa3);
    //Desa

    //RC & QC
        $s1 = mysqli_query($db, "SELECT * FROM tb_counting WHERE kategori = 'Quick Count' and desa = 'kalideres' ");
        $quick = mysqli_fetch_array($s1);

        $s2 = mysqli_query($db, "SELECT * FROM tb_counting WHERE kategori = 'Real Count' and desa = 'kalideres' ");
        $real = mysqli_fetch_array($s2);
    //RC & QC

    
    //RC & QC Desa

        $s3 = mysqli_query($db, "SELECT * FROM tb_counting WHERE kategori = 'Quick Count' and desa = 'gegesik_kidul'  ");
        $quick2 = mysqli_fetch_array($s3);

        $s4 = mysqli_query($db, "SELECT * FROM tb_counting WHERE kategori = 'Real Count' and desa = 'gegesik_kidul' ");
        $real2 = mysqli_fetch_array($s4);

        $s5 = mysqli_query($db, "SELECT * FROM tb_counting WHERE kategori = 'Quick Count' and desa = 'panunggul'  ");
        $quick3 = mysqli_fetch_array($s5);

        $s6 = mysqli_query($db, "SELECT * FROM tb_counting WHERE kategori = 'Real Count' and desa = 'panunggul' ");
        $real3 = mysqli_fetch_array($s6);

    //RC & QC Desa

    // SUM

        $bis = "SELECT sum(al) AS total_al FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt = $db->query($bis);
        $row = $stmt->fetch_assoc();

        $bis2 = "SELECT sum(ap) AS total_ap FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt2 = $db->query($bis2);
        $row2 = $stmt2->fetch_assoc();

        $bis3 = "SELECT sum(ahasil) AS total_ahasil FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt3 = $db->query($bis3);
        $row3 = $stmt3->fetch_assoc();

        $bis4 = "SELECT sum(bl) AS total_bl FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt4 = $db->query($bis4);
        $row4 = $stmt4->fetch_assoc();

        $bis5 = "SELECT sum(bp) AS total_bp FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt5 = $db->query($bis5);
        $row5 = $stmt5->fetch_assoc();

        $bis6 = "SELECT sum(bhasil) AS total_bhasil FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt6 = $db->query($bis6);
        $row6 = $stmt6->fetch_assoc();

        $bis7 = "SELECT sum(cl) AS total_cl FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt7 = $db->query($bis7);
        $row7 = $stmt7->fetch_assoc();

        $bis8 = "SELECT sum(cp) AS total_cp FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt8 = $db->query($bis8);
        $row8 = $stmt8->fetch_assoc();

        $bis9 = "SELECT sum(chasil) AS total_chasil FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt9 = $db->query($bis9);
        $row9 = $stmt9->fetch_assoc();

        $bis10 = "SELECT sum(dl) AS total_dl FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt10 = $db->query($bis10);
        $row10 = $stmt10->fetch_assoc();

        $bis11 = "SELECT sum(dp) AS total_dp FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt11 = $db->query($bis11);
        $row11 = $stmt11->fetch_assoc();

        $bis12 = "SELECT sum(dhasil) AS total_dhasil FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt12 = $db->query($bis12);
        $row12 = $stmt12->fetch_assoc();

        $bis13 = "SELECT sum(el) AS total_el FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt13 = $db->query($bis13);
        $row13 = $stmt13->fetch_assoc();

        $bis14 = "SELECT sum(ep) AS total_ep FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt14 = $db->query($bis14);
        $row14 = $stmt14->fetch_assoc();

        $bis15 = "SELECT sum(ehasil) AS total_ehasil FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]'";
        $stmt15 = $db->query($bis15);
        $row15 = $stmt15->fetch_assoc();

    // SUM

    // Nama Kuwu

        $tampils = mysqli_query($db, "SELECT * FROM tb_kuwu WHERE desa = '$_GET[qdesa]' or desa = '$desa' ");
        $datam = mysqli_fetch_array($tampils)
        
    // Nama Kuwu

?>
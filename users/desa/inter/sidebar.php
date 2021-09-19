<?php
    // Logic
    $username = $_SESSION['nama_pengguna'];
    $desa = $_SESSION['desa'];
?>    
    
    
    <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Kategori</h3>
                <ul class="nav side-menu">
                    <li><a ><i class='bx bxs-dashboard' style="width: 20px;"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                    <?php
                        $dash = mysqli_query($db, "SELECT * FROM tb_akun WHERE desa = '$desa' ");
                        $dashh = mysqli_fetch_array($dash);

                        if ($dashh['desa'] == "kalideres")
                        {
                            echo ('<ul class="nav child_menu">
                                    <li><a href="dashboard.php?qdesa='. $desa .'">Kalideres</a></li>
                                </ul>');
                        }else if ($dashh['desa'] == "gegesik_kidul")
                        {
                            echo ('<ul class="nav child_menu">
                                    <li><a href="dashboard_gegesik.php">Gegesik Kidul</a></li>
                                </ul>');
                        }else if ($dashh['desa'] == "panunggul")
                        {
                            echo ('<ul class="nav child_menu">
                                    <li><a href="dashboard_panunggul.php">Panunggul</a></li>
                                </ul>');
                        }
                    ?>
                    
                    </li>
                    <!-- <li><a ><i class='bx bx-slideshow' style="width: 20px;"></i> Perhitungan Cepat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="qmonitor.php?count=<?=$quick['kategori']?>&qdesa=<?=$quick['desa']?>">Monitoring</a></li>
                    </ul>
                    </li> -->
                    <li><a ><i class='bx bx-line-chart'  style="width: 20px;"></i> Anggaran Pembiayaan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="anggaran.php?desa=<?=$desa?>">Anggaran</a></li>
                    </ul>
                    </li>
                    <li><a><i class='bx bx-extension'  style="width: 20px;"></i> Strategi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="strategi.php?menu=<?=$profil['bagian']?>&desa=<?=$desa?>">Profile</a></li>
                        <li><a href="strategi.php?menu=<?=$survei['bagian']?>&desa=<?=$desa?>">Survei</a></li>
                        <li><a href="strategi.php?menu=<?=$tahapan['bagian']?>&desa=<?=$desa?>">Tahapan</a></li>
                        <li><a href="strategi.php?menu=<?=$fokus['bagian']?>&desa=<?=$desa?>">Focus Strategi</a></li>
                    </ul>
                    </li>
                    <li><a><i class='bx bx-data'  style="width: 20px;"></i> Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="tables_dynamic.php">Data Seluruh Penduduk</a></li>
                    </ul>
                    </li>
                    <li><a><i class='bx bx-search-alt'  style="width: 20px;"></i> Referensi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="referensi.php?wilayah=">Provinsi</a></li>
                        <li><a href="referensi.php?wilayah=">Kabupaten</a></li>
                        <li><a href="referensi.php?wilayah=">Desa</a></li>
                    </ul>
                    </li>
                </ul>
            </div>

        </div>
    <!-- /sidebar menu -->
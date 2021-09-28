    <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Kategori</h3>
                <ul class="nav side-menu">
                    <li><a ><i class='bx bxs-dashboard' style="width: 20px;"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="dashboard.php?qdesa=<?=$kalideres['desa']?>">Kalideres</a></li>
                        <li><a href="dashboard_panunggul.php">Panunggul</a></li>
                        <li><a href="dashboard_bayalangu_kidul.php">Bayalangu Kidul</a></li>
                    </ul>
                    </li>
                    <li><a ><i class='bx bx-slideshow' style="width: 20px;"></i> Perhitungan Cepat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="input_quick.php">Input Data</a></li>
                        <li><a href="quick.php">Real Count</a></li>
                        <li><a href="qmonitor.php">Monitoring</a></li>
                    </ul>
                    </li>
                    <li><a ><i class='bx bx-line-chart'  style="width: 20px;"></i> Anggaran Pembiayaan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="anggaran.php">Anggaran</a></li>
                    </ul>
                    </li>
                    <li><a><i class='bx bx-extension'  style="width: 20px;"></i> Strategi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="strategi.php?menu=<?=$profil['bagian']?>">Profile</a></li>
                        <li><a href="strategi.php?menu=<?=$survei['bagian']?>">Survei</a></li>
                        <li><a href="strategi.php?menu=<?=$tahapan['bagian']?>">Tahapan</a></li>
                        <li><a href="strategi.php?menu=<?=$fokus['bagian']?>">Focus Strategi</a></li>
                    </ul>
                    </li>
                    <li><a><i class='bx bx-data'  style="width: 20px;"></i> Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="tables_dynamic.php">Data Seluruh Penduduk</a></li>
                    </ul>
                    </li>
                    <li><a><i class='bx bx-search-alt'  style="width: 20px;"></i> Referensi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="calon.php">Calon</a></li>
                        <li><a href="desa.php">Desa</a></li>
                    </ul>
                    </li>
                    <li><a><i class='bx bx-user'  style="width: 20px;"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="user.php?users=<?=$admin['level']?>">Admin</a></li>
                        <li><a href="user.php?users=<?=$member['level']?>">Member</a></li>
                    </ul>
                    </li>
                </ul>
            </div>

        </div>
    <!-- /sidebar menu -->
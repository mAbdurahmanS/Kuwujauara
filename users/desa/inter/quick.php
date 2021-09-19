<?php
  error_reporting(0);

  include '../../../controllers/connect.php';

  session_start();

  if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih:(');document.location='../../../index.php'</script>";
  }
  // Logic
  $username = $_SESSION['nama_pengguna'];

  // Dashboard
    include '../../../controllers/dbdashboard.php';
  // Dashboard

  // User
    include '../../../controllers/dbuser.php';
  // User

  // RW | RT
    include '../../../controllers/dbrtrw.php';
  // RW | RT

  // Strategi
    include '../../../controllers/dbstrategi.php';
  // Strategi

  //QC
    include '../../../controllers/dbcounting.php';
  //QC

  //jika tombol simpan diklik
  if (isset($_POST['bsimpan']))
  {

    $a = $_POST['tal'];
    $b = $_POST['tap'];
    $c = $_POST['tbl'];
    $d = $_POST['tbp'];
    $e = $_POST['tcl'];
    $f = $_POST['tcp'];
    $g = $_POST['tdl'];
    $h = $_POST['tdp'];
    $i = $_POST['tel'];
    $j = $_POST['tep'];
      //Data simpan sukses
        $simpan = mysqli_query($db, "INSERT INTO tb_counting set
        tps = '$_POST[ttps]',
        al = '$_POST[tal]',
        ap = '$_POST[tap]',
        bl = '$_POST[tbl]',
        bp = '$_POST[tbp]',
        cl = '$_POST[tcl]',
        cp = '$_POST[tcp]',
        dl = '$_POST[tdl]',
        dp = '$_POST[tdp]',
        el = '$_POST[tel]',
        ep = '$_POST[tep]',
        kategori = '$_POST[tkategori]',
        desa = '$_POST[tdesa]',
        ahasil = $a+$b,
        bhasil = $c+$d,
        chasil = $e+$f,
        dhasil = $g+$h,
        ehasil = $i+$j
        ");

  }

  //Edit Modal
  if(isset($_POST['updatedata']))
  {
    $id = $_POST['update_id'];
    $utps = $_POST['utps'];
    $ual = $_POST['ual'];
    $uap = $_POST['uap'];
    $ubl = $_POST['ubl'];
    $ubp = $_POST['ubp'];
    $ucl = $_POST['ucl'];
    $ucp = $_POST['ucp'];
    $udl = $_POST['udl'];
    $udp = $_POST['udp'];
    $uel = $_POST['uel'];
    $uep = $_POST['uep'];
    $ukategori = $_POST['ukategori'];
    $udesa = $_POST['udesa'];
    $uhasil1 = $_POST['uhasil1'];
    $uhasil2 = $_POST['uhasil2'];
    $uhasil3 = $_POST['uhasil3'];
    $uhasil4 = $_POST['uhasil4'];
    $uhasil5 = $_POST['uhasil5'];

    $a2 = $_POST['ual'];
    $b2 = $_POST['uap'];
    $c2 = $_POST['ubl'];
    $d2 = $_POST['ubp'];
    $e2 = $_POST['ucl'];
    $f2 = $_POST['ucp'];
    $g2 = $_POST['udl'];
    $h2 = $_POST['udp'];
    $i2 = $_POST['uel'];
    $j2 = $_POST['uep'];

    //Data akan diedit
    $edit = mysqli_query($db, "UPDATE tb_counting set
    tps = '$_POST[utps]',
    al = '$_POST[ual]',
    ap = '$_POST[uap]',
    bl = '$_POST[ubl]',
    bp = '$_POST[ubp]',
    cl = '$_POST[ucl]',
    cp = '$_POST[ucp]',
    dl = '$_POST[udl]',
    dp = '$_POST[udp]',
    el = '$_POST[uel]',
    ep = '$_POST[uep]',
    kategori = '$_POST[ukategori]',
    desa = '$_POST[udesa]',
    ahasil = $a2+$b2,
    bhasil = $c2+$d2,
    chasil = $e2+$f2,
    dhasil = $g2+$h2,
    ehasil = $i2+$j2
    WHERE id = '$id'
    ");
    $edit_run = mysqli_query($db, $edit);

  }

  //pengujian jika tombol Hapus di klik
  if(isset($_GET['hal']))
  {
    if($_GET['hal'] == "hapus")
  {
    //Persiapan hapus data
    $hapus = mysqli_query($db, "DELETE FROM tb_counting WHERE id = '$_GET[id]' ");
    // if($hapus){
    //   echo "<script>
    //           alert('Hapus Data Sukses!');
    //           document.location= 'form_validation.php?hal=edit&rt=$_GET[rt]&rw=$_GET[rw]';
    //         </script>";
    // }
    
  }
  }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Input Data | Inpunt Data PILWU</title>

    <!-- Bootstrap -->
    <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"> <i class='bx bxs-pie-chart-alt-2'></i> <span>KUWU JUARA</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
              <?php
                include 'sidebar.php';
              ?>  
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

          <!-- top navigation -->
            <?php
              include '../../../controllers/topbar.php';
            ?>
          <!-- /top navigation -->

          <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                <div class="page-title">
                    <div class="title_left">
                      <h3>Perhitungan Cepat | <?=$_GET['count']?></h3>
                      <button type="button" class="btn btn-success mb-3 mt-2" data-toggle="modal" data-target="#addmodal">
                          Tambah Data
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle mb-3 mt-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Kategori
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="quick.php?count=<?=$quick['kategori']?>&qdesa=<?=$quick['desa']?>">Quick Count Kalideres</a>
                          <a class="dropdown-item" href="quick.php?count=<?=$real['kategori']?>&qdesa=<?=$real['desa']?>">Real Count Kalideres</a>
                        </div>
                      </div>
                    </div>

                    <div class="title_right">
                    <form action="" method="POST" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Telusuri">
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary"><i class='bx bx-search' ></i></button>
                        </div>
                    </form>
                    </div>
                </div>

                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <div class="modal-body">

                            <form action="" method="post">

                                <div class="form-group">
                                    <label>Desa</label>
                                    <select name="tdesa" id="tdesa" class="form-control" required>
                                        <option><?=$_GET['qdesa']?></option>
                                        <option value="kalideres">Kalideres</option>
                                        <option value="gegesik">Gegesik</option>
                                        <option value="panunggul">Panunggul</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="tkategori" id="tkategori" class="form-control" required>
                                        <option><?=$_GET['count']?></option>
                                        <option value="Quick Count">Quick Count</option>
                                        <option value="Real Count">Real Count</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>TPS</label>
                                    <input type="number" id="ttps" name="ttps" class="form-control" required>
                                </div>
                                
                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu1']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="tal" name="tal" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="tap" name="tap" class="form-control">
                                </div>

                                <input type="hidden" name="thasil1" id="thasil1" value="<?=$hasil?>">

                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu2']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="tbl" name="tbl" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="tbp" name="tbp" class="form-control">
                                </div>

                                <input type="hidden" name="thasil2" id="thasil2">

                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu3']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="tcl" name="tcl" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="tcb" name="tcp" class="form-control">
                                </div>

                                <input type="hidden" name="thasil3" id="thasil3">

                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu4']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="tdl" name="tdl" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="tdp" name="tdp" class="form-control">
                                </div>
                                
                                <input type="hidden" name="thasil4" id="thasil4">

                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu5']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="tel" name="tel" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="tep" name="tep" class="form-control">
                                </div>
                                
                                <input type="hidden" name="thasil5" id="thasil5">
                                
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                </div>    
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Modal Edit Data -->
                    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <div class="modal-body">

                            <form action="" method="post">
                                <input type="hidden" name="update_id" id="update_id">

                                <div class="form-group">
                                    <label>Desa</label>
                                    <select name="udesa" id="udesa" class="form-control" required>
                                        <option></option>
                                        <option value="kalideres">Kalideres</option>
                                        <option value="gegesik">Gegesik</option>
                                        <option value="panunggul">Panunggul</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="ukategori" id="ukategori" class="form-control" required>
                                        <option></option>
                                        <option value="Quick Count">Quick Count</option>
                                        <option value="Real Count">Real Count</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>TPS</label>
                                    <input type="number" id="utps" name="utps" class="form-control" required>
                                </div>
                                
                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu1']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="ual" name="ual" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="uap" name="uap" class="form-control">
                                </div>

                                <input type="hidden" name="uhasil1" id="uhasil1">

                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu2']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="ubl" name="ubl" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="ubp" name="ubp" class="form-control">
                                </div>

                                <input type="hidden" name="uhasil2" id="uhasil2">

                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu3']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="ucl" name="ucl" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="ucp" name="ucp" class="form-control">
                                </div>
                                
                                <input type="hidden" name="uhasil3" id="uhasil3">

                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu4']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="udl" name="udl" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="udp" name="udp" class="form-control">
                                </div>
                                
                                <input type="hidden" name="uhasil4" id="uhasil4">

                                <h6 class="text-dark font-weight-bold mt-4"><?=$datam['kuwu5']?></h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="uel" name="uel" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="uep" name="uep" class="form-control">
                                </div>
                                
                                <input type="hidden" name="uhasil5" id="uhasil5">
                                
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="updatedata">Simpan</button>
                                </div>    
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                        <h2><?=$_GET['qdesa'];?></h2>
                        <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="card-box table-responsive">
                        <table id="tabell" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                  <th></th>
                                  <th colspan="3"><?=$datam['kuwu1']?></th>
                                  <th colspan="3"><?=$datam['kuwu2']?></th>
                                  <th colspan="3"><?=$datam['kuwu3']?></th>
                                  <th colspan="3"><?=$datam['kuwu4']?></th>
                                  <th colspan="3"><?=$datam['kuwu5']?></th>
                                  <th>action</th>
                              </tr>
                              <tr>
                                  <th>TPS</th>
                                  <th >L</th>
                                  <th >P</th>
                                  <th >J</th>

                                  <th >L</th>
                                  <th >P</th>
                                  <th >J</th>

                                  <th >L</th>
                                  <th >P</th>
                                  <th >J</th>

                                  <th >L</th>
                                  <th >P</th>
                                  <th >J</th>

                                  <th >L</th>
                                  <th >P</th>
                                  <th >J</th>
                                  <th></th>
                              </tr>
                            </thead>

                            <?php
                            $no = 1;

                            $search = $_POST['search'];
                            if($search != ''){
                            $tampil = mysqli_query($db, "SELECT * FROM tb_counting WHERE tps LIKE '%".$search."%' OR al LIKE '%".$search."%' OR ap LIKE '%".$search."' ");
                            }else{
                            $tampil = mysqli_query($db, "SELECT * FROM tb_counting WHERE kategori = '$_GET[count]' and desa = '$_GET[qdesa]' ");
                            }
                            if (mysqli_num_rows($tampil)){
                            while($data = mysqli_fetch_array($tampil)) :

                            ?>

                            <tbody>
                              <tr>
                                  <td><?=$data['tps']?></td>
                                  <td><?=$data['al']?></td>
                                  <td><?=$data['ap']?></td>
                                  <td><?=$data['ahasil']?></td>

                                  <td><?=$data['bl']?></td>
                                  <td><?=$data['bp']?></td>
                                  <td><?=$data['bhasil']?></td>

                                  <td><?=$data['cl']?></td>
                                  <td><?=$data['cp']?></td>
                                  <td><?=$data['chasil']?></td>

                                  <td><?=$data['dl']?></td>
                                  <td><?=$data['dp']?></td>
                                  <td><?=$data['dhasil']?></td>

                                  <td><?=$data['el']?></td>
                                  <td><?=$data['ep']?></td>
                                  <td><?=$data['ehasil']?></td>

                                  <td class="text-center">
                                  <a data-toggle="modal" id="tombolubah" data-target="#editmodal" class="btn btn-warning btn_edit"
                                  data-id ="<?= $data['id']?>"
                                  data-kategori ="<?= $data['kategori']?>"
                                  data-desa ="<?= $data['desa']?>"
                                  data-tps ="<?= $data['tps']?>"
                                  data-al ="<?= $data['al']?>"
                                  data-ap ="<?= $data['ap']?>"
                                  data-ahasil ="<?= $data['ahasil']?>"
                                  data-bl ="<?= $data['bl']?>"
                                  data-bp ="<?= $data['bp']?>"
                                  data-bhasil ="<?= $data['bhasil']?>"
                                  data-cl ="<?= $data['cl']?>"
                                  data-cp ="<?= $data['cp']?>"
                                  data-chasil ="<?= $data['chasil']?>"
                                  data-dl ="<?= $data['dl']?>"
                                  data-dp ="<?= $data['dp']?>"
                                  data-dhasil ="<?= $data['dhasil']?>"
                                  data-el ="<?= $data['el']?>"
                                  data-ep ="<?= $data['ep']?>"
                                  data-ehasil ="<?= $data['ehasil']?>"
                                  ><i class='bx bx-edit' ></i></a>
                                  <!-- <a href="quick.php?count=<?=$_GET['count']?>&hal=hapus&id=<?=$data['id']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='bx bx-trash' ></i></a> -->
                                  </td>
                              </tr>
                            </tbody>
                            <?php endwhile;}else{
                            echo '<tr><td colspan="8">Tidak ada data :(</td></tr>';
                            } 
                            ?>

                            <thead>
                              <tr>
                                <th>Total</th>
                                <th><?=$row['total_al']?></th>
                                <th><?=$row2['total_ap']?></th>
                                <th><?=$row3['total_ahasil']?></th>
                                <th><?=$row4['total_bl']?></th>
                                <th><?=$row5['total_bp']?></th>
                                <th><?=$row6['total_bhasil']?></th>
                                <th><?=$row7['total_cl']?></th>
                                <th><?=$row8['total_cp']?></th>
                                <th><?=$row9['total_chasil']?></th>
                                <th><?=$row10['total_dl']?></th>
                                <th><?=$row11['total_dp']?></th>
                                <th><?=$row12['total_dhasil']?></th>
                                <th><?=$row13['total_el']?></th>
                                <th><?=$row14['total_ep']?></th>
                                <th><?=$row15['total_ehasil']?></th>
                                <th></th>
                              </tr>
                            </thead>
                        </table>
                
                        </div>
                    </div>
                    </div>
                </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
          <!-- /page content -->

          <!-- footer content -->
            <footer>
              <div class="pull-right">
                  Sistem Hitung Pemilihan Kepala Desa - KUWUJUARA
              </div>
              <div class="clearfix"></div>
            </footer>
        <!-- /footer content -->
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../../../vendors/validator/multifield.js"></script>
    <script src="../../../vendors/validator/validator.js"></script>
    
    <!-- Datatables -->
    <script src="../../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Javascript functions	-->
    <script>
      function hideshow(){
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");
        
        if(password.type === 'password'){
          password.type = "text";
          slash.style.display = "block";
          eye.style.display = "none";
        }
        else{
          password.type = "password";
          slash.style.display = "none";
          eye.style.display = "block";
        }

      }
    </script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

    <!-- Table -->
    <script>
      $(document).ready(function() {
        $('#tabell').DataTable();
      } );
    </script>

    <!-- Modal Edit -->
    <script>
      $(document).on("click", "#tombolubah", function() {
        let id = $(this).data('id');
        let kategori = $(this).data('kategori');
        let desa = $(this).data('desa');
        let tps = $(this).data('tps');
        let al = $(this).data('al');
        let ap = $(this).data('ap');
        let ahasil = $(this).data('ahasil');
        let bl = $(this).data('bl');
        let bp = $(this).data('bp');
        let bhasil = $(this).data('bhasil');
        let cl = $(this).data('cl');
        let cp = $(this).data('cp');
        let chasil = $(this).data('chasil');
        let dl = $(this).data('dl');
        let dp = $(this).data('dp');
        let dhasil = $(this).data('dhasil');
        let el = $(this).data('el');
        let ep = $(this).data('ep');
        let ehasil = $(this).data('ehasil');

        $("#update_id").val(id);
        $("#ukategori").val(kategori);
        $("#udesa").val(desa);
        $("#utps").val(tps);
        $("#ual").val(al);
        $("#uap").val(ap);
        $("#uhasil1").val(ahasil);
        $("#ubl").val(bl);
        $("#ubp").val(bp);
        $("#uhasil2").val(bhasil);
        $("#ucl").val(cl);
        $("#ucp").val(cp);
        $("#uhasil3").val(chasil);
        $("#udl").val(dl);
        $("#udp").val(dp);
        $("#uhasil4").val(dhasil);
        $("#uel").val(el);
        $("#uep").val(ep);
        $("#uhasil5").val(ehasil);
      });
    </script>

    <!-- Result -->
      <script>
          function mult(value){
              var x,y ;
              x = 2 * value ;

              document.getElementById('out').value = x ;
          }
      </script>
    <!-- Resul -->

    <!-- jQuery -->
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../../../vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>

</body>

</html>

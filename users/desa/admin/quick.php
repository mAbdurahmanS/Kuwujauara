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
        id_desa = '$_POST[tdesa]',
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
    ahasil = $a2+$b2,
    bhasil = $c2+$d2,
    chasil = $e2+$f2,
    dhasil = $g2+$h2,
    ehasil = $i2+$j2
    WHERE id = '$id'
    ");
    $edit_run = mysqli_query($db, $edit);

    if ($edit) {
      echo "<script>
              alert('Edit Data Sukses!');
              document.location= 'quick.php';
            </script>";
    }else{
      echo "<script>
              alert('Edit Data Gagal!');
              document.location= 'quick.php';
            </script>";
    }

  }

  //pengujian jika tombol Hapus di klik
  if(isset($_GET['hal']))
  {
    if($_GET['hal'] == "hapus")
  {
    //Persiapan hapus data
    $hapus = mysqli_query($db, "DELETE FROM tb_counting WHERE id = '$_GET[id]' ");
    if($hapus){
      echo "<script>
              alert('Hapus Data Sukses!');
              document.location= 'quick.php';
            </script>";
    }
    
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

    <title>Counting | KUWU JUARA</title>

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
                      <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle mb-3 mt-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Desa
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="quick.php?desa=1">Kalideres</a>  
                            <a class="dropdown-item" href="quick.php?desa=2">Panunggul</a>  
                            <a class="dropdown-item" href="quick.php?desa=3">Bayalangu Kidul</a>  
                        </div>
                      </div>
                    </div>
                    <div class="title_right">
                    
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
                                  <option></option>
                                    <?php
                                      $q = mysqli_query($db, "SELECT * FROM tb_desa");
                                      while ($qdesa = mysqli_fetch_assoc($q))
                                      {
                                        echo '
                                        <option value="'.$qdesa['id_desa'].'">'.$qdesa['nama_desa'].'</option>';
                                      }
                                    
                                    ?>
                                </select>
                              </div>

                                <div class="form-group">
                                    <label>TPS</label>
                                    <input type="number" id="ttps" name="ttps" class="form-control" required>
                                </div>
                                
                                <h6 class="text-dark font-weight-bold mt-4">Calon 1</h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="tal" name="tal" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="tap" name="tap" class="form-control">
                                </div>

                                <input type="hidden" name="thasil1" id="thasil1" value="<?=$hasil?>">

                                <h6 class="text-dark font-weight-bold mt-4">Calon 2</h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="tbl" name="tbl" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="tbp" name="tbp" class="form-control">
                                </div>

                                <input type="hidden" name="thasil2" id="thasil2">

                                <h6 class="text-dark font-weight-bold mt-4">Calon 3</h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="tcl" name="tcl" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="tcb" name="tcp" class="form-control">
                                </div>

                                <input type="hidden" name="thasil3" id="thasil3">

                                <h6 class="text-dark font-weight-bold mt-4">Calon 4</h6>

                                <div class="form-group">
                                    <label>Laki-laki</label>
                                    <input type="number" id="tdl" name="tdl" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Perempuan</label>
                                    <input type="number" id="tdp" name="tdp" class="form-control">
                                </div>
                                
                                <input type="hidden" name="thasil4" id="thasil4">

                                <h6 class="text-dark font-weight-bold mt-4">Calon 5</h6>

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

                <div class="clearfix"></div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                      <div class="x_title">
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table id="tabell" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                  <thead>
                                    <th></th>
                                    <?php
                                      $qnama = mysqli_query($db, "SELECT * FROM tb_calon");
                                      while ($name = mysqli_fetch_array($qnama))
                                      {
                                        ?>
                                          <th colspan="3"><?=$name['nama_calon']?></th>

                                        <?php
                                      }
                                    ?>

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
                                    </tr>

                                  </thead>

                                  <tbody>
                                    <?php
                                      $no = 1;

                                      $tampil = mysqli_query($db, "SELECT * FROM tb_tps WHERE id_desa = '$_GET[desa]'");
                                      if (mysqli_num_rows($tampil)){
                                        while($data = mysqli_fetch_array($tampil)){
                                    ?>
                                      <tr>
                                        <td><?=$data['id_tps']?></td>
                                        <td>
                                          <?php 
                                            $sql_laki = mysqli_query($db, "SELECT sum(laki) AS hlaki from tb_hitung WHERE id_calon = '1' and tps = '$data[id_tps]' ");
                                            while ($data_laki = mysqli_fetch_array($sql_laki))
                                            {
                                              echo $data_laki['hlaki'];
                                            }
                                          ?>
                                        </td>
                                        <td>
                                          <?php 
                                            $sql_pr = mysqli_query($db, "SELECT sum(perempuan) AS hpr from tb_hitung WHERE id_calon = '1' and tps = '$data[id_tps]' ");
                                            while ($data_pr = mysqli_fetch_array($sql_pr))
                                            {
                                              echo $data_pr['hpr'];
                                            }
                                          ?>
                                        </td>
                                        <td>
                                          <?php 
                                            $sql_hasil = mysqli_query($db, "SELECT sum(hasil) AS hhasil from tb_hitung WHERE id_calon = '1' and tps = '$data[id_tps]' ");
                                            while ($data_hasil = mysqli_fetch_array($sql_hasil))
                                            {
                                              echo $data_hasil['hhasil'];
                                            }
                                          ?>
                                        </td>

                                        <td>
                                          <?php 
                                            $sql_laki = mysqli_query($db, "SELECT sum(laki) AS hlaki from tb_hitung WHERE id_calon = '2' and tps = '$data[id_tps]' ");
                                            while ($data_laki = mysqli_fetch_array($sql_laki))
                                            {
                                              echo $data_laki['hlaki'];
                                            }
                                          ?>
                                        </td>
                                        <td>
                                          <?php 
                                            $sql_pr = mysqli_query($db, "SELECT sum(perempuan) AS hpr from tb_hitung WHERE id_calon = '2' and tps = '$data[id_tps]' ");
                                            while ($data_pr = mysqli_fetch_array($sql_pr))
                                            {
                                              echo $data_pr['hpr'];
                                            }
                                          ?>
                                        </td>
                                        <td>
                                          <?php 
                                            $sql_hasil = mysqli_query($db, "SELECT sum(hasil) AS hhasil from tb_hitung WHERE id_calon = '2' and tps = '$data[id_tps]' ");
                                            while ($data_hasil = mysqli_fetch_array($sql_hasil))
                                            {
                                              echo $data_hasil['hhasil'];
                                            }
                                          ?>
                                        </td>

                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        
                                      </tr>

                                    
                                    <?php 
                                      }
                                    }
                                    ?>
                                  </tbody>

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

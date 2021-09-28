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
    $a = $_POST['tlaki'];
    $b = $_POST['tperempuan'];

    //Data simpan sukses
    $simpan = mysqli_query($db, "INSERT INTO tb_hitung set
    tps = '$_POST[ttps]',
    laki = '$_POST[tlaki]',
    perempuan = '$_POST[tperempuan]',
    id_calon = '$_POST[tcalon]',
    waktu = '$_POST[twaktu]',
    id_desa = '$_GET[desa]',
    hasil = $a+$b
    ");

    if ($simpan)
    {
        echo "<script>
              alert('Simpan Data Sukses !');
              document.location= 'input_quick.php?desa=$_GET[desa]';
            </script>";
    }else
    {
        echo "<script>
              alert('Simpan Data Gagal !');
              document.location= 'input_quick.php?desa=$_GET[desa]';
            </script>";
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
                      <h3>Perhitungan Cepat | Input Data</h3>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle mb-3 mt-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Desa
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="input_quick.php?desa=1">Kalideres</a>  
                                <a class="dropdown-item" href="input_quick.php?desa=2">Panunggul</a>  
                                <a class="dropdown-item" href="input_quick.php?desa=3">Bayalangu Kidul</a>  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                      <div class="x_content">
                      <form action="" method="post">

                        <div class="form-group">
                            <label>Waktu</label>
                            <select name="twaktu" class="form-control" required>
                            <option></option>
                            <option value="10">10.00</option>
                            <option value="11">11.00</option>
                            <option value="12">12.00</option>
                            <option value="01">01.00</option>
                            <option value="02">02.00</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>TPS</label>
                            <select name="ttps" class="form-control" required>
                                <option></option>
                                <?php
                                $q = mysqli_query($db, "SELECT * FROM tb_tps WHERE id_desa = '$_GET[desa]' ");
                                while ($qtps = mysqli_fetch_assoc($q))
                                {
                                    echo '
                                    <option value="'.$qtps['id_tps'].'">'.$qtps['id_tps'].'</option>';
                                }
                                
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Nama Calon</label>
                            <select name="tcalon" class="form-control" required>
                                <option></option>
                                <?php
                                $q = mysqli_query($db, "SELECT * FROM tb_calon  WHERE id_desa = '$_GET[desa]' ");
                                while ($qcalon = mysqli_fetch_assoc($q))
                                {
                                    echo '
                                    <option value="'.$qcalon['id_calon'].'">'.$qcalon['nama_calon'].'</option>';
                                }
                                
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Laki-laki</label>
                            <input type="number" name="tlaki" name="tal" class="form-control"required >
                        </div>

                        <div class="form-group">
                            <label>Perempuan</label>
                            <input type="number" name="tperempuan" name="tap" class="form-control" required>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                        </div>    
                        </form>
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

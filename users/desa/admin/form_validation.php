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
      //Data simpan sukses
        $simpan = mysqli_query($db, "INSERT INTO t_input_kalideres set
        input_nama = '$_POST[tnama]',
        input_jenis_kelamin = '$_POST[tjenis]',
        input_tps = '$_POST[tdusun]',
        input_rt = '$_POST[trt]',
        input_rw = '$_POST[trw]',
        input_pilihan = '$_POST[tpilihan]',
        kode_pendaftar = '$username'
        ");

  }
  
  //pengujian jika tombol Hapus di klik
  if(isset($_GET['hal']))
  {
    if($_GET['hal'] == "hapus")
  {
    //Persiapan hapus data
    $hapus = mysqli_query($db, "DELETE FROM t_input_kalideres WHERE id = '$_GET[id]' ");
    // if($hapus){
    //   echo "<script>
    //           alert('Hapus Data Sukses!');
    //           document.location= 'form_validation.php?hal=edit&rt=$_GET[rt]&rw=$_GET[rw]';
    //         </script>";
    // }
    
  }
  }

  //Edit Modal
  if(isset($_POST['updatedata']))
  {
    $id = $_POST['update_id'];
    $unama = $_POST['unama'];
    $ujenis = $_POST['ujenis'];
    $utps = $_POST['utps'];
    $urt = $_POST['urt'];
    $urw = $_POST['urw'];
    $upilihan = $_POST['upilihan'];

    //Data akan diedit
    $edit = mysqli_query($db, "UPDATE t_input_kalideres set
    input_nama = '$_POST[unama]',
    input_jenis_kelamin = '$_POST[ujenis]',
    input_tps = '$_POST[utps]',
    input_rt = '$_POST[urt]',
    input_rw = '$_POST[urw]',
    input_pilihan = '$_POST[upilihan]',
    kode_pendaftar = '$username'
    WHERE id = '$id'
    ");
    $edit_run = mysqli_query($db, $edit);
  
    // if($edit){
    //   echo "<script>
    //         alert('Edit data sukses!');
    //         document.location= 'form_validation.php';
    //         </script>";
    // }else{
    //   echo "<script>
    //         alert('Edit data gagal!');
    //         document.location= 'form_validation.php';
    //       </script>";
    // }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link rel='stylesheet' href='nprogress.css'/>
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Datatables -->
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- JQVMap -->
    <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"> <i class='bx bxs-pie-chart-alt-2'></i> <span>PILWU Counting</span></a>
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
                  <h3>Input Data Pilwu</h3>
                </div>

                <div class="title_right">
                  <form action="" method="POST" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama Penduduk">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-outline-primary">Cari</button>
                    </div>
                  </form>
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
                                  <label>Nama</label>
                                  <input type="text" id="unama" name="unama" class="form-control" required>
                              </div>
                              
                              <div class="form-group">
                                  <label>Jenis Kelamin</label>
                                  <select name="ujenis" id="ujenis" class="form-control" required>
                                      <option></option>
                                      <option value="pria">Pria</option>
                                      <option value="wanita">Wanita</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>TPS</label>
                                  <select name="utps" id="utps" class="form-control" required>
                                      <option value="<?=@$vdusun?>"><?=@$vdusun?></option>
                                      <option value="01">01</option>
                                      <option value="02">02</option>
                                      <option value="03">03</option>
                                      <option value="04">04</option>
                                      <option value="05">05</option>
                                      <option value="06">06</option>
                                      <option value="07">07</option>
                                      <option value="08">08</option>
                                      <option value="09">09</option>
                                      <option value="10">10</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>RT</label>
                                  <select name="urt" id="urt" class="form-control" required>
                                      <option value="<?=@$vrt?>"><?=@$vrt?></option>
                                      <option value="01">01</option>
                                      <option value="02">02</option>
                                      <option value="03">03</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                <label>RW</label>
                                <select name="urw" id="urw" class="form-control" required>
                                      <option value="<?=@$vrw?>"><?=@$vrw?></option>
                                      <option value="01">01</option>
                                      <option value="02">02</option>
                                      <option value="03">03</option>
                                      <option value="04">04</option>
                                      <option value="05">05</option>
                                      <option value="06">06</option>
                                      <option value="07">07</option>
                                      <option value="08">08</option>
                                      <option value="09">09</option>
                                      <option value="10">10</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Pilihan</label>
                                <select name="upilihan" id="upilihan" class="form-control" required>
                                      <option value="<?=@$vpilihan?>"><?=@$vpilihan?></option>
                                      <option value="Kadina">Kadina</option>
                                      <option value="Hj. Suherni">Hj. Suherni</option>
                                      <option value="ragu">Ragu - Ragu</option>
                                </select>
                            </div>
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
                      <h2>Table Data</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="card-box table-responsive">
                      <table id="tabell" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>TPS</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Pilihan</th>
                            <th>Edit</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          $no = 1;

                          $search = $_POST['search'];
                          if($search != ''){
                            $tampil = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_nama LIKE '%".$search."%' OR input_pilihan LIKE '%".$search."%' ");
                          }else{
                            $tampil = mysqli_query($db, "SELECT * FROM t_input_kalideres WHERE input_rt = '$_GET[rt]' and input_rw = '$_GET[rw]'");
                          }
                          if (mysqli_num_rows($tampil)){
                            while($data = mysqli_fetch_array($tampil))
                              {
                                  echo '
                                    <tr>
                                      <th scope="row">'.$no++.'</th>
                                      <td>'.$data['input_nama'].'</td>
                                      <td>'.$data['input_jenis_kelamin'].'</td>
                                      <td>'.$data['input_tps'].'</td>
                                      <td>'.$data['input_rt'].'</td>
                                      <td>'.$data['input_rw'].'</td>
                                      <td>'.$data['input_pilihan'].'</td>
                                      <td class="text-center">
                                        <a data-toggle="modal" id="tombolubah" data-target="#editmodal" class="btn btn-warning btn_edit"
                                        data-id ='.$data['id'].'
                                        data-nama ='.$data['input_nama'].'
                                        data-jenis ='.$data['input_jenis_kelamin'].'
                                        data-tps ='.$data['input_tps'].'
                                        data-rt ='.$data['input_rt'].'
                                        data-rw ='.$data['input_rw'].'
                                        data-pilihan ='.$data['input_pilihan'].'
                                        ><i class="bx bx-edit"></i></a>
                                      </td>
                                    </tr>
                                    ';
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
                  Sistem Hitung Pemilihan Kepala Desa - Nigue
              </div>
              <div class="clearfix"></div>
            </footer>
        <!-- /footer content -->
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../../../vendors/validator/multifield.js"></script>
    <script src="../../../vendors/validator/validator.js"></script>
    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../vendors/skycons/skycons.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>

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
    <script>
      $(document).ready(function() {
        $('#tabels').DataTable();
      } );
    </script>

    <!-- Modal Edit -->
    <script>
      $(document).on("click", "#tombolubah", function() {
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        let jenis = $(this).data('jenis');
        let tps = $(this).data('tps');
        let rt = $(this).data('rt');
        let rw = $(this).data('rw');
        let pilihan = $(this).data('pilihan');

        $("#update_id").val(id);
        $("#unama").val(nama);
        $("#ujenis").val(jenis);
        $("#utps").val(tps);
        $("#urt").val(rt);
        $("#urw").val(rw);
        $("#upilihan").val(pilihan);
      });
    </script>

    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
    <!-- jQuery -->
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../../vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>

</body>

</html>

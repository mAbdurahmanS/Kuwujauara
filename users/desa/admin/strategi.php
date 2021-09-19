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
        $simpan = mysqli_query($db, "INSERT INTO tb_strategi set
        daerah = '$_POST[tdaerah]',
        nama_file = '$_POST[tnama]',
        link = '$_POST[tlink]',
        status = '$_POST[tstatus]',
        bagian = '$_POST[tbagian]'
        ");

  }

  //Edit Modal
  if(isset($_POST['updatedata']))
  {
    $id = $_POST['update_id'];
    $udaerah = $_POST['udaerah'];
    $unama = $_POST['unama'];
    $ulink = $_POST['ulink'];
    $ustatus = $_POST['ustatus'];
    $ubagian = $_POST['ubagian'];

    //Data akan diedit
    $edit = mysqli_query($db, "UPDATE tb_strategi set
    daerah = '$_POST[udaerah]',
    nama_file = '$_POST[unama]',
    link = '$_POST[ulink]',
    status = '$_POST[ustatus]',
    bagian = '$_POST[ubagian]'
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
      $hapus = mysqli_query($db, "DELETE FROM tb_strategi WHERE id = '$_GET[id]' ");
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

    <title>Strategi | KUWU JUARA</title>

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
                  <h3>Strategi | <?=$_GET['menu']?></h3>
                  <button type="button" class="btn btn-success mb-3 mt-2" data-toggle="modal" data-target="#addmodal">
                    Tambah Data
                  </button>
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
                                  <label>Menu</label>
                                  <select name="tbagian" id="tbagian" class="form-control" required>
                                      <option><?=$_GET['menu']?></option>
                                      <option value="profil">Profile</option>
                                      <option value="survei">Survei</option>
                                      <option value="tahapan">Tahapan</option>
                                      <option value="strategi">Focus Strategi</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>Daerah</label>
                                    <select name="tdaerah" id="tdaerah" class="form-control" required>
                                      <option></option>
                                      <option value="kalideres">kalideres</option>
                                      <option value="gegesik">gegesik</option>
                                    </select>                              </div>
                              
                              <div class="form-group">
                                  <label>Nama File</label>
                                  <input type="text" id="tnama" name="tnama" class="form-control" required>
                              </div>

                              <div class="form-group">
                                  <label>Link</label>
                                 <input type="text" id="tlink" name="tlink" class="form-control" required>
                              </div>

                              <div class="form-group">
                                  <label>Status</label>
                                  <select name="tstatus" id="tstatus" class="form-control" required>
                                    <option></option>
                                    <option value="persiapan">Persiapan</option>
                                    <option value="berjalan">Sedang Berjalan</option>
                                    <option value="selesai">Selesai</option>
                                  </select>
                              </div>
                              
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
                                  <label>Menu</label>
                                  <select name="ubagian" id="ubagian" class="form-control" required>
                                      <option></option>
                                      <option value="profil">Profile</option>
                                      <option value="survei">Survei</option>
                                      <option value="tahapan">Tahapan</option>
                                      <option value="strategi">Focus Strategi</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>Daerah</label>
                                    <select name="udaerah" id="udaerah" class="form-control" required>
                                      <option></option>
                                      <option value="kalideres">kalideres</option>
                                      <option value="gegesik">gegesik</option>
                                    </select>                              </div>
                              
                              <div class="form-group">
                                  <label>Nama File</label>
                                  <input type="text" id="unama" name="unama" class="form-control" required>
                              </div>

                              <div class="form-group">
                                  <label>Link</label>
                                 <input type="text" id="ulink" name="ulink" class="form-control" required>
                              </div>

                              <div class="form-group">
                                  <label>Status</label>
                                  <option></option>
                                  <select name="ustatus" id="ustatus" class="form-control" required>
                                    <option></option>
                                    <option value="persiapan">Persiapan</option>
                                    <option value="berjalan">Sedang Berjalan</option>
                                    <option value="selesai">Selesai</option>
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
                            <th>Daerah</th>
                            <th>Nama File</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>action</th>
                          </tr>
                        </thead>

                        <?php
                        $no = 1;

                        $search = $_POST['search'];
                        if($search != ''){
                          $tampil = mysqli_query($db, "SELECT * FROM tb_strategi WHERE daerah LIKE '%".$search."%' OR nama_file LIKE '%".$search."%' OR status LIKE '%".$search."' ");
                        }else{
                          $tampil = mysqli_query($db, "SELECT * FROM tb_strategi WHERE bagian = '$_GET[menu]' ");
                        }
                          if (mysqli_num_rows($tampil)){
                          while($data = mysqli_fetch_array($tampil)) :

                        ?>

                        <tbody>
                            <tr>
                                <th scope="row"><?=$no++;?></th>
                                <td><?=$data['daerah']?></td>
                                <td><?=$data['nama_file']?></td>
                                <td class="text-center"><a onclick="window.open('<?=$data['link']?>')" class="btn btn-secondary"><i class='bx bx-link'></i></a></td>
                                <td><?=$data['status']?></td>
                                <td class="text-center">
                                <a data-toggle="modal" id="tombolubah" data-target="#editmodal" class="btn btn-warning btn_edit"
                                data-id ="<?= $data['id']?>"
                                data-daerah ="<?= $data['daerah']?>"
                                data-nama_file ="<?= $data['nama_file']?>"
                                data-link ="<?= $data['link']?>"
                                data-status ="<?= $data['status']?>"
                                data-bagian ="<?= $data['bagian']?>"
                                ><i class='bx bx-edit'></i></a>
                                <a href="strategi.php?menu=<?=$_GET['menu']?>&hal=hapus&id=<?=$data['id']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php endwhile;}else{
                          echo '<tr><td colspan="8">Tidak ada data :(</td></tr>';
                        } 
                        ?>
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
        let daerah = $(this).data('daerah');
        let nama_file = $(this).data('nama_file');
        let link = $(this).data('link');
        let status = $(this).data('status');
        let bagian = $(this).data('bagian');

        $("#update_id").val(id);
        $("#udaerah").val(daerah);
        $("#unama").val(nama_file);
        $("#ulink").val(link);
        $("#ustatus").val(status);
        $("#ubagian").val(bagian);
      });
    </script>

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

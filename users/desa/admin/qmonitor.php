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


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link rel='stylesheet' href='nprogress.css'/>
    <!-- iCheck -->
    <link href="../../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	
    <!-- JQVMap -->
    <link href="../../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"> <i class='bx bxs-pie-chart-alt-2'></i> <span>KUWU JUARA/span></a>
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
            <div class="page-title">
                  <div class="title_left">
                    <h3><?=$_GET['count']?></h3>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle mb-3 mt-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                      </button>
                    <!--  -->
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="qmonitor.php?count=<?=$quick["kategori"]?>&qdesa=<?=$quick["desa"]?>">Quick Count Kalideres</a>
                              <a class="dropdown-item" href="qmonitor.php?count=<?=$real["kategori"]?>&qdesa=<?=$real["desa"]?>">Real Count Kalideres</a>  
                            </div>
                    </div>
                  </div>
            </div>

            <div class="clearfix"></div>

            <?php
              $ambildata = mysqli_query($db, "SELECT * FROM t_input_kalideres");
              $tampil = mysqli_fetch_array($ambildata);
            ?>
            
              <div class="row">

              <!-- Quick Count -->
                <div class="col-md-6 col-sm-6 ">
                  <div class="dashboard_graph x_panel">
                    <div class="col-md-12">
                      <h3><?=$_GET['qdesa'];?> | Pie Chart</h3>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="qc" height="45px" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>
              <!-- Quick Count -->

              <!-- Real Count -->
                <div class="col-md-6 col-sm-6 ">
                <div class="dashboard_graph x_panel">
                    <div class="col-md-12">
                      <h3><?=$_GET['qdesa'];?></h3>
                    </div>

                    <table>
                    <table id="tabell" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                          <th>No</th>
                            <th>Pilihan</th>
                            <th>L</th>
                            <th>P</th>
                            <th>J</th>
                          </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th>1</th>
                                <td><?=$datam['kuwu1']?></td>
                                <td><?=$row['total_al']?></td>
                                <td><?=$row2['total_ap']?></td>
                                <td><?=$row3['total_ahasil']?></td>                                
                            </tr>
                            <tr>
                                <th>2</th>
                                <td><?=$datam['kuwu2']?></td>
                                <td><?=$row4['total_bl']?></td>
                                <td><?=$row5['total_bp']?></td>
                                <td><?=$row6['total_bhasil']?></td>                              
                            </tr>
                            <tr>
                                <th>3</th>
                                <td><?=$datam['kuwu3']?></td>
                                <td><?=$row7['total_cl']?></td>
                                <td><?=$row8['total_cp']?></td>
                                <td><?=$row9['total_chasil']?></td>                                
                            </tr>
                            <tr>
                                <th>4</th>
                                <td><?=$datam['kuwu4']?></td>
                                <td><?=$row10['total_dl']?></td>
                                <td><?=$row11['total_dp']?></td>
                                <td><?=$row12['total_dhasil']?></td>                               
                            </tr>
                            <tr>
                                <th>5</th>
                                <td><?=$datam['kuwu5']?></td>
                                <td><?=$row13['total_el']?></td>
                                <td><?=$row14['total_ep']?></td>
                                <td><?=$row15['total_ehasil']?></td>                               
                            </tr>
                        </tbody>
                
                      </table>
                    </table>
                </div>
                </div>
              <!-- Real Count -->

              </div>

            <!-- Total Data -->
              <div class="row">
                <div class="col-md-12 col-sm-12 ">
                  <div class="dashboard_graph x_panel">
                    <div class="col-md-6">
                      <h3>Desa <?=$_GET['qdesa'];?></h3>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="alldata" height="45px" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Total Data -->

          </div>
        <!-- /page content -->

        <!-- footer content -->
          <footer>
            <div class="pull-right">
              Sistem Hitung Pemilihan Kepala Desa by Nigue
            </div>
            <div class="clearfix"></div>
          </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- Chart.js -->
    <script src="../../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../../vendors/skycons/skycons.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../../vendors/moment/min/moment.min.js"></script>
    <script src="../../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>
	
      <!-- Kalideres Data -->
        <script type="text/javascript">
          var ctx = document.getElementById("alldata");
          var alldata = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ["TPS 01", "TPS 02", "TPS 03", "TPS 04", "TPS 05", "TPS 06", "TPS 07", "TPS 08", "TPS 09", "TPS 10", "TPS 11", "TPS 12", "TPS 13", "TPS 14", "TPS 15"],
              datasets: [{
                label: '<?=$datam['kuwu1']?>',
                  data: [<?=$ktps1;?>,<?=$ktps2;?>,<?=$ktps3;?>,<?=$ktps4;?>,<?=$ktps5;?>,<?=$ktps6;?>,<?=$ktps7;?>,<?=$ktps8;?>,<?=$ktps9;?>,<?=$ktps10;?>,<?=$ktps11;?>,<?=$ktps12;?>,<?=$ktps13;?>,<?=$ktps14;?>,<?=$ktps15;?>],
                  backgroundColor: '#007bff',
              },{
                label: '<?=$datam['kuwu2']?>',
                  data: [<?=$stps1;?>,<?=$stps2;?>,<?=$stps3;?>,<?=$stps4;?>,<?=$stps5;?>,<?=$stps6;?>,<?=$stps7;?>,<?=$stps8;?>,<?=$stps9;?>,<?=$stps10;?>,<?=$stps11;?>,<?=$stps12;?>,<?=$stps13;?>,<?=$stps14;?>,<?=$stps15;?>],
                  backgroundColor: '#dc3545',
              },{
                label: '<?=$datam['kuwu3']?>',
                  data: [<?=$stps1;?>,<?=$stps2;?>,<?=$stps3;?>,<?=$stps4;?>,<?=$stps5;?>,<?=$stps6;?>,<?=$stps7;?>,<?=$stps8;?>,<?=$stps9;?>,<?=$stps10;?>,<?=$stps11;?>,<?=$stps12;?>,<?=$stps13;?>,<?=$stps14;?>,<?=$stps15;?>],
                  backgroundColor: '#219653',
              },{
                label: '<?=$datam['kuwu4']?>',
                  data: [<?=$stps1;?>,<?=$stps2;?>,<?=$stps3;?>,<?=$stps4;?>,<?=$stps5;?>,<?=$stps6;?>,<?=$stps7;?>,<?=$stps8;?>,<?=$stps9;?>,<?=$stps10;?>,<?=$stps11;?>,<?=$stps12;?>,<?=$stps13;?>,<?=$stps14;?>,<?=$stps15;?>],
                  backgroundColor: '#F2C94C',
              },{
                label: '<?=$datam['kuwu5']?>',
                  data: [<?=$stps1;?>,<?=$stps2;?>,<?=$stps3;?>,<?=$stps4;?>,<?=$stps5;?>,<?=$stps6;?>,<?=$stps7;?>,<?=$stps8;?>,<?=$stps9;?>,<?=$stps10;?>,<?=$stps11;?>,<?=$stps12;?>,<?=$stps13;?>,<?=$stps14;?>,<?=$stps15;?>],
                  backgroundColor: '#9B51E0',
              },
            ],
            },
          });
        </script>
      <!-- Kalideres Data -->

      <!-- QC Kalideres -->
      <script type="text/javascript">
          var ctx = document.getElementById("qc");
          var qc = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: ["<?=$datam['kuwu1']?>", "<?=$datam['kuwu2']?>", "<?=$datam['kuwu3']?>", "<?=$datam['kuwu4']?>", "<?=$datam['kuwu5']?>" ],
              datasets: [{
                label: '',
                  data: [<?=$row3['total_ahasil']?>,<?=$row6['total_bhasil']?>, <?=$row9['total_chasil']?>, <?=$row12['total_dhasil']?>, <?=$row15['total_ehasil']?>],
                  backgroundColor: ['#007bff', '#dc3545', '#219653', '#F2C94C', '#9B51E0'],
              }],
            },
          });
        </script>
      <!-- QC Kalideres -->

  </body>
</html>

<?php

  error_reporting(0);

  include '../../../controllers/connect.php';

  session_start();

  if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih:(');document.location='../../../index.php'</script>";
  }
  // Logic
  $username = $_SESSION['nama_pengguna'];
  $desa = $_SESSION['desa'];

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
                    <h3>Dashboard</h3>
                  </div>
            </div>

            <div class="clearfix"></div>

            <?php
              $ambildata = mysqli_query($db, "SELECT * FROM t_input_kalideres");
              $tampil = mysqli_fetch_array($ambildata);
            ?>

            <!-- Total Data -->
              <div class="row">
                <div class="col-md-12 col-sm-12 ">
                  <div class="dashboard_graph x_panel">
                    <div class="col-md-6">
                      <h3>Desa Panunggul</h3>
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

            <!-- RW 01 -->
              <div class="row">
                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 01 | RT 01</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                        <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b['input_rt']?>&rw=<?=$b['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b['input_rt']?>&rw=<?=$b['input_rw']?>">Lihat</a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt1" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 01 | RT 02</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                        <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b2['input_rt']?>&rw=<?=$b2['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b2['input_rt']?>&rw=<?=$b2['input_rw']?>">Lihat</a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt2" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 01 | RT 03</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                        <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b3['input_rt']?>&rw=<?=$b3['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b3['input_rt']?>&rw=<?=$b3['input_rw']?>">Lihat</a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt3" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            <!-- RW 01 -->

            <!-- RW 02 -->
              <div class="row">
                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 02 | RT 01</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                        <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b4['input_rt']?>&rw=<?=$b4['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b4['input_rt']?>&rw=<?=$b4['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt4" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 02 | RT 02</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                        <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b5['input_rt']?>&rw=<?=$b5['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b5['input_rt']?>&rw=<?=$b5['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt5" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 02 | RT 03</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                        <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b6['input_rt']?>&rw=<?=$b6['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b6['input_rt']?>&rw=<?=$b6['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt6" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <!-- RW 02 -->

            <!-- RW 03 -->
              <div class="row">
                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 03 | RT 01</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                        <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b7['input_rt']?>&rw=<?=$b7['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b7['input_rt']?>&rw=<?=$b7['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt7" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 03 | RT 02</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b8['input_rt']?>&rw=<?=$b8['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b8['input_rt']?>&rw=<?=$b8['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt8" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 03 | RT 03</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b9['input_rt']?>&rw=<?=$b9['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b9['input_rt']?>&rw=<?=$b9['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt9" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            <!-- RW 03 -->

            <!-- RW 04 -->
              <div class="row">
                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 04 | RT 01</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b10['input_rt']?>&rw=<?=$b10['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b10['input_rt']?>&rw=<?=$b10['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt10" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 04 | RT 02</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b11['input_rt']?>&rw=<?=$b11['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b11['input_rt']?>&rw=<?=$b11['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt11" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 04 | RT 03</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b12['input_rt']?>&rw=<?=$b12['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b12['input_rt']?>&rw=<?=$b12['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt12" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            <!-- RW 04 -->

            <!-- RW 05 -->
              <div class="row">
                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 05 | RT 01</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b13['input_rt']?>&rw=<?=$b13['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b13['input_rt']?>&rw=<?=$b13['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt13" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 05 | RT 02</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b14['input_rt']?>&rw=<?=$b['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b14['input_rt']?>&rw=<?=$b['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt14" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 05 | RT 03</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b15['input_rt']?>&rw=<?=$b15['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b15['input_rt']?>&rw=<?=$b15['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt15" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            <!-- RW 05 -->

            <!-- RW 06 -->
              <div class="row">
                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 06 | RT 01</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b16['input_rt']?>&rw=<?=$b16['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b16['input_rt']?>&rw=<?=$b16['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt16" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 06 | RT 02</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b17['input_rt']?>&rw=<?=$b17['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b17['input_rt']?>&rw=<?=$b17['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt17" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 06 | RT 03</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b18['input_rt']?>&rw=<?=$b18['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b18['input_rt']?>&rw=<?=$b18['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt18" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            <!-- RW 06 -->

            <!-- RW 07 -->
              <div class="row">
                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 07 | RT 01</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b19['input_rt']?>&rw=<?=$b19['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b19['input_rt']?>&rw=<?=$b19['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt19" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 07 | RT 02</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b20['input_rt']?>&rw=<?=$b20['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b20['input_rt']?>&rw=<?=$b20['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt20" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 07 | RT 03</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b21['input_rt']?>&rw=<?=$b21['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b21['input_rt']?>&rw=<?=$b21['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt21" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            <!-- RW 07 -->

            <!-- RW 08 -->
              <div class="row">
                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 08 | RT 01</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b22['input_rt']?>&rw=<?=$b22['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b22['input_rt']?>&rw=<?=$b22['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt22" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 08 | RT 02</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b23['input_rt']?>&rw=<?=$b23['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b23['input_rt']?>&rw=<?=$b23['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt23" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 08 | RT 03</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b24['input_rt']?>&rw=<?=$b24['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b24['input_rt']?>&rw=<?=$b24['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt24" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            <!-- RW 08 -->

            <!-- RW 09 -->
              <div class="row">
                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 09 | RT 01</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b25['input_rt']?>&rw=<?=$b25['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b25['input_rt']?>&rw=<?=$b25['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt25" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 09 | RT 02</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b26['input_rt']?>&rw=<?=$b26['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b26['input_rt']?>&rw=<?=$b26['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt26" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 ">
                  <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                      <h2>RW 09 | RT 03</h2>
                      <ul class="nav navbar-right panel_toolbox ">
                      <li><a class="text-warning"  href="form_validation.php?hal=edit&rt=<?=$b27['input_rt']?>&rw=<?=$b27['input_rw']?>">Edit</a></li>
                        <li><a class="text-success"  href="view_data.php?hal=lihat&rt=<?=$b27['input_rt']?>&rw=<?=$b27['input_rw']?>">Lihat</a></li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="" style="width:100%">
                        <canvas id="rt27" height="100%" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            <!-- RW 09 -->

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
                label: 'Kadina',
                  data: [<?=$ktps1;?>,<?=$ktps2;?>,<?=$ktps3;?>,<?=$ktps4;?>,<?=$ktps5;?>,<?=$ktps6;?>,<?=$ktps7;?>,<?=$ktps8;?>,<?=$ktps9;?>,<?=$ktps10;?>,<?=$ktps11;?>,<?=$ktps12;?>,<?=$ktps13;?>,<?=$ktps14;?>,<?=$ktps15;?>],
                  backgroundColor: '#007bff',
              },{
                label: 'H. Suherni',
                  data: [<?=$stps1;?>,<?=$stps2;?>,<?=$stps3;?>,<?=$stps4;?>,<?=$stps5;?>,<?=$stps6;?>,<?=$stps7;?>,<?=$stps8;?>,<?=$stps9;?>,<?=$stps10;?>,<?=$stps11;?>,<?=$stps12;?>,<?=$stps13;?>,<?=$stps14;?>,<?=$stps15;?>],
                  backgroundColor: '#dc3545',
              },
            ],
            },
          });
        </script>
      <!-- Kalideres Data -->

    <!-- pie chart -->

      <!-- RW 01 | RT 01 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt1");
        var rt1 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart1;?>,<?=$suhernirt1;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 01 | RT 01 -->

      <!-- RW 01 | RT 02 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt2");
        var rt2 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart2;?>,<?=$suhernirt2;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 01 | RT 02 -->

      <!-- RW 01 | RT 03 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt3");
        var rt3 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart3;?>,<?=$suhernirt3;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 01 | RT 03 -->

      <!-- RW 02 | RT 01 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt4");
        var dusun3 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart4;?>,<?=$suhernirt4;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 02 | RT 01 -->

      <!-- RW 02 | RT 02 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt5");
        var rt5 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart5;?>,<?=$suhernirt5;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 02 | RT 02 -->

      <!-- RW 02 | RT 03 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt6");
        var rt6 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart6;?>,<?=$suhernirt6;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 02 | RT 03 -->

      <!-- RW 03 | RT 01 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt7");
        var rt7 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart7;?>,<?=$suhernirt7;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 03 | RT 01 -->

      <!-- RW 03 | RT 02 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt8");
        var rt8 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart8;?>,<?=$suhernirt8;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 03 | RT 02 -->

      <!-- RW 03 | RT 03 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt9");
        var rt9 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart9;?>,<?=$suhernirt9;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 03 | RT 03 -->

      <!-- RW 04 | RT 01 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt10");
        var rt10 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart10;?>,<?=$suhernirt10;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 04 | RT 01 -->

      <!-- RW 04 | RT 02 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt11");
        var rt11 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart11;?>,<?=$suhernirt11;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 04 | RT 02 -->

      <!-- RW 04 | RT 03 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt12");
        var rt12 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart12;?>,<?=$suhernirt12;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 04 | RT 03 -->

      <!-- RW 05 | RT 01 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt13");
        var rt13 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart13;?>,<?=$suhernirt13;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 05 | RT 01 -->

      <!-- RW 05 | RT 02 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt14");
        var rt14 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart14;?>,<?=$suhernirt14;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 05 | RT 02 -->

      <!-- RW 05 | RT 03 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt15");
        var rt15 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart15;?>,<?=$suhernirt15;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 05 | RT 03 -->

      <!-- RW 06 | RT 01 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt16");
        var rt16 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart16;?>,<?=$suhernirt16;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 06 | RT 01 -->

      <!-- RW 06 | RT 02 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt17");
        var rt17 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart17;?>,<?=$suhernirt17;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 06 | RT 02 -->

      <!-- RW 06 | RT 03 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt18");
        var rt18 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart18;?>,<?=$suhernirt18;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 06 | RT 03 -->

      <!-- RW 07 | RT 01 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt19");
        var rt19 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart19;?>,<?=$suhernirt19;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 07 | RT 01 -->

      <!-- RW 07 | RT 02 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt20");
        var rt20 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart20;?>,<?=$suhernirt20;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 07 | RT 02 -->

      <!-- RW 07 | RT 03 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt21");
        var rt21 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart21;?>,<?=$suhernirt21;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 07 | RT 03 -->

      <!-- RW 08 | RT 01 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt22");
        var rt22 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart22;?>,<?=$suhernirt22;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 08 | RT 01 -->

      <!-- RW 08 | RT 02 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt23");
        var rt23 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart23;?>,<?=$suhernirt23;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 08 | RT 02 -->

      <!-- RW 08 | RT 03 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt24");
        var rt24 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart24;?>,<?=$suhernirt24;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 08 | RT 03 -->

      <!-- RW 09 | RT 01 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt25");
        var rt25 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart25;?>,<?=$suhernirt25;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 09 | RT 01 -->

      <!-- RW 09 | RT 02 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt26");
        var rt26 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart26;?>,<?=$suhernirt26;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 09 | RT 02 -->

      <!-- RW 09 | RT 03 -->
      <script type="text/javascript">
        var ctx = document.getElementById("rt27");
        var rt27 = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Kadina", "Hj. Suherni"],
            datasets: [{
              label: '',
                data: [<?=$kadinart27;?>,<?=$suhernirt27;?>],
                backgroundColor: ['#007bff', '#dc3545'],
            }],
          },
        });
      </script>
      <!-- RW 09 | RT 03 -->

    <!-- pie chart -->


  </body>
</html>

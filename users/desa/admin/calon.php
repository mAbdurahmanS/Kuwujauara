<?php
error_reporting(0);

include '../../../controllers/connect.php';

session_start();

if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
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
if (isset($_POST['bsimpan'])) {
    $nama_calon = $_POST['nama_calon'];
    $id_desa = $_POST['id_desa'];
    //Data simpan sukses
    $q = mysqli_query($db, "INSERT INTO tb_calon (nama_calon, id_desa) VALUES ('$nama_calon', '$id_desa') ");
    if ($q) {
        echo "<script>
                alert('Add Data Sukses!');
                document.location= 'calon.php';
            </script>";
    }
}

//Edit Modal
if (isset($_POST['id_calon'])) {
    $id = $_POST['id_calon'];
    $nama_calon = $_POST['nama_calon'];
    $id_desa = $_POST['id_desa'];

    //Data akan diedit
    $edit = mysqli_query($db, "UPDATE tb_calon SET nama_calon = '$nama_calon', id_desa = '$id_desa' WHERE id_calon = '$id' ");

    if ($edit) {
        echo "<script>
             alert('Edit Data Sukses!');
             document.location= 'calon.php';
           </script>";
    }
}

//pengujian jika tombol Hapus di klik
if (isset($_GET['act'])) {
    if ($_GET['act'] == "delete") {
        //Persiapan hapus data
        $hapus = mysqli_query($db, "DELETE FROM tb_calon WHERE id_calon = '$_GET[id]' ");
        if ($hapus) {
            echo "<script>
               alert('Hapus Data Sukses!');
               document.location= 'calon.php';
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

    <title>Refrensi Calon | KUWU JUARA</title>

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
                            <h3>Referensi Calon</h3>
                            <button type="button" class="btn btn-success mb-3 mt-2" data-toggle="modal" data-target="#addmodal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="col-md-12 col-sm-12  text-center">
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
                                                                        <th>Nama Calon</th>
                                                                        <th>Desa</td>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>

                                                                <?php
                                                                $no = 1;
                                                                $sqldesa = mysqli_query($db, "SELECT * FROM tb_calon INNER JOIN tb_desa ON tb_calon.id_desa = tb_desa.id_desa");
                                                                while ($result = mysqli_fetch_array($sqldesa)) {
                                                                ?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td scope="row"><?= $no++; ?></td>
                                                                            <td><?= $result['nama_calon']; ?></td>
                                                                            <td><?= $result['nama_desa']; ?></td>
                                                                            <td>
                                                                                <a a data-toggle="modal" id="tombolubah" data-target="#editmodal" class="btn btn-warning btn_edit"
                                                                            data-id_calon="<?= $result['id_calon'] ?>"
                                                                            data-nama_calon="<?= $result['nama_calon'] ?>" data-id_desa="<?= $result['id_desa'] ?>"
                                                                            >Edit</a>
                                                                                <a href="calon.php?act=delete&id=<?= $result['id_calon'] ?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Delete</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                <?php
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
                    </div>
                </div>
            </div>

            <!-- modal edit -->
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
                                <input type="hidden" name="id_calon" id="id_calon">

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" id="nama_calon" name="nama_calon" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Desa</label>
                                    <select id="id_desa" name="id_desa" class="form-control">
                                        <?php
                                        $sqldesa = mysqli_query($db, "SELECT * FROM tb_desa");
                                        while ($result = mysqli_fetch_array($sqldesa)) {
                                        ?>
                                            <option value="<?= $result['id_desa']; ?>"><?= $result['nama_desa']; ?></option>
                                        <?php
                                        }
                                        ?>
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
            <!-- /modal edit -->

            <!-- Modal Add -->
            <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Calon</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama_calon" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Desa</label>
                                    <select id="heard" name="id_desa" class="form-control">
                                        <?php
                                        $sqldesa = mysqli_query($db, "SELECT * FROM tb_desa");
                                        while ($result = mysqli_fetch_array($sqldesa)) {
                                        ?>
                                            <option value="<?= $result['id_desa']; ?>"><?= $result['nama_desa']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal Add -->
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

    <!-- Table -->
    <script>
        $(document).ready(function() {
            $('#tabell').DataTable();
        });
    </script>
    <script>
        $(document).on("click", "#tombolubah", function() {
            let id_calon = $(this).data('id_calon');
            let nama_calon = $(this).data('nama_calon');
            let id_desa = $(this).data('id_desa');

            $("#id_calon").val(id_calon);
            $("#nama_calon").val(nama_calon);
            $("#id_desa").val(id_desa);
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
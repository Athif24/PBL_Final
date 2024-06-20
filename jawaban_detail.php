<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

if (empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id']) && isset($_GET['bio'])) {
    $id = $_GET['id'];
    $bio = $_GET['bio'];

    switch ($bio) {
        case 'mahasiswa':
            include_once('model/j_mahasiswa.php');
            include_once('model/mahasiswa_form_model.php');
            $mahasiswa = new j_mahasiswa();
            $data = $mahasiswa->viewData($id);
            break;
        case 'dosen':
            include_once('model/j_dosen.php');
            $dosen = new j_dosen();
            $data = $dosen->viewData($id);
            break;
        case 'tendik':
            include_once('model/j_tendik.php');
            $pegawai = new j_tendik();
            $data = $pegawai->viewData($id);
            break;
        case 'orang tua':
            include_once('model/j_ortu.php');
            $ortu = new j_ortu();
            $data = $ortu->viewData($id);
            break;
        case 'alumni':
            include_once('model/j_alumni.php');
            $alumni = new j_alumni();
            $data = $alumni->viewData($id);
            break;
        case 'industri':
            include_once('model/j_industri.php');
            $industri = new j_industri();
            $data = $industri->viewData($id);
            break;

        default:
            header("Location: login.php");
            exit;
    }

    if ($data == null) {
        echo 'Data tidak ditemukan';
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $_GET['bio'] ?> Jawaban</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once('layouts/header.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once('layouts/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php

            ?>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Responden <?php echo $bio ?> </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Responden <?php echo $bio ?> </a></li>
                                <li class="breadcrumb-item active">Responden <?php echo $bio ?> </li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Responden <?php echo $bio ?></h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-sm table-bordered">
                            <thead>

                                <tr>
                                    <th>Soal ID</th>
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('model/bank_soal_model.php');
                                $soal = new BankSoal();

                                $i = 1;
                                while ($row = $data->fetch_assoc()) {
                                    echo '<tr>
                                    <td>' . $soal->getDataById($row['soal_id'])->fetch_assoc()['soal_nama'] . '</td>
                                    <td>' . $row['jawaban'] . '</td>
                                    </tr>';

                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once('layouts/footer.php'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>

</body>

</html>
<?php 
  $menu = 't_responden_ortu'; // Updated table name

  include_once('model/ortu_form_model.php'); // Updated model include

  $status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
  $message = isset($_GET['message']) ? strtolower($_GET['message']) : null;
  
  if (session_status() === PHP_SESSION_NONE) 
    session_start();

  if (empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orang tua Responden</title>

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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Responden Ortu</h1> <!-- Updated title -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Responden Ortu</a></li>
              <li class="breadcrumb-item active">Responden Ortu</li>
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
          <h3 class="card-title">Responden Ortu</h3> <!-- Updated title -->
        </div>
        <div class="card-body">
          
          <?php 
            if($status == 'sukses'){
                echo '<div class="alert alert-success">
                      '.$message.'
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } elseif($status == 'gagal'){
                echo '<div class="alert alert-danger">
                      '.$message.'
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
          ?>  

          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Survey ID</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Umur</th>
                <th>HP</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Penghasilan</th>
                <th>Mahasiswa NIM</th>
                <th>Mahasiswa Nama</th>
                <th>Mahasiswa Prodi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $ortu_form_model = new ortu_form_model();
                $ortu_form_model = $ortu_form_model->getData();

                $i = 1;
                while($row = $ortu_form_model->fetch_assoc()){
                  echo '<tr>
                      <td>' . $i . '</td>
                      <td>'.$row['survey_id'].'</td>
                      <td>'.$row['responden_tanggal'].'</td>
                      <td>'.$row['responden_nama'].'</td>
                      <td>'.$row['responden_jk'].'</td>
                      <td>'.$row['responden_umur'].'</td>
                      <td>'.$row['responden_hp'].'</td>
                      <td>'.$row['responden_pendidikan'].'</td>
                      <td>'.$row['responden_pekerjaan'].'</td>
                      <td>'.$row['responden_penghasilan'].'</td>
                      <td>'.$row['mahasiswa_nim'].'</td>
                      <td>'.$row['mahasiswa_nama'].'</td>
                      <td>'.$row['mahasiswa_prodi'].'</td>
                      <td>
                        <a title="View" href="responden_ortu_form.php?act=view&id=' . $row['responden_ortu_id'] . '" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a title="View" href="responden_ortu_form.php?act=view&id='.$row['responden_ortu_id'].'" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')" title="Hapus Data" href="responden_ortu_action.php?act=hapus&id='.$row['responden_ortu_id'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
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

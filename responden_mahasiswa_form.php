<?php
$menu = 'survey';
include_once('model/mahasiswa_form_model.php');

$status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
$message = isset($_GET['message']) ? strtolower($_GET['message']) : null;

if (session_status() === PHP_SESSION_NONE)
  session_start();

$user = $_GET['bio'];
$_SESSION['user'] = $user;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Survey Kepuasan Pelanggan Polinema</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Custom CSS for Centering -->
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .centered-form {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 10vh;
    }
    .form-container {
      max-width: 980px;
      width: 100%;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .card-header {
      background-color: #007bff;
      color: white;
      text-align: center;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .content-header {
      background-color: #007bff;
      color: white;
      padding: 20px;
      text-align: center;
      border-radius: 10px;
      margin-bottom: 20px;
    }
    .content-header h1 {
      color: white;
      margin: 0;
    }
    .form-group label {
      font-weight: bold;
    }
    .form-group input {
      border-radius: 5px;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" style="padding: 1%;">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 style="font-size:xx-large;">Survey Kepuasan Pelanggan Polinema</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content centered-form">
    <!-- Default box -->
    <div class="card form-container">
      <div class="card-header">
        <h3 class="card-title">Survey</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="responden_mahasiswa_action.php?act=simpan" method="post">
          <div class="form-group">
            <label for="responden_tanggal">Tanggal</label>
            <input type="datetime-local" class="form-control" id="responden_tanggal" name="responden_tanggal" required>
          </div>

          <div class="form-group">
            <label for="responden_nim">NIM</label>
            <input type="text" class="form-control" id="responden_nim" name="responden_nim" required>
          </div>

          <div class="form-group">
            <label for="responden_nama">Nama</label>
            <input type="text" class="form-control" id="responden_nama" name="responden_nama" required>
          </div>

          <div class="form-group">
            <label for="responden_prodi">Prodi</label>
            <input type="text" class="form-control" id="responden_prodi" name="responden_prodi" required>
          </div>

          <div class="form-group">
            <label for="responden_email">Email</label>
            <input type="email" class="form-control" id="responden_email" name="responden_email" required>
          </div>

          <div class="form-group">
            <label for="responden_hp">HP</label>
            <input type="text" class="form-control" id="responden_hp" name="responden_hp" required>
          </div>

          <div class="form-group">
            <label for="tahun_masuk">Tahun Masuk</label>
            <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" required>
          </div>

          <button type="submit" href="responden_mahasiswa_form.php" name="simpan" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const dateTimeField = document.getElementById('responden_tanggal');
    const now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    dateTimeField.value = now.toISOString().slice(0,16);
  });
</script>
</body>
</html>

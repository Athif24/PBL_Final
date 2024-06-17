
<?php
$menu = 'survey';
include_once('model/dosen_form_model.php');

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Source Sans Pro', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 10vh;
      padding: 20px;
    }
    .centered-container {
      max-width: 800px;
      width: 100%;
    }
    .form-container {
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
      padding: 10px;
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
      font-size: 24px;
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

    @media (max-width: 767px) {
      .content-header h1 {
        font-size: 20px;
      }
      .form-group {
        margin-bottom: 10px;
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper centered-container">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Survey Kepuasan Pelanggan Polinema</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
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
        <form action="responden_dosen_action.php?act=simpan" method="post">
          <div class="form-group">
            <label for="responden_tanggal">Tanggal</label>
            <input type="datetime-local" class="form-control" id="responden_tanggal" name="responden_tanggal" required readonly>
          </div>

          <div class="form-group">
            <label for="responden_nip">NIP</label>
            <input type="text" class="form-control" id="responden_nip" name="responden_nip" required>
          </div>

          <div class="form-group">
            <label for="responden_nama">Nama</label>
            <input type="text" class="form-control" id="responden_nama" name="responden_nama" required>
          </div>

          <div class="form-group">
            <label for="responden_unit">Unit</label>
            <input type="text" class="form-control" id="responden_unit" name="responden_unit" required>
          </div>

          <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-primary btn-block">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/demo.min.js"></script>
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

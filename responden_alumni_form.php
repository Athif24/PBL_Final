<?php
$menu = 'survey';
include_once('model/alumni_form_model.php');

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
  <!-- AdminLTE styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
  <!-- Custom styles -->
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Source Sans Pro', sans-serif;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 60vh; /* Set full viewport height */
    }
    .wrapper {
      width: 100%;
      max-width: 600px; /* Adjust this as needed */
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
      font-size: xx-large;
      margin: 0;
    }
    .form-container {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
<div class="wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Survey Kepuasan Pelanggan Polinema</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card form-container">
      <div class="card-header">
        <h3 class="card-title">Formulir Survey</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="responden_alumni_action.php?act=simpan" method="post">
          <div class="form-group">
            <label for="responden_tanggal">Tanggal</label>
            <input type="datetime-local" class="form-control" id="responden_tanggal" name="responden_tanggal" required readonly>
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
            <label for="responden_prodi">Program Studi</label>
            <input type="text" class="form-control" id="responden_prodi" name="responden_prodi" required>
          </div>
          <div class="form-group">
            <label for="responden_email">Email</label>
            <input type="email" class="form-control" id="responden_email" name="responden_email" required>
          </div>
          <div class="form-group">
            <label for="responden_hp">Nomor HP</label>
            <input type="text" class="form-control" id="responden_hp" name="responden_hp" required>
          </div>
          <div class="form-group">
            <label for="tahun_lulus">Tahun Lulus</label>
            <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" required>
          </div>
          <div class="form-group">
            <button type="submit" href="responden_alumni_form.php" class="btn btn-primary btn-block">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

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

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
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" style="padding: 1%;">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-size:xx-large;">Survey Kepuasan Pelanggan Polinema</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card" >
        <div class="card-header">
          <h3 class="card-title">Survey</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body" >
          <form action="submit_survey.php" method="post" ">
            <div class="form-group row">
              <div class="col-md-6">
                <label for="responden_nim">NIM</label>
                <input type="text" class="form-control" id="responden_nim" name="responden_nim" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="responden_nama">Nama</label>
                <input type="text" class="form-control" id="responden_nama" name="responden_nama" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="responden_prodi">Prodi</label>
                <input type="text" class="form-control" id="responden_prodi" name="responden_prodi" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="responden_email">Email</label>
                <input type="email" class="form-control" id="responden_email" name="responden_email" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="responden_hp">HP</label>
                <input type="text" class="form-control" id="responden_hp" name="responden_hp" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="tahun_masuk">Tahun Masuk</label>
                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

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
</body>
</html>

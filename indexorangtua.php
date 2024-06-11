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
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" style="padding: 1%;">

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Survey Orang Tua</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <form action="Responden_ortu_model.php" method="post">
            <div class="form-group">
              <label for="survey_id">Survey ID</label>
              <input type="number" class="form-control" id="survey_id" name="survey_id" required>
            </div>
            <div class="form-group">
              <label for="responden_tanggal">Tanggal</label>
              <input type="datetime-local" class="form-control" id="responden_tanggal" name="responden_tanggal" required>
            </div>
            <div class="form-group">
              <label for="responden_nama">Nama</label>
              <input type="text" class="form-control" id="responden_nama" name="responden_nama" required>
            </div>
            <div class="form-group">
              <label for="responden_jk">Jenis Kelamin</label>
              <select class="form-control" id="responden_jk" name="responden_jk" required>
                <option value="">Pilih</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="responden_umur">Umur</label>
              <input type="number" class="form-control" id="responden_umur" name="responden_umur" required>
            </div>
            <div class="form-group">
              <label for="responden_hp">HP</label>
              <input type="text" class="form-control" id="responden_hp" name="responden_hp" required>
            </div>
            <div class="form-group">
              <label for="responden_pendidikan">Pendidikan</label>
              <input type="text" class="form-control" id="responden_pendidikan" name="responden_pendidikan" required>
            </div>
            <div class="form-group">
              <label for="responden_pekerjaan">Pekerjaan</label>
              <input type="text" class="form-control" id="responden_pekerjaan" name="responden_pekerjaan" required>
            </div>
            <div class="form-group">
              <label for="responden_penghasilan">Penghasilan</label>
              <input type="text" class="form-control" id="responden_penghasilan" name="responden_penghasilan" required>
            </div>
            <div class="form-group">
              <label for="mahasiswa_nim">NIM Mahasiswa</label>
              <input type="text" class="form-control" id="mahasiswa_nim" name="mahasiswa_nim" required>
            </div>
            <div class="form-group">
              <label for="mahasiswa_nama">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="mahasiswa_nama" name="mahasiswa_nama" required>
            </div>
            <div class="form-group">
              <label for="mahasiswa_prodi">Prodi Mahasiswa</label>
              <input type="text" class="form-control" id="mahasiswa_prodi" name="mahasiswa_prodi" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
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

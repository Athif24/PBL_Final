<?php
$menu = 'bank_soal';
include_once('model/bank_soal_model.php');

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
  <title>Form - Bank Soal</title>

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
              <h1>Bank Soal</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Bank Soal</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <?php
        $act = (isset($_GET['act'])) ? $_GET['act'] : '';

        if ($act == 'tambah') {
        ?>

          <div class="card">

            <div class="card-header">
              <h3 class="card-title">Tambah Soal Survey</h3>
              <div class="card-tools"></div>
            </div>

            <div class="card-body">
              <form action="bank_soal_action.php?act=simpan" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="no_urut">No Urut</label>
                  <input required type="text" name="no_urut" id="no_urut" class="form-control">
                </div>
                <div class="form-group">
                  <label for="survey_id">Survey ID</label>
                  <input required type="text" name="survey_id" id="survey_id" class="form-control">
                </div>

                <div class="form-group">
                  <label for="kategori_id">Kategori ID</label> 
                  <select required name="kategori_id" id="kategori_id" class="form-control">
                  <option id="ketegori-id" value="1">Kondisi Sarana Prasarana</option>
                    <option id="kategori_id" value="2">Kemampuan Tenaga Pengajar untuk Kegiatan Akademik</option>
                    <option id="ketegori_id" value="3">Layanan Masalah Akademik dan Non Akademik</option>
                    <option id="ketegori_id" value="4">Keadilan Perlakuan Akademik</option>
                    <option id="ketegori_id" value="5">Layanan Keuangan dan Prestasi Mahasiswa</option>
                    <option id="ketegori_id" value="6">Transparansi Informasi dan Layanan Akademik</option>
                    <option id="ketegori_id" value="7">Uraian</option>
                    <option id="ketegori_id" value="8">Sistem Pengelolaan Sumber Daya Manusia</option>
                    <option id="ketegori_id" value="9">Sistem Pengelolaan Keuangan</option>
                    <option id="ketegori_id" value="10">Sistem Pengelolaan Sarana dan Prasarana</option>
                    <option id="ketegori_id" value="11">Sistem Pengelolaan Kegiatan Penelitian</option>
                    <option id="ketegori_id" value="12">Layanan Pasca Lulus</option>
                    <option id="ketegori_id" value="13">Pelacakan Pengguna Lulusan Politeknik Negeri Malang</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="soal_jenis">Jenis Soal</label>
                  <select required type="text" name="soal_jenis" id="soal_jenis" class="form-control">
                    <option value="">Pilih Jenis Soal</option>
                    <option required type="text" value="esai">Esai</option>
                    <option required type="test" value="pilihanganda">Pilihan Ganda</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="soal_nama">Nama Soal</label>
                  <input required type="text" name="soal_nama" id="soal_nama" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="bank_soal.php" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>

        <?php } else if ($act == 'edit') { ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Soal Survey</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-body">

              <?php
              $id = $_GET['id'];

              $bank_soal = new BankSoal();
              $data = $bank_soal->getDataById($id);

              $data = $data->fetch_assoc();
              ?>

              <form action="bank_soal_action.php?act=edit&id=<?php echo $id ?>" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="survey_id">Survey ID</label>
                  <input type="text" name="survey_id" id="survey_id" class="form-control" value="<?php echo $data['survey_id'] ?>">
                </div>
                <div class="form-group">
                  <label for="kategori_id">Kategori ID</label>
                  <select required type="text" name="kategori_id" id="kategori_id" class="form-control" value="<?php echo $data['kategori_id'] ?>">
                    <option value="">Pilih Salah Satu</option>
                    <option id="ketegori-id" value="1">Kondisi Sarana Prasarana</option>
                    <option id="kategori_id" value="2">Kemampuan Tenaga Pengajar untuk Kegiatan Akademik</option>
                    <option id="ketegori_id" value="3">Layanan Masalah Akademik dan Non Akademik</option>
                    <option id="ketegori_id" value="4">Keadilan Perlakuan Akademik</option>
                    <option id="ketegori_id" value="5">Layanan Keuangan dan Prestasi Mahasiswa</option>
                    <option id="ketegori_id" value="6">Transparansi Informasi dan Layanan Akademik</option>
                    <option id="ketegori_id" value="7">Uraian</option>
                    <option id="ketegori_id" value="8">Sistem Pengelolaan Sumber Daya Manusia</option>
                    <option id="ketegori_id" value="9">Sistem Pengelolaan Keuangan</option>
                    <option id="ketegori_id" value="10">Sistem Pengelolaan Sarana dan Prasarana</option>
                    <option id="ketegori_id" value="11">Sistem Pengelolaan Kegiatan Penelitian</option>
                    <option id="ketegori_id" value="12">Layanan Pasca Lulus</option>
                    <option id="ketegori_id" value="13">Pelacakan Pengguna Lulusan Politeknik Negeri Malang</option>
                </select>
                </div>
                <div class="form-group">
                  <label for="no_urut">No Urut</label>
                  <input required type="text" name="no_urut" id="no_urut" class="form-control" value="<?php echo $data['no_urut'] ?>">
                </div>
                <div class="form-group">
                  <label for="soal_jenis">Jenis Soal</label>
                  <select required type="text" name="soal_jenis" id="soal_jenis" class="form-control" value="<?php echo $data['soal_jenis'] ?>>
                    <option value=">Pilih Jenis Soal</option>
                    <option required type="text" value="esai">Esai</option>
                    <option required type="test" value="pilihanganda">Pilihan Ganda</option>
                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                  </select>
                </div>
                <div class="form-group">
                  <label for="soal_nama">Nama Soal</label>
                  <input required type="text" name="soal_nama" id="soal_nama" class="form-control" value="<?php echo $data['soal_nama'] ?>">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                  <a href="bank_soal.php" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>

        <?php } ?>

    </div>
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
  <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>


  <script>
    $(document).ready(function() { // maksud nya adl ketika dokumen sudah siap (html telah d render oleh browser) maka jalankan fungsi berikut ini

      $('#form-tambah').validate({
        rules: {
          no_urut: {
            required: true,
            minlength: 1,
            maxlength: 10
          },
          soal_nama: {
            required: true,
            minlength: 3,
            maxlength: 255
          }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });

    });
  </script>

</body>

</html>
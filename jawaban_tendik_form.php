<?php
$menu = 'data_user';
include_once ('model/j_tendik.php');
include_once ('model/survey_model.php');
include_once ('model/bank_soal_model.php');

if (session_status() === PHP_SESSION_NONE)
  session_start();

if (isset($_GET['bio']) && $_GET['bio'] != 'tendik' && isset($_GET['tendik'])) {
  header("Location: login.php");
  exit;
}

$survey = new survey();
$surveyid = $survey->getSurveyIdWithName($_GET['bio']);
$surveyData = $survey->getDataById($surveyid);
$surveyNama = $surveyData->fetch_assoc()['survey_nama'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jawaban tendik</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

  <style>
    .survey-header {
      background-color: #3490dc;
      color: #fff;
      padding: 1rem;
      text-align: center;
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    .survey-header h1 {
      font-size: 2rem;
      margin: 0;
    }

    .survey-container {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      grid-gap: 1rem;
      text-align: center;
      background-color: #f2f2f2;
      padding: rem;
      border-bottom-left-radius: 0.5rem;
      border-bottom-right-radius: 0.5rem;
    }

    .item {
      background-color: #fff;
      padding: 1rem;
      border-radius: 1rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: transform 0.s 5ease;
    }

    .item:hover {
      transform: translateY(-5px);
    }

    .item img {
      max-width: 100%;
      height: auto;
    }
  </style>

</head>

<body class="hold-transition">
  <!-- Site wrapper -->
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="text-3xl font-bold text-center mb-4 border-b-2 border-gray-300 pb-2"><?= $surveyNama ?></h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <?php
    $act = (isset($_GET['act'])) ? $_GET['act'] : $_GET['act'] = 'tambah';

    $soal = new BankSoal();
    $soalData = $soal->getSoalBySurveyId($surveyid);

    if ($act == 'tambah') {
      ?>
      <div class="card mx-auto max-w-3xl">
        <div class="card-body">
          <form action="jawaban_tendik_action.php?act=simpan" method="post" id="form-tambah" class="space-y-4">
            <input type="hidden" name="responden_tendik_id" value="<?= $_GET['tendik'] ?>" id="">
            <input type="hidden" name="survey_id" id="" value="<?= $surveyid ?>">
            <?php
            $chose = ['Tidak Puas' => 'fi-sr-face-disappointed', 'Kurang Puas' => 'fi-sr-sad', 'Cukup Puas' => 'fi-sr-meh', 'Puas' => 'fi-sr-grin', 'Sangat Puas' => 'fi-sr-grin-stars'];

            if ($soalData->num_rows > 0) {
              // Output data of each row
              while ($soal = $soalData->fetch_assoc()) {
                if ($soal['soal_jenis'] == 'esai') {
                  ?>
                  <div class="soal space-y-2">
                    <h1 class="text-xl font-bold"><?= $soal['no_urut'] ?>. <?= $soal['soal_nama'] ?></h1>
                    <textarea name="jawaban_<?= $soal['soal_id'] ?>" id="" rows="4" class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
                    <?php
                } else {
                  ?>
                    <div class="soal space-y-2">
                      <h1 class="text-xl font-bold"><?= $soal['no_urut'] ?>. <?= $soal['soal_nama'] ?></h1>
                      <div class="choses w-full grid grid-cols-<?= count($chose) ?> gap-4">

                        <?php foreach ($chose as $key => $value): ?>
                          <div class="border-2 border-blue-300 rounded-lg hover:bg-blue-200 hover:text-white transition-all duration-300 cursor-pointer">
                            <label for="<?= "soal-" . $soal['no_urut'] . '-' . $key ?>" class="p-2 text-center flex flex-col items-center">
                              <div class="icon text-2xl">
                                <i class="fi <?= $value ?>"></i>
                              </div>
                              <h2 class="text-lg text-nowrap">
                                <?= $key ?>
                              </h2>
                            </label>
                            <input type="radio" hidden id="<?= "soal-" . $soal['no_urut'] . '-' . $key ?>" name="jawaban_<?= $soal['soal_id'] ?>" value="<?= $key ?>" onclick="$(event.target).closest('.choses').children().each((e,i)=>{$(i).removeClass('bg-blue-200')});$(event.target).parent().addClass('bg-blue-200')">
                          </div>
                        <?php endforeach; ?>
                      </div>

                      <?php
                }
              }
            } else {
              echo "0 soal";
            }
            ?>
                <div class="form-group flex justify-center space-x-4">
                  <button type="submit" name="simpan" class="btn btn-primary px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600" value="simpan">Simpan</button>
                  <a href="jawaban_tendik.php" class="btn btn-warning px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Kembali</a>
                </div>
          </form>
        </div>
      </div>
    <?php } ?>

    <!-- /.card -->

  </section>
  <!-- /.content -->
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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
  $(document).ready(function () {
    $('#form-tambah').validate({
      rules: {
        kode_soal: {
          required: true,
          minlength: 3,
          maxlength: 10
        },
        nama_soal: {
          required: true,
          minlength: 5,
          maxlength: 255
        }
      },
      errorElement: 'div',
      errorClass: 'invalid-feedback',
      errorPlacement: function (error, element) {
        error.insertAfter(element);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid').removeClass('is-valid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid').addClass('is-valid');
      }
    });
  });
</script>

</body>
</html>
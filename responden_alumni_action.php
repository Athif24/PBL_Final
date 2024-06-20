<?php 
session_start();
include('model/alumni_form_model.php');
include('model/survey_model.php');

$act = $_GET['act'];
$survey = new survey();
$surveyid = $survey->getSurveyId();

if ($act == 'simpan') { 
    $data = [
        'survey_id' => $surveyid,
        'responden_tanggal' => $_POST['responden_tanggal'], 
        'responden_nim' => $_POST['responden_nim'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_prodi' => $_POST['responden_prodi'],
        'responden_email' => $_POST['responden_email'],
        'responden_hp' => $_POST['responden_hp'],
        'tahun_lulus' => $_POST['tahun_lulus']
    ];

    $insert = new alumni_form_model();
    $lastInsert = $insert->insertData($data);

    // header('location: responden_mahasiswa.php?status=sukses&message=Data berhasil disimpan');
    header('location: jawaban_alumni_form.php?bio=alumni&alumni=' . $lastInsert);
}

if ($act == 'edit') {
    $id = $_GET['id'];

    $data = [
        'survey_id' => $_POST['survey_id'],
        'responden_tanggal' => $_POST['responden_tanggal'], 
        'responden_nim' => $_POST['responden_nim'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_prodi' => $_POST['responden_prodi'],
        'responden_email' => $_POST['responden_email'],
        'responden_hp' => $_POST['responden_hp'],
        'tahun_lulus' => $_POST['tahun_lulus']
    ];

    $update = new alumni_form_model();
    $update->updateData($id, $data);

    header('location: responden_alumni.php?status=sukses&message=Data berhasil diubah');
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new alumni_form_model();
    $hapus->deleteData($id);

    header('location: responden_alumni.php?status=sukses&message=Data berhasil dihapus');
}
?>

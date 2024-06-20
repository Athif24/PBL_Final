<?php 
session_start();
include('model/industri_form_model.php'); // Updated to match the new model name
include('model/survey_model.php');

$act = $_GET['act'];
$survey = new survey();
$surveyid = $survey->getSurveyId();

if ($act == 'simpan') { 
    $data = [
        'survey_id' => $surveyid,
        'responden_tanggal' => $_POST['responden_tanggal'], 
        'responden_nama' => $_POST['responden_nama'],
        'responden_jabatan' => $_POST['responden_jabatan'],
        'responden_perusahaan' => $_POST['responden_perusahaan'],
        'responden_email' => $_POST['responden_email'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_kota' => $_POST['responden_kota']
    ];

    $insert = new industri_form_model();
    $lastInsert = $insert->insertData($data);

    // header('location: responden_mahasiswa.php?status=sukses&message=Data berhasil disimpan');
    header('location: jawaban_industri_form.php?bio=industri&industri=' . $lastInsert);
}

if ($act == 'edit') {
    $id = $_GET['id'];

    $data = [
        'survey_id' => $_POST['survey_id'],
        'responden_tanggal' => $_POST['responden_tanggal'], 
        'responden_nama' => $_POST['responden_nama'],
        'responden_jabatan' => $_POST['responden_jabatan'],
        'responden_perusahaan' => $_POST['responden_perusahaan'],
        'responden_email' => $_POST['responden_email'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_kota' => $_POST['responden_kota']
    ];

    $update = new industri_form_model();
    $update->updateData($id, $data);

    header('location: responden_industri.php?status=sukses&message=Data berhasil diubah');
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new industri_form_model();
    $hapus->deleteData($id);

    header('location: responden_industri.php?status=sukses&message=Data berhasil dihapus');
}
?>

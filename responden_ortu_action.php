<?php 
session_start();
include('model/ortu_form_model.php'); // Updated model include
include('model/survey_model.php');

$act = $_GET['act'];
$survey = new survey();
$surveyid = $survey->getSurveyId();

if ($act == 'simpan') { 
    $data = [
        'survey_id' => $surveyid,
        'responden_tanggal' => $_POST['responden_tanggal'], 
        'responden_nama' => $_POST['responden_nama'],
        'responden_jk' => $_POST['responden_jk'],
        'responden_umur' => $_POST['responden_umur'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_pendidikan' => $_POST['responden_pendidikan'],
        'responden_pekerjaan' => $_POST['responden_pekerjaan'],
        'responden_penghasilan' => $_POST['responden_penghasilan'],
        'mahasiswa_nim' => $_POST['mahasiswa_nim'],
        'mahasiswa_nama' => $_POST['mahasiswa_nama'],
        'mahasiswa_prodi' => $_POST['mahasiswa_prodi']
    ];

    $insert = new ortu_form_model(); // Updated class name
    $insert->insertData($data);

    header('location: responden_ortu.php?status=sukses&message=Data berhasil disimpan'); // Updated redirect URL
}

if ($act == 'edit') {
    $id = $_GET['id'];

    $data = [
        'survey_id' => $_POST['survey_id'],
        'responden_tanggal' => $_POST['responden_tanggal'], 
        'responden_nama' => $_POST['responden_nama'],
        'responden_jk' => $_POST['responden_jk'],
        'responden_umur' => $_POST['responden_umur'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_pendidikan' => $_POST['responden_pendidikan'],
        'responden_pekerjaan' => $_POST['responden_pekerjaan'],
        'responden_penghasilan' => $_POST['responden_penghasilan'],
        'mahasiswa_nim' => $_POST['mahasiswa_nim'],
        'mahasiswa_nama' => $_POST['mahasiswa_nama'],
        'mahasiswa_prodi' => $_POST['mahasiswa_prodi']
    ];

    $update = new ortu_form_model(); // Updated class name
    $update->updateData($id, $data);

    header('location: responden_ortu.php?status=sukses&message=Data berhasil diubah'); // Updated redirect URL
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new ortu_form_model(); // Updated class name
    $hapus->deleteData($id);

    header('location: responden_ortu.php?status=sukses&message=Data berhasil dihapus'); // Updated redirect URL
}
?>

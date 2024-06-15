<?php 
session_start();
include('model/dosen_form_model.php');
include('model/survey_model.php');

$act = $_GET['act'];
$survey = new survey();
$surveyid = $survey -> getSurveyId();

 if($act == 'simpan'){ 
   echo '<pre>';
    $data = [
        'survey_id' => $surveyid,
        'responden_tanggal' => $_POST['responden_tanggal'], 
        'responden_nip' => $_POST['responden_nip'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_unit' => $_POST['responden_unit']
    ];

    $insert = new dosen_form_model();
    $insert->insertData($data);

    header('location: responden_dosen.php?status=sukses&message=Data berhasil disimpan');
 }

 if($act == 'edit'){
    $id = $_GET['id'];

    $data = [
      'responden_tanggal' => $_POST['responden_tanggal'], 
      'responden_nip' => $_POST['responden_nip'],
      'responden_nama' => $_POST['responden_nama'],
      'responden_unit' => $_POST['responden_unit']
  ];

    $update = new dosen_form_model();
    $update->updateData($id, $data);

    header('location: responden_dosen.php?status=sukses&message=Data berhasil diubah');
 }

 if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new dosen_form_model();
    $hapus->deleteData($id);

    header('location: responden_dosen.php?status=sukses&message=Data berhasil dihapus');
 }
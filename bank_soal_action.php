<?php 
include_once('model/bank_soal_model.php');
 
 $act = $_GET['act'];

 if($act == 'simpan'){
    echo '<pre>';
    $data = [
        'survey_id' => $_POST['survey_id'],
        'kategori_id' => $_POST['kategori_id'], 
        'no_urut' => $_POST['no_urut'],
        'soal_jenis' => $_POST['soal_jenis'],
        'soal_nama' => $_POST['soal_nama']
    ];

    $insert = new BankSoal();
    $insert->insertData($data);

    header('location: bank_soal.php?status=sukses&message=Data berhasil disimpan');
 }

 if($act == 'edit'){
    $id = $_GET['id'];

    $data = [
      'survey_id' => $_POST['survey_id'],
      'kategori_id' => $_POST['kategori_id'], 
      'no_urut' => $_POST['no_urut'],
      'soal_jenis' => $_POST['soal_jenis'],
      'soal_nama' => $_POST['soal_nama']
  ];

    $update = new BankSoal();
    $update->updateData($id, $data);

    header('location: bank_soal.php?status=sukses&message=Data berhasil diubah');
 }

 if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new BankSoal();
    $hapus->deleteData($id);

    header('location: bank_soal.php?status=sukses&message=Data berhasil dihapus');
 }
<?php 
include_once('model/data_user_model.php');
 
 $act = $_GET['act'];

 if($act == 'simpan'){
    echo '<pre>';
    $data = [
        'username'     => $_POST['username'],
        'nama'          => $_POST['nama'],
        'password'    => $_POST['password']
    ];

    $insert = new DataAdmin();
    $insert->insertData($data);

    header('location: data_user.php?status=sukses&message=Data berhasil disimpan');
 }

 if($act == 'edit'){
    $id = $_GET['id'];

    $data = [
      'username'     => $_POST['username'],
      'nama'          => $_POST['nama'],
      'password'    => $_POST['password']
  ];

    $update = new DataAdmin();
    $update->updateData($id, $data);

    header('location: data_user.php?status=sukses&message=Data berhasil diubah');
 }

 if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new DataAdmin();
    $hapus->deleteData($id);

    header('location: data_user.php?status=sukses&message=Data berhasil dihapus');
 }
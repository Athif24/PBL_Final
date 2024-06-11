<?php
include_once('model/j_mahasiswa.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    $data = [
        'jawaban_mahasiswa_id' => $_POST['jawaban_mahasiswa_id'],
        'responden_mahasiswa_id' => $_POST['responden_mahasiswa_id'],
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $insert = new j_mahasiswa();
    $insert->insertData($data);

    header('location: jawaban_mahasiswa.php?status=sukses&message=Data berhasil disimpan');
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new j_mahasiswa();
    $hapus->deleteData($id);

    header('location: jawaban_mahasiswa.php?status=sukses&message=Data berhasil dihapus');
}

if ($act == 'view') {
    $id = $_GET['id'];

    $view = new j_mahasiswa();
    $result = $view->viewData($id);
    $data = $result->fetch_assoc();

    // Tampilkan data yang diperoleh dari viewData
    echo "ID: " . $data['id'] . "<br>";
    echo "Jawaban Mahasiswa ID: " . $data['jawaban_mahasiswa_id'] . "<br>";
    echo "Responden Mahasiswa ID: " . $data['responden_mahasiswa_id'] . "<br>";
    echo "Soal ID: " . $data['soal_id'] . "<br>";
    echo "Jawaban: " . $data['jawaban'] . "<br>";
}
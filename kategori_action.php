<?php 
include_once('model/kategori_model.php');

// Instantiate the kategori class
$kategori = new Kategori();

$act = isset($_GET['act']) ? $_GET['act'] : '';

if ($act == 'simpan') {
    $data = [
        'kategori_nama' => isset($_POST['kategori_nama']) ? $_POST['kategori_nama'] : ''
    ];

    if (!empty($data['kategori_nama'])) {
        $kategori->insertData($data);
        header('Location: kategori.php?status=sukses&message=Data berhasil disimpan');
    } else {
        header('Location: kategori.php?status=gagal&message=Nama kategori tidak boleh kosong');
    }
    exit();
}

if ($act == 'edit') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if (!empty($id)) {
        $data = [
            'kategori_nama' => isset($_POST['kategori_nama']) ? $_POST['kategori_nama'] : ''
        ];

        if (!empty($data['kategori_nama'])) {
            $kategori->updateData($id, $data);
            header('Location: kategori.php?status=sukses&message=Data berhasil diubah');
        } else {
            header('Location: kategori.php?status=gagal&message=Nama kategori tidak boleh kosong');
        }
    } else {
        header('Location: kategori.php?status=gagal&message=ID kategori tidak ditemukan');
    }
    exit();
}

if ($act == 'hapus') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if (!empty($id)) {
        $kategori->deleteData($id);
        header('Location: kategori.php?status=sukses&message=Data berhasil dihapus');
    } else {
        header('Location: kategori.php?status=gagal&message=ID kategori tidak ditemukan');
    }
    exit();
}
?>
<?php 
include_once('model/survey_model.php');

// Instantiate the survey class
$survey = new survey();

$act = isset($_GET['act']) ? $_GET['act'] : '';

if ($act == 'simpan') {
    $data = [
        'user_id' => isset($_POST['user_id']) ? $_POST['user_id'] : '',
        'survey_jenis' => isset($_POST['survey_jenis']) ? $_POST['survey_jenis'] : '',
        'survey_kode' => isset($_POST['survey_kode']) ? $_POST['survey_kode'] : '',
        'survey_nama' => isset($_POST['survey_nama']) ? $_POST['survey_nama'] : '',
        'survey_deskripsi' => isset($_POST['survey_deskripsi']) ? $_POST['survey_deskripsi'] : '',
        'survey_tanggal' => isset($_POST['survey_tanggal']) ? $_POST['survey_tanggal'] : ''
    ];

    if (!empty($data['user_id']) && !empty($data['survey_jenis']) && !empty($data['survey_kode']) && !empty($data['survey_nama']) && !empty($data['survey_deskripsi'])&& !empty($data['survey_tanggal'])) {
        $survey->insertData($data);
        header('Location: survey.php?status=sukses&message=Data berhasil disimpan');
    } else {
        header('Location: survey.php?status=gagal&message=Semua field harus diisi');
    }
    exit();
}

if ($act == 'edit') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if (!empty($id)) {
        $data = [
            'user_id' => isset($_POST['user_id']) ? $_POST['user_id'] : '',
            'survey_jenis' => isset($_POST['survey_jenis']) ? $_POST['survey_jenis'] : '',
            'survey_kode' => isset($_POST['survey_kode']) ? $_POST['survey_kode'] : '',
            'survey_nama' => isset($_POST['survey_nama']) ? $_POST['survey_nama'] : '',
            'survey_deskripsi' => isset($_POST['survey_deskripsi']) ? $_POST['survey_deskripsi'] : '',
            'survey_tanggal' => isset($_POST['survey_tanggal']) ? $_POST['survey_tanggal'] : ''
        ];

        if (!empty($data['user_id']) && !empty($data['survey_jenis']) && !empty($data['survey_kode']) && !empty($data['survey_nama']) &&!empty($data['survey_deskripsi']) && !empty($data['survey_tanggal'])) {
            $survey->updateData($id, $data);
            header('Location: survey.php?status=sukses&message=Data berhasil diubah');
        } else {
            header('Location: survey.php?status=gagal&message=Semua field harus diisi');
        }
    } else {
        header('Location: survey.php?status=gagal&message=ID survey tidak ditemukan');
    }
    exit();
}

if ($act == 'hapus') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if (!empty($id)) {
        $survey->deleteData($id);
        header('Location: survey.php?status=sukses&message=Data berhasil dihapus');
    } else {
        header('Location: survey.php?status=gagal&message=ID survey tidak ditemukan');
    }
    exit();
}

// Close the database connection if applicable
if (isset($db)) {
    $db->close();
}
?>

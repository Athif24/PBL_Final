<?php
include_once ('model/j_alumni.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    $dataDefault = [
        'responden_alumni_id' => $_POST['responden_alumni_id'],
        'survey_id' => $_POST['survey_id'],
    ];

    $dataJawaban = [];

    foreach ($_POST as $key => $value) {
        // Check if the key matches the format "option[number]"
        if (preg_match('/^jawaban_\d+$/', $key)) {
            // Add the option to the selected options array
            $dataJawaban[preg_replace("/\w+[_]/", "", $key)] = $value;
        }
    }
    echo var_dump($dataJawaban);

    $insert = new j_alumni();

    foreach ($dataJawaban as $key => $value) {
        $data = $dataDefault;
        $data['soal_id'] = $key;
        $data['jawaban'] = $value;

        $insert->insertData($data);
    }

    echo "Data berhasil disimpan";

    header('location: terimakasih.php?status=sukses&message=Data berhasil disimpan');
}

if ($act == 'view') {
    $id = $_GET['id'];

    $view = new j_alumni();
    $result = $view->viewData($id);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($answer = $result->fetch_assoc()) {

            echo var_dump($answer) . ": " . "<br>";

            // Tampilkan data yang diperoleh dari viewData
            echo "Jawaban alumni ID: " . $answer['jawaban_alumni_id'] . "<br>";
            echo "Responden alumni ID: " . $answer['responden_alumni_id'] . "<br>";
            echo "Soal ID: " . $answer['soal_id'] . "<br>";
            echo "Jawaban: " . $answer['jawaban'] . "<br>";

        }
    } else {

        echo "0 soal";
    }
}
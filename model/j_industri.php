<?php
class j_industri{
    public $db;
    protected $table = 't_jawaban_industri';

    public function __construct() {
        include_once('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data) {
        $query = $this->db->prepare("INSERT INTO {$this->table} (id, jawaban_industri_id, responden_industri_id, soal_id, jawaban) VALUES (NULL, ?, ?, ?, ?)");
        $query->bind_param('iiiis', $data['jawaban_industri_id'], $data['responden_industri_id'], $data['soal_id'], $data['jawaban']);
        $query->execute();
    }

    public function getData() {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id) {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

    public function viewData($id) {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }
}
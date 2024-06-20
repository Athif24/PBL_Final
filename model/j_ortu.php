<?php
class j_ortu{
    public $db;
    protected $table = 't_jawaban_ortu';

    public function __construct() {
        include_once('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (jawaban_ortu_id, responden_ortu_id, soal_id, jawaban) VALUES (NULL,   ?, ?, ?)");
        $query->bind_param('iis', $data['responden_ortu_id'], $data['soal_id'], $data['jawaban']);
        $query->execute();
        echo $query->insert_id;
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
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_ortu_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }
}
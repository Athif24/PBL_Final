<?php
class j_dosen
{
    public $db;
    protected $table = 't_jawaban_dosen';

    public function __construct()
    {
        include_once ('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (jawaban_dosen_id, responden_dosen_id, soal_id, jawaban) VALUES (NULL,   ?, ?, ?)");
        $query->bind_param('iis', $data['responden_dosen_id'], $data['soal_id'], $data['jawaban']);
        $query->execute();
        echo $query->insert_id;
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

    public function viewData($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_dosen_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }
}
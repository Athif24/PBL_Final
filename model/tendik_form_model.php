<?php 
class tendik_form_model {
    public $db;
    protected $table = 't_responden_tendik';

    public function __construct(){
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, responden_tanggal, responden_nopeg, responden_nama, responden_unit) VALUES (?,?,?,?,?)");

        // binding parameter ke query, "i" berarti integer, "s" berarti string
        $query->bind_param('issss', $data['survey_id'], $data['responden_tanggal'], $data['responden_nopeg'], $data['responden_nama'], $data['responden_unit']);
        
        // eksekusi query untuk menyimpan ke database
        $query->execute();
        return $query->insert_id;
    }

    public function getData(){
        // query untuk mengambil data dari tabel
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($responden_tendik_id){
        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_tendik_id = ?");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $responden_tendik_id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($responden_tendik_id, $data){
        // query untuk update data
        $query = $this->db->prepare("UPDATE {$this->table} SET survey_id = ?, responden_tanggal = ?, responden_nopeg = ?, responden_nama = ?, responden_unit = ? WHERE responden_tendik_id = ?");

        // binding parameter ke query
        $query->bind_param('issssi', $data['survey_id'], $data['responden_tanggal'], $data['responden_nopeg'], $data['responden_nama'], $data['responden_unit'], $responden_tendik_id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($responden_tendik_id){
        // query untuk delete data
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE responden_tendik_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $responden_tendik_id);

        // eksekusi query
        $query->execute();
    }

    public function count(){
        $count = $this->db->query("SELECT * FROM {$this->table}");
        return $count->num_rows;
    }
}
?>

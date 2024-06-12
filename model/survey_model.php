<?php 
class survey {
    public $db;
    protected $table = 'm_survey';

    public function __construct(){
        include_once('koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        // Memastikan bahwa nilai 'survey_tanggal' adalah dalam format yang diharapkan oleh MySQL
        $formatted_survey_tanggal = date('Y-m-d H:i:s', strtotime($data['survey_tanggal']));
    
        // Prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (user_id, survey_jenis, survey_kode, survey_nama, survey_deskripsi, survey_tanggal) VALUES (?, ?, ?, ?, ?, ?)");
        // Binding parameter ke query
        $query->bind_param('isssss', $data['user_id'], $data['survey_jenis'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $formatted_survey_tanggal);
        

        // Eksekusi query untuk menyimpan ke database
        $query->execute();
    }
    
    public function getData(){
        // query untuk mengambil data dari tabel m_survey
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($survey_id){
        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE survey_id = ?");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $survey_id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($survey_id, $data){
        // query untuk update data
        $formatted_survey_tanggal = date('Y-m-d H:i:s', strtotime($data['survey_tanggal']));
    
        // Prepare statement untuk query insert
        $query = $this->db->prepare("update {$this->table} set user_id = ?, survey_jenis = ?, survey_kode = ?, survey_nama = ?, survey_deskripsi = ?, survey_tanggal = ? where survey_id = ?");
    
        // Binding parameter ke query
        $query->bind_param('isssssi', $data['user_id'], $data['survey_jenis'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $formatted_survey_tanggal, $survey_id);
        
        // Eksekusi query untuk menyimpan ke database
        $query->execute();
    }

    public function deleteData($survey_id){
        // query untuk delete data
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE survey_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $survey_id);

        // eksekusi query
        $query->execute();
    }
}
?>

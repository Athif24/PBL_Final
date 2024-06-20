<?php 
class alumni_form_model {
    public $db;
    protected $table = 't_responden_alumni';

    public function __construct(){
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        // prepare statement for insert query
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, responden_tanggal, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_lulus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // bind parameters to query, "i" means integer, "s" means string
        $query->bind_param('issssssi', $data['survey_id'], $data['responden_tanggal'], $data['responden_nim'], $data['responden_nama'], $data['responden_prodi'], $data['responden_email'], $data['responden_hp'], $data['tahun_lulus']);
        
        // execute query to save to database
        $query->execute();
        return $query->insert_id;
    }

    public function getData(){
        // query to get data from the table
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($responden_alumni_id){
        // query to get data by id
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_alumni_id = ?");
        
        // bind parameter to query "i" means integer
        $query->bind_param('i', $responden_alumni_id);

        // execute query
        $query->execute();

        // get query result
        return $query->get_result();
    }

    public function updateData($responden_alumni_id, $data){
        // query to update data
        $query = $this->db->prepare("UPDATE {$this->table} SET survey_id = ?, responden_tanggal = ?, responden_nim = ?, responden_nama = ?, responden_prodi = ?, responden_email = ?, responden_hp = ?, tahun_lulus = ? WHERE responden_alumni_id = ?");

        // bind parameters to query
        $query->bind_param('issssssi', $data['survey_id'], $data['responden_tanggal'], $data['responden_nim'], $data['responden_nama'], $data['responden_prodi'], $data['responden_email'], $data['responden_hp'], $data['tahun_lulus'], $responden_alumni_id);

        // execute query
        $query->execute();
    }

    public function deleteData($responden_alumni_id){
        // query to delete data
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE responden_alumni_id = ?");

        // bind parameter to query
        $query->bind_param('i', $responden_alumni_id);

        // execute query
        $query->execute();
    }

    public function count(){
        $count = $this->db->query("SELECT * FROM {$this->table}");
        return $count->num_rows;
    }
}
?>

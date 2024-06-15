<?php 
class ortu_form_model {
    public $db;
    protected $table = 't_responden_ortu';

    public function __construct(){
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, responden_tanggal, responden_jk, responden_umur, responden_hp, responden_pendidikan, responden_pekerjaan, responden_penghasilan, responden_nama, mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // binding parameter ke query, "i" berarti integer, "s" berarti string
        $query->bind_param('isssisssssss', $data['survey_id'], $data['responden_tanggal'], $data['responden_jk'], $data['responden_umur'], $data['responden_hp'], $data['responden_pendidikan'], $data['responden_pekerjaan'], $data['responden_penghasilan'], $data['responden_nama'], $data['mahasiswa_nim'], $data['mahasiswa_nama'], $data['mahasiswa_prodi']);
        
        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }

    public function getData(){
        // query untuk mengambil data dari tabel
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($responden_ortu_id){
        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_ortu_id = ?");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $responden_ortu_id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($responden_ortu_id, $data){
        // query untuk update data
        $query = $this->db->prepare("UPDATE {$this->table} SET survey_id = ?, responden_tanggal = ?, responden_jk = ?, responden_umur = ?, responden_hp = ?, responden_pendidikan = ?, responden_pekerjaan = ?, responden_penghasilan = ?, responden_nama = ?, mahasiswa_nim = ?, mahasiswa_nama = ?, mahasiswa_prodi = ? WHERE responden_ortu_id = ?");

        // binding parameter ke query
        $query->bind_param('isssisssssssi', $data['survey_id'], $data['responden_tanggal'], $data['responden_jk'], $data['responden_umur'], $data['responden_hp'], $data['responden_pendidikan'], $data['responden_pekerjaan'], $data['responden_penghasilan'], $data['responden_nama'], $data['mahasiswa_nim'], $data['mahasiswa_nama'], $data['mahasiswa_prodi'], $responden_ortu_id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($responden_ortu_id){
        // query untuk delete data
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE responden_ortu_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $responden_ortu_id);

        // eksekusi query
        $query->execute();
    }
}
?>

<?php
class Model_PerekamanB {
    private $table = 'barang';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllPerekaman() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPerekamanByKodeB($kodeB) {
       $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kodeB=:kodeB');
        $this->db->bind('kodeB', $kodeB);
        return $this->db->single();
    }
    
    public function tambahDataB($data, $Foto) {
        $query = "INSERT INTO $this->table (kodeB, namaB, foto) VALUES (:kodeB, :namaB, :foto)";
        
        $this->db->query($query);
        $this->db->bind('kodeB', $data['kodeB']);
        $this->db->bind('namaB', $data['namaB']);
        $this->db->bind('foto', $Foto); // Simpan nama file foto
        
        $this->db->execute();
        return $this->db->rowCount(); 
    }

    public function hapusDataB($kodeB){
        $query = "DELETE FROM barang WHERE kodeB=:kodeB";
        $this->db->query($query);
        $this->db->bind('kodeB', $kodeB);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataB()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM barang WHERE namaB LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
    // Fungsi untuk mengunggah foto
    public function unggahFoto() {
        $Foto = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        $tujuan = 'foto/' . $Foto;

        if (move_uploaded_file($tmpName, $tujuan)) {
            // Jika berhasil diunggah, kembalikan nama file asli
            return $Foto;
        } else {
            // Jika gagal diunggah, Anda dapat menangani kesalahan di sini
            return false;
        }
    }

    public function ubahDataB($data)
    {
        // Ambil data nama dan kode barang yang diubah
        $namaB = $data['namaB'];
        $kodeB = $data['kodeB'];

        // Ambil data foto lama
        $query = "SELECT foto FROM barang WHERE kodeB = :kodeB";
        $this->db->query($query);
        $this->db->bind('kodeB', $kodeB);
        $fotoLama = $this->db->single()['foto'];

        // Proses unggah foto baru
        if (!empty($_FILES['foto']['name'])) {
            // Hapus foto lama jika ada
            if (!empty($fotoLama)) {
                unlink('public/foto/' . $fotoLama);
            }
            // Menggunakan fungsi unggahFoto() yang sudah ada
            $fotoBaru = $this->unggahFoto();
        } else {
            $fotoBaru = $fotoLama; // Gunakan foto lama jika tidak ada foto yang diunggah
        }

        // Update data termasuk foto baru
        $query = "UPDATE barang SET kodeB = :kodeB, namaB = :namaB, foto = :foto WHERE kodeB = :kodeB";
        $this->db->query($query);
        $this->db->bind('kodeB', $data['kodeB']);
        $this->db->bind('namaB', $data['namaB']);
        $this->db->bind('foto', $fotoBaru); // Perbaikan di sini
        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>

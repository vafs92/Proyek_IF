<?php
class Model_PerekamanR {
    private $table = 'ruang';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPerekaman()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPerekamanByKodeR($kodeR)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kodeR=:kodeR');
        $this->db->bind('kodeR', $kodeR);
        return $this->db->single();
    }
    public function tambahDataR($data, $Foto)
    {
        $query = "INSERT INTO $this->table (kodeR, namaR, foto) VALUES (:kodeR, :namaR, :foto)";
        
        $this->db->query($query);
        $this->db->bind('kodeR', $data['kodeR']);
        $this->db->bind('namaR', $data['namaR']);
        $this->db->bind('foto', $Foto); // Simpan nama file foto
        
        $this->db->execute();
        return $this->db->rowCount(); 
    }
    public function hapusDataR($kodeR)
    {
        $query = "DELETE FROM ruang WHERE kodeR=:kodeR";
        $this->db->query($query);
        $this->db->bind('kodeR', $kodeR);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function cariDataR()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM ruang WHERE namaR LIKE :keyword";
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

    public function ubahDataR($data)
    {
        // Ambil data nama dan kode barang yang diubah
        $namaR = $data['namaR'];
        $kodeR = $data['kodeR'];

        // Ambil data foto lama
        $query = "SELECT foto FROM ruang WHERE kodeR = :kodeR";
        $this->db->query($query);
        $this->db->bind('kodeR', $kodeR);
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
        $query = "UPDATE ruang SET kodeR = :kodeR, namaR = :namaR, foto = :foto WHERE kodeR = :kodeR";
        $this->db->query($query);
        $this->db->bind('kodeR', $data['kodeR']);
        $this->db->bind('namaR', $data['namaR']);
        $this->db->bind('foto', $fotoBaru); // Perbaikan di sini
        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>

<!-- public function ubahDataR($data)
    {
        $query = "UPDATE ruang SET kodeR = :kodeR, namaR = :namaR WHERE kodeR = :kodeR";

        $this->db->query($query);
        $this->db->bind('kodeR', $data['kodeR']);
        $this->db->bind('namaR', $data['namaR']);

        $this->db->execute();

        return $this->db->rowCount();
    } -->

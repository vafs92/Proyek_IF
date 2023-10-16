<?php
class Detail extends Controller {
    public function show($kodeB) {
        $barangModel = $this->model('Model_PerekamanB');
        $barang = $barangModel->getPerekamanByKodeB($kodeB); // Menggunakan $barangModel yang telah didefinisikan

        // Load view detail dan kirim data barang ke dalamnya
        $this->view('detail/show', ['barang' => $barang]);
    }

    public function showR($kodeR) {
        $ruangModel = $this->model('Model_PerekamanR');
        $ruang = $ruangModel->getPerekamanByKodeR($kodeR); 

        $this->view('detail/showR', ['ruang' => $ruang]);
    }
}
?>

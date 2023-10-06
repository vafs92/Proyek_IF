<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('home/login');
    }

    public function indexLogin()
    {
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function login()
    {
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
        header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');

        // Mendapatkan data yang dikirimkan melalui form login
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Memanggil model USER untuk mendapatkan data USER berdasarkan USERname
        $userModel = $this->model('Model_User');
        $user = $userModel->getUSERByUSERnameAndPassword($username, $password);

        // Memeriksa apakah USER ditemukan dan passwordnya cocok
        if ($user && $password === $user['password']) {
            // Login berhasil, simpan data USER ke session atau sesuai kebutuhan
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];

            $user_detail = $userModel->getUserDetailAndRole($user['username']);
            $_SESSION['role'] = $user_detail['role'];

            // Memeriksa peran pengguna dan melakukan redirect
            if ($user_detail['role'] === 'MAHASISWA' || $user_detail['role'] === 'BIRO' || $user_detail['role'] === 'SEKRE') {
                
                header('Location: ' . BASEURL . '/home/indexLogin');
                exit;
            } else {
                // Peran tidak valid, tampilkan pesan error atau sesuai kebutuhan
                echo 'Peran pengguna tidak valid.';
            }
        } else {
            // Login gagal, tampilkan pesan error atau sesuai kebutuhan
            echo '<script>';
            echo 'alert("Username atau password salah.");';
            echo 'window.location.href = "' . BASEURL . '";';
            echo '</script>';
        }
    }
    public function logout()
    {
        // Menghapus data session
        $_SESSION['is_logged_in'] = false;
        session_unset();
        session_destroy();

        // Menghapus riwayat browser
        echo '<script>
			window.location.replace("' . BASEURL . '/home");
			window.onload = function() {
				window.history.replaceState({}, "", "' . BASEURL . '/home");
			};
		</script>';
    }
}

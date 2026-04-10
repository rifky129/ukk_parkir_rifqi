<?php
class AuthController extends Controller {
    public function index() {
        if (isset($_SESSION['user_parkir'])) {
            $this->redirect($_SESSION['user_parkir']['role'] . '/index');
        }
        $data['title'] = 'Login - Parkir APP';
        $this->view('templates/header', $data);
        $this->view('auth/login', $data);
        $this->view('templates/footer');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = $this->model('UserModel');
            $user = $userModel->getUserByUsername($username);

            if ($user && $password === $user['password']) {
                $_SESSION['user_parkir'] = [
                    'id_user' => $user['id_user'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                
                // Add log
                $this->model('LogModel')->insertLog($user['id_user'], 'Login sistem');

                $this->redirect($user['role'] . '/index');
            } else {
                $_SESSION['error'] = 'Username atau password salah atau akun tidak aktif!';
                $this->redirect('auth/index');
            }
        }
    }

    public function logout() {
        if(isset($_SESSION['user_parkir'])) {
            $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Logout sistem');
            unset($_SESSION['user_parkir']);
        }
        $this->redirect('auth/index');
    }

    public function register() {
        if (isset($_SESSION['user_parkir'])) {
            $this->redirect($_SESSION['user_parkir']['role'] . '/index');
        }
        $data['title'] = 'Register - Parkir APP';
        $this->view('templates/header', $data);
        $this->view('auth/register', $data);
        $this->view('templates/footer');
    }

    public function proses_register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama_lengkap' => trim($_POST['nama_lengkap']),
                'username' => trim($_POST['username']),
                'password' => $_POST['password'],
                'role' => 'petugas', // Default role untuk registrasi eksternal
                'status_aktif' => 1   // Akun langsung aktif
            ];

            // Cek apakah username sudah ada
            $userExist = $this->model('UserModel')->checkUsername($data['username']);
            if ($userExist) {
                $_SESSION['error'] = 'Username sudah terdaftar! Silakan gunakan username lain.';
                $this->redirect('auth/register');
                return;
            }

            if ($this->model('UserModel')->insertUser($data)) {
                $_SESSION['success'] = 'Registrasi berhasil! Silakan login dengan akun Anda.';
                $this->redirect('auth/index');
            } else {
                $_SESSION['error'] = 'Gagal melakukan registrasi sistem.';
                $this->redirect('auth/register');
            }
        } else {
            $this->redirect('auth/register');
        }
    }
}

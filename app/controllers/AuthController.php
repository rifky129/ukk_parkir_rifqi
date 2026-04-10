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
}

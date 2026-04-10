<?php
class UserController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'admin') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Kelola User';
        $data['users'] = $this->model('UserModel')->getAllUsers();
        
        $this->view('templates/header', $data);
        $this->view('templates/sidebar_admin');
        $this->view('admin/user/index', $data);
        $this->view('templates/footer_dashboard');
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('UserModel')->insertUser($_POST)) {
                $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Menambah user baru: ' . $_POST['username']);
                $this->redirect('user');
            }
        }
    }

    public function ubah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('UserModel')->updateUser($_POST)) {
                $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Mengubah data user: ' . $_POST['username']);
                $this->redirect('user');
            }
        }
    }

    public function hapus($id) {
        if ($this->model('UserModel')->deleteUser($id)) {
            $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Menghapus user ID: ' . $id);
            $this->redirect('user');
        }
    }
}

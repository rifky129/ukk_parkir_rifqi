<?php
class LogController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'admin') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Log Aktifitas';
        $data['logs'] = $this->model('LogModel')->getAllLogs();
        
        $this->view('templates/header', $data);
        $this->view('templates/sidebar_admin');
        $this->view('admin/log/index', $data);
        $this->view('templates/footer_dashboard');
    }
}

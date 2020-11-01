<?php
class Dashboard extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        cek_login();
    }

    public function index()
    {
        $model = $this->Dashboard_model;
        $data = [
            'title' => 'Dashboard',
            'admin' => $model->data_admin(),
            'kriteria' => $model->data_kriteria(),
            'laptop' => $model->data_laptop(),
            'nilai' => $model->data_nilai(),
            'judul' => 'Dashboard',
            'menu_aktif' => 'dashboard',
        ];
        $data['content'] = $this->load->view('admin/dashboard/dashboard_view', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }
}

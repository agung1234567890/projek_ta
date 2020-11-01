<?php
class Home extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data = [
            'menu_aktif' => 'home'
        ];
        $data['content'] = $this->load->view('user/home/home_view', $data, true);
        $this->load->view('layout/user/template.php', $data);
    }
}

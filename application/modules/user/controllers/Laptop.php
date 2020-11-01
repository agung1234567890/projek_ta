<?php
class Laptop extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $q = $this->input->get('q', true);
        // $this->db->group_start();
        $this->db->like('merk', $q);
        $this->db->or_like('harga', $q);
        $this->db->or_like('spesifikasi', $q);
        // $this->db->group_start();
        $data = [
            'menu_aktif' => 'laptop',
            'data_laptop' => $this->db->get('laptop')->result()

        ];
        $data['content'] = $this->load->view('user/laptop/laptop_view', $data, true);
        $this->load->view('layout/user/template.php', $data);
    }
    public function detail($id = null)
    {
        $data = $this->db->where('id_laptop', $id)->get('laptop')->row();
        if (empty($data)) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan');
            redirect('user/laptop');
        }

        $data = [
            'menu_aktif' => 'laptop',
            'data_laptop' => $data

        ];
        $data['content'] = $this->load->view('user/laptop/detail_laptop', $data, true);
        $this->load->view('layout/user/template.php', $data);
    }
}

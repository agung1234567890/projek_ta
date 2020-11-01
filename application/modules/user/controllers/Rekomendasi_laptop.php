<?php
class Rekomendasi_laptop extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rekomendasi_laptop_model');
    }

    public function index()
    {
        $model = $this->Rekomendasi_laptop_model;
        $data_normalisasi = $model->data_normalisasi();

        $data_v = [];
        $data_nilai = [];
        $data_rekomendasi = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('harga', 'harga', 'trim|required|is_natural');
            $this->form_validation->set_rules('ram', 'ram', 'trim|required|is_natural');
            $this->form_validation->set_rules('hdd', 'hdd', 'trim|required|is_natural');
            $this->form_validation->set_rules('processor', 'processor', 'trim|required|is_natural');
            // $this->form_validation->set_rules('baterai', 'baterai', 'trim|required|is_natural');
            $this->form_validation->set_rules('vga', 'vga', 'trim|required|is_natural');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('eror', validation_errors());

                redirect('user/rekomendasi_laptop');
            } else {
                foreach ($data_normalisasi as $k) {
                    $data_v[] = [
                        'id_laptop' => $k->id_laptop,
                        'harga' => $k->harga * $this->input->post('harga')/100,
                        'ram' => $k->ram * $this->input->post('ram')/100,
                        'hdd' => $k->hdd * $this->input->post('hdd')/100,
                        'processor' => $k->processor * $this->input->post('processor')/100,
                        // 'baterai' => $k->baterai * $this->input->post('baterai'),
                        'vga' => $k->vga * $this->input->post('vga')/100,
                    ];
                }
                foreach ($data_v as $k) {
                    $data_nilai[] = [
                        'id_laptop' => $k['id_laptop'],
                        'nilai' => $k['harga'] + $k['ram'] + $k['hdd'] + $k['processor'] + $k['vga']
                    ];
                }

                foreach ($data_nilai as $key => $value) {
                    $dat[$key] = $value['nilai'];
                }
                arsort($dat);
                foreach ($dat as $k) {
                    foreach ($data_nilai as $l) {

                        if ($k == $l['nilai']) {
                            $data_rekomendasi[] = $l;
                        }
                    }
                }
            }
        }
        $data_rekomendasi_final = [];
        foreach ($data_rekomendasi as $key) {
            if (!in_array($key,$data_rekomendasi_final)) {
                $data_rekomendasi_final[] = $key;
            }
        }

        $data = [
            'menu_aktif' => 'rekomendasi_laptop',
            'data_rekomendasi' => isset($data_rekomendasi_final) ? $data_rekomendasi_final : [],
            'data_nilai' => isset($data_nilai) ? $data_nilai : [],
        ];
        $data['content'] = $this->load->view('user/rekomendasi_laptop/rekomendasi_laptop_view', $data, true);
        $this->load->view('layout/user/template.php', $data);
    }
}

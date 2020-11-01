<?php
class Master_normalisasi extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_normalisasi_model');
        cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $per_page = intval($this->input->get('per_page'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/master_normalisasi/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/master_normalisasi/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/master_normalisasi/';
            $config['first_url'] = base_url() . 'admin/master_normalisasi/';
        }


        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $config['per_page'] = 10;               //Tes
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->Master_normalisasi_model->jumlah_data($q);
        $master_normalisasi = $this->Master_normalisasi_model->limit_data($config['per_page'], $per_page, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            'title' => 'Master Normalisasi',
            'judul' => 'Master Normalisasi',
            'menu_aktif' => 'master_normalisasi',
            'q' => '',
            'per_page' => $per_page,
            'data_master_normalisasi' => $master_normalisasi,
            'total_rows' => $config['total_rows'],
            'pagination' => $this->pagination->create_links(),
            'tombol_aktif' => 'master_normalisasi'
        );
        $data['content'] = $this->load->view('admin/master_normalisasi/master_normalisasi_view', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function hitung()
    {
        $this->db->empty_table('kelola_normalisasi');

        $model = $this->Master_normalisasi_model;
        $data_kriteria = $model->data_kriteria();
        $data_subkriteria = $model->data_subkriteria();

        // ------------------------------------------------------------------------
        $harga = 0;
        $ram = 0;
        $hdd = 0;
        $processor = 0;
        $vga = 0;
        // $baterai = 0;
        foreach ($data_subkriteria as $s) {
            // Harga
            if ($harga == 0) {
                $harga = $s->harga;
            } elseif ($harga > $s->harga) {
                $harga = $s->harga;
            }
            // RAM
            if ($ram == 0) {
                $ram = $s->ram;
            } elseif ($ram < $s->ram) {
                $ram = $s->ram;
            }
            // HDD
            if ($hdd == 0) {
                $hdd = $s->hdd;
            } elseif ($hdd < $s->hdd) {
                $hdd = $s->hdd;
            }
            // Processor
            if ($processor == 0) {
                $processor = $s->processor;
            } elseif ($processor < $s->processor) {
                $processor = $s->processor;
            }
            // Baterai
            // if ($baterai == 0) {
            //     $baterai = $s->baterai;
            // } elseif ($baterai < $s->baterai) {
            //     $baterai = $s->baterai;
            // }
            // VGA
            if ($vga == 0) {
                $vga = $s->vga;
            } elseif ($vga < $s->vga) {
                $vga = $s->vga;
            }
        }
        foreach ($data_subkriteria as $r) {
            $this->db->insert('kelola_normalisasi', [
                'id_laptop' => $r->id_laptop,
                'harga' => $harga / $r->harga,
                'ram' => $r->ram / $ram,
                'hdd' => $r->hdd / $hdd,
                'processor' => $r->processor / $processor,
                // 'baterai' => $r->baterai / $baterai,
                'vga' => $r->vga / $vga,
            ]);
        }

        // ------------------------------------------------------------------------


        // ------------------------------------------------------------------------



        $this->session->set_flashdata('berhasil', 'Berhasil menghitung');
        redirect('admin/master_normalisasi');
    }




    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kelola_normalisasi.xls";
        $judul = "kelola_normalisasi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Laptop");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga");
        xlsWriteLabel($tablehead, $kolomhead++, "Ram");
        xlsWriteLabel($tablehead, $kolomhead++, "Hdd");
        xlsWriteLabel($tablehead, $kolomhead++, "Processor");
        xlsWriteLabel($tablehead, $kolomhead++, "Resolusi");
        xlsWriteLabel($tablehead, $kolomhead++, "Baterai");
        xlsWriteLabel($tablehead, $kolomhead++, "Vga");
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

        foreach ($this->Master_normalisasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_laptop);
            xlsWriteLabel($tablebody, $kolombody++, $data->harga);
            xlsWriteLabel($tablebody, $kolombody++, $data->ram);
            xlsWriteLabel($tablebody, $kolombody++, $data->hdd);
            xlsWriteLabel($tablebody, $kolombody++, $data->processor);
            xlsWriteLabel($tablebody, $kolombody++, $data->resolusi);
            xlsWriteLabel($tablebody, $kolombody++, $data->baterai);
            xlsWriteLabel($tablebody, $kolombody++, $data->vga);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kelola_normalisasi.doc");

        $data = array(
            'kelola_normalisasi_data' => $this->Master_normalisasi_model->get_all(),
            'start' => 0
        );

        $this->load->view('admin/master_normalisasi/kelola_normalisasi_doc', $data);
    }
}

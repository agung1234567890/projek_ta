<?php
class Master_nilai extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_nilai_model');
        cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $per_page = intval($this->input->get('per_page'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/master_nilai/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/master_nilai/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/master_nilai/';
            $config['first_url'] = base_url() . 'admin/master_nilai/';
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
        $config['total_rows'] = $this->Master_nilai_model->jumlah_data($q);
        $master_nilai = $this->Master_nilai_model->limit_data($config['per_page'], $per_page, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            'title' => 'Master nilai',
            'judul' => 'Master nilai',
            'menu_aktif' => 'master_nilai',
            'q' => '',
            'per_page' => $per_page,
            'data_master_nilai' => $master_nilai,
            'total_rows' => $config['total_rows'],
            'pagination' => $this->pagination->create_links(),
            'tombol_aktif' => 'master_nilai',
            'menu_aktif' => 'master_nilai',
        );
        $data['content'] = $this->load->view('admin/master_nilai/master_nilai_view', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function detail($id_subkriteria = null)
    {
        $data_subkriteria = $this->db->where('id_subkriteria', $id_subkriteria)->get('kelola_subkriteria')->row();

        if (empty($data_subkriteria)) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan');
            redirect('admin/master_subkriteria');
        }
        $data = array(
            'title' => 'Detail Master Subkriteria',
            'judul' => 'Detail Master Subkriteria',
            'menu_aktif' => 'master_subkriteria',
            'tombol_aktif' => 'master_subkriteria',
            'menu_aktif' => 'master_nilai',
            'nama_subkriteria' => $data_subkriteria->nama_subkriteria,
            'nilai' => $data_subkriteria->nilai,
            'keterangan' => $data_subkriteria->keterangan,
        );

        $data['content'] = $this->load->view('admin/master_nilai/detail_master_nilai', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'Tambah Master nilai',
            'judul' => 'Tambah Master nilai',
            'menu_aktif' => 'master_nilai',
            'action' => site_url('admin/Master_nilai/tambah_action'),
            'button' => 'Tambah',
            'menu_aktif' => 'master_nilai',
            'data_laptop' => $this->db->get('laptop')->result(),
            // 'id_laptop' => set_value('id_laptop', ''),
            'merk' => set_value('merk', ''),
            'harga' => set_value('harga', ''),
            'ram' => set_value('ram', ''),
            'hdd' => set_value('hdd', ''),
            'processor' => set_value('processor', ''),
            'resousi' => set_value('resousi', ''),
            // 'baterai' => set_value('baterai', ''),
            'vga' => set_value('vga', ''),
        ];
        $data['content'] = $this->load->view('admin/master_nilai/form_master_nilai', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function tambah_action()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_rules();

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('gagal', 'Validasi salah');
                $this->tambah();
            } else {
                $merk = $this->input->post('merk_laptop');
                $harga = $this->input->post('harga');
                $ram = $this->input->post('ram');
                $hdd = $this->input->post('hdd');
                $processor = $this->input->post('processor');
                // $baterai = $this->input->post('baterai');
                $vga = $this->input->post('vga');

                // ------------------------------------------------------------------------
                $data = [
                    'id_laptop' => $merk,
                    'harga' => $harga,
                    'ram' => $ram,
                    'hdd' => $hdd,
                    'processor' => $processor,
                    // 'baterai' => $baterai,
                    'vga' => $vga
                ];
                // ------------------------------------------------------------------------
                $this->db->insert('kelola_subkriteria', $data);
                $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan');
                redirect('admin/master_nilai');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data Tidak Ditemukan');
            redirect('admin/master_nilai');
        }
    }

    public function ubah($id_subkriteria = null)
    {

        $data_subkriteria = $this->db->where('id_subkriteria', $id_subkriteria)->get('kelola_subkriteria')->row();

        if (empty($data_subkriteria)) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan');
            redirect('admin/master_nilai');
        }

        $data = [
            'title' => 'Ubah Master nilai',
            'judul' => 'Ubah Master nilai',
            'menu_aktif' => 'master_nilai',
            'action' => site_url('admin/master_nilai/ubah_action/' . $id_subkriteria),
            'button' => 'Ubah',
            // 'data_kriteria' => $this->db->get('kelola_kriteria')->result(),
            // 'id_kriteria' => set_value('id_kriteria', $data_subkriteria->id_kriteria),
            'data_laptop' => $this->db->get('laptop')->result(),
            'merk' => set_value('merk', $data_subkriteria->id_laptop),
            'harga' => set_value('harga', $data_subkriteria->harga),
            'ram' => set_value('ram', $data_subkriteria->ram),
            'hdd' => set_value('hdd', $data_subkriteria->hdd),
            'processor' => set_value('processor', $data_subkriteria->processor),
            // 'baterai' => set_value('baterai', $data_subkriteria->baterai),
            'vga' => set_value('vga', $data_subkriteria->vga),
        ];
        $data['content'] = $this->load->view('admin/master_nilai/form_master_nilai', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function ubah_action($id_subkriteria = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_rules();

            if ($this->form_validation->run() == false) {
                $this->tambah();
            } else {
                // $nama_subkriteria = $this->input->post('nama_subkriteria');
                // $id_kriteria = $this->input->post('id_kriteria');
                // $nilai = $this->input->post('nilai');

                $merk = $this->input->post('merk_laptop');
                $harga = $this->input->post('harga');
                $ram = $this->input->post('ram');
                $hdd = $this->input->post('hdd');
                $processor = $this->input->post('processor');
                // $baterai = $this->input->post('baterai');
                $vga = $this->input->post('vga');




                // ------------------------------------------------------------------------
                $data = [
                    'id_laptop' => $merk,
                    'harga' => $harga,
                    'ram' => $ram,
                    'hdd' => $hdd,
                    'processor' => $processor,
                    // 'baterai' => $baterai,
                    'vga' => $vga
                    // 'id_kriteria' => $id_kriteria,
                    // 'nilai' => $nilai,
                    // 'keterangan' => $keterangan
                ];
                // ------------------------------------------------------------------------


                $this->db->where('id_subkriteria', $id_subkriteria)->update('kelola_subkriteria', $data);

                $this->session->set_flashdata('berhasil', 'Data berhasil diubah');
                redirect('admin/master_nilai');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data Tidak Ditemukan');
            redirect('admin/master_nilai');
        }
    }

    public function hapus($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('gagal', 'data tidak ditemukan');
            redirect('admin/master_nilai');
        }
        $cek = $this->db->where('id_subkriteria', $id)->delete('kelola_subkriteria');
        if ($cek) {
            $this->session->set_flashdata('berhasil', 'berhasil menghapus data');
            redirect('admin/master_nilai');
        } else {
            $this->session->set_flashdata('gagal', 'gagal menghapus data');
            redirect('admin/master_nilai');
        }
    }
    function _rules()
    {
        $this->form_validation->set_rules('merk_laptop', 'merk laptop', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required|is_natural');
        $this->form_validation->set_rules('ram', 'ram', 'trim|required');
        $this->form_validation->set_rules('hdd', 'hdd', 'trim|required');
        $this->form_validation->set_rules('processor', 'processor', 'trim|required');
        // $this->form_validation->set_rules('baterai', 'baterai', 'trim|required');
        $this->form_validation->set_rules('vga', 'vga', 'trim|required');

        $this->form_validation->set_error_delimiters('<br><span class="text-red">*', '</span>');
    }


    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "master_nilai.xls";
        $judul = "master_nilai";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Vga");
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

        foreach ($this->Master_nilai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_laptop);
            xlsWriteLabel($tablebody, $kolombody++, $data->harga);
            xlsWriteLabel($tablebody, $kolombody++, $data->ram);
            xlsWriteLabel($tablebody, $kolombody++, $data->hdd);
            xlsWriteLabel($tablebody, $kolombody++, $data->processor);
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
        header("Content-Disposition: attachment;Filename=master_nilai.doc");

        $data = array(
            'kelola_subkriteria_data' => $this->Master_nilai_model->get_all(),
            'start' => 0
        );

        $this->load->view('admin/master_nilai/kelola_subkriteria_doc', $data);
    }
}

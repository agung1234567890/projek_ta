<?php
class Master_kriteria extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_kriteria_model');
        cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $per_page = intval($this->input->get('per_page'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/master_kriteria/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/master_kriteria/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/master_kriteria/';
            $config['first_url'] = base_url() . 'admin/master_kriteria/';
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
        $config['total_rows'] = $this->Master_kriteria_model->jumlah_data($q);
        $master_kriteria = $this->Master_kriteria_model->limit_data($config['per_page'], $per_page, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            'title' => 'Master kriteria',
            'judul' => 'Master kriteria',
            'menu_aktif' => 'master_kriteria',
            'q' => '',
            'per_page' => $per_page,
            'data_master_kriteria' => $master_kriteria,
            'total_rows' => $config['total_rows'],
            'pagination' => $this->pagination->create_links(),
            'tombol_aktif' => 'master_kriteria',
            'menu_aktif' => 'master_kriteria',
        );
        $data['content'] = $this->load->view('admin/master_kriteria/master_kriteria_view', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function detail($id_kriteria = null)
    {
        $data_kriteria = $this->db->where('id_kriteria', $id_kriteria)->get('kelola_kriteria')->row();

        if (empty($data_kriteria)) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan');
            redirect('admin/master_kriteria');
        }
        $data = array(
            'title' => 'Detail Master Kriteria',
            'judul' => 'Detail Master Kriteria',
            'menu_aktif' => 'master_kriteria',
            'tombol_aktif' => 'master_kriteria',
            'menu_aktif' => 'master_kriteria',
            'nama_kriteria' => $data_kriteria->nama_kriteria,
            'atribut_kriteria' => $data_kriteria->atribut_kriteria,
        );

        $data['content'] = $this->load->view('admin/master_kriteria/detail_master_kriteria', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'Tambah Master Kriteria',
            'judul' => 'Tambah Master Kriteria',
            'menu_aktif' => 'master_kriteria',
            'action' => site_url('admin/master_kriteria/tambah_action'),
            'button' => 'Tambah',
            'nama_kriteria' => set_value('nama_kriteria', ''),
            'atribut_kriteria' => set_value('atribut_kriteria', ''),
        ];
        $data['content'] = $this->load->view('admin/master_kriteria/form_master_kriteria', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function tambah_action()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_rules();

            if ($this->form_validation->run() == false) {
                $this->tambah();
            } else {
                $nama_kriteria = $this->input->post('nama_kriteria');
                $atribut_kriteria = $this->input->post('atribut_kriteria');

                // ------------------------------------------------------------------------
                $data = [
                    'nama_kriteria' => $nama_kriteria,
                    'atribut_kriteria' => $atribut_kriteria,
                ];
                // ------------------------------------------------------------------------

                $this->db->insert('kelola_kriteria', $data);

                $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan');
                redirect('admin/master_kriteria');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data Tidak Ditemukan');
            redirect('admin/master_kriteria');
        }
    }

    public function ubah($id_kriteria = null)
    {

        $data_kriteria = $this->db->where('id_kriteria', $id_kriteria)->get('kelola_kriteria')->row();

        if (empty($data_kriteria)) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan');
            redirect('admin/master_kriteria');
        }

        $data = [
            'title' => 'Ubah Master Kriteria',
            'judul' => 'Ubah Master Kriteria',
            'menu_aktif' => 'master_kriteria',
            'action' => site_url('admin/master_kriteria/ubah_action/' . $id_kriteria),
            'button' => 'Ubah',
            'nama_kriteria' => set_value('nama_kriteria', $data_kriteria->nama_kriteria),
            'atribut_kriteria' => set_value('atribut_kriteria', $data_kriteria->atribut_kriteria),
        ];
        $data['content'] = $this->load->view('admin/master_kriteria/form_master_kriteria', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function ubah_action($id_kriteria = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_rules();

            if ($this->form_validation->run() == false) {
                $this->tambah();
            } else {
                $nama_kriteria = $this->input->post('nama_kriteria');
                $atribut_kriteria = $this->input->post('atribut_kriteria');

                // ------------------------------------------------------------------------
                $data = [
                    'nama_kriteria' => $nama_kriteria,
                    'atribut_kriteria' => $atribut_kriteria,
                ];
                // ------------------------------------------------------------------------


                $this->db->where('id_kriteria', $id_kriteria)->update('kelola_kriteria', $data);

                $this->session->set_flashdata('berhasil', 'Data berhasil diubah');
                redirect('admin/master_kriteria');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data Tidak Ditemukan');
            redirect('admin/master_kriteria');
        }
    }

    public function hapus($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('gagal', 'Data Tidak Ditemukan');
            redirect('admin/master_kriteria');
        }

        $cek = $this->db->where('id_kriteria', $id)->delete('kelola_kriteria');
        if ($cek) {
            $this->session->set_flashdata('berhasil', 'Berhasil menghapus data');
            redirect('admin/master_kriteria');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menghapus data');
            redirect('admin/master_kriteria');
        }
    }

    function _rules()
    {
        $this->form_validation->set_rules('nama_kriteria', 'nama kriteria', 'trim|required');
        $this->form_validation->set_rules('atribut_kriteria', 'atribut kriteria', 'trim|required');

        $this->form_validation->set_error_delimiters('<br><span class="text-red">*', '</span>');
    }


    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kelola_kriteria.xls";
        $judul = "kelola_kriteria";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Kriteria");
        xlsWriteLabel($tablehead, $kolomhead++, "Atribut Kriteria");
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

        foreach ($this->Master_kriteria_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_kriteria);
            xlsWriteLabel($tablebody, $kolombody++, $data->atribut_kriteria);
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
        header("Content-Disposition: attachment;Filename=kelola_kriteria.doc");

        $data = array(
            'kelola_kriteria_data' => $this->Master_kriteria_model->get_all(),
            'start' => 0
        );

        $this->load->view('admin/master_kriteria/kelola_kriteria_doc', $data);
    }
}

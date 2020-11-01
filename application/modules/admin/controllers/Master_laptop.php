<?php
class Master_laptop extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_laptop_model');
        cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $per_page = intval($this->input->get('per_page'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/master_laptop/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/master_laptop/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/master_laptop/';
            $config['first_url'] = base_url() . 'admin/master_laptop/';
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
        $config['total_rows'] = $this->Master_laptop_model->jumlah_data($q);
        $master_laptop = $this->Master_laptop_model->limit_data($config['per_page'], $per_page, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            'title' => 'Master Laptop',
            'judul' => 'Master Laptop',
            'menu_aktif' => 'master_laptop',
            'q' => '',
            'per_page' => $per_page,
            'data_master_laptop' => $master_laptop,
            'total_rows' => $config['total_rows'],
            'pagination' => $this->pagination->create_links(),
            'tombol_aktif' => 'master_laptop',
            'menu_aktif' => 'master_laptop',
        );
        $data['content'] = $this->load->view('admin/master_laptop/master_laptop_view', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function detail($id_laptop = null)
    {
        $data_laptop = $this->db->where('id_laptop', $id_laptop)->get('laptop')->row();

        if (empty($data_laptop)) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan');
            redirect('admin/master_laptop');
        }
        $data = array(
            'title' => 'Detail Master Laptop',
            'judul' => 'Detail Master Laptop',
            'menu_aktif' => 'master_laptop',
            'tombol_aktif' => 'master_laptop',
            'menu_aktif' => 'master_laptop',
            'merk_laptop' => $data_laptop->merk,
            'harga_laptop' => $data_laptop->harga,
            'spesifikasi_laptop' => $data_laptop->spesifikasi,
            'gambar' => $data_laptop->gambar,
        );

        $data['content'] = $this->load->view('admin/master_laptop/detail_master_laptop', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'Tambah Master Laptop',
            'judul' => 'Tambah Master Laptop',
            'menu_aktif' => 'master_laptop',
            'action' => site_url('admin/master_laptop/tambah_action'),
            'button' => 'Tambah',
            'merk_laptop' => set_value('merk_laptop', ''),
            'harga_laptop' => set_value('harga_laptop', ''),
            'spesifikasi_laptop' => set_value('spesifikasi_laptop', ''),
            'gambar' => set_value('gambar', ''),
        ];
        $data['content'] = $this->load->view('admin/master_laptop/form_master_laptop', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function tambah_action()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_rules();

            if ($this->form_validation->run() == false) {
                $this->tambah();
            } else {
                $merk_laptop = $this->input->post('merk_laptop');
                $harga_laptop = $this->input->post('harga_laptop');
                $spesifikasi_laptop = $this->input->post('spesifikasi_laptop');

                // ------------------------------------------------------------------------
                $data = [
                    'merk' => $merk_laptop,
                    'harga' => $harga_laptop,
                    'spesifikasi' => $spesifikasi_laptop,
                ];
                // ------------------------------------------------------------------------


                $config['upload_path'] = './assets/foto/';
                $config['file_name'] = date('ymdhis') . $_FILES['foto']['name'];
                $config['allowed_types'] = 'gif|jpg|png';
                // ------------------------------------------------------------------------
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $data['gambar'] = $this->upload->data('file_name');
                    $this->db->insert('laptop', $data);

                    $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan');
                    redirect('admin/master_laptop');
                } else {
                    $this->session->set_flashdata('gagal', 'Gagal upload foto');
                    $this->tambah();
                }
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data Tidak Ditemukan');
            redirect('admin/master_laptop');
        }
    }

    public function ubah($id_laptop = null)
    {

        $data_laptop = $this->db->where('id_laptop', $id_laptop)->get('laptop')->row();

        if (empty($data_laptop)) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan');
            redirect('admin/master_laptop');
        }

        $data = [
            'title' => 'Ubah Master Laptop',
            'judul' => 'Ubah Master Laptop',
            'menu_aktif' => 'master_laptop',
            'action' => site_url('admin/master_laptop/ubah_action/' . $id_laptop),
            'button' => 'Ubah',
            'merk_laptop' => set_value('merk_laptop', $data_laptop->merk),
            'harga_laptop' => set_value('harga_laptop', $data_laptop->harga),
            'spesifikasi_laptop' => set_value('spesifikasi_laptop', $data_laptop->spesifikasi),
            'gambar' => set_value('gambar', $data_laptop->gambar),
        ];
        $data['content'] = $this->load->view('admin/master_laptop/form_master_laptop', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function ubah_action($id_laptop = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_rules();

            if ($this->form_validation->run() == false) {
                $this->tambah();
            } else {
                $merk_laptop = $this->input->post('merk_laptop');
                $harga_laptop = $this->input->post('harga_laptop');
                $spesifikasi_laptop = $this->input->post('spesifikasi_laptop');

                // ------------------------------------------------------------------------
                $data = [
                    'merk' => $merk_laptop,
                    'harga' => $harga_laptop,
                    'spesifikasi' => $spesifikasi_laptop
                ];
                // ------------------------------------------------------------------------


                $config['upload_path'] = './assets/foto/';
                $config['file_name'] = date('ymdhis') . $_FILES['foto']['name'];
                $config['allowed_types'] = 'gif|jpg|png';
                // ------------------------------------------------------------------------
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $data['gambar'] = $this->upload->data('file_name');
                }
                $this->db->where('id_laptop', $id_laptop)->update('laptop', $data);

                $this->session->set_flashdata('berhasil', 'Data berhasil diubah');
                redirect('admin/master_laptop');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data Tidak Ditemukan');
            redirect('admin/master_laptop');
        }
    }
    public function hapus($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('gagal', 'data tidak ditemukan');
            redirect('admin/master_laptop');
        }
        $cek = $this->db->where('id_laptop', $id)->delete('laptop');
        if ($cek) {
            $this->session->set_flashdata('berhasil', 'berhasil menghapus data');
            redirect('admin/master_laptop');
        } else {
            $this->session->set_flashdata('gagal', 'gagal menghapus data');
            redirect('admin/master_laptop');
        }
    }

    function _rules()
    {
        $this->form_validation->set_rules('merk_laptop', 'merk laptop', 'trim|required');
        $this->form_validation->set_rules('harga_laptop', 'harga laptop', 'trim|required|is_natural');
        $this->form_validation->set_rules('spesifikasi_laptop', 'spesifikasi laptop', 'trim|required');

        $this->form_validation->set_error_delimiters('<br><span class="text-red">*', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "laptop.xls";
        $judul = "laptop";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Merk");
        xlsWriteLabel($tablehead, $kolomhead++, "harga");
        xlsWriteLabel($tablehead, $kolomhead++, "Spesifikasi");
        xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

        foreach ($this->Master_laptop_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->merk);
            xlsWriteLabel($tablebody, $kolombody++, $data->harga);
            xlsWriteLabel($tablebody, $kolombody++, $data->spesifikasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
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
        header("Content-Disposition: attachment;Filename=laptop.doc");

        $data = array(
            'laptop_data' => $this->Master_laptop_model->get_all(),
            'start' => 0
        );

        $this->load->view('admin/master_laptop/laptop_doc', $data);
    }
    public function cetak_pdf()
    {
        $data = [
            'data_laptop'=>$this->db->get('laptop')->result()
        ];
        $this->load->view('admin/master_laptop/cetak_pdf',$data);
    }
}

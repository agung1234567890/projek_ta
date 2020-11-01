<?php
class Master_admin extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_admin_model');
        cek_login();
    }

    public function index()
    {
        $this->detail($this->session->userdata('id_admin'));
        // $q = urldecode($this->input->get('q', true));
        // $per_page = intval($this->input->get('per_page'));

        // if ($q <> '') {
        //     $config['base_url'] = base_url() . 'admin/master_admin/?q=' . urlencode($q);
        //     $config['first_url'] = base_url() . 'admin/master_admin/?q=' . urlencode($q);
        // } else {
        //     $config['base_url'] = base_url() . 'admin/master_admin/';
        //     $config['first_url'] = base_url() . 'admin/master_admin/';
        // }


        // $config['first_link'] = 'First';
        // $config['last_link'] = 'Last';
        // $config['next_link'] = 'Next';
        // $config['prev_link'] = 'Prev';
        // $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        // $config['full_tag_close'] = '</ul></nav></div>';
        // $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['num_tag_close'] = '</span></li>';
        // $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        // $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        // $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['prev_tagl_close'] = '</span>Next</li>';
        // $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['first_tagl_close'] = '</span></li>';
        // $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['last_tagl_close'] = '</span></li>';

        // $config['per_page'] = 10;               //Tes
        // $config['page_query_string'] = true;
        // $config['total_rows'] = $this->Master_admin_model->jumlah_data($q);
        // $master_admin = $this->Master_admin_model->limit_data($config['per_page'], $per_page, $q);

        // $this->load->library('pagination');
        // $this->pagination->initialize($config);
        // $data = array(
        //     'title' => 'Master Admin',
        //     'judul' => 'Master Admin',
        //     'menu_aktif' => 'master_admin',
        //     'q' => '',
        //     'per_page' => $per_page,
        //     'data_master_admin' => $master_admin,
        //     'total_rows' => $config['total_rows'],
        //     'pagination' => $this->pagination->create_links(),
        //     'tombol_aktif' => 'master_admin',
        //     'menu_aktif' => 'master_admin',
        // );
        // $data['content'] = $this->load->view('admin/master_admin/master_admin_view', $data, true);
        // $this->load->view('layout/admin/template.php', $data);
    }

    public function detail($id_admin = null)
    {
        $data_admin = $this->db->where('id_admin', $id_admin)->get('admin')->row();

        if (empty($data_admin)) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan');
            redirect('admin/master_admin');
        }
        $data = array(
            'title' => 'Detail Admin',
            'judul' => 'Detail Admin',
            'menu_aktif' => 'master_admin',
            'tombol_aktif' => 'master_admin',
            'menu_aktif' => 'master_admin',
            'nama_admin' => $data_admin->nama_admin,
            'username' => $data_admin->username,
            'foto' => $data_admin->foto,
        );

        $data['content'] = $this->load->view('admin/master_admin/detail_master_admin', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'Tambah Admin',
            'judul' => 'Tambah Admin',
            'menu_aktif' => 'master_admin',
            'action' => site_url('admin/master_admin/tambah_action'),
            'button' => 'Tambah',
            'nama_admin' => set_value('nama_admin', ''),
            'username' => set_value('username', ''),
            'password' => set_value('password', ''),
            'foto' => set_value('foto', ''),
        ];
        $data['content'] = $this->load->view('admin/master_admin/form_master_admin', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function tambah_action()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_rules();

            if ($this->form_validation->run() == false) {
                $this->tambah();
            } else {
                $nama_admin = $this->input->post('nama_admin');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                // ------------------------------------------------------------------------
                $data = [
                    'nama_admin' => $nama_admin,
                    'username' => $username,
                    'password' => $password,
                ];
                // ------------------------------------------------------------------------


                $config['upload_path'] = './assets/foto/';
                $config['file_name'] = date('ymdhis') . $_FILES['foto']['name'];
                $config['allowed_types'] = 'gif|jpg|png';
                // ------------------------------------------------------------------------
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $data['foto'] = $this->upload->data('file_name');
                    $this->db->insert('admin', $data);

                    $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan');
                    redirect('admin/master_admin');
                } else {
                    $this->session->set_flashdata('gagal', 'Gagal upload foto');
                    $this->tambah();
                }
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data Tidak Ditemukan');
            redirect('admin/master_admin');
        }
    }

    public function ubah($id_admin = null)
    {

        $data_admin = $this->db->where('id_admin', $id_admin)->get('admin')->row();

        if (empty($data_admin)) {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan');
            redirect('admin/master_admin');
        }

        $data = [
            'title' => 'Ubah Admin',
            'judul' => 'Ubah Admin',
            'menu_aktif' => 'master_admin',
            'action' => site_url('admin/master_admin/ubah_action/' . $id_admin),
            'button' => 'Ubah',
            'nama_admin' => set_value('nama_admin', $data_admin->nama_admin),
            'username' => set_value('username', $data_admin->username),
            'password' => set_value('password', ''),
            'foto' => set_value('foto', $data_admin->foto),
        ];
        $data['content'] = $this->load->view('admin/master_admin/form_master_admin', $data, true);
        $this->load->view('layout/admin/template.php', $data);
    }

    public function ubah_action($id_admin = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_rules();

            if ($this->form_validation->run() == false) {
                $this->ubah();
            } else {
                $nama_admin = $this->input->post('nama_admin');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                // ------------------------------------------------------------------------
                $data = [
                    'nama_admin' => $nama_admin,
                    'username' => $username,
                ];

                if (!empty($password)) {
                    if (strlen($password) < 6) {
                        $this->session->set_flashdata('gagal', 'Password harus lebih dari sama dengan 6');
                        redirect('admin/master_admin/ubah/' . $id_admin);
                    } else {
                        $data['password'] = md5($password);
                    }
                }
                // ------------------------------------------------------------------------


                $config['upload_path'] = './assets/foto/';
                $config['file_name'] = date('ymdhis') . $_FILES['foto']['name'];
                $config['allowed_types'] = 'gif|jpg|png';
                // ------------------------------------------------------------------------
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $data['foto'] = $this->upload->data('file_name');
                }
                $this->db->where('id_admin', $id_admin)->update('admin', $data);

                $this->session->set_flashdata('berhasil', 'Data berhasil diubah');
                redirect('admin/master_admin');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data Tidak Ditemukan');
            redirect('admin/master_admin');
        }
    }
    public function hapus($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('gagal', 'data tidak ditemukan');
            redirect('admin/master_admin');
        }
        $cek = $this->db->where('id_admin', $id)->delete('admin');
        if ($cek) {
            $this->session->set_flashdata('berhasil', 'berhasil menghapus data');
            redirect('admin/master_admin');
        } else {
            $this->session->set_flashdata('gagal', 'gagal menghapus data');
            redirect('admin/master_admin');
        }
    }

    function _rules()
    {
        $this->form_validation->set_rules('nama_admin', 'nama', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        // $this->form_validation->set_rules('password', 'password', 'trim|required');

        $this->form_validation->set_error_delimiters('<br><span class="text-red">*', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "admin.xls";
        $judul = "admin";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Admin");
        xlsWriteLabel($tablehead, $kolomhead++, "Email");
        xlsWriteLabel($tablehead, $kolomhead++, "Username");
        xlsWriteLabel($tablehead, $kolomhead++, "Password");
        xlsWriteLabel($tablehead, $kolomhead++, "Foto");
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

        foreach ($this->Master_admin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_admin);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteLabel($tablebody, $kolombody++, $data->username);
            xlsWriteLabel($tablebody, $kolombody++, $data->password);
            xlsWriteLabel($tablebody, $kolombody++, $data->foto);
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
        header("Content-Disposition: attachment;Filename=admin.doc");

        $data = array(
            'admin_data' => $this->Master_admin_model->get_all(),
            'start' => 0
        );

        $this->load->view('admin/master_admin/admin_doc', $data);
    }
}

<?php
class Login extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }
    public function index()
    {
        if ($this->session->userdata('id_admin')) {
            redirect('admin/dashboard');
        }
        $this->load->view('admin/login/template/header');
        $this->load->view('admin/login/auth/login');
        $this->load->view('admin/login/template/footer');
    }
    public function register()
    {
        $this->load->view('admin/login/template/header');
        $this->load->view('admin/login/auth/registrasi');
        $this->load->view('admin/login/template/footer');
    }
    public function auth($cap = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $captcha = $this->input->post('captcha');

            $data = $this->db->where('username', $username)->get('admin')->row();
            if (empty($data)) {
                $this->session->set_flashdata('gagal', 'Username tidak ditemukan');
                redirect('admin/login');
            } elseif (md5($password) != $data->password) {
                $this->session->set_flashdata('gagal', 'Password salah');
                redirect('admin/login');
            } elseif (md5($captcha) != $cap) {
                $this->session->set_flashdata('gagal', 'Captcha salah');
                redirect('admin/login');
            }

            $array = array(
                'id_admin' => $data->id_admin,
                'username' => $data->username,
                'username' => $data->username,
            );

            $this->session->set_userdata($array);

            redirect('admin/dashboard');
        } else {
            redirect('admin/login');
        }
    }

    public function register_action()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('nama', 'nama', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[admin.email]');
            $this->form_validation->set_rules('username', 'username', 'trim|required|alpha_numeric|is_unique[admin.username]');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|min_length[6]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('eror', validation_errors());
                $this->register();
            } else {
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $confirm_password = $this->input->post('confirm_password');

                if ($password <> $confirm_password) {
                    $this->session->set_flashdata('eror', 'Password dan konfirmasi password tidak sama');
                    $this->register();
                } else {
                    $object = [
                        'nama_admin' => $nama,
                        'email' => $email,
                        'username' => $username,
                        'password' => md5($password)
                    ];
                    $this->db->insert('admin', $object);
                    $this->session->set_flashdata('berhasil', 'Berhasil register. Silahkan login');
                    redirect('admin/login');
                }
            }
        } else {
            redirect('admin/register');
        }
    }

    public function lupapassword()
    {
        $this->load->view('admin/login/template/header');
        $this->load->view('admin/login/auth/lupapassword');
        $this->load->view('admin/login/template/footer');
    }

    public function lupapassword_action()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->db->where('email', $this->input->post('email'))->get('admin')->row();
            if (empty($data)) {
                $this->session->set_flashdata('eror', 'Data tidak ditemukan');
                die();
                echo $this->input->post('email');
                redirect('admin/login/lupapassword');
            }



            // Konfigurasi email
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => EMAIL_HOST,
                'smtp_user' => EMAIL_USER,  // Email gmail
                'smtp_pass'   => EMAIL_PASS,  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);

            // Email dan nama pengirim
            $this->email->from($config['smtp_user']);

            // Email penerima
            $this->email->to($data->email);


            // Subject email
            $this->email->subject('Lupa password');

            // Isi email
            $this->email->message("Klik disini untuk ubah password " . site_url('admin/login/ganti_password/' . $data->id_admin));

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $this->session->set_flashdata('berhasil', 'Silahkan cek email anda');
                redirect('admin/login');
            } else {
                $this->session->set_flashdata('eror', 'Gagal kirim email');
                redirect('admin/login/lupapassword');
            }
        } else {
            redirect('admin/login/lupapassword');
        }
    }


    public function ganti_password($id = null)
    {
        $data = $this->db->where('id_admin', $id)->get('admin')->row();
        if (empty($data)) {
            $this->session->set_flashdata('eror', 'Data tidak ditemukan');
            redirect('admin/login/lupapassword');
        }

        $this->load->view('admin/login/template/header');
        $this->load->view('admin/login/auth/gantipassword', ['id' => $id]);
        $this->load->view('admin/login/template/footer');
    }

    public function ganti_password_action($id = null)
    {
        $data = $this->db->where('id_admin', $id)->get('admin')->row();
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        if (empty($data)) {
            $this->session->set_flashdata('eror', 'Data tidak ditemukan');
            redirect('admin/login/lupapassword');
        } elseif ($password <> $confirm_password) {
            $this->session->set_flashdata('eror', 'Password tidak sama dengan confirm password');
            redirect('admin/login/ganti_password/' . $id);
        } else {
            $object = [
                'password' => md5($password),
            ];
            $this->db->where('id_admin', $id)->update('admin', $object);
            $this->session->set_flashdata('berhasil', 'Password berhasil diubah');
            redirect('admin/login/');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}

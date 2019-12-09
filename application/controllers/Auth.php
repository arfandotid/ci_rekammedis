<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom <b><i>%s</i></b> tidak boleh kosong');
    }

    private function _validate()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
    }

    private function _check_login()
    {
        if ($this->session->has_userdata('user')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_check_login();
        $data['title'] = "Login - Rekam Medis";

        $this->_validate();
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login', $data);
        } else {
            // Tangkap data dari input
            $input = $this->input->post(null, true);
            $username = $input['username'];
            $password = $input['password'];

            // Ambil data dari database
            $where = ['username' => $username];
            $user = $this->MainModel->get_where('user', $where);

            // Cek Username
            if ($user) {
                // Cek Password
                if (password_verify($password, $user->password)) {
                    if ($user->active == 1) {
                        $session = [
                            'user' => $user
                        ];
                        $this->session->set_userdata($session);
                        redirect('dashboard');
                    } else {
                        setMsg("danger", "Akun anda non-aktif. Silahkan hubungi admin.");
                        redirect('auth');
                    }
                } else {
                    setMsg("danger", "Password salah!");
                    redirect('auth');
                }
            } else {
                setMsg("danger", "Username tidak terdaftar");
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');

        redirect('login');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

        // Jika bukan admin block
        is_role(2, true);
    }

    public function index()
    {
        $data['title'] = "Data Pasien";
        $data['pasien'] = $this->MainModel->get('pasien');
        template_view('pasien/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('namaPasien', 'Nama Pasien', 'required|trim');
        $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('noTelp', 'Nomor Telepon', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    }

    public function add()
    {
        $data['title'] = "Tambah Data Pasien";

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('pasien/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $this->MainModel->insert('pasien', $input);
            redirect('pasien');
        }
    }

    public function edit($pasienId)
    {
        $id = encode_php_tags($pasienId);
        $data['title'] = "Edit Data Pasien";
        $data['pasien'] = $this->MainModel->get_where('pasien', ['idPasien' => $id]);

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('pasien/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $this->MainModel->update('pasien', $input, ['idPasien' => $id]);
            redirect('pasien');
        }
    }

    public function delete($pasienId)
    {
        $id = encode_php_tags($pasienId);
        $this->MainModel->delete('pasien', ['idPasien' => $id]);
        redirect('pasien');
    }
}

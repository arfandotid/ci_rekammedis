<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
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
        $data['title']  = "Data Dokter";
        $data['dokter'] = $this->MainModel->get('dokter');

        template_view('dokter/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric');
        $this->form_validation->set_rules('namaDokter', 'Nama Dokter', 'required|trim');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('noTelp', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    }

    public function add()
    {
        $data['title']  = "Tambah Dokter";

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('dokter/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $this->MainModel->insert('dokter', $input);
            redirect('dokter');
        }
    }

    public function edit($getNip)
    {
        $nip = encode_php_tags($getNip);
        $data['title']  = "Edit Dokter";
        $data['dokter'] = $this->MainModel->get_where('dokter', ['nip' => $nip]);

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('dokter/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $this->MainModel->update('dokter', $input, ['nip' => $nip]);
            redirect('dokter');
        }
    }

    public function delete($getNip)
    {
        $nip = encode_php_tags($getNip);
        $this->MainModel->delete('dokter', ['nip' => $nip]);
        redirect('dokter');
    }
}

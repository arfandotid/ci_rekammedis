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
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi');
        $this->form_validation->set_message('numeric', 'Kolom {field} hanya bisa diisi oleh angka');
        $this->form_validation->set_message('valid_email', 'Isi kolom {field} dengan email yang valid');

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
            $save = $this->MainModel->insert('pasien', $input);
            if ($save) {
                msgBox('save');
                redirect('pasien');
            } else {
                msgBox('save', false);
                redirect('pasien/add');
            }
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
            $edit = $this->MainModel->update('pasien', $input, ['idPasien' => $id]);
            if ($edit) {
                msgBox('edit');
                redirect('pasien');
            } else {
                msgBox('edit', false);
                redirect('pasien/edit/' . $pasienId);
            }
        }
    }

    public function delete($pasienId)
    {
        $id = encode_php_tags($pasienId);
        $del = $this->MainModel->delete('pasien', ['idPasien' => $id]);
        if ($del) {
            msgBox('delete');
        } else {
            msgBox('delete', false);
        }
        redirect('pasien');
    }
}

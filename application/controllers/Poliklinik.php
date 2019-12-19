<?php

class Poliklinik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi');
        $this->form_validation->set_message('numeric', 'Kolom {field} hanya bisa diisi oleh angka');
    }
    public function index()
    {
        $data['title'] = "Data Poliklinik";
        $data['poliklinik'] = $this->MainModel->get('poliklinik');

        template_view('poliklinik/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('namaPoliklinik', 'Nama Poliklinik', 'required');
        $this->form_validation->set_rules('gedung', 'Gedung', 'required');
    }

    public function add()
    {
        $data['title'] = "Tambah Poliklinik";

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('poliklinik/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $save = $this->MainModel->insert('poliklinik', $input);
            if ($save) {
                msgBox('save');
                redirect('poliklinik');
            } else {
                msgBox('save', false);
                redirect('poliklinik/add');
            }
        }
    }

    public function edit($poliId)
    {
        $id = encode_php_tags($poliId);
        $data['poliklinik'] = $this->MainModel->get_where('poliklinik', array('idPoliklinik' => $id));

        $data['title'] = "Edit Poliklinik";

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('poliklinik/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $edit = $this->MainModel->update('poliklinik', $input, array('idPoliklinik' => $id));
            if ($edit) {
                msgBox('edit');
                redirect('poliklinik');
            } else {
                msgBox('edit', false);
                redirect('poliklinik/edit/' . $id);
            }
        }
    }

    public function delete($poliId)
    {
        $id = encode_php_tags($poliId);
        $del = $this->MainModel->delete('poliklinik', array('idPoliklinik' => $id));
        if ($del) {
            msgBox('delete');
        } else {
            msgBox('delete', false);
        }
        redirect('poliklinik');
    }
}

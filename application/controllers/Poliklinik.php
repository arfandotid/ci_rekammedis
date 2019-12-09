<?php

class Poliklinik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = "Data Poliklinik";
        $data['poliklinik'] = $this->MainModel->get('poliklinik');

        template_view('poliklinik/data', $data);
    }

    public function delete($poliId)
    {
        $id = encode_php_tags($poliId);
        $this->MainModel->delete('poliklinik', array('idPoliklinik' => $id));
        redirect('poliklinik');
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
            $this->MainModel->insert('poliklinik', $input);
            redirect('poliklinik');
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
            $this->MainModel->update('poliklinik', $input, array('idPoliklinik' => $id));
            redirect('poliklinik');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }


    public function index()
    {
        $data['title'] = "Data Obat";
        $data['obat'] = $this->MainModel->get('obat');
        template_view('obat/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('namaObat', 'Nama Obat', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
    }

    public function add()
    {
        $data['title'] = "Tambah Obat";
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('obat/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $save = $this->MainModel->insert('obat', $input);
            if ($save) {
                msgBox('save');
                redirect('obat');
            } else {
                msgBox('save', false);
                redirect('obat/add');
            }
        }
    }

    public function edit($obatId)
    {
        $id = encode_php_tags($obatId);
        $data['title'] = "Edit Obat";
        $data['obat'] = $this->MainModel->get_where('obat', ['idObat' => $id]);

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('obat/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $edit = $this->MainModel->update('obat', $input, ['idObat' => $id]);
            if ($edit) {
                msgBox('edit');
                redirect('obat');
            } else {
                msgBox('edit', false);
                redirect('obat/edit/' . $id);
            }
        }
    }

    public function delete($obatId)
    {
        $id = encode_php_tags($obatId);
        $del = $this->MainModel->delete('obat', ['idObat' => $id]);
        if ($del) {
            msgBox('delete');
        } else {
            msgBox('delete', false);
        }
        redirect('obat');
    }
}

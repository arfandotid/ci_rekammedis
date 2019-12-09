<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekammedis extends CI_Controller
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
        $data['title'] = "Data Rekam Medis";
        $data['rekam_medis'] = $this->MainModel->getRekamMedis();
        template_view('rekam-medis/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('pasienId', 'Pasien', 'required');
        $this->form_validation->set_rules('dokterNip', 'Dokter', 'required');
        $this->form_validation->set_rules('idObat[]', 'Obat', 'required');
        $this->form_validation->set_rules('poliklinikId', 'Poliklinik', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required|trim');
        $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required|trim');
        $this->form_validation->set_rules('tglPeriksa', 'tglPeriksa', 'required|trim');
    }

    private function _generateId()
    {
        // RM2019080200001
        $char = "RM";
        $table = "rekam_medis";
        $field = "idRekamMedis";
        $today = date('Ymd');

        $prefix = $char . $today;

        $lastKode = $this->MainModel->getId($prefix, $table, $field);
        $noUrut = (int) substr($lastKode, -5, 5);
        $noUrut++;

        $newKode = $char . $today . sprintf('%05s', $noUrut);
        return $newKode;
    }

    public function add()
    {
        $data['title'] = "Tambah Rekam Medis";
        $data['idRekamMedis'] = $this->_generateId();

        $data['data'] = [];
        $tables = ['pasien', 'dokter', 'obat', 'poliklinik'];
        foreach ($tables as $table) {
            $data['data'][$table] = $this->MainModel->get($table);
        }

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('rekam-medis/add', $data);
        } else {
            // Simpan ke tabel rekam medis
            $input = $this->input->post(null, true);
            unset($input['idObat']);
            $this->MainModel->insert('rekam_medis', $input);

            // Simpan ke tabel rm_obat
            $id_obat = $this->input->post('idObat', true);
            $obat = [];
            foreach ($id_obat as $id) {
                $obat[] = [
                    'idRekamMedis' => $input['idRekamMedis'],
                    'idObat' => $id
                ];
            }
            $this->MainModel->insert_batch('rm_obat', $obat);
            redirect('rekammedis');
        }
    }

    public function edit($rmId)
    {
        $id = encode_php_tags($rmId);
        $whereId = ['idRekamMedis' => $id];
        $data['title'] = "Edit Rekam Medis";
        $data['rekam_medis'] = $this->MainModel->getRekamMedis($whereId);

        // Get Selected Obat
        $rm_obat = $this->MainModel->get_where('rm_obat', $whereId, true)->result_array();
        $data['rm_obat'] = [];
        foreach ($rm_obat as $rmo) {
            $data['rm_obat'][] = $rmo['idObat'];
        }

        // Get all master data
        $data['data'] = [];
        $tables = ['pasien', 'dokter', 'obat', 'poliklinik'];
        foreach ($tables as $table) {
            $data['data'][$table] = $this->MainModel->get($table);
        }

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            template_view('rekam-medis/edit', $data);
        } else {
            // Simpan ke tabel rekam medis
            $input = $this->input->post(null, true);
            unset($input['idObat']);
            $this->MainModel->update('rekam_medis', $input, $whereId);

            // Hapus obat rekam medis berdasarkan id rekam medis
            $this->MainModel->delete('rm_obat', $whereId);

            // Simpan ke tabel rm_obat
            $id_obat = $this->input->post('idObat', true);
            $obat = [];
            foreach ($id_obat as $idObat) {
                $obat[] = [
                    'idRekamMedis' => $id,
                    'idObat' => $idObat
                ];
            }
            $this->MainModel->insert_batch('rm_obat', $obat);
            redirect('rekammedis');
        }
    }

    public function delete($rmId)
    {
        $id = encode_php_tags($rmId);
        $this->MainModel->delete('rekam_medis', ['idRekamMedis' => $id]);
        redirect('rekammedis');
    }

    public function detail($rmId)
    {
        $id = encode_php_tags($rmId);
        $whereId = ['idRekamMedis' => $id];
        $data['title']  = "Detail Rekam Medis";
        $data['detail'] = $this->MainModel->getRekamMedis($whereId);
        $data['obat']   = $this->MainModel->getObatRM($whereId)->result();

        // Rincian Biaya
        $data['biaya_dokter'] = $this->config->item('biaya_dokter');
        $total_obat = $this->MainModel->sumObat($whereId);
        $data['total_harga'] = $total_obat + $data['biaya_dokter'];

        template_view('rekam-medis/detail', $data);
    }
}

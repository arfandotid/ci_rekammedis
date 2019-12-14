<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        if (is_role(1)) {
            redirect('user');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['jumlah'] = [];
        $tables = ['pasien', 'dokter', 'obat', 'rekam_medis'];
        foreach ($tables as $table) {
            $data['jumlah'][$table] = $this->MainModel->count($table);
        }

        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['rm'] = [];
        foreach ($bln as $b) {
            $date = date('Y-') . $b;
            $data['rm'][] = $this->MainModel->chartRekamMedis($date);
        }

        template_view('admin/dashboard', $data);
    }

    public function blocked()
    {
        $data['title'] = "Not Found";

        template_view('admin/blocked', $data);
    }
}

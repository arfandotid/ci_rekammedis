<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainModel extends CI_Model
{
    public function get($table)
    {
        return $this->db->get($table)->result();
    }

    public function get_where($table, $where = [], $no_result = false)
    {
        $query = $this->db->get_where($table, $where);
        if ($no_result) {
            return $query;
        } else {
            if ($query->num_rows() > 1) {
                return $query->result();
            } else {
                return $query->row();
            }
        }
    }

    public function insert($table, $data = [])
    {
        return $this->db->insert($table, $data);
    }

    public function insert_batch($table, $data = [])
    {
        return $this->db->insert_batch($table, $data);
    }

    public function update($table, $data = [], $where = [])
    {
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    /*****************
     ** Rekam Medis **
     ****************/

    public function getRekamMedis($where = null)
    {
        $this->db->join('pasien p', 'rm.pasienId=p.idPasien');
        $this->db->join('dokter d', 'rm.dokterNip=d.nip');
        $this->db->join('poliklinik pk', 'rm.poliklinikId=pk.idPoliklinik');
        $this->db->join('user u', 'rm.userId=u.idUser');
        if ($where != null) {
            return $this->db->get_where('rekam_medis rm', $where)->row();
        } else {
            return $this->db->get('rekam_medis rm')->result();
        }
    }

    public function getObatRM($where)
    {
        $this->db->join('obat o', 'o.idObat=rmo.idObat');
        return $this->db->get_where('rm_obat rmo', $where);
    }

    public function sumObat($where)
    {
        $this->db->select_sum('o.harga');
        return $this->getObatRM($where)->row()->harga;
    }

    public function getId($prefix = null, $table = null, $field = null)
    {
        $this->db->select_max($field);
        $this->db->like($field, $prefix, 'after');
        return $this->db->get($table)->row_array()[$field];
    }

    public function chartRekamMedis($date)
    {
        $this->db->like('tglPeriksa', $date, 'after');
        return count($this->db->get('rekam_medis')->result_array());
    }
}

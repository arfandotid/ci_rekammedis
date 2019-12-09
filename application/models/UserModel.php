<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function getUser()
    {
        $current_user = $this->session->userdata('user')->idUser;
        $this->db->where_not_in('idUser', [1, $current_user]);
        return $this->db->get('user')->result();
    }
}

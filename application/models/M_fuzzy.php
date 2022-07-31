<?php

use LDAP\Result;

class M_fuzzy extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getMax($id, $kolom)
    {
        $this->db->select("MAX($kolom) as num");
        $this->db->from('data_produksi');
        $this->db->where('id_buku', $id);
        $query = $this->db->get();
        $result = $query->row();
        if (isset($result))
            return $result->num;
        return 0;
    }
    public function getMin($id, $kolom)
    {
        $this->db->select("MIN($kolom) as num");
        $this->db->from('data_produksi');
        $this->db->where('id_buku', $id);
        $query = $this->db->get();
        $result = $query->row();
        if (isset($result))
            return $result->num;
        return 0;
    }
}
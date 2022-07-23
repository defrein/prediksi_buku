<?php
class M_admin extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    // BUKU
    public function dt_buku()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $query = $this->db->get();
        return $query->result_array();
    }
}
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

    public function dt_buku_tambah()
    {
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'nama_buku' => $this->input->post('nama_buku'),
            'jenis_buku' => $this->input->post('jenis_buku'),
            'jumlah_isi' => $this->input->post('jumlah_isi')
        );
        return $this->db->insert('buku', $data);
    }
}
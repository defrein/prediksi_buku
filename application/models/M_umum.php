<?php
class M_umum extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function cari_data($tabel, $namafield, $isifield)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where($namafield, $isifield);
        $query = $this->db->get();
        return $query->row_array();
    }
    function cek_login()    //Cek apakah user pass ada
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        return $query->row_array();
    }
    function jumlah_record_tabel($tabel)
    {
        $query = $this->db->select("COUNT(*) as num")->get($tabel);
        $result = $query->row();
        if (isset($result))
            return $result->num;
        return 0;
    }

    function hapus_data($tabel, $kolom, $id)
    {
        $this->db->delete($tabel, array($kolom => $id));
        if (!$this->db->affected_rows())
            return (FALSE);
        else
            return (TRUE);
    }
}
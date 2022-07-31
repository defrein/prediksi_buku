<?php
class M_admin extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    // =============================== BUKU ================================
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

    public function dt_buku_edit($id)
    {
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'nama_buku' => $this->input->post('nama_buku'),
            'jenis_buku' => $this->input->post('jenis_buku'),
            'jumlah_isi' => $this->input->post('jumlah_isi')
        );
        $this->db->where('id_buku', $id);
        return $this->db->update('buku', $data);
    }

    //  ============================== PRODUKSI ================================
    public function dt_produksi()
    {
        $this->db->select('*');
        $this->db->from('data_produksi');
        $this->db->join('bulan', 'data_produksi.id_bulan = bulan.id_bulan', 'left');
        $this->db->join('buku', 'data_produksi.id_buku = buku.id_buku', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dt_produksi_tambah()
    {
        $data = array(
            'id_produksi' => $this->input->post('id_produksi'),
            'id_buku' => $this->input->post('id_buku'),
            'id_bulan' => $this->input->post('id_bulan'),
            'tahun' => $this->input->post('tahun'),
            'permintaan' => $this->input->post('permintaan'),
            'sisa_stok' => $this->input->post('sisa_stok'),
            'jumlah_produksi' => $this->input->post('jumlah_produksi')
        );
        return $this->db->insert('data_produksi', $data);
    }

    public function dt_produksi_edit($id)
    {
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'id_bulan' => $this->input->post('id_bulan'),
            'tahun' => $this->input->post('tahun'),
            'permintaan' => $this->input->post('permintaan'),
            'sisa_stok' => $this->input->post('sisa_stok'),
            'jumlah_produksi' => $this->input->post('jumlah_produksi')
        );
        $this->db->where('id_produksi', $id);
        return $this->db->update('data_produksi', $data);
    }

    // ============================== PREDIKSI ===================================
    public function dt_prediksi()
    {
        $this->db->select('*');
        $this->db->from('hasil_prediksi');
        $this->db->join('bulan', 'hasil_prediksi.id_bulan = bulan.id_bulan', 'left');
        $this->db->join('buku', 'hasil_prediksi.id_buku = buku.id_buku', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dt_prediksi_tambah()
    {
        $data = array(
            'id_hasil_prediksi' => $this->input->post('id_hasil_prediksi'),
            'id_buku' => $this->input->post('id_buku'),
            'id_bulan' => $this->input->post('id_bulan'),
            'tahun' => $this->input->post('tahun'),
            'permintaan' => $this->input->post('permintaan'),
            'sisa_stok' => $this->input->post('sisa_stok'),
            'prediksi_produksi' => $this->input->post('prediksi_produksi')
        );
        return $this->db->insert('hasil_prediksi', $data);
    }

    public function dt_prediksi_edit($id)
    {
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'id_bulan' => $this->input->post('id_bulan'),
            'tahun' => $this->input->post('tahun'),
            'permintaan' => $this->input->post('permintaan'),
            'sisa_stok' => $this->input->post('sisa_stok'),
            'prediksi_produksi' => $this->input->post('prediksi_produksi')
        );
        $this->db->where('id_hasil_prediksi', $id);
        return $this->db->update('hasil_prediksi', $data);
    }



    // ============================== DROPDOWN ===================================
    public function dropdown_buku()
    {
        $query = $this->db->get('buku');
        $result = $query->result();

        $id_buku = array('-Pilih-');
        $nama_buku = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_buku, $result[$i]->id_buku);
            array_push($nama_buku, $result[$i]->nama_buku);
        }
        return array_combine($id_buku, $nama_buku);
    }

    public function dropdown_bulan()
    {
        $query = $this->db->get('bulan');
        $result = $query->result();

        $id_bulan = array('-Pilih-');
        $nama_bulan = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_bulan, $result[$i]->id_bulan);
            array_push($nama_bulan, $result[$i]->nama_bulan);
        }
        return array_combine($id_bulan, $nama_bulan);
    }
}
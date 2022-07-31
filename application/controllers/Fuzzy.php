<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fuzzy extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_fuzzy');
        // $this->login_kah();    
        //Memastikan hanya yang sudah login dapat akses fungsi ini
    }
    // public function login_kah()
    // {
    //     if ($this->session->has_userdata('username') && $this->session->userdata('id_level') == 1)
    //         return TRUE;
    //     else
    //         redirect(base_url('logout'));
    // }

    function tampil($data)
    {
        $this->load->view('fuzzy/header', $data);
        $this->load->view('fuzzy/isi');
        $this->load->view('fuzzy/footer');
    }

    public function index($id_buku = 'BK001', $newpermintaan = '4000', $newsisa = '400')
    {
        $data['judul']    = 'Perhitungan FUZZY';
        $data['page']    = 'perhitungan';
        // pencarian min max
        $data['max_permintaan']    = $this->m_fuzzy->getMax($id_buku, 'permintaan');
        $data['min_permintaan']    = $this->m_fuzzy->getMin($id_buku, 'permintaan');
        $data['max_sisa']    = $this->m_fuzzy->getMax($id_buku, 'sisa_stok');
        $data['min_sisa']    = $this->m_fuzzy->getMin($id_buku, 'sisa_stok');
        $data['max_produksi']    = $this->m_fuzzy->getMax($id_buku, 'jumlah_produksi');
        $data['min_produksi']    = $this->m_fuzzy->getMin($id_buku, 'jumlah_produksi');
        // berdasarkan data
        $data['newpermintaan'] = $newpermintaan;
        $data['newsisa'] = $newsisa;

        // ---------- fuzzifikasi --------------
        // sisa stok banyak
        if ($data['newsisa'] <= $data['min_sisa']) {
            $data['sisa_banyak'] = 0;
        } else if ($data['newsisa'] >= $data['max_sisa']) {
            $data['sisa_banyak'] = 1;
        } else {
            $data['sisa_banyak'] = ($data['newsisa'] - $data['min_sisa']) / ($data['max_sisa'] - $data['min_sisa']);
        }
        // sisa stok sedikit
        if ($data['newsisa'] <= $data['min_sisa']) {
            $data['sisa_sedikit'] = 1;
        } else if ($data['newsisa'] >= $data['max_sisa']) {
            $data['sisa_sedikit'] = 0;
        } else {
            $data['sisa_sedikit'] = ($data['max_sisa'] - $data['newsisa']) / ($data['max_sisa'] - $data['min_sisa']);
        }
        // permintaan naik
        if ($data['newpermintaan'] <= $data['min_permintaan']) {
            $data['permintaan_naik'] = 0;
        } else if ($data['newpermintaan'] >= $data['max_permintaan']) {
            $data['permintaan_naik'] = 1;
        } else {
            $data['permintaan_naik'] = ($data['newpermintaan'] - $data['min_permintaan']) / ($data['max_permintaan'] - $data['min_permintaan']);
        }
        // permintaan turun
        if ($data['newpermintaan'] <= $data['min_permintaan']) {
            $data['permintaan_turun'] = 1;
        } else if ($data['newpermintaan'] >= $data['max_permintaan']) {
            $data['permintaan_turun'] = 0;
        } else {
            $data['permintaan_turun'] = ($data['max_permintaan'] - $data['newpermintaan']) / ($data['max_permintaan'] - $data['min_permintaan']);
        }

        // ---------------- inferensi ---------------
        // alpha predikat
        $data['a_rules_1'] = min($data['sisa_banyak'], $data['permintaan_naik']);
        $data['a_rules_2'] = min($data['sisa_sedikit'], $data['permintaan_naik']);
        $data['a_rules_3'] = min($data['sisa_banyak'], $data['permintaan_turun']);
        $data['a_rules_4'] = min($data['sisa_sedikit'], $data['permintaan_turun']);
        // z produksi
        $data['z_rules_1'] = $data['a_rules_1'] * ($data['max_produksi'] - $data['min_produksi']) + $data['min_produksi'];
        $data['z_rules_2'] = $data['a_rules_2'] * ($data['max_produksi'] - $data['min_produksi']) + $data['min_produksi'];
        $data['z_rules_3'] = $data['max_produksi'] - $data['a_rules_3'] * ($data['max_produksi'] - $data['min_produksi']);
        $data['z_rules_4'] = $data['max_produksi'] - $data['a_rules_4'] * ($data['max_produksi'] - $data['min_produksi']);

        // ------------ defuzzifikasi --------------
        $data['z_defuzzifikasi'] = ($data['a_rules_1'] * $data['z_rules_1'] + $data['a_rules_2'] * $data['z_rules_2'] + $data['a_rules_3'] * $data['z_rules_3'] + $data['a_rules_4'] * $data['z_rules_4']) / ($data['a_rules_1'] + $data['a_rules_2'] + $data['a_rules_3'] + $data['a_rules_4']);
        $data['hasil_defuzzifikasi'] = round($data['z_defuzzifikasi']);

        $this->tampil($data);
    }

    public function getFuzzyData($id_buku, $permintaan, $sisa_stok, $jumlah_produksi, $newsisa = false, $newpermintaan = false)
    {
        $data['judul']    = 'Perhitungan MAX & MIN';
        $data['page']    = 'perhitungan';
        $data['max_permintaan']    = $this->m_fuzzy->getMax($id_buku, $permintaan);
        $data['min_permintaan']    = $this->m_fuzzy->getMin($id_buku, $permintaan);
        $data['max_sisa']    = $this->m_fuzzy->getMax($id_buku, $sisa_stok);
        $data['min_sisa']    = $this->m_fuzzy->getMin($id_buku, $sisa_stok);
        $data['max_produksi']    = $this->m_fuzzy->getMax($id_buku, $jumlah_produksi);
        $data['min_produksi']    = $this->m_fuzzy->getMin($id_buku, $jumlah_produksi);
        $this->tampil($data);
    }
}
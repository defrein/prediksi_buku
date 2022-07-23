<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->login_kah();    //Memastikan hanya yang sudah login dapat akses fungsi ini
    }

    public function login_kah()
    {
        if ($this->session->has_userdata('username') && $this->session->userdata('id_level') == 1)
            return TRUE;
        else
            redirect(base_url('logout'));
    }

    public function index()
    {
        $data['judul']    = 'Sistem Prediksi Jumlah Produksi Buku';
        $data['page']    = 'home';
        $data['jml_buku']    = $this->m_umum->jumlah_record_tabel('buku');
        $data['jml_prediksi']    = $this->m_umum->jumlah_record_tabel('hasil_prediksi');
        $this->tampil($data);
    }

    function tampil($data)
    {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/isi');
        $this->load->view('admin/footer');
    }

    // BUKU
    public function buku()
    {
        $data['judul'] = 'Data Buku';
        $data['page'] = 'buku';
        $data['buku'] = $this->m_admin->dt_buku();
        $this->tampil($data);
    }
}
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

    public function buku_tambah()
    {
        $data['judul'] = 'Tambah Data Buku';
        $data['page'] = 'buku_tambah';

        $this->form_validation->set_rules(
            'id_buku',
            'Isikan ID Buku',
            'required|min_length[5]|max_length[5]',
            array('required' => '%s harus diisi.')
        );
        $this->form_validation->set_rules('nama_buku', 'Isikan Nama Buku', 'required');
        $this->form_validation->set_rules('jenis_buku', 'Isikan Jenis Buku', 'required');
        $this->form_validation->set_rules('jumlah_isi', 'Isikan Jumlah Isi Buku', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->tampil($data);
        } else {
            $this->m_admin->dt_buku_tambah();
            redirect(base_url('admin/buku'));
        }
    }
}
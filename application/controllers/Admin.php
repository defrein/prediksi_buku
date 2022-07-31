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

    function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
    {
        if ($str == '-Pilih-') {
            $this->form_validation->set_message('dd_cek', 'Harus dipilih');
            return FALSE;
        } else
            return TRUE;
    }

    // ======================== BUKU =========================
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

    public function buku_edit($id = FALSE)
    {
        $data['judul'] = 'Edit Data Buku';
        $data['page'] = 'buku_edit';
        $this->form_validation->set_rules(
            'id_buku',
            'Isikan ID Buku',
            'required|min_length[5]|max_length[5]',
            array('required' => '%s harus diisi.')
        );
        $this->form_validation->set_rules('nama_buku', 'Isikan Nama Buku', 'required');
        $this->form_validation->set_rules('jenis_buku', 'Isikan Jenis Buku', 'required');
        $this->form_validation->set_rules('jumlah_isi', 'Isikan Jumlah Isi Buku', 'required');

        $data['d'] = $this->m_umum->cari_data('buku', 'id_buku', $id);

        if ($this->form_validation->run() === FALSE) {
            $this->tampil($data);
        } else {
            $this->m_admin->dt_buku_edit($id);
            redirect(base_url('admin/buku'));
        }
    }

    public function buku_hapus($id)
    {
        $this->m_umum->hapus_data('buku', 'id_buku', $id);
        redirect(base_url('admin/buku'));
    }

    // ===================== PRODUKSI ========================
    public function produksi()
    {
        $data['judul'] = 'Data Produksi Buku';
        $data['page'] = 'produksi';
        $data['produksi'] = $this->m_admin->dt_produksi();
        $this->tampil($data);
    }

    public function produksi_tambah()
    {
        $data['judul'] = 'Tambah Data Produksi';
        $data['page'] = 'produksi_tambah';


        $this->form_validation->set_rules('tahun', 'Isikan tahun produksi', 'required');
        $this->form_validation->set_rules('permintaan', 'Isikan jumlah permintaan', 'required');
        $this->form_validation->set_rules('sisa_stok', 'Isikan sisa stok', 'required');
        $this->form_validation->set_rules('jumlah_produksi', 'Isikan jumlah produksi', 'required');

        $this->form_validation->set_rules('id_buku', 'Pilih nama buku', 'callback_dd_cek');
        $this->form_validation->set_rules('id_bulan', 'Pilih bulan produksi', 'callback_dd_cek');

        $data['ddbuku'] = $this->m_admin->dropdown_buku();
        $data['ddbulan'] = $this->m_admin->dropdown_bulan();

        if ($this->form_validation->run() === FALSE) {
            $this->tampil($data);
        } else {
            $this->m_admin->dt_produksi_tambah();
            redirect(base_url('admin/produksi'));
        }
    }

    public function produksi_edit($id = FALSE)
    {
        $data['judul'] = 'Edit Data Produksi';
        $data['page'] = 'produksi_edit';
        $this->form_validation->set_rules('tahun', 'Isikan tahun produksi', 'required');
        $this->form_validation->set_rules('permintaan', 'Isikan jumlah permintaan', 'required');
        $this->form_validation->set_rules('sisa_stok', 'Isikan sisa stok', 'required');
        $this->form_validation->set_rules('jumlah_produksi', 'Isikan jumlah produksi', 'required');

        $this->form_validation->set_rules('id_buku', 'Pilih nama buku', 'callback_dd_cek');
        $this->form_validation->set_rules('id_bulan', 'Pilih bulan produksi', 'callback_dd_cek');

        $data['d'] = $this->m_umum->cari_data('data_produksi', 'id_produksi', $id);
        $data['ddbuku'] = $this->m_admin->dropdown_buku();
        $data['ddbulan'] = $this->m_admin->dropdown_bulan();

        if ($this->form_validation->run() === FALSE) {
            $this->tampil($data);
        } else {
            $this->m_admin->dt_produksi_edit($id);
            redirect(base_url('admin/produksi'));
        }
    }

    public function produksi_hapus($id)
    {
        $this->m_umum->hapus_data('data_produksi', 'id_produksi', $id);
        redirect(base_url('admin/produksi'));
    }

    // =============================== PREDIKSI =================================
    public function prediksi()
    {
        $data['judul'] = 'Data Hasil Prediksi Buku';
        $data['page'] = 'prediksi';
        $data['prediksi'] = $this->m_admin->dt_prediksi();
        $this->tampil($data);
    }

    public function prediksi_tambah()
    {
        $data['judul'] = 'Tambah Prediksi';
        $data['page'] = 'prediksi_tambah';


        $this->form_validation->set_rules('tahun', 'Isikan tahun produksi', 'required');
        $this->form_validation->set_rules('permintaan', 'Isikan jumlah permintaan', 'required');
        $this->form_validation->set_rules('sisa_stok', 'Isikan sisa stok', 'required');
        $this->form_validation->set_rules('prediksi_produksi', 'Isikan jumlah produksi', 'required');

        $this->form_validation->set_rules('id_buku', 'Pilih nama buku', 'callback_dd_cek');
        $this->form_validation->set_rules('id_bulan', 'Pilih bulan produksi', 'callback_dd_cek');

        $data['ddbuku'] = $this->m_admin->dropdown_buku();
        $data['ddbulan'] = $this->m_admin->dropdown_bulan();

        if ($this->form_validation->run() === FALSE) {
            $this->tampil($data);
        } else {
            $this->m_admin->dt_prediksi_tambah();
            redirect(base_url('admin/prediksi'));
        }
    }

    public function prediksi_edit($id = FALSE)
    {
        $data['judul'] = 'Edit Prediksi';
        $data['page'] = 'prediksi_edit';
        $this->form_validation->set_rules('tahun', 'Isikan tahun produksi', 'required');
        $this->form_validation->set_rules('permintaan', 'Isikan jumlah permintaan', 'required');
        $this->form_validation->set_rules('sisa_stok', 'Isikan sisa stok', 'required');
        $this->form_validation->set_rules('prediksi_produksi', 'Isikan jumlah produksi', 'required');

        $this->form_validation->set_rules('id_buku', 'Pilih nama buku', 'callback_dd_cek');
        $this->form_validation->set_rules('id_bulan', 'Pilih bulan produksi', 'callback_dd_cek');

        $data['d'] = $this->m_umum->cari_data('hasil_prediksi', 'id_hasil_prediksi', $id);
        $data['ddbuku'] = $this->m_admin->dropdown_buku();
        $data['ddbulan'] = $this->m_admin->dropdown_bulan();

        if ($this->form_validation->run() === FALSE) {
            $this->tampil($data);
        } else {
            $this->m_admin->dt_prediksi_edit($id);
            redirect(base_url('admin/prediksi'));
        }
    }
    public function prediksi_hapus($id)
    {
        $this->m_umum->hapus_data('hasil_prediksi', 'id_hasil_prediksi', $id);
        redirect(base_url('admin/prediksi'));
    }
}
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
        $this->form_validation->set_rules('nama_buku', 'Buku', 'required');
        $this->form_validation->set_rules('jenis_buku', 'Jenis Buku', 'required');
        $this->form_validation->set_rules('jumlah_isi', 'Jumlah Isi Buku', 'required');

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
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('jenis_buku', 'Jenis Buku', 'required');
        $this->form_validation->set_rules('jumlah_isi', 'Jumlah Isi Buku', 'required');

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


        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required');
        $this->form_validation->set_rules('sisa_stok', 'Sisa Stok', 'required');
        $this->form_validation->set_rules('jumlah_produksi', 'Produksi', 'required');

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
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required');
        $this->form_validation->set_rules('sisa_stok', 'Sisa Stok', 'required');
        $this->form_validation->set_rules('jumlah_produksi', 'Produksi', 'required');

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
        $data['judul'] = 'Data Prediksi Buku';
        $data['page'] = 'prediksi';
        $data['prediksi'] = $this->m_admin->dt_prediksi();
        $this->tampil($data);
    }

    public function prediksi_tambah() // membuka form tambah prediksi
    {
        $data['judul'] = 'Tambah Prediksi';
        $data['page'] = 'prediksi_tambah';
        // mendapatkan id_hasil_produksi terakhir
        $data['ihp_terakhir'] = $this->m_admin->ihp_terakhir();

        $this->form_validation->set_rules('id_hasil_prediksi', 'ID Prediksi', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required');
        $this->form_validation->set_rules('sisa_stok', 'Sisa Stok', 'required');
        $this->form_validation->set_rules('prediksi_produksi', 'Produksi', 'required');

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

    public function generate_fuzzy()
    {
        $data['judul'] = 'Tambah Prediksi';
        $data['page'] = 'prediksi_tambah';


        $this->form_validation->set_rules('id_hasil_prediksi', 'ID Prediksi', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required');
        $this->form_validation->set_rules('sisa_stok', 'Sisa Stok', 'required');

        $this->form_validation->set_rules('id_buku', 'Pilih nama buku', 'callback_dd_cek');
        $this->form_validation->set_rules('id_bulan', 'Pilih bulan produksi', 'callback_dd_cek');

        $data['ddbuku'] = $this->m_admin->dropdown_buku();
        $data['ddbulan'] = $this->m_admin->dropdown_bulan();

        if ($this->form_validation->run() === FALSE) {
            $this->tampil($data);
        } else {
            // ambil data dari input form
            $data['id_buku'] = $this->input->post('id_buku');
            $data['post_permintaan'] = $this->input->post('permintaan');
            $data['post_sisa'] = $this->input->post('sisa_stok');

            // ============== START FUZZY LOGIC ===============
            // pencarian min max
            $data['max_permintaan']    = $this->m_admin->getMax($data['id_buku'], 'permintaan');
            $data['min_permintaan']    = $this->m_admin->getMin($data['id_buku'], 'permintaan');
            $data['max_sisa']    = $this->m_admin->getMax($data['id_buku'], 'sisa_stok');
            $data['min_sisa']    = $this->m_admin->getMin($data['id_buku'], 'sisa_stok');
            $data['max_produksi']    = $this->m_admin->getMax($data['id_buku'], 'jumlah_produksi');
            $data['min_produksi']    = $this->m_admin->getMin($data['id_buku'], 'jumlah_produksi');
            // berdasarkan data
            $data['newpermintaan'] = $data['post_permintaan'];
            $data['newsisa'] = $data['post_sisa'];

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
            $data['hasil_defuzzifikasi'] = round($data['z_defuzzifikasi']); // pembulatan bilangan

            // menyimpan data perhitungan ke dalam array
            $dataFuzzy = array(
                'id_data_fuzzy' => null,
                'id_hasil_prediksi' => $this->input->post('id_hasil_prediksi', TRUE),
                'max_permintaan' => $data['max_permintaan'],
                'min_permintaan' => $data['min_permintaan'],
                'max_sisa' => $data['max_sisa'],
                'min_sisa' => $data['min_sisa'],
                'max_produksi' => $data['max_produksi'],
                'min_produksi' => $data['min_produksi'],
                'new_sisa_stok' => $data['post_sisa'],
                'new_permintaan' => $data['post_permintaan'],
                'sisa_banyak' => $data['sisa_banyak'],
                'sisa_sedikit' => $data['sisa_sedikit'],
                'permintaan_naik' => $data['permintaan_naik'],
                'permintaan_turun' => $data['permintaan_turun'],
                'a_rules_1' => $data['a_rules_1'],
                'a_rules_2' => $data['a_rules_2'],
                'a_rules_3' => $data['a_rules_3'],
                'a_rules_4' => $data['a_rules_4'],
                'z_rules_1' => $data['z_rules_1'],
                'z_rules_2' => $data['z_rules_2'],
                'z_rules_3' => $data['z_rules_3'],
                'z_rules_4' => $data['z_rules_4'],
                'z_defuzzifikasi' => $data['z_defuzzifikasi'],
                'hasil_defuzzifikasi' => $data['hasil_defuzzifikasi']
            );

            // menyimpan data hasil prediksi ke dalam array
            $dataPrediksi = array(
                'id_hasil_prediksi' => $this->input->post('id_hasil_prediksi', TRUE),
                'id_buku' => $data['id_buku'],
                'id_bulan' => $this->input->post('id_bulan', TRUE),
                'tahun' => $this->input->post('tahun', TRUE),
                'permintaan' => $data['post_permintaan'],
                'sisa_stok' => $data['post_sisa'],
                'prediksi_produksi' => $data['hasil_defuzzifikasi']
            );

            // kirim data ke model
            // 1. data prediksi
            $query = $this->m_admin->dt_prediksi_tambah('hasil_prediksi', $dataPrediksi);
            // 2. data perhitungan fuzzy logic
            $query = $this->m_admin->dt_prediksi_tambah('data_fuzzy', $dataFuzzy);
            redirect(base_url('admin/prediksi'));
        }
    }

    public function prediksi_edit($id = FALSE)
    {
        $data['judul'] = 'Edit Prediksi';
        $data['page'] = 'prediksi_edit';
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required');
        $this->form_validation->set_rules('sisa_stok', 'Sisa Stok', 'required');
        $this->form_validation->set_rules('prediksi_produksi', 'Produksi', 'required');

        $this->form_validation->set_rules('id_bulan', 'Pilih bulan produksi', 'callback_dd_cek');

        $data['d'] = $this->m_umum->cari_data('hasil_prediksi', 'id_hasil_prediksi', $id);
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

    public function prediksi_detil($id)
    {
        $data['judul'] = 'Detail Prediksi';
        $data['subjudul'] = 'Perhitungan dengan Algoritma Fuzzy Logic Tsukamoto';
        $data['page'] = 'prediksi_detil';

        $data['d'] = $this->m_admin->dt_prediksi_detil($id);
        $this->tampil($data);
    }
}
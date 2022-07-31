<?php
//==================================== HOME ====================================
if ($page == 'home') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $jml_buku; ?></h3>

                            <p>Jumlah Buku</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bookmark"></i>
                        </div>
                        <a href="<?php echo base_url('admin/buku') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $jml_prediksi; ?></h3>

                            <p>Jumlah Prediksi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url('admin/prediksi') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selamat Datang Admin</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <p><b>Petunjuk:</b></p>
                <ul>
                    <li>Tambahkan data buku dan data produksi baru atau gunakan data buku yang telah ada sebelum
                        melakukan
                        tambah
                        prediksi.</li>
                    <li>Lakukan ubah data dengan menekan ikon (pensil) jingga.</li>
                    <li>Lakukan hapus data dengan menekan ikon (tempat sampah) merah.</li>
                    <li>Hindari menghapus data buku yang sudah mempunyai data produksi.</li>
                    <li>Isi form tambah prediksi dengan benar sebelum menekan tombol Generate.</li>
                    <li>Riwayat prediksi akan tampil pada halaman prediksi.</li>
                    <li>Detail prediksi dapat dilihat dengan menekan ikon (kaca pembesar) hijau.</li>

                </ul>
            </div>
            <div class="card-footer">
                Create By VIDEF@2022
            </div>
        </div>

    </section>
</div>
<?php
}
//==================================== BUKU ====================================
else if ($page == 'buku') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <a href=<?php echo base_url("admin/buku_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">
                    Tambah Buku</a>
                <table id="datatable_01" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Buku</th>
                            <th>Nama Buku</th>
                            <th>Jenis Buku</th>
                            <th>Jumlah Isi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($buku as $d) { ?>
                    <tr>
                        <td><?php echo $d['id_buku'] ?></td>
                        <td><?php echo $d['nama_buku'] ?></td>
                        <td><?php echo $d['jenis_buku'] ?></td>
                        <td><?php echo $d['jumlah_isi'] ?></td>
                        <td>
                            <a href=<?php echo base_url("admin/buku_edit/") . $d['id_buku']; ?>> <i
                                    class="fas fa-pencil-alt"></i> </a>
                            <a href=<?php echo base_url("admin/buku_hapus/") . $d['id_buku']; ?>
                                onclick="return confirm('Yakin menghapus buku : <?php echo $d['id_buku']; ?> ?');" ;><i
                                    class="fas fa-trash-alt"></i></a>

                        </td>
                    </tr>
                    <?php
                        }
                        ?>
                </table>

            </div>
    </section>
</div>

<?php
}

//--------------------------------- Tambah ---------------------------------
else if ($page == 'buku_tambah') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="<?php echo base_url('admin/buku_tambah'); ?>" class="form-horizontal">

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-2 col-form-label">ID Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id_buku" id="id_buku"
                                    value="<?php echo set_value('id_buku'); ?>" placeholder="Masukkan Nama Buku">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_buku')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_buku" class="col-sm-2 col-form-label">Nama Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_buku" id="nama_buku"
                                    value="<?php echo set_value('nama_buku'); ?>" placeholder="Masukkan Nama Buku">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('nama_buku')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_alias" class="col-sm-2 col-form-label">Jenis Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jenis_buku" id="jenis_buku"
                                    value="<?php echo set_value('jenis_buku'); ?>" placeholder="Masukkan Jenis Buku">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('jenis_buku')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_alias" class="col-sm-2 col-form-label">Jumlah Isi (Lembar)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jumlah_isi" id="jumlah_isi"
                                    value="<?php echo set_value('jumlah_isi'); ?>" placeholder="Masukkan Jumlah Isi">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('jumlah_isi')); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a class="btn btn-danger" href="<?php echo base_url('admin/buku'); ?>">
                            Batal</a>
                    </div>
                </form>


            </div>
    </section>
</div>
<?php
    //--------------------------------- Edit ---------------------------------

} else if ($page == 'buku_edit') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="<?php echo base_url('admin/buku_edit/' . $d['id_buku']); ?>"
                    class="form-horizontal">

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-2 col-form-label">ID Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id_buku" id="id_buku"
                                    value="<?php echo set_value('id_buku', $d['id_buku']); ?>"
                                    placeholder="Masukkan Nama Buku">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_buku')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_buku" class="col-sm-2 col-form-label">Nama Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_buku" id="nama_buku"
                                    value="<?php echo set_value('nama_buku', $d['nama_buku']); ?>"
                                    placeholder="Masukkan Nama Buku">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('nama_buku')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_buku" class="col-sm-2 col-form-label">Jenis Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jenis_buku" id="jenis_buku"
                                    value="<?php echo set_value('jenis_buku', $d['jenis_buku']); ?>"
                                    placeholder="Masukkan Jenis Buku">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('jenis_buku')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_isi" class="col-sm-2 col-form-label">Jumlah Isi (Lembar)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="jumlah_isi" id="jumlah_isi"
                                    value="<?php echo set_value('jumlah_isi', $d['jumlah_isi']); ?>"
                                    placeholder="Masukkan Jumlah Isi">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('jumlah_isi')); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a class="btn btn-danger" href="<?php echo base_url('admin/buku'); ?>">
                            Batal</a>
                    </div>
                </form>


            </div>
    </section>
</div>
<?php
    //==================================== PRODUKSI ====================================

} else if ($page == 'produksi') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <a href=<?php echo base_url("admin/produksi_tambah") ?> class="btn btn-primary"
                    style="margin-bottom:15px">
                    Tambah Produksi</a>
                <table id="datatable_01" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Buku</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Permintaan</th>
                            <th>Sisa Stok</th>
                            <th>Produksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                        $i = 0;
                        foreach ($produksi as $d) {
                            $i++ ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $d['nama_buku'] ?></td>
                        <td><?php echo $d['nama_bulan'] ?></td>
                        <td><?php echo $d['tahun'] ?></td>
                        <td><?php echo $d['permintaan'] ?></td>
                        <td><?php echo $d['sisa_stok'] ?></td>
                        <td><?php echo $d['jumlah_produksi'] ?></td>
                        <td>
                            <a href=<?php echo base_url("admin/produksi_edit/") . $d['id_produksi']; ?>> <i
                                    class="fas fa-pencil-alt"></i> </a>
                            <a href=<?php echo base_url("admin/produksi_hapus/") . $d['id_produksi']; ?>
                                onclick="return confirm('Yakin menghapus produksi : <?php echo $d['id_produksi']; ?> ?');"
                                ;><i class="fas fa-trash-alt"></i></a>

                        </td>
                    </tr>
                    <?php
                        }
                        ?>
                </table>

            </div>
    </section>
</div>

<?php
    // ------------------------------------------- Tambah Produksi ----------------------------------------------
} else if ($page == 'produksi_tambah') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="<?php echo base_url('admin/produksi_tambah'); ?>" class="form-horizontal">

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-2 col-form-label">Pilih Buku</label>
                            <div class="col-sm-10">
                                <?php echo form_dropdown('id_buku', $ddbuku, set_value('id_buku')); ?>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_buku')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_bulan" class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-10">
                                <?php echo form_dropdown('id_bulan', $ddbulan, set_value('id_bulan')); ?>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_bulan')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="tahun" id="tahun"
                                    value="<?php echo set_value('tahun'); ?>" placeholder="Masukkan tahun produksi">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('tahun')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permintaan" class="col-sm-2 col-form-label">Permintaan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="permintaan" id="permintaan"
                                    value="<?php echo set_value('permintaan'); ?>"
                                    placeholder="Masukkan jumlah permintaan">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('permintaan')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sisa_stok" class="col-sm-2 col-form-label">Sisa Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="sisa_stok" id="sisa_stok"
                                    value="<?php echo set_value('sisa_stok'); ?>" placeholder="Masukkan sisa stok">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('sisa_stok')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_produksi" class="col-sm-2 col-form-label">Produksi</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="jumlah_produksi" id="jumlah_produksi"
                                    value="<?php echo set_value('jumlah_produksi'); ?>"
                                    placeholder="Masukkan jumlah produksi">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('jumlah_produksi')); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a class="btn btn-danger" href="<?php echo base_url('admin/produksi'); ?>">
                            Batal</a>
                    </div>
                </form>


            </div>
    </section>
</div>
<?php

    //--------------------------------- Edit Produksi ---------------------------------
} else if ($page == 'produksi_edit') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="<?php echo base_url('admin/produksi_edit/' . $d['id_produksi']); ?>"
                    class="form-horizontal">

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-2 col-form-label">Pilih Buku</label>
                            <div class="col-sm-10">
                                <?php echo form_dropdown('id_buku', $ddbuku, set_value('id_buku', $d['id_buku']), 'class=form-control'); ?>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_buku')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_bulan" class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-10">
                                <?php echo form_dropdown('id_bulan', $ddbulan, set_value('id_bulan', $d['id_bulan']), 'class=form-control'); ?>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_bulan')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="tahun" id="tahun"
                                    value="<?php echo set_value('tahun', $d['tahun']); ?>"
                                    placeholder="Masukkan Nama Buku">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('tahun')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permintaan" class="col-sm-2 col-form-label">Permintaan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="permintaan" id="permintaan"
                                    value="<?php echo set_value('permintaan', $d['permintaan']); ?>"
                                    placeholder="Masukkan Nama Buku">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('permintaan')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sisa_stok" class="col-sm-2 col-form-label">Sisa Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="sisa_stok" id="sisa_stok"
                                    value="<?php echo set_value('sisa_stok', $d['sisa_stok']); ?>"
                                    placeholder="Masukkan Nama Buku">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('sisa_stok')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_produksi" class="col-sm-2 col-form-label">Produksi</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="jumlah_produksi" id="jumlah_produksi"
                                    value="<?php echo set_value('jumlah_produksi', $d['jumlah_produksi']); ?>"
                                    placeholder="Masukkan Nama Buku">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('jumlah_produksi')); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a class="btn btn-danger" href="<?php echo base_url('admin/produksi'); ?>">
                            Batal</a>
                    </div>
                </form>
            </div>
    </section>
</div>
<?php

    // =============================================== PREDIKSI ================================================
} else if ($page == 'prediksi') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <a href=<?php echo base_url("admin/prediksi_tambah") ?> class="btn btn-primary"
                    style="margin-bottom:15px">
                    Tambah Prediksi</a>
                <table id="datatable_01" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Buku</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Permintaan</th>
                            <th>Sisa Stok</th>
                            <th>Produksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                        $i = 0;
                        foreach ($prediksi as $d) {
                            $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $d['nama_buku'] ?></td>
                        <td><?php echo $d['nama_bulan'] ?></td>
                        <td><?php echo $d['tahun'] ?></td>
                        <td><?php echo $d['permintaan'] ?></td>
                        <td><?php echo $d['sisa_stok'] ?></td>
                        <td style="color:blue; font-weight:bold;">
                            <?php echo $d['prediksi_produksi'] ?>
                        </td>
                        <td>
                            <a href=<?php echo base_url("admin/prediksi_edit/") . $d['id_hasil_prediksi']; ?>> <i
                                    class="fas fa-pencil-alt"></i> </a>
                            <a href=<?php echo base_url("admin/prediksi_detil/") . $d['id_hasil_prediksi']; ?>>
                                <i class="fas fa-search-plus"></i></a>
                            <a href=<?php echo base_url("admin/prediksi_hapus/") . $d['id_hasil_prediksi']; ?>
                                onclick="return confirm('Yakin menghapus prediksi?');" ;><i
                                    class="fas fa-trash-alt"></i></a>

                        </td>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
            </div>
    </section>
</div>

<?php
    // ------------------------------------------- Tambah / Generate Prediksi ----------------------------------
} else if ($page == 'prediksi_tambah') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="<?php echo base_url('admin/generate_fuzzy'); ?>" class="form-horizontal">

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id_hasil_prediksi" class="col-sm-2 col-form-label">ID Prediksi</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="id_hasil_prediksi"
                                    id="id_hasil_prediksi" value="<?php echo $ihp_terakhir + 1 ?>"
                                    placeholder="Masukkan id prediksi" readonly>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_hasil_prediksi')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-2 col-form-label">Pilih Buku</label>
                            <div class="col-sm-10">
                                <?php echo form_dropdown('id_buku', $ddbuku, set_value('id_buku')); ?>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_buku')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_bulan" class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-10">
                                <?php echo form_dropdown('id_bulan', $ddbulan, set_value('id_bulan')); ?>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_bulan')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="tahun" id="tahun"
                                    value="<?php echo set_value('tahun'); ?>" placeholder="Masukkan tahun produksi">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('tahun')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permintaan" class="col-sm-2 col-form-label">Permintaan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="permintaan" id="permintaan"
                                    value="<?php echo set_value('permintaan'); ?>"
                                    placeholder="Masukkan jumlah permintaan">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('permintaan')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sisa_stok" class="col-sm-2 col-form-label">Sisa Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="sisa_stok" id="sisa_stok"
                                    value="<?php echo set_value('sisa_stok'); ?>" placeholder="Masukkan sisa stok">
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('sisa_stok')); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Generate</button>
                        <a class="btn btn-danger" href="<?php echo base_url('admin/prediksi'); ?>">
                            Batal</a>
                    </div>
                </form>


            </div>
    </section>
</div>
<?php

    //--------------------------------- Edit Prediksi ---------------------------------
} else if ($page == 'prediksi_edit') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="<?php echo base_url('admin/prediksi_edit/' . $d['id_hasil_prediksi']); ?>"
                    class="form-horizontal">

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-2 col-form-label">Pilih Buku</label>
                            <div class="col-sm-10">
                                <?php echo form_dropdown('id_buku', $ddbuku, set_value('id_buku', $d['id_buku']), 'class=form-control'); ?>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_buku')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_bulan" class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-10">
                                <?php echo form_dropdown('id_bulan', $ddbulan, set_value('id_bulan', $d['id_bulan']), 'class=form-control'); ?>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('id_bulan')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="tahun" id="tahun"
                                    value="<?php echo set_value('tahun', $d['tahun']); ?>" placeholder="Masukkan Tahun">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('tahun')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permintaan" class="col-sm-2 col-form-label">Permintaan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="permintaan" id="permintaan"
                                    value="<?php echo set_value('permintaan', $d['permintaan']); ?>" readonly>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('permintaan')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sisa_stok" class="col-sm-2 col-form-label">Sisa Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="sisa_stok" id="sisa_stok"
                                    value="<?php echo set_value('sisa_stok', $d['sisa_stok']); ?>" readonly>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('sisa_stok')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prediksi_produksi" class="col-sm-2 col-form-label">Produksi</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="prediksi_produksi"
                                    id="prediksi_produksi"
                                    value="<?php echo set_value('prediksi_produksi', $d['prediksi_produksi']); ?>"
                                    readonly>
                                <span
                                    class="badge badge-warning"><?php echo strip_tags(form_error('prediksi_produksi')); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a class="btn btn-danger" href="<?php echo base_url('admin/prediksi'); ?>">
                            Batal</a>
                    </div>
                </form>
            </div>
    </section>
</div>
<?php
} else if ($page == 'prediksi_detil') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-12 judul">
                <h1><?php echo  $judul; ?></h1>
                <h4><?php echo  $subjudul; ?></h4>
            </div>
            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <div class=" perhitungan_fuzzy">
                            <div class="row">
                                <div class="info_prediksi" style="padding:5px ;">
                                    <table>
                                        <p><b>Informasi Prediksi</b></p>
                                        <tr>
                                            <td>ID Prediksi</td>
                                            <td><span class="tab"></span>:</td>
                                            <td><?php echo $d['id_hasil_prediksi'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Buku</td>
                                            <td><span class="tab"></span>:</td>
                                            <td><?php echo $d['nama_buku'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bulan </td>
                                            <td><span class="tab"></span>:</td>
                                            <td><?php echo $d['nama_bulan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun </td>
                                            <td><span class="tab"></span>:</td>
                                            <td><?php echo $d['tahun'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="perhitungan_maxmin">
                                        <table id="datatable_02" class="table table-bordered">
                                            <p><b>Data Tertinggi dan Terendah</b></p>
                                            <tr>
                                                <td>Sisa stok tertinggi</td>
                                                <td><?php echo $d['max_sisa'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sisa stok terendah</td>
                                                <td><?php echo $d['min_sisa'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>permintaan tertinggi</td>
                                                <td><?php echo $d['max_permintaan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>permintaan terendah</td>
                                                <td><?php echo $d['min_permintaan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>produksi tertinggi</td>
                                                <td><?php echo $d['max_produksi'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>produksi terendah</td>
                                                <td><?php echo $d['min_produksi'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <div class="new_data">
                                        <table id="datatable_02" class="table table-bordered">
                                            <p><b>Input Prediksi</b></p>
                                            <tr>
                                                <td>Sisa stok</td>
                                                <td><?php echo $d['new_sisa_stok'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Permintaan</td>
                                                <td><?php echo $d['new_permintaan'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="fuzzifikasi">
                                        <table id="datatable_02" class="table table-bordered">
                                            <p><b>Fuzzifikasi</b></p>
                                            <tr>
                                                <td>Sisa Stok Banyak</td>
                                                <td><?php echo $d['sisa_banyak'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sisa Stok Sedikit</td>
                                                <td><?php echo $d['sisa_sedikit'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Permintaan Naik</td>
                                                <td><?php echo $d['permintaan_naik'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Permintaan Turun</td>
                                                <td><?php echo $d['permintaan_turun'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rules-inferensi">
                                        <table id="datatable_02" class="table table-bordered">
                                            <p><b>Rules</b></p>
                                            <tr>
                                                <td>R1</td>
                                                <td>IF Sisa Stok BANYAK AND Permintaan NAIK THEN Produksi BERTAMBAH
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>R2</td>
                                                <td>IF Sisa Stok SEDIKIT AND Permintaan NAIK THEN Produksi BERTAMBAH
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>R3</td>
                                                <td>IF Sisa Stok BANYAK AND Permintaan TURUN THEN Produksi BERKURANG
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>R4</td>
                                                <td>IF Sisa Stok SEDIKIT AND Permintaan TURUN THEN Produksi
                                                    BERKURANG</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="inferensi">
                                        <table id="datatable_02" class="table table-bordered">
                                            <p><b>Inferensi</b></p>
                                            <thead>
                                                <tr>
                                                    <th>Rules</th>
                                                    <th>&#x3B1;</th>
                                                    <th>Z</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>R1</td>
                                                <td><?php echo $d['a_rules_1'] ?></td>
                                                <td><?php echo $d['z_rules_1'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>R2</td>
                                                <td><?php echo $d['a_rules_2'] ?></td>
                                                <td><?php echo $d['z_rules_2'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>R3</td>
                                                <td><?php echo $d['a_rules_3'] ?></td>
                                                <td><?php echo $d['z_rules_3'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>R4</td>
                                                <td><?php echo $d['a_rules_4'] ?></td>
                                                <td><?php echo $d['z_rules_4'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="defuzzifikasi">
                                        <table id="datatable_02" class="table table-bordered">
                                            <p><b>Defuzzifikasi</b></p>
                                            <tr>
                                                <td>Z</td>
                                                <td>=</td>
                                                <td><?php echo $d['z_defuzzifikasi'] ?></td>
                                            </tr>
                                            <tr style="color: blue; font-weight: 600;">
                                                <td>Hasil</td>
                                                <td>=</td>
                                                <td><?php echo $d['hasil_defuzzifikasi'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
<?php
}
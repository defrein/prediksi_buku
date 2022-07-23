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
                        <a href="<?php echo base_url('admin/santri') ?>" class="small-box-footer">More info <i
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
                        <a href="<?php echo base_url('admin/guru') ?>" class="small-box-footer">More info <i
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
                <h2>Info</h2>
                <p>Ini adalah contoh sistem informasi menggunakan CI3 dengan sistem login,
                    dan menggunakan data yang berelasi. Didalamnya juga menggunakan sistem
                    multilogin untuk membedakan level user tertentu.<br>
                    Besar harapan contoh coding ini bermanfaat sebagai start awal memahami
                    membangun sebuah sistem informasi yang lebih rumit.</p>
                <p>Dosen pengampu: Agus SBN</p>

            </div>
            <div class="card-footer">
                Create By VIDEF@2022
            </div>
        </div>

    </section>
</div>
<?php
}
//==================================== SANTRI ====================================
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
                    Tambah Santri</a>
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
                            <a href=<?php echo base_url("admin/buku_edit/") . $d['id_buku']; ?>><button type="button"
                                    class="btn btn-warning">Ubah</button></a>
                            <a href=href=<?php echo base_url("admin/buku_hapus/") . $d['id_buku']; ?>
                                onclick="return confirm('Yakin menghapus Santri : <?php echo $d['nama_buku']; ?> ?');"
                                ;><button type="button" class="btn btn-danger">Hapus</button></a>

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
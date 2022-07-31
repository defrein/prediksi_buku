<?php
//==================================== HOME ====================================
if ($page == 'perhitungan') {
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo  $judul; ?></h1>
                    <div class="perhitungan_fuzzy">
                        <br>
                        <div class="perhitungan_maxmin">
                            <table>
                                <tr>
                                    <td>Data Tertinggi dan Terendah</td>
                                </tr>
                                <tr>
                                    <td>Sisa stok tertinggi</td>
                                    <td>:</td>
                                    <td><?php echo $max_sisa ?></td>
                                </tr>
                                <tr>
                                    <td>Sisa stok terendah</td>
                                    <td>:</td>
                                    <td><?php echo $min_sisa ?></td>
                                </tr>
                                <tr>
                                    <td>permintaan tertinggi</td>
                                    <td>:</td>
                                    <td><?php echo $max_permintaan ?></td>
                                </tr>
                                <tr>
                                    <td>permintaan terendah</td>
                                    <td>:</td>
                                    <td><?php echo $min_permintaan ?></td>
                                </tr>
                                <tr>
                                    <td>produksi tertinggi</td>
                                    <td>:</td>
                                    <td><?php echo $max_produksi ?></td>
                                </tr>
                                <tr>
                                    <td>produksi terendah</td>
                                    <td>:</td>
                                    <td><?php echo $min_produksi ?></td>
                                </tr>
                            </table>
                            <br>
                            <div class="new_data">
                                <table>
                                    <tr>
                                        <td>Berdasarkan Data Baru:</td>
                                    </tr>
                                    <tr>
                                        <td>Sisa stok</td>
                                        <td>:</td>
                                        <td><?php echo $newsisa ?></td>
                                    </tr>
                                    <tr>
                                        <td>Permintaan</td>
                                        <td>:</td>
                                        <td><?php echo $newpermintaan ?></td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <div class="fuzzifikasi">
                                <table>
                                    <tr>
                                        <td>Fuzzifikasi:</td>
                                    </tr>
                                    <tr>
                                        <td>Sisa Stok Banyak</td>
                                        <td>:</td>
                                        <td><?php echo $sisa_banyak ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sisa Stok Sedikit</td>
                                        <td>:</td>
                                        <td><?php echo $sisa_sedikit ?></td>
                                    </tr>
                                    <tr>
                                        <td>Permintaan Naik</td>
                                        <td>:</td>
                                        <td><?php echo $permintaan_naik ?></td>
                                    </tr>
                                    <tr>
                                        <td>Permintaan Turun</td>
                                        <td>:</td>
                                        <td><?php echo $permintaan_turun ?></td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <div class="inferensi">
                                <table>
                                    <tr>
                                        <td>Fuzzifikasi:</td>
                                    </tr>
                                    <tr>
                                        <td>R1 &#x3B1;</td>
                                        <td>:</td>
                                        <td><?php echo $a_rules_1 ?></td>
                                    </tr>
                                    <tr>
                                        <td>R2 &#x3B1;</td>
                                        <td>:</td>
                                        <td><?php echo $a_rules_2 ?></td>
                                    </tr>
                                    <tr>
                                        <td>R3 &#x3B1;</td>
                                        <td>:</td>
                                        <td><?php echo $a_rules_3 ?></td>
                                    </tr>
                                    <tr>
                                        <td>R4 &#x3B1;</td>
                                        <td>:</td>
                                        <td><?php echo $a_rules_4 ?></td>
                                    </tr>
                                    <tr>
                                        <td>R1 Z</td>
                                        <td>:</td>
                                        <td><?php echo $z_rules_1 ?></td>
                                    </tr>
                                    <tr>
                                        <td>R2 Z</td>
                                        <td>:</td>
                                        <td><?php echo $z_rules_2 ?></td>
                                    </tr>
                                    <tr>
                                        <td>R3 Z</td>
                                        <td>:</td>
                                        <td><?php echo $z_rules_3 ?></td>
                                    </tr>
                                    <tr>
                                        <td>R4 Z</td>
                                        <td>:</td>
                                        <td><?php echo $z_rules_4 ?></td>
                                    </tr>
                                    <br>
                                </table>
                            </div>
                            <br>
                            <div class="defuzzifikasi">
                                <table>
                                    <tr>
                                        <td>Defuzzifikasi</td>
                                    </tr>
                                    <tr>
                                        <td>Z</td>
                                        <td>=</td>
                                        <td><?php echo $z_defuzzifikasi ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hasil</td>
                                        <td>=</td>
                                        <td><?php echo $hasil_defuzzifikasi ?></td>
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
<?php
}
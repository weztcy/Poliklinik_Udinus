<?php
    require 'config/koneksi.php'; // Menghubungkan ke database
    $id = $_GET['id']; // Mengambil parameter id dari URL
    // Menjalankan query untuk mendapatkan detail periksa berdasarkan id daftar poli
    $ambilDetail = mysqli_query($mysqli, "SELECT 
        dp.id as idDetailPeriksa,
        daftar_poli.id as idDaftarPoli,
        poli.nama_poli,
        dokter.nama,
        jadwal_periksa.hari,
        DATE_FORMAT(jadwal_periksa.jam_mulai, '%H:%i') as jamMulai,
        DATE_FORMAT(jadwal_periksa.jam_selesai, '%H:%i') as jamSelesai,
        daftar_poli.no_antrian,
        p.id as idPeriksa,
        p.tgl_periksa,
        p.catatan,
        p.biaya_periksa,
        GROUP_CONCAT(o.id) as idObat,
        GROUP_CONCAT(o.nama_obat) as namaObat
        FROM daftar_poli
        INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
        INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
        INNER JOIN poli ON dokter.id_poli = poli.id
        LEFT JOIN periksa p ON daftar_poli.id = p.id_daftar_poli
        LEFT JOIN detail_periksa dp ON p.id = dp.id_periksa
        LEFT JOIN obat o ON dp.id_obat = o.id
        WHERE daftar_poli.id = '$id'
        GROUP BY p.id");

    // Mengambil data hasil query dan menyimpannya dalam variabel $data
    $data = mysqli_fetch_assoc($ambilDetail);
?>

<!-- Card Detail Periksa -->
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <!-- Card Header -->
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Detail Periksa
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <!-- Menampilkan detail dokter, poli, dan jadwal -->
                            <div class="col-7">
                                <h2 class="lead"><b><?php echo $data['nama'] ?></b></h2>
                                <h6 class="text-muted text-lg">Poli <?php echo $data['nama_poli'] ?></h6>
                                <h6 class="text-muted text-lg"><?php echo $data['hari'] ?></h6>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="large"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                                        <?php echo $data['jamMulai'] ?> - <?php echo $data['jamSelesai'] ?></li>
                                </ul>
                                <br><br>
                                <p class="text-muted text-lg"> Obat yang harus dikonsumsi : <br>
                                    <?php 
                                    // Mengubah daftar obat menjadi array dan menampilkannya satu per satu
                                    $namaObatArray = explode(',', $data['namaObat']);
                                    foreach ($namaObatArray as $index => $namaObat) {
                                        echo ($index + 1) . ". " . $namaObat . "<br>";
                                    }
                                    ?>
                                </p>
                                <h5 class="text-muted text-lg"><strong>Biaya Periksa : <?php echo $data['biaya_periksa'] ?></strong></h5>
                            </div>
                            <!-- Menampilkan No Antrian -->
                            <div class="col-5 flex justify-center items-center flex-col">
                                <h2 class="lead"><b>No Antrian</b></h2>
                                <div class="rounded-lg flex justify-center items-center"
                                    style="height: 60px; width: 60px; background-color: #0284c7; color: white; padding-top: 6px;">
                                    <h1><?php echo $data['no_antrian'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <!-- Tombol Kembali ke Daftar Poli -->
                        <div class="text-left">
                            <a href="daftarPoliklinik.php" class="btn btn-md btn-secondary">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer -->
</div>

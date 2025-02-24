<section class="content pt-4 px-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header bg-dark">
                    <h3 class="card-title text-white">Daftar Poli</h3>
                </div>
                <div class="card-body">
                    <!-- Form untuk mendaftar poli -->
                    <form action="pages/daftarPoli/daftarPoli.php" method="post">
                        <!-- Input untuk nomor rekam medis -->
                        <div class="form-group mb-3">
                            <label for="no_rm">No Rekam Medis</label>
                            <input type="text" class="form-control" name="no_rm" value="<?php echo $_SESSION['no_rm'] ?>" readonly required>
                        </div>
                        <!-- Dropdown untuk memilih poli -->
                        <div class="form-group">
                            <label for="poli">Pilih Poli</label>
                            <select class="form-control" id="poli" name="poli" required>
                                <option value="" disabled selected>Pilih Poli</option>
                                <?php
                                // Menghubungkan ke database dan mengambil data poli
                                require 'config/koneksi.php';
                                $query = "SELECT * FROM poli"; // Query untuk mengambil data poli
                                $result = mysqli_query($mysqli, $query); // Menjalankan query
                                
                                // Loop untuk menampilkan data poli ke dalam dropdown
                                while ($dataPoli = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $dataPoli['id'] ?>">
                                    <?php echo $dataPoli['nama_poli'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Dropdown untuk memilih jadwal -->
                        <div class="form-group mb-3">
                            <label for="jadwal">Pilih Jadwal</label>
                            <select class="form-control" id="jadwal" name="jadwal" required>
                            </select>
                        </div>
                        <!-- Input untuk keluhan pasien -->
                        <div class="form-group mb-3">
                            <label for="keluhan">Keluhan</label>
                            <textarea class="form-control" rows="3" id="keluhan" name="keluhan" required></textarea>
                        </div>
                        <!-- Tombol untuk submit form -->
                        <button type="submit" class="btn btn-block btn-primary">
                            Daftar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header bg-dark">
                    <h3 class="card-title text-white">Riwayat Daftar Poli</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <!-- Tabel untuk menampilkan riwayat daftar poli -->
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Poli</th>
                                <th class="text-center">Dokter</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Mulai</th>
                                <th class="text-center">Selesai</th>
                                <th class="text-center">Antrian</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Menghubungkan ke database dan menampilkan riwayat daftar poli
                            require 'config/koneksi.php';
                            $no = 1; // Inisialisasi nomor urut
                            
                            // Query untuk mengambil data riwayat poli berdasarkan pasien
                            $query = "SELECT daftar_poli.id as idDaftarPoli, poli.nama_poli, dokter.nama, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, daftar_poli.no_antrian 
                                      FROM daftar_poli 
                                      INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id 
                                      INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
                                      INNER JOIN poli ON dokter.id_poli = poli.id 
                                      WHERE daftar_poli.id_pasien = '$idPasien'"; // Query untuk mengambil data berdasarkan id pasien
                            $result = mysqli_query($mysqli, $query); // Menjalankan query
                            
                            // Loop untuk menampilkan data riwayat daftar poli
                            while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $data['nama_poli'] ?></td>
                                <td class="text-center"><?php echo $data['nama'] ?></td>
                                <td class="text-center"><?php echo $data['hari'] ?></td>
                                <td class="text-center"><?php echo $data['jam_mulai'] ?></td>
                                <td class="text-center"><?php echo $data['jam_selesai'] ?></td>
                                <td class="text-center"><?php echo $data['no_antrian'] ?></td>
                                <td class="text-center">
                                    <a href="detailDaftarPoli.php?id=<?php echo $data['idDaftarPoli'] ?>" class='btn btn-sm btn-success edit-btn'>Detail</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
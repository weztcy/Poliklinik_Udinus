<!-- Main content -->
<div class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Button Edit Profil di luar card, kanan atas -->
                <div style="text-align: right; margin-bottom: 15px;">
                    <button 
                        type="button" 
                        class="btn btn-sm edit-btn text-white" 
                        style="background-color: #007BFF; padding: 0.5rem 1rem; border-radius: 8px;" 
                        data-toggle="modal" 
                        data-target="#editModal">
                        <i class="fas fa-pencil-alt mr-1"></i>Edit Profile
                    </button>
                </div>

                <!-- Card untuk Tabel Data -->
                <div class="card">
                    <!-- Card Body dengan Tabel -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered text-nowrap" style="width: 100%; table-layout: fixed;">
                            <colgroup>
                                <col style="width: 50%;"> <!-- Kolom pertama -->
                                <col style="width: 50%;"> <!-- Kolom kedua -->
                            </colgroup>
                            <tbody>
                                <!-- TAMPILKAN DATA Poli DI SINI -->
                                <?php
                                require 'config/koneksi.php';

                                $query = "SELECT dokter.id, dokter.nama, dokter.alamat, dokter.no_hp FROM dokter WHERE id = '$id_dokter'";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <th style="padding-left: 75px;">Nama</th>
                                    <td style="padding-left: 75px;"><?php echo htmlspecialchars($data['nama']); ?></td>
                                </tr>
                                <tr>
                                    <th style="padding-left: 75px;">Alamat</th>
                                    <td style="padding-left: 75px; white-space: pre-line;"><?php echo htmlspecialchars($data['alamat']); ?></td>
                                </tr>
                                <tr>
                                    <th style="padding-left: 75px;">No HP</th>
                                    <td style="padding-left: 75px;"><?php echo htmlspecialchars($data['no_hp']); ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- Modal Edit Data Poli -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Data Poli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form edit data poli disini -->
                <form action="pages/dokter/updateProfilDokter.php" method="post">
                    <?php
                    // Ambil data pertama dari hasil query (karena tombol di atas tabel hanya berfungsi untuk satu dokter)
                    if ($result && mysqli_num_rows($result) > 0) {
                        mysqli_data_seek($result, 0); // Posisikan ulang ke baris pertama
                        $data = mysqli_fetch_assoc($result);
                    ?>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>" required>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" rows="3" id="alamat" name="alamat" required><?php echo $data['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <?php } else { ?>
                        <p>Data tidak ditemukan.</p>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>

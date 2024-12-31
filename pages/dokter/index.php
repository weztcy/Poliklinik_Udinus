<div class="content">
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-12">
                <!-- Tombol Tambah Dokter Dikanan -->
                <div class="mb-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        <i class="bi bi-plus-circle"></i> Tambah Dokter
                    </button>
                </div>

                <!-- Modal Tambah Data Dokter -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Data Dokter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="pages/dokter/tambahDokter.php" method="post">
                                    <div class="form-group">
                                        <label for="nama_dokter">Nama Dokter</label>
                                        <input type="text" class="form-control" id="nama_dokter" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" rows="3" id="alamat" name="alamat"
                                            placeholder="Masukkan alamat" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="poli">Poli</label>
                                        <select class="form-control" id="poli" name="poli" required>
                                            <?php
                                            require 'config/koneksi.php';
                                            $query = "SELECT * FROM poli";
                                            $result = mysqli_query($mysqli, $query);
                                            while ($dataPoli = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $dataPoli['id']; ?>">
                                                <?php echo $dataPoli['nama_poli']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Data Dokter -->
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokter</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Poli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'config/koneksi.php';
                                $no = 1;
                                $query = "SELECT dokter.id, dokter.nama, dokter.alamat, dokter.no_hp, poli.nama_poli FROM dokter INNER JOIN poli ON dokter.id_poli = poli.id";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td style="white-space: pre-line;"><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['no_hp']; ?></td>
                                    <td><?php echo $data['nama_poli']; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-warning btn-sm btn-block"
                                                    data-toggle="modal"
                                                    data-target="#editModal<?php echo $data['id']; ?>">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-danger btn-sm btn-block"
                                                    data-toggle="modal"
                                                    data-target="#hapusModal<?php echo $data['id']; ?>">
                                                    <i class="bi bi-trash3-fill"></i> Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit Dokter -->
                                <div class="modal fade" id="editModal<?php echo $data['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data Dokter</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="pages/dokter/updateDokter.php" method="post">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <div class="form-group">
                                                        <label for="nama">Nama Dokter</label>
                                                        <input type="text" class="form-control" name="nama"
                                                            value="<?php echo $data['nama']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" name="alamat" rows="3"
                                                            required><?php echo $data['alamat']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">Nomor HP</label>
                                                        <input type="text" class="form-control" name="no_hp"
                                                            value="<?php echo $data['no_hp']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="poli">Poli</label>
                                                        <select class="form-control" name="poli" required>
                                                            <?php
                                                            $queryPoli = "SELECT * FROM poli";
                                                            $resultPoli = mysqli_query($mysqli, $queryPoli);
                                                            while ($dataPoli = mysqli_fetch_assoc($resultPoli)) {
                                                                $selected = $dataPoli['id'] == $data['id_poli'] ? 'selected' : '';
                                                            ?>
                                                            <option value="<?php echo $dataPoli['id']; ?>"
                                                                <?php echo $selected; ?>>
                                                                <?php echo $dataPoli['nama_poli']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus Dokter -->
                                <div class="modal fade" id="hapusModal<?php echo $data['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data Dokter</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="pages/dokter/hapusDokter.php" method="post">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <p>Apakah Anda yakin ingin menghapus data
                                                        <strong><?php echo $data['nama']; ?></strong>?</p>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

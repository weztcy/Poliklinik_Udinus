<!-- Main content -->
<div class="content">
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-12">
                <!-- Tombol Tambah Pasien -->
                <div class="mb-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        <i class="bi bi-plus-circle"></i> Tambah Pasien
                    </button>
                </div>

                <!-- Modal Tambah Data Pasien -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Data Pasien</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="pages/pasien/tambahPasien.php" method="post">
                                    <div class="form-group">
                                        <label for="nama">Nama Pasien</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" rows="3" id="alamat" name="alamat"
                                            placeholder="Masukkan Alamat" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_ktp">No KTP</label>
                                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No HP</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Data Pasien -->
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>No KTP</th>
                                    <th>No HP</th>
                                    <th>No Rekam Medis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'config/koneksi.php';
                                $no = 1;
                                $query = "SELECT * FROM pasien";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['no_ktp']; ?></td>
                                    <td><?php echo $data['no_hp']; ?></td>
                                    <td><?php echo $data['no_rm']; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-warning btn-sm mx-1"
                                                data-toggle="modal"
                                                data-target="#editModal<?php echo $data['id']; ?>" style="width: 50%;">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm mx-1"
                                                data-toggle="modal"
                                                data-target="#hapusModal<?php echo $data['id']; ?>" style="width: 50%;">
                                                <i class="bi bi-trash3-fill"></i> Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit Data Pasien -->
                                <div class="modal fade" id="editModal<?php echo $data['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data Pasien</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="pages/pasien/updatePasien.php" method="post">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <div class="form-group">
                                                        <label for="nama">Nama Pasien</label>
                                                        <input type="text" class="form-control" name="nama"
                                                            value="<?php echo $data['nama']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" name="alamat" rows="3"
                                                            required><?php echo $data['alamat']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_ktp">No KTP</label>
                                                        <input type="text" class="form-control" name="no_ktp"
                                                            value="<?php echo $data['no_ktp']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">No HP</label>
                                                        <input type="text" class="form-control" name="no_hp"
                                                            value="<?php echo $data['no_hp']; ?>" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus Data Pasien -->
                                <div class="modal fade" id="hapusModal<?php echo $data['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data Pasien</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="pages/pasien/hapusPasien.php" method="post">
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

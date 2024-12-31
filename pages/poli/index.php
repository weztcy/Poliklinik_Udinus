<!-- Main content -->
<div class="content">
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-12">
                <!-- Tombol Tambah Poli -->
                <div class="mb-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        <i class="bi bi-plus-circle"></i> Tambah Poli
                    </button>
                </div>

                <!-- Modal Tambah Data Poli -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Data Poli</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="pages/poli/tambahPoli.php" method="post">
                                    <div class="form-group">
                                        <label for="nama_poli">Nama Poli</label>
                                        <input type="text" class="form-control" id="nama_poli" name="nama_poli" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" rows="3" id="keterangan" name="keterangan"
                                            placeholder="Masukkan keterangan" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Data Poli -->
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Poli</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'config/koneksi.php';
                                $no = 1;
                                $query = "SELECT * FROM poli";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama_poli']; ?></td>
                                    <td style="white-space: pre-line;"><?php echo $data['keterangan']; ?></td>
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

                                <!-- Modal Edit Data Poli -->
                                <div class="modal fade" id="editModal<?php echo $data['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data Poli</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="pages/poli/updatePoli.php" method="post">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <div class="form-group">
                                                        <label for="nama_poli">Nama Poli</label>
                                                        <input type="text" class="form-control" name="nama_poli"
                                                            value="<?php echo $data['nama_poli']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="keterangan">Keterangan</label>
                                                        <textarea class="form-control" name="keterangan" rows="3"
                                                            required><?php echo $data['keterangan']; ?></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus Data Poli -->
                                <div class="modal fade" id="hapusModal<?php echo $data['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data Poli</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="pages/poli/hapusPoli.php" method="post">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <p>Apakah Anda yakin ingin menghapus data
                                                        <strong><?php echo $data['nama_poli']; ?></strong>?</p>
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

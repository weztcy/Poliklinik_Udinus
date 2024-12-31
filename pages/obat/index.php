<!-- Main content -->
<div class="content">
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-12">
                <!-- Tombol Tambah Obat -->
                <div class="mb-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        <i class="bi bi-plus-circle"></i> Tambah Obat
                    </button>
                </div>

                <!-- Modal Tambah Data Obat -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Data Obat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="pages/obat/tambahObat.php" method="post">
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Obat</label>
                                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kemasan">Kemasan</label>
                                        <input type="text" class="form-control" id="kemasan" name="kemasan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" class="form-control" id="harga" name="harga" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Data Obat -->
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Kemasan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'config/koneksi.php';
                                $no = 1;
                                $query = "SELECT * FROM obat";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama_obat']; ?></td>
                                    <td><?php echo $data['kemasan']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
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

                                <!-- Modal Edit Data Obat -->
                                <div class="modal fade" id="editModal<?php echo $data['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data Obat</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="pages/obat/updateObat.php" method="post">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <div class="form-group">
                                                        <label for="nama_obat">Nama Obat</label>
                                                        <input type="text" class="form-control" name="nama_obat"
                                                            value="<?php echo $data['nama_obat']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kemasan">Kemasan</label>
                                                        <input type="text" class="form-control" name="kemasan"
                                                            value="<?php echo $data['kemasan']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harga">Harga</label>
                                                        <input type="text" class="form-control" name="harga"
                                                            value="<?php echo $data['harga']; ?>" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus Data Obat -->
                                <div class="modal fade" id="hapusModal<?php echo $data['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data Obat</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="pages/obat/hapusObat.php" method="post">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <p>Apakah Anda yakin ingin menghapus data
                                                        <strong><?php echo $data['nama_obat']; ?></strong>?</p>
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

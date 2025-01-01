<!-- Main content -->
<div class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    require 'config/koneksi.php';
                                    $query = "SELECT pasien.nama, daftar_poli.keluhan, daftar_poli.status_periksa, daftar_poli.id FROM daftar_poli INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id WHERE dokter.id = '$id_dokter'";
                                    $result = mysqli_query($mysqli,$query);

                                    while ($data = mysqli_fetch_assoc($result)) {
                                        # code...
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['keluhan']; ?></td>
                                    <td>
                                        <?php if ($data['status_periksa']==1) {
                                        ?>
                                        <button type='button' class='btn btn-sm btn-warning edit-btn'
                                            data-toggle="modal"
                                            data-target="#editModal<?php echo $data['id'] ?>">Edit</button>
                                            <!-- Edit Modal -->
<div class="modal fade" id="editModal<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Periksa Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit -->
                <?php
                    $idDaftarPoli = $data['id'];
                    require 'config/koneksi.php';
                    $ambilDataPeriksa = mysqli_query($mysqli, "SELECT * FROM periksa INNER JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id WHERE daftar_poli.id = '$idDaftarPoli'");
                    $ambilData = mysqli_fetch_assoc($ambilDataPeriksa);
                ?>
                <form action="pages/periksaPasien/editPeriksa.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo $data['nama'] ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="tanggal_periksa">Tanggal Periksa</label>
                        <input type="datetime-local" class="form-control" id="tanggal_periksa" name="tanggal_periksa" required value="<?php echo $ambilData['tgl_periksa'] ?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" rows="3" id="catatan" name="catatan" required><?php echo $ambilData['catatan'] ?></textarea>
                    </div>

                    <!-- Obat Section (Pre-select Obat yang sudah dipilih sebelumnya) -->
                    <div class="form-group mb-3">
                        <label>Obat</label>
                        <select class="select2" multiple="multiple" data-placeholder="Pilih Obat" style="width: 100%;" name="obat[]">
                            <?php
                                $getObat = "SELECT * FROM obat";
                                $queryObat = mysqli_query($mysqli, $getObat);
                                
                                // Ambil obat yang sudah dipilih untuk periksa ini
                                $getObatDipilih = "SELECT id_obat FROM detail_periksa WHERE id_periksa = '{$ambilData['id']}'";
                                $queryObatDipilih = mysqli_query($mysqli, $getObatDipilih);
                                $obatDipilih = [];
                                while ($row = mysqli_fetch_assoc($queryObatDipilih)) {
                                    $obatDipilih[] = $row['id_obat'];
                                }

                                // Menampilkan semua obat dengan yang sudah dipilih
                                while ($datas = mysqli_fetch_assoc($queryObat)) {
                                    $selected = in_array($datas['id'], $obatDipilih) ? 'selected' : '';
                                    echo "<option value='{$datas['id']}' {$selected}>{$datas['nama_obat']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

                                        </div>
                                        <?php  } else { ?>
                                        <button type='button' class='btn btn-sm btn-info edit-btn' data-toggle="modal"
                                            data-target="#periksaModal<?php echo $data['id'] ?>">Periksa</button>
                                        <div class="modal fade" id="periksaModal<?php echo $data['id'] ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Periksa Pasien</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form tambah data obat disini -->
                                                        <form action="pages/periksaPasien/periksaPasien.php"
                                                            method="post">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $data['id'] ?>">
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pasien</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" required
                                                                    value="<?php echo $data['nama'] ?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tanggal_periksa">Tanggal Periksa</label>
                                                                <input type="datetime-local" class="form-control"
                                                                    id="tanggal_periksa" name="tanggal_periksa"
                                                                    required>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="catatan">Catatan</label>
                                                                <textarea class="form-control" rows="3" id="catatan"
                                                                    name="catatan" required></textarea>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label>Obat</label>
                                                                <select class="select2" multiple="multiple"
                                                                    data-placeholder="Pilih Obat" style="width: 100%;"
                                                                    name="obat[]">
                                                                    <?php 
                                                                        require 'config/koneksi.php';
                                                                        $getObat = "SELECT * FROM obat";
                                                                        $queryObat = mysqli_query($mysqli,$getObat);
                                                                        while ($datas = mysqli_fetch_assoc($queryObat)) {
                                                                    ?>
                                                                    <option value="<?php echo $datas['id'] ?>">
                                                                        <?php echo $datas['nama_obat'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-info">Periksa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </td>
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
<script>
    function hitungTotal() {
        // Ambil semua elemen select dengan name "obat[]"
        var selectedObat = document.querySelectorAll('select[name="obat[]"] option:checked');
        
        var totalHarga = 150000; // Harga awal
        // Iterasi melalui obat yang dipilih dan tambahkan harga masing-masing
        selectedObat.forEach(function(option) {
            totalHarga += parseInt(option.getAttribute('data-harga')) || 0;
        });

        // Tampilkan total harga
        document.getElementById('totalHarga').innerText = 'Total Harga: ' + totalHarga;
    }
</script>
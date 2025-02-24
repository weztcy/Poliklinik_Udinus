<?php
require '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $tanggalPeriksa = $_POST['tanggal_periksa'];
    $catatan = $_POST['catatan'];
    $arrayObat = $_POST['obat'];

    // Update status periksa
    $updateStatus = "UPDATE daftar_poli SET status_periksa = '1' WHERE id = '$id'";
    $query = mysqli_query($mysqli, $updateStatus);

    if ($query) {
        // Insert data pemeriksaan
        $insertPeriksa = "INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan, biaya_periksa) VALUES ('$id', '$tanggalPeriksa', '$catatan', 150000)";
        $queryInsertPeriksa = mysqli_query($mysqli, $insertPeriksa);

        if ($queryInsertPeriksa) {
            // Ambil ID pemeriksaan yang baru ditambahkan
            $getLastData = "SELECT * FROM periksa ORDER BY id DESC LIMIT 1";
            $queryGetLastData = mysqli_query($mysqli, $getLastData);
            $getIdPeriksa = mysqli_fetch_assoc($queryGetLastData);
            $idPeriksa = $getIdPeriksa['id'];

            // Inisialisasi total biaya dengan nilai awal
            $totalBiaya = 150000;

            // Proses setiap obat dan hitung total biaya
            foreach ($arrayObat as $obat) {
                // Insert detail periksa
                $inserDetailPeriksa = "INSERT INTO detail_periksa (id_periksa, id_obat) VALUES ('$idPeriksa', '$obat')";
                $queryDetailPeriksa = mysqli_query($mysqli, $inserDetailPeriksa);

                // Ambil harga obat
                $getHargaObat = "SELECT harga FROM obat WHERE id = '$obat'";
                $queryHargaObat = mysqli_query($mysqli, $getHargaObat);
                $hargaObat = mysqli_fetch_assoc($queryHargaObat)['harga'];

                // Tambahkan harga obat ke total biaya
                $totalBiaya += $hargaObat;

                // Cek jika terjadi error saat insert detail obat
                if (!$queryDetailPeriksa) {
                    echo '<script>alert("Error");window.location.href="../../periksaPasien.php"</script>';
                    exit; // Keluar dari skrip jika terjadi kesalahan
                }
            }

            // Update total biaya pada data periksa
            $updateTotalBiaya = "UPDATE periksa SET biaya_periksa = '$totalBiaya' WHERE id = '$idPeriksa'";
            $queryUpdateTotalBiaya = mysqli_query($mysqli, $updateTotalBiaya);

            // Tampilkan pesan sukses
            if ($queryUpdateTotalBiaya) {
                echo '<script>alert("Pasien telah diperiksa");window.location.href="../../periksaPasien.php"</script>';
            } else {
                echo '<script>alert("Error");window.location.href="../../periksaPasien.php"</script>';
            }
        }
    }
}
?>

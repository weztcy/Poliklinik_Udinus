<?php
    require '../../config/koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idDaftarPoli = $_POST['id']; // ID Daftar Poli
        $tgl_Periksa = $_POST['tanggal_periksa']; // Tanggal Periksa
        $catatan = $_POST['catatan']; // Catatan Pemeriksaan
        $arrayObat = $_POST['obat']; // Daftar Obat yang Diedit

        // Update periksa
        $queryUpdate = mysqli_query($mysqli,"UPDATE periksa SET tgl_periksa = '$tgl_Periksa', catatan = '$catatan' WHERE id_daftar_poli = '$idDaftarPoli'");
        
        if ($queryUpdate) {
            // Mendapatkan ID Periksa yang terkait dengan Daftar Poli
            $getPeriksaId = "SELECT id FROM periksa WHERE id_daftar_poli = '$idDaftarPoli'";
            $queryPeriksaId = mysqli_query($mysqli, $getPeriksaId);
            $dataPeriksa = mysqli_fetch_assoc($queryPeriksaId);
            $idPeriksa = $dataPeriksa['id']; // ID periksa yang terkait

            // Hapus obat yang lama
            $deleteObatLama = "DELETE FROM detail_periksa WHERE id_periksa = '$idPeriksa'";
            mysqli_query($mysqli, $deleteObatLama);

            // Masukkan obat yang baru
            foreach ($arrayObat as $obat) {
                $insertDetailPeriksa = "INSERT INTO detail_periksa (id_periksa, id_obat) VALUES ('$idPeriksa', '$obat')";
                mysqli_query($mysqli, $insertDetailPeriksa);
            }

            // Pastikan status periksa tetap aktif
            $updateStatus = "UPDATE daftar_poli SET status_periksa = '1' WHERE id = '$idDaftarPoli'";
            mysqli_query($mysqli, $updateStatus);

            // Menampilkan pesan sukses
            echo '<script>alert("Data berhasil diubah");window.location.href="../../periksaPasien.php"</script>';
        } else {
            // Jika query update gagal
            echo '<script>alert("Data gagal diubah");window.location.href="../../periksaPasien.php"</script>';
        }
    }
?>

<?php
include '../../config/koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST['id'];
    $idPoli = $_SESSION['id_poli'];
    $idDokter = $_SESSION['id'];
    $hari = $_POST["hari"];
    $jamMulai = $_POST["jamMulai"];
    $jamSelesai = $_POST["jamSelesai"];
    $aktif = $_POST['aktif'];

    // Set semua jadwal dokter menjadi non-aktif
    $resetAktifQuery = "UPDATE jadwal_periksa SET aktif='N' WHERE id_dokter='$idDokter'";
    mysqli_query($mysqli, $resetAktifQuery);

    // Set jadwal yang sedang diubah menjadi aktif
    $setAktifQuery = "UPDATE jadwal_periksa SET aktif='$aktif' WHERE id='$id'";
    mysqli_query($mysqli, $setAktifQuery);

    // Cek apakah ada jadwal yang tumpang tindih
    $queryOverlap = "SELECT * FROM jadwal_periksa
                    INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
                    INNER JOIN poli ON dokter.id_poli = poli.id
                    WHERE id_poli = '$idPoli' AND id_dokter = '$idDokter' 
                    AND hari = '$hari' AND ((jam_mulai < '$jamSelesai' AND jam_selesai > '$jamMulai') 
                    OR (jam_mulai < '$jamMulai' AND jam_selesai > '$jamMulai'))";
    $resultOverlap = mysqli_query($mysqli, $queryOverlap);
    
    if (mysqli_num_rows($resultOverlap) > 0) {
        echo '<script>alert("Jadwal sudah diaktifkan!");window.location.href="../../jadwalPeriksa.php";</script>';
    } else {
        // Update jadwal dokter
        $query = "UPDATE jadwal_periksa SET hari = '$hari', jam_mulai = '$jamMulai', jam_selesai = '$jamSelesai', aktif = '$aktif' WHERE id = '$id'";

        if (mysqli_query($mysqli, $query)) {
            echo '<script>';
            echo 'alert("Jadwal berhasil diubah!");';
            echo 'window.location.href = "../../jadwalPeriksa.php";';
            echo '</script>';
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    }
}

// Tutup koneksi
mysqli_close($mysqli);
?>
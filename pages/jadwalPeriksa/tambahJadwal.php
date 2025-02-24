<?php
include '../../config/koneksi.php';
session_start();

// Memeriksa apakah form dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form dan session
    $idPoli = $_SESSION['id_poli'];
    $idDokter = $_SESSION['id'];
    $hari = $_POST["hari"];
    $jamMulai = $_POST["jamMulai"];
    $jamSelesai = $_POST["jamSelesai"];

    // Query untuk mengecek apakah ada jadwal yang tumpang tindih dengan jadwal yang baru
    $queryOverlap = "SELECT * FROM jadwal_periksa 
                     INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
                     INNER JOIN poli ON dokter.id_poli = poli.id 
                     WHERE id_poli = '$idPoli' 
                     AND hari = '$hari' 
                     AND ((jam_mulai < '$jamSelesai' AND jam_selesai > '$jamMulai') 
                     OR (jam_mulai < '$jamMulai' AND jam_selesai > '$jamMulai'))";

    // Menjalankan query untuk memeriksa apakah ada jadwal tumpang tindih
    $resultOverlap = mysqli_query($mysqli, $queryOverlap);
    
    // Jika ada jadwal yang tumpang tindih, tampilkan pesan peringatan
    if (mysqli_num_rows($resultOverlap) > 0) {
        echo '<script>alert("Dokter lain telah mengambil jadwal ini");window.location.href="../../jadwalPeriksa.php";</script>';
    } else {
        // Jika tidak ada jadwal tumpang tindih, masukkan jadwal baru ke database
        $query = "INSERT INTO jadwal_periksa (id_dokter, hari, jam_mulai, jam_selesai) 
                  VALUES ('$idDokter', '$hari', '$jamMulai', '$jamSelesai')";

        // Menjalankan query untuk menyimpan data jadwal
        if (mysqli_query($mysqli, $query)) {
            // Jika berhasil, tampilkan pesan sukses dan redirect ke halaman jadwalPeriksa
            echo '<script>';
            echo 'alert("Jadwal berhasil ditambahkan!");';
            echo 'window.location.href = "../../jadwalPeriksa.php";';
            echo '</script>';
            exit();
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    }
}

// Menutup koneksi ke database
mysqli_close($mysqli);
?>

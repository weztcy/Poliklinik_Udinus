<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai id dokter yang akan dihapus
    $id = $_POST["id"];

    // Query untuk menghapus data dokter berdasarkan ID
    $query = "DELETE FROM dokter WHERE id = $id";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, tampilkan pesan sukses dan redirect ke halaman dokter
        echo '<script>';
        echo 'alert("Data dokter berhasil dihapus!");';
        echo 'window.location.href = "../../dokter.php";';
        echo '</script>';
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
?>

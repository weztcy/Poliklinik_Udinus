<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];

    // Query untuk menghapus data poli berdasarkan ID
    $query = "DELETE FROM poli WHERE id = $id";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, tampilkan pesan sukses dan redirect ke halaman poli
        echo '<script>';
        echo 'alert("Data poli berhasil dihapus!");';
        echo 'window.location.href = "../../poli.php";';
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

<?php
include("../../config/koneksi.php");

// Memeriksa apakah form dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form untuk diperbarui
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_ktp = $_POST["no_ktp"];
    $no_hp = $_POST["no_hp"];

    // Menyusun query untuk memperbarui data pasien berdasarkan ID
    $query = "UPDATE pasien SET 
        nama = '$nama', 
        alamat = '$alamat', 
        no_ktp = '$no_ktp',
        no_hp = '$no_hp'
        WHERE id = '$id'";

    // Mengeksekusi query update
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, menampilkan pesan sukses dan redirect ke halaman pasien
        echo '<script>';
        echo 'alert("Data pasien berhasil diubah!");';
        echo 'window.location.href = "../../pasien.php";';
        echo '</script>';
        exit();
    } else {
        // Jika terjadi kesalahan, menampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Menutup koneksi ke database
mysqli_close($mysqli);
?>
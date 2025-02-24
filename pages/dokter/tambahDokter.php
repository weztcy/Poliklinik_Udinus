<?php
// Menghubungkan ke database
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form POST
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $poli = $_POST["poli"];
    $password = md5($nama);

    // Query untuk menambahkan data dokter ke dalam tabel dokter
    $query = "INSERT INTO dokter (nama, password, alamat, no_hp, id_poli) VALUES ('$nama', '$password', '$alamat', '$no_hp', '$poli')";

    // Menjalankan query untuk memasukkan data ke tabel
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, tampilkan pesan sukses dan redirect ke halaman dokter.php
        echo '<script>';
        echo 'alert("Data dokter berhasil ditambahkan!");';  // Menampilkan pesan sukses
        echo 'window.location.href = "../../dokter.php";';  // Redirect ke halaman dokter.php
        echo '</script>';
        exit();  // Menghentikan eksekusi lebih lanjut setelah redirect
    } else {
        // Jika terjadi kesalahan dalam query, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);  // Menampilkan error MySQL
    }
}

// Tutup koneksi ke database
mysqli_close($mysqli);
?>

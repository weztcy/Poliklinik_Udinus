<?php

require '../../config/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan tahun dan bulan saat ini
    $tahun = date('Y');
    $bulan = date("m");

    // Mengambil data dari form
    $nama = $_POST['nama'];
    $no_ktp = $_POST['no_ktp'];
    $alamat = $_POST['alamat'];
    $password = md5($nama);  // Password dienkripsi dengan MD5 (sebaiknya gunakan hashing yang lebih aman)
    $no_hp = $_POST['no_hp'];

    // Mengambil data pasien yang sudah ada
    $searchData = "SELECT * FROM pasien";
    $query = mysqli_query($mysqli, $searchData);
    $no_rm = $tahun . $bulan . '-' . '001';  // Membuat nomor rekam medis default dengan format YYYYMM-001

    // Mengecek apakah No KTP sudah terdaftar
    $cekNoKTP = "SELECT * FROM pasien WHERE no_ktp = '$no_ktp'";
    $queryCekKTP = mysqli_query($mysqli, $cekNoKTP);

    // Jika No KTP sudah terdaftar
    if (mysqli_num_rows($queryCekKTP) > 0) {
        echo '<script>alert("No KTP telah terdaftar sebelumnya");window.location.href="../../pasien.php";</script>';
    }
    // Jika No KTP belum terdaftar, proses pendaftaran
    else {
        // Jika data pasien masih kosong (belum ada data pasien)
        if (mysqli_num_rows($query) < 1) {
            // Insert data pasien baru
            $insertData = "INSERT INTO pasien (nama, password, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$password', '$alamat', '$no_ktp', '$no_hp', '$no_rm')";
            $queryInsert = mysqli_query($mysqli, $insertData);
            if ($queryInsert) {
                echo '<script>alert("Pendaftaran akun berhasil");window.location.href="../../pasien.php";</script>';
            } else {
                echo '<script>alert("Pendaftaran akun gagal");window.location.href="../../pasien.php";</script>';
            }
        }
        // Jika sudah ada data pasien, maka generate no urut untuk nomor rekam medis (no_rm)
        else {
            // Mengambil data terakhir dari tabel pasien
            $getLastData = 'SELECT * FROM pasien ORDER BY no_rm DESC LIMIT 1';
            $querygetData = mysqli_query($mysqli, $getLastData);
            $lastData = mysqli_fetch_assoc($querygetData);

            // Mengambil digit no urut dari nomor rekam medis yang terakhir
            $substring = substr($lastData['no_rm'], 7);
            $urutanTerakhir = (int) $substring;
            $urutanTerakhir += 1;  // Increment nomor urut

            // Menyesuaikan format nomor rekam medis
            if ($urutanTerakhir > 99) {
                $no_rm_baru = $tahun . $bulan . '-' . $urutanTerakhir;
            } else if ($urutanTerakhir > 9) {
                $no_rm_baru = $tahun . $bulan . '-' . '0' . $urutanTerakhir;
            } else {
                $no_rm_baru = $tahun . $bulan . '-' . '00' . $urutanTerakhir;
            }

            // Insert data pasien baru dengan nomor rekam medis yang baru
            $insertDataBaru = "INSERT INTO pasien (nama, password, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$password', '$alamat', '$no_ktp', '$no_hp', '$no_rm_baru')";
            $queryInsertBaru = mysqli_query($mysqli, $insertDataBaru);

            if ($queryInsertBaru) {
                echo '<script>alert("Pendaftaran akun berhasil");window.location.href="../../pasien.php";</script>';
            } else {
                echo '<script>alert("Pendaftaran akun gagal");window.location.href="../../pasien.php";</script>';
            }
        }
    }
}
mysqli_close($mysqli);
?>

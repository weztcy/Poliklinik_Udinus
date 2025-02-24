<?php
    require '../../config/koneksi.php';

    // Mengecek apakah request method adalah POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tahun = date('Y');
        $bulan = date("m");

        // Mendapatkan data dari form
        $nama = $_POST['nama'];
        $no_ktp = $_POST['no_ktp'];
        $alamat = $_POST['alamat'];
        $password = md5($_POST['password']);
        $no_hp = $_POST['no_hp'];

        // Membuat no_rm default berdasarkan tahun dan bulan
        $searchData = "SELECT * FROM pasien";
        $query = mysqli_query($mysqli, $searchData);
        $no_rm = $tahun.$bulan.'-'.'001';

        // Mengecek apakah No KTP sudah terdaftar
        $cekNoKTP = "SELECT * FROM pasien WHERE no_ktp = '$no_ktp'";
        $queryCekKTP = mysqli_query($mysqli, $cekNoKTP);
        if (mysqli_num_rows($queryCekKTP) > 0) {
            // Jika No KTP sudah terdaftar, tampilkan pesan error
            echo '<script>alert("No KTP telah terdaftar sebelumnya");window.location.href="../../register.php";</script>';
        } else {
            // Jika belum ada data pasien, buat no_rm pertama
            if (mysqli_num_rows($query) < 1) {
                $insertData = "INSERT INTO pasien (nama, password, alamat, no_ktp, no_hp, no_rm) 
                               VALUES ('$nama', '$password', '$alamat', '$no_ktp', '$no_hp', '$no_rm')";
                $queryInsert = mysqli_query($mysqli, $insertData);
                if ($queryInsert) {
                    echo '<script>alert("Pendaftaran akun berhasil");window.location.href="../../loginUser.php";</script>';
                } else {
                    echo '<script>alert("Pendaftaran akun gagal");window.location.href="../../register.php";</script>';
                }
            } else {
                // Jika sudah ada data, increment urutan no_rm
                $getLastData = 'SELECT * FROM pasien ORDER BY no_rm DESC limit 1';
                $querygetData = mysqli_query($mysqli, $getLastData);
                $lastData = mysqli_fetch_assoc($querygetData);
                $substring = substr($lastData['no_rm'], 7);
                $urutanTerakhir = (int) $substring;
                $urutanTerakhir += 1;

                // Menyusun no_rm baru berdasarkan urutan
                if ($urutanTerakhir > 99) {
                    $no_rm_baru = $tahun.$bulan.'-'.$urutanTerakhir;
                } else if ($urutanTerakhir > 9 && $urutanTerakhir < 100) {
                    $no_rm_baru = $tahun.$bulan.'-'.'0'.$urutanTerakhir;
                } else {
                    $no_rm_baru = $tahun.$bulan.'-'.'00'.$urutanTerakhir;
                }

                // Menyimpan data pasien baru dengan no_rm baru
                $insertDataBaru = "INSERT INTO pasien (nama, password, alamat, no_ktp, no_hp, no_rm) 
                                   VALUES ('$nama', '$password', '$alamat', '$no_ktp', '$no_hp', '$no_rm_baru')";
                $queryInsertBaru = mysqli_query($mysqli, $insertDataBaru);

                if ($queryInsertBaru) {
                    echo '<script>alert("Pendaftaran akun berhasil");window.location.href="../../loginUser.php";</script>';
                } else {
                    echo '<script>alert("Pendaftaran akun gagal");window.location.href="../../register.php";</script>';
                }
            }
        }
    }
    // Menutup koneksi ke database
    mysqli_close($mysqli);
?>
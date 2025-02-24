<?php
    // Menghubungkan ke database
    require '../../config/koneksi.php';

    // Mengecek jika form disubmit dengan metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Mendapatkan data dari form
        $no_rm = $_POST['no_rm'];  // Nomor rekam medis
        $idJadwal = $_POST['jadwal'];  // ID Jadwal yang dipilih
        $keluhan = $_POST['keluhan'];  // Keluhan pasien
        $noAntrian = 0;  // Default nomor antrian

        // Mencari data pasien berdasarkan nomor rekam medis
        $cariPasien = "SELECT * FROM pasien WHERE no_rm = '$no_rm'";
        $query = mysqli_query($mysqli, $cariPasien);
        $data = mysqli_fetch_assoc($query);
        $idPasien = $data['id'];  // Mengambil ID Pasien

        // Mengecek apakah sudah ada data di tabel daftar_poli
        $cekData = "SELECT * FROM daftar_poli";
        $queryCekData = mysqli_query($mysqli, $cekData);

        // Jika sudah ada data
        if (mysqli_num_rows($queryCekData) > 0) {

            // Mencari nomor antrian terakhir untuk jadwal yang sama
            $cekNoAntrian = "SELECT * FROM daftar_poli WHERE id_jadwal = '$idJadwal' ORDER BY no_antrian DESC LIMIT 1";
            $queryNoAntrian = mysqli_query($mysqli, $cekNoAntrian);
            $dataPoli = mysqli_fetch_assoc($queryNoAntrian);

            // Menghitung nomor antrian baru dengan menambahkan 1 dari antrian terakhir
            $antrianTerakhir = (int) $dataPoli['no_antrian'];
            $antrianBaru = $antrianTerakhir + 1;

            // Menyimpan data pendaftaran poli ke dalam tabel daftar_poli
            $daftarPoli = "INSERT INTO daftar_poli (id_pasien, id_jadwal, keluhan, no_antrian, status_periksa) VALUES ('$idPasien', '$idJadwal', '$keluhan', '$antrianBaru', '0')";
            $queryDaftarPoli = mysqli_query($mysqli, $daftarPoli);

            // Mengecek apakah data berhasil disimpan
            if ($queryDaftarPoli) {
                echo '<script>alert("Berhasil mendaftar poli");window.location.href="../../daftarPoliklinik.php";</script>';
            } else {
                echo '<script>alert("Gagal mendaftar poli");window.location.href="../../daftarPoliklinik.php";</script>';
            }

        } else {

            // Jika tidak ada data, nomor antrian pertama adalah 1
            $noAntrian = 1;

            // Menyimpan data pendaftaran poli pertama kali
            $daftarPoli = "INSERT INTO daftar_poli (id_pasien, id_jadwal, keluhan, no_antrian, status_periksa) VALUES ('$idPasien', '$idJadwal', '$keluhan', '$noAntrian', '0')";
            $queryDaftarPoli = mysqli_query($mysqli, $daftarPoli);

            // Mengecek apakah data berhasil disimpan
            if ($queryDaftarPoli) {
                echo '<script>alert("Berhasil mendaftar poli");window.location.href="../../daftarPoliklinik.php"</script>';
            } else {
                echo '<script>alert("Gagal mendaftar poli");window.location.href="../../daftarPoliklinik.php";</script>';
            }
        }
    }
?>

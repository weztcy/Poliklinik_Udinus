<?php
require 'config/koneksi.php';
$id_poli = $_SESSION['id_poli'];

$query_poli = "SELECT nama_poli FROM poli WHERE id = $id_poli";
$result = mysqli_query($mysqli, $query_poli);

if ($result) {
    // Ambil hasil query
    $row = mysqli_fetch_assoc($result);

    // Tampilkan nama poli
    $nama_poli = $row['nama_poli'];
} else {
    // Handle error jika query gagal
    $nama_poli = "Tidak dapat mendapatkan nama poli";
}

// Query untuk menghitung jumlah total pasien
$query = "SELECT COUNT(*) AS total_pasien FROM pasien";
$result = mysqli_query($mysqli, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    $total_pasien = $data['total_pasien'];
} else {
    $total_pasien = 0; // Jika query gagal
}

// Query untuk menghitung jumlah pasien yang sudah diperiksa (unik) berdasarkan status_periksa = '1'
$queryJumlahPasienDiperiksa = "SELECT COUNT(DISTINCT pasien.id) AS jumlah_pasien_diperiksa
                               FROM daftar_poli
                               INNER JOIN periksa ON daftar_poli.id = periksa.id_daftar_poli
                               INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id
                               WHERE daftar_poli.status_periksa = '1'";

$resultJumlahPasien = mysqli_query($mysqli, $queryJumlahPasienDiperiksa);
$jumlah_pasien_diperiksa = 0;

if ($resultJumlahPasien) {
    $dataJumlah = mysqli_fetch_assoc($resultJumlahPasien);
    $jumlah_pasien_diperiksa = $dataJumlah['jumlah_pasien_diperiksa']; // Menyimpan jumlah pasien yang unik
}

// Query untuk menghitung jumlah pasien yang belum diperiksa (unik) berdasarkan status_periksa = '0'
$queryJumlahPasienBelumDiperiksa = "SELECT COUNT(DISTINCT pasien.id) AS jumlah_pasien_belum_diperiksa
                                    FROM daftar_poli
                                    INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id
                                    WHERE daftar_poli.status_periksa = '0'";

$resultJumlahPasien = mysqli_query($mysqli, $queryJumlahPasienBelumDiperiksa);
$jumlah_pasien_belum_diperiksa = 0;

if ($resultJumlahPasien) {
    $dataJumlah = mysqli_fetch_assoc($resultJumlahPasien);
    $jumlah_pasien_belum_diperiksa = $dataJumlah['jumlah_pasien_belum_diperiksa'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter Dashboard</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        .small-box {
            padding: 30px;
            height: 190px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .small-box:hover {
            transform: translateY(-10px);
        }

        .small-box .inner h3 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .small-box .inner p {
            font-size: 1.5rem;
        }

        .small-box .icon {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        .small-box .icon i {
            font-size: 3rem;
            color: white;
        }

        .content-header {
            background-color: #ff6ab6;
            color: white;
            padding: 30px 0;
        }

        .text-white {
            font-weight: 500;
        }

        .text-white h1 {
            font-size: 2.2rem;
            font-family: 'Arial', sans-serif;
        }

        .text-white h4 {
            font-size: 1.6rem;
            font-family: 'Arial', sans-serif;
        }

        .text-white h5 {
            font-size: 1.3rem;
            font-family: 'Arial', sans-serif;
        }

        .content {
            align-items: center;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        canvas {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Baris Pertama: Card Jumlah Pasien Pada Poliklinik Anak -->
            <div class="col-12 pt-4">
                <div class="small-box bg-info" style="height: 260px;">
                    <div class="inner">
                    <h3 class="text-white"><?php echo $total_pasien; ?></h3>
                        <!-- <p>Jumlah Pasien Pada <?php echo $nama_poli; ?></p> -->
                        <p>Jumlah Pasien Pada Poliklinik Udinus</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="pasien.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Kolom Kiri: Dua Card secara Vertikal -->
            <div class="col-lg-6">
                <div class="small-box bg-success mb-3" style="height: 260px;">
                    <div class="inner">
                        <h3><?php echo $jumlah_pasien_diperiksa; ?></h3>
                        <p>Pasien Telah Diperiksa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="riwayatPasien.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <div class="small-box bg-warning" style="height: 260px;">
                    <div class="inner">
                        <h3><?php echo $jumlah_pasien_belum_diperiksa; ?></h3>
                        <p>Pemeriksaan Keluhan Pasien</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="periksaPasien.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Kolom Kanan: Diagram Radar -->
            <div class="col-lg-6">
                    <div class="card-body">
                        <canvas id="chartPasien"></canvas>
                    </div>
            </div>
        </div>
    </div>
</section>


    <!-- Link to Bootstrap JS and other necessary scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk diagram radar
        const ctx = document.getElementById('chartPasien').getContext('2d');
        const chartPasien = new Chart(ctx, {
            type: 'radar', // Jenis grafik radar
            data: {
                labels: ['Jumlah Pasien', 'Pasien Diperiksa', 'Keluhan Pasien'], // Label untuk setiap kategori
                datasets: [{
                    label: 'Jumlah Pasien',
                    data: [<?php echo $total_pasien; ?>, <?php echo $jumlah_pasien_diperiksa; ?>, <?php echo $jumlah_pasien_belum_diperiksa; ?>], // Data untuk setiap kategori
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    r: { // Skala radar
                        angleLines: {
                            display: true
                        },
                        suggestedMin: 0,
                        suggestedMax: <?php echo $total_pasien + 1; ?>
                    }
                }
            }
        });
    </script>
</body>

</html>

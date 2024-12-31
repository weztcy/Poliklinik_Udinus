<?php
include 'config/koneksi.php';

$query_jml_pasien = "SELECT COUNT(*) as jumlah_pasien FROM pasien";
$query_jml_dokter = "SELECT COUNT(*) as jumlah_dokter FROM dokter";
$query_jml_poli = "SELECT COUNT(*) as jumlah_poli FROM poli";
$query_jml_obat = "SELECT COUNT(*) as jumlah_obat FROM obat";

// Eksekusi query dan ambil hasilnya
$result_pasien = mysqli_query($mysqli, $query_jml_pasien);
$result_dokter = mysqli_query($mysqli, $query_jml_dokter);
$result_poli = mysqli_query($mysqli, $query_jml_poli);
$result_obat = mysqli_query($mysqli, $query_jml_obat);

// Cek apakah query berhasil dieksekusi
if ($result_pasien && $result_dokter && $result_poli && $result_obat) {
    // Ambil hasil query
    $row_pasien = mysqli_fetch_assoc($result_pasien);
    $row_dokter = mysqli_fetch_assoc($result_dokter);
    $row_poli = mysqli_fetch_assoc($result_poli);
    $row_obat = mysqli_fetch_assoc($result_obat);

    // Ambil nilai jumlah dari hasil query
    $jumlah_pasien = $row_pasien['jumlah_pasien'];
    $jumlah_dokter = $row_dokter['jumlah_dokter'];
    $jumlah_poli = $row_poli['jumlah_poli'];
    $jumlah_obat = $row_obat['jumlah_obat'];
} else {
    // Handle kesalahan jika query tidak berhasil
    $jumlah_pasien = "Error";
    $jumlah_dokter = "Error";
    $jumlah_poli = "Error";
    $jumlah_obat = "Error";
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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        .chart-container {
            height: 400px;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .chart {
            position: relative;
            height: 740px;;
        }

        @media (max-width: 768px) {
            .chart-container {
                width: 100%;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <section class="content">
        <div class="container-fluid pt-4">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 class="text-white"><?php echo $jumlah_pasien; ?></h3>
                                    <p class="text-white">Jumlah Pasien</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="pasien.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 class="text-white"><?php echo $jumlah_dokter; ?></h3>
                                    <p class="text-white">Total Dokter</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="dokter.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3 class="text-white"><?php echo $jumlah_poli; ?></h3>
                                    <p class="text-white">Total Poli</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="poli.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 class="text-white"><?php echo $jumlah_obat; ?></h3>
                                    <p class="text-white">Total Jenis Obat</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="obat.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-6 mb-4 chart-container">
                    <div class="card draggable">
                        <div class="card-header bg-transparent">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Chart</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-bar chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var chart = new Chart(document.getElementById("chart-bars"), {
            type: "bar",
            data: {
                labels: ["Pasien", "Dokter", "Poli", "Obat"],
                datasets: [{
                    label: "Jumlah",
                    data: [<?php echo $jumlah_pasien; ?>, <?php echo $jumlah_dokter; ?>, <?php echo $jumlah_poli; ?>, <?php echo $jumlah_obat; ?>],
                    backgroundColor: ["#17a2b8", "#28a745", "#ffc107", "#dc3545"],
                    borderRadius: 10,
                    maxBarThickness: 20
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 30,
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: 13,
                                family: "Open Sans"
                            },
                            color: "#8898aa"
                        },
                        grid: {
                            drawBorder: false,
                            color: "rgba(0, 0, 0, 0.1)",
                            borderDash: [5, 5]
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 13,
                                family: "Open Sans"
                            },
                            color: "#8898aa"
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>

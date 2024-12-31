<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accordion Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Styling untuk "Engineers Design" */
        .full-width-section {
            width: 100%;
            background-color: #f8f9fa; /* Warna latar belakang */
            padding: 3rem 1rem;
            position: relative;
        }

        .icon-link > .bi {
            width: .75em;
            height: .75em;
        }

        /* Dummy devices styling */
        .product-device {
            position: absolute;
            right: -5%;
            bottom: -30%;
            width: 300px;
            height: 540px;
            background-color: #333;
            border-radius: 21px;
            transform: rotate(30deg);
        }

        .product-device::before {
            position: absolute;
            top: 10%;
            right: 10px;
            bottom: 10%;
            left: 10px;
            content: "";
            background-color: rgba(255, 255, 255, .1);
            border-radius: 5px;
        }

        .product-device-2 {
            top: -25%;
            right: auto;
            bottom: 0;
            left: -5%;
            background-color: #e5e5e5;
        }

        /* Styling untuk Accordion Cards */
        .accordion-item {
            background-color: #343a40; /* Background dark */
            color: #fff; /* Teks putih */
            border: none; /* Hapus border */
            outline: none; /* Hapus outline */
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s ease; /* Smooth transition for hover effect */
        }

        .accordion-item:hover {
            transform: scale(1.02); /* Zoom kecil saat hover */
            cursor: pointer;
        }

        .accordion-header {
            position: relative;
            display: block;
            width: 100%;
            text-align: left;
            padding: 0;
            border: none; /* Hapus border default */
            outline: none; /* Hapus outline */
        }

        .accordion-header img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease; /* Efek hover gambar */
            border: none; /* Hapus border */
            outline: none; /* Hapus outline */
        }

        .accordion-item:hover img {
            transform: scale(1.1); /* Zoom in gambar saat hover */
        }

        .accordion-button {
            display: block;
            text-align: left;
            font-weight: bold;
            background-color: transparent; /* Buat transparan untuk mengikuti background card */
            color: #fff; /* Teks putih */
            border: none; /* Hapus border default */
            border-radius: 0;
            padding: 15px;
            width: 100%;
            outline: none; /* Hapus outline */
            box-shadow: none; /* Hapus shadow */
        }

        .accordion-body {
            font-size: 1rem;
            color: #fff; /* Teks putih */
            padding: 15px;
            text-align: left;
            background-color: transparent; /* Buat transparan untuk mengikuti background card */
            border: none; /* Hapus border */
            outline: none; /* Hapus outline */
        }
    </style>
</head>

<body>
    <!-- Engineers Design Section -->
    <div class="full-width-section">
        <div class="container position-relative text-center">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">Poliklinik Udinus</h1>
                <h3 class="fw-normal text-muted mb-3">Selamat datang di dashboard pasien!</h3>
                <div class="d-flex gap-3 justify-content-center lead fw-normal">
                </div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>

    <!-- Accordion Cards Section -->
    <div class="container py-5">
        <div class="row card-wrapper">
            <!-- Accordion Item 1 -->
            <div class="col-md-4">
                <div class="accordion-item">
                    <button class="accordion-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <img src="assets/images/layananumum.jpg" alt="Pelayanan Umum">
                        <div class="accordion-button">
                            Pelayanan Umum
                        </div>
                    </button>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                        <div class="accordion-body">
                            Fasilitas ini menyediakan konsultasi medis untuk berbagai keluhan kesehatan umum. Dilengkapi dengan dokter umum yang siap memberikan diagnosa awal, pengobatan, dan rujukan jika diperlukan.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion Item 2 -->
            <div class="col-md-4">
                <div class="accordion-item">
                    <button class="accordion-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <img src="assets/images/laboratorium.jpg" alt="Laboratorium Klinik">
                        <div class="accordion-button">
                            Laboratorium Klinik
                        </div>
                    </button>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                        <div class="accordion-body">
                            Menyediakan berbagai jenis pemeriksaan diagnostik seperti tes darah, urin, dan fungsi organ. Fasilitas ini mendukung diagnosis dokter dengan hasil yang cepat dan akurat.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion Item 3 -->
            <div class="col-md-4">
                <div class="accordion-item">
                    <button class="accordion-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <img src="assets/images/apotek.jpg" alt="Apotek">
                        <div class="accordion-button">
                            Apotek
                        </div>
                    </button>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                        <div class="accordion-body">
                            Menyediakan berbagai macam obat-obatan resep dan non-resep untuk mendukung proses penyembuhan pasien. Apoteker profesional siap membantu menjelaskan dosis dan penggunaan obat.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion Item 4 -->
            <div class="col-md-4">
                <div class="accordion-item">
                    <button class="accordion-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <img src="assets/images/poligigi.jpg" alt="Poli Gigi">
                        <div class="accordion-button">
                            Poli Gigi
                        </div>
                    </button>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                        <div class="accordion-body">
                            Fasilitas untuk perawatan kesehatan gigi dan mulut, seperti tambal gigi, pencabutan, pembersihan karang gigi, serta konsultasi estetika gigi.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion Item 5 -->
            <div class="col-md-4">
                <div class="accordion-item">
                    <button class="accordion-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <img src="assets/images/fisioterapi.jpg" alt="Fisioterapi">
                        <div class="accordion-button">
                            Fisioterapi
                        </div>
                    </button>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive">
                        <div class="accordion-body">
                            Layanan ini membantu pasien yang memerlukan pemulihan fungsi tubuh akibat cedera, operasi, atau kondisi kronis. Ditangani oleh fisioterapis berpengalaman.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion Item 6 -->
            <div class="col-md-4">
                <div class="accordion-item">
                    <button class="accordion-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <img src="assets/images/klinikibuanak.jpg" alt="Klinik Kesehatan Ibu dan Anak (KIA)">
                        <div class="accordion-button">
                            Klinik Kesehatan Ibu dan Anak (KIA)
                        </div>
                    </button>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix">
                        <div class="accordion-body">
                            Layanan khusus untuk kesehatan ibu hamil, ibu menyusui, dan anak-anak. Meliputi imunisasi, pemeriksaan kehamilan, hingga konsultasi gizi.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fav Icon -->
    <link rel="icon" type="image/png" href="assets/images/logo_dinus.png">

    <!-- Custom CSS -->
    <style>
        /* Set video as background */
        .background-video-container {
            position: fixed;  /* Make the video fixed on the screen */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;  /* Ensure the video stays behind all other content */
        }

        .background-video {
            width: 100%;
            height: 100%;
            object-fit: cover;  /* Ensure the video covers the entire screen */
        }

        /* Navbar and other content should be above the video */
        .navbar, .container, footer {
            position: relative;
            z-index: 1; /* Bring content in front of the video */
        }
    </style>
</head>

<body>

    <!-- Background Video -->
    <div class="background-video-container">
        <video class="background-video" autoplay loop muted playsinline>
            <source src="assets/videos/hospitalbg.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="#">Website Poliklinik Udinus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3"> <!-- Set gap with mx-3 -->
                    <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                </li>
                <li class="nav-item mx-3"> <!-- Set gap with mx-3 -->
                    <a class="nav-link" href="#">Layanan</a>
                </li>
                <li class="nav-item mx-3"> <!-- Set gap with mx-3 -->
                    <a class="nav-link" href="#">Informasi</a>
                </li>
                <li class="nav-item mx-3"> <!-- Set gap with mx-3 -->
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
            </ul>
            <span class="navbar-text me-5">
                Bimbingan Karir WD-08
            </span>
        </div>
    </div>
</nav>


    <!-- Main Content -->
    <div class="container" style="margin: 8rem auto;">
    <div class="p-2 p-md-5 mb-4 rounded text-body-emphasis bg-dark">
  <div class="row">
    <!-- Kolom Teks -->
    <div class="col-lg-6 px-0">
      <h1 class="display-4 fst-italic text-white">Selamat Datang!</h1>
      <p class="lead my-3 text-white" style="padding-right: 40px" >Kami hadir untuk memberikan layanan kesehatan terbaik bagi Anda dan keluarga. Dengan pelayanan yang profesional dan ramah, kami siap membantu menjaga kesehatan Anda. Temukan berbagai informasi mengenai layanan kesehatan, jadwal dokter, dan tips kesehatan di sini. Kami berkomitmen untuk selalu memberikan perhatian dan solusi medis yang Anda butuhkan.</p>
    </div>

    <!-- Kolom Carousel Gambar -->
    <div class="col-lg-6">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/poli1.jpg" class="d-block w-100" alt="Gambar 1">
          </div>
          <div class="carousel-item">
            <img src="assets/images/poli2.jpg" class="d-block w-100" alt="Gambar 2">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
</div>
<div class="row mb-5">
    <!-- Card Pasien -->
    <div class="col-md-4 mt-5 mb-5">
        <div class="card text-bg-dark position-relative">
            <!-- Card Header -->
            <div class="card-header text-center text-white bg-dark">
                <h5 class="card-title mb-0">Pasien</h5>
            </div>
            <img src="assets/images/pasien.jpg" class="card-img" alt="Pasien">
                <a href="loginUser.php" class="btn btn-success position-absolute bottom-0 end-0 m-3">Masuk sebagai Pasien</a>
        </div>
    </div>

    <!-- Card Dokter -->
    <div class="col-md-4 mt-5">
        <div class="card text-bg-dark position-relative">
            <div class="card-header text-center text-white bg-dark">
                <h5 class="card-title mb-0">Dokter</h5>
            </div>
            <img src="assets/images/dokter.jpg" class="card-img" alt="Dokter">
                <a href="login.php?role=dokter" class="btn btn-primary position-absolute bottom-0 end-0 m-3">Masuk sebagai Dokter</a>
        </div>
    </div>

    <!-- Card Admin -->
    <div class="col-md-4 mt-5">
        <div class="card text-bg-dark position-relative">
            <div class="card-header text-center text-white bg-dark">
                <h5 class="card-title mb-0">Admin</h5>
            </div>
            <img src="assets/images/admin.jpg" class="card-img" alt="Admin">
                <a href="login.php?role=admin" class="btn btn-warning position-absolute bottom-0 end-0 m-3 text-white">Masuk sebagai Admin</a>
        </div>
    </div>
</div>
</div>


<footer class="text-center text-lg-start text-white bg-dark" style="width: 100%; position: absolute; left: 0; right: 0;">
    <div class="container-fluid"> <!-- Use container-fluid for full width -->
        <!-- Section -->
        <section>
            <div class="row">
                <!-- Poliklinik Udinus -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-5 mb-4">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Poliklinik Udinus</h6>
                    <p>
                        Poliklinik Udinus didirikan untuk memberikan fasilitas pelayanan kesehatan bagi mahasiswa dan karyawan, serta masyarakat umum di lingkungan kampus. Saat ini Poliklinik UDINUS menyediakan poliklinik umum dan poliklinik gigi.
                    </p>
                </div>

                <!-- Contact -->
                <div class="col-md-3 col-lg-3 col-xl-auto mx-auto mt-5 mb-4">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Kontak</h6>
                    <p><i class="fas fa-home mr-3"></i> Jl. Nakula 1, Pendrikan Kidul</p>
                    <p><i class="fas fa-envelope mr-3"></i> poliklinikudinus@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i> + 62 234 567 8821</p>
                    <p><i class="fas fa-print mr-3"></i> + 62 234 567 8992</p>
                </div>

                <!-- Lokasi (Google Map) -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-5 mb-4">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Lokasi</h6>
                    <div style="width: 100%">
                        <iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=jl.%20nakula%201,%20Pendrikan%20Kidul,%20Kec.%20Semarang%20Tengah,%20Kota%20Semarang,%20Jawa%20Tengah%2050131+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>
        <hr class="my-3">
        <section class="p-3 pt-0">
            <div class="row d-flex align-items-center">
                <div class="col-md-7 col-lg-8 text-center text-md-start">
                    <div class="p-3">
                        © 2024 Copyright:
                        <a class="text-white" href="https://mdbootstrap.com/">Yohanes Dimas Pratama - A11.2021.13254</a>
                    </div>
                </div>

                <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                    <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-google"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </section>
    </div>
</footer>


    <!-- End Footer -->

    <!-- Bootstrap JS (bundle includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

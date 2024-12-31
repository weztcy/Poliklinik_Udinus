<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <!-- Include Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts (Mukta) -->
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    <style>
        /* Background video style */
        video.bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Make sure the video stays in the background */
        }

        body {
            font-family: 'Mukta', sans-serif;
            height: 100vh;
            min-height: 550px;
            margin: 0;
            position: relative;
            overflow-y: hidden;
        }

        a {
            text-decoration: none;
            color: #444444;
        }

        .login-reg-panel {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            width: 70%;
            right: 0;
            left: 0;
            margin: auto;
            height: 400px;
        }

        .white-panel {
            background-color: rgba(255, 255, 255, 1);
            height: 600px;
            position: absolute;
            top: -100px;
            width: 50%;
            right: calc(50% - 50px);
            transition: 0.3s ease-in-out;
            z-index: 0;
            box-shadow: 0 0 15px 9px #00000096;
        }

        .login-reg-panel input[type="radio"] {
            position: relative;
            display: none;
        }

        .login-reg-panel {
            color: #B8B8B8;
        }

        .login-reg-panel #label-login,
        .login-reg-panel #label-register {
            border: 1px solid #9E9E9E;
            padding: 5px 5px;
            width: 150px;
            display: block;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 18px;
        }

        .login-info-box {
            width: 30%;
            padding: 0 50px;
            top: 20%;
            left: 0;
            position: absolute;
            text-align: left;
        }

        .register-info-box {
            width: 30%;
            padding: 0 50px;
            top: 20%;
            right: 0;
            position: absolute;
            text-align: left;
        }

        .right-log {
            right: 50px !important;
        }

        .login-show,
        .register-show {
            z-index: 1;
            display: none;
            opacity: 0;
            transition: 0.3s ease-in-out;
            color: #242424;
            text-align: left;
            padding: 50px;
        }

        .show-log-panel {
            display: block;
            opacity: 0.9;
        }

        .login-show input[type="text"],
        .login-show input[type="password"] {
            width: 100%;
            display: block;
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #b5b5b5;
            outline: none;
        }

        .login-show input[type="button"] {
            max-width: 150px;
            width: 100%;
            background: #444444;
            color: #f9f9f9;
            border: none;
            padding: 10px;
            text-transform: uppercase;
            border-radius: 2px;
            float: right;
            cursor: pointer;
        }

        .login-show a {
            display: inline-block;
            padding: 10px 0;
        }

        .register-show input[type="text"],
        .register-show input[type="number"],
        .register-show input[type="alamat"],
        .register-show input[type="password"] {
            width: 100%;
            display: block;
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #b5b5b5;
            outline: none;
        }

        .register-show input[type="button"] {
            max-width: 150px;
            width: 100%;
            background: #444444;
            color: #f9f9f9;
            border: none;
            padding: 10px;
            text-transform: uppercase;
            border-radius: 2px;
            float: right;
            cursor: pointer;
        }

        .credit {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: #3B3B25;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            z-index: 99;
        }

        a {
            text-decoration: none;
            color: #2c7715;
        }

        /* Eye Icon Style */
        .eye-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #b5b5b5;
        }
    </style>
</head>
<body>
    <!-- Background Video -->
    <video class="bg-video" autoplay loop muted>
        <source src="assets/videos/hospitalbg.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="login-reg-panel bg-dark">
        <!-- Login Info Box -->
        <div class="login-info-box">
            <h2>Sudah memiliki akun pasien?</h2>
            <p>Silakan masuk untuk mengakses layanan kesehatan, riwayat medis, dan informasi terbaru tentang perawatan Anda.</p>
            <label id="label-register" for="log-reg-show">Masuk</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
        </div>

        <!-- Register Info Box -->
        <div class="register-info-box">
            <h2>Belum memiliki akun pasien?</h2>
            <p>Daftar sekarang untuk mendapatkan kemudahan akses layanan kesehatan dan riwayat medis Anda di mana saja dan kapan saja.</p>
            <label id="label-login" for="log-login-show">Daftar Sekarang</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>

        <!-- White Panel (Main content) -->
        <div class="white-panel">
            <!-- Login Form -->
            <div class="login-show">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Masuk Akun Pasien</h2>
                    <button type="button" class="btn btn-danger" onclick="window.history.back()">
                        <i class="bi bi-box-arrow-left"></i>
                    </button>
                </div>
                <form action="pages/loginUser/checkLoginUser.php" method="post">
                    <input type="text" name="username" placeholder="Username" required>
                    <div class="password-field position-relative">
                        <input type="password" id="login-password" name="password" placeholder="Password" required>
                        <i class="bi bi-eye eye-icon" id="toggle-password" onclick="togglePasswordVisibility('login-password')"></i>
                    </div>
                    <button type="submit" class="btn btn-block btn-success btn-lg">
                        Masuk
                    </button>
                </form>
                <p class="text-right">Anda lupa password? <a href="" class="text-danger">Reset Password</a></p>
            </div>

            <!-- Register Form -->
            <div class="register-show">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Daftar Akun Pasien</h2>
                    <button type="button" class="btn btn-danger" onclick="window.history.back()">
                        <i class="bi bi-box-arrow-left"></i>
                    </button>
                </div>
                <form action="pages/register/checkRegister.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="no_ktp" placeholder="Nomor KTP" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="no_hp" placeholder="Nomor Handphone" required>
                    </div>
                    <div class="form-group">
                        <div class="password-field position-relative">
                            <input type="password" id="register-password" class="form-control" name="password" placeholder="Password" required>
                            <i class="bi bi-eye eye-icon" onclick="togglePasswordVisibility('register-password')"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary btn-lg">
                        Daftar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        // Toggle password visibility function
        function togglePasswordVisibility(passwordFieldId) {
            var passwordField = document.getElementById(passwordFieldId);
            var icon = passwordField.nextElementSibling;
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        $(document).ready(function() {
            // Initial setup: hide login box and show login form
            $('.login-info-box').fadeOut();
            $('.login-show').addClass('show-log-panel');
        });

        // Handle the radio button toggle for switching login/register panels
        $('.login-reg-panel input[type="radio"]').on('change', function() {
            if ($('#log-login-show').is(':checked')) {
                $('.register-info-box').fadeOut(); 
                $('.login-info-box').fadeIn();

                $('.white-panel').addClass('right-log');
                $('.register-show').addClass('show-log-panel');
                $('.login-show').removeClass('show-log-panel');
            } else if ($('#log-reg-show').is(':checked')) {
                $('.register-info-box').fadeIn();
                $('.login-info-box').fadeOut();

                $('.white-panel').removeClass('right-log');
                $('.login-show').addClass('show-log-panel');
                $('.register-show').removeClass('show-log-panel');
            }
        });
    </script>
</body>
</html>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Menu untuk Admin -->
                <?php if ($_SESSION['akses'] == "admin") { ?>
                    <li class="nav-item">
                        <a href="dashboard_admin.php" class="nav-link">
                            <i class="fas fa-th nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dokter.php" class="nav-link">
                            <i class="fas fa-user-nurse nav-icon"></i>
                            <p>Dokter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="poli.php" class="nav-link">
                            <i class="fas fa-hospital nav-icon"></i>
                            <p>Poli</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="obat.php" class="nav-link">
                            <i class="fas fa-tablets nav-icon"></i>
                            <p>Obat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pasien.php" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Pasien</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- Menu untuk Dokter -->
                <?php if ($_SESSION['akses'] == "dokter") { ?>
                    <li class="nav-item">
                        <a href="dashboard_dokter.php" class="nav-link">
                            <i class="fas fa-th nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="jadwalPeriksa.php" class="nav-link">
                            <i class="fas fa-hospital-user nav-icon"></i>
                            <p>Jadwal Periksa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="periksaPasien.php" class="nav-link">
                            <i class="fas fa-stethoscope nav-icon"></i>
                            <p>Memeriksa Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="riwayatPasien.php" class="nav-link">
                            <i class="fas fa-book-medical nav-icon"></i>
                            <p>Riwayat Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="editProfilDokter.php" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                            <p>Edit Profil</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- Menu untuk Pasien -->
                <?php if ($_SESSION['akses'] == "pasien") { ?>
                    <li class="nav-item">
                        <a href="dashboard_pasien.php" class="nav-link">
                            <i class="fas fa-hospital-user nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="daftarPoliklinik.php" class="nav-link">
                            <i class="fas fa-stethoscope nav-icon"></i>
                            <p>Daftar Poli</p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

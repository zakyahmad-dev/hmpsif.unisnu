<nav class="navbar navbar-expand-lg site-navbar" aria-label="Navigasi utama">
    <div class="container-xl">
        <a class="navbar-brand" href="index.php" aria-label="HMPSIF — Beranda">
            <img src="assets/img/logo1.png" class="website-logo" alt="Logo HMPSIF">
            <span class="brand-copy">HMPSIF<small>UNISNU Jepara</small></span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation"
                aria-controls="mainNavigation" aria-expanded="false" aria-label="Buka menu navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link <?= navActive('index.php') ?>" href="index.php" <?= navActive('index.php') ? 'aria-current="page"' : '' ?>>Beranda</a></li>
                <li class="nav-item"><a class="nav-link <?= navActive('tentang.php') ?>" href="tentang.php" <?= navActive('tentang.php') ? 'aria-current="page"' : '' ?>>Tentang</a></li>
                <li class="nav-item"><a class="nav-link <?= navActive('organisasi.php') ?>" href="organisasi.php" <?= navActive('organisasi.php') ? 'aria-current="page"' : '' ?>>Organisasi</a></li>
                <li class="nav-item"><a class="nav-link <?= navActive('program.php') ?>" href="program.php" <?= navActive('program.php') ? 'aria-current="page"' : '' ?>>Program</a></li>
                <li class="nav-item"><a class="nav-link <?= navActive('kegiatan.php') ?>" href="kegiatan.php" <?= navActive('kegiatan.php') ? 'aria-current="page"' : '' ?>>Kegiatan</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array(basename($_SERVER['PHP_SELF'] ?? ''), ['berita.php', 'galeri.php', 'kontak.php', 'about.php'], true) ? 'active' : '' ?>"
                       href="#" id="exploreMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Jelajahi</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="exploreMenu">
                        <li><a class="dropdown-item <?= navActive('berita.php') ?>" href="berita.php">Berita terbaru</a></li>
                        <li><a class="dropdown-item <?= navActive('galeri.php') ?>" href="galeri.php">Galeri kegiatan</a></li>
                        <li><a class="dropdown-item <?= navActive('kontak.php') ?>" href="kontak.php">Kontak</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item <?= navActive('about.php') ?>" href="about.php">Tentang pembuat</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-actions">
                    <button id="themeToggle" class="btn" type="button" aria-label="Aktifkan mode gelap" title="Ganti tema">
                        <svg class="theme-icon-moon" data-theme-icon="moon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M20.2 15.2A8.5 8.5 0 0 1 8.8 3.8 8.5 8.5 0 1 0 20.2 15.2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg class="theme-icon-sun d-none" data-theme-icon="sun" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8"/>
                            <path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <a class="btn btn-primary rounded-pill px-4" href="gabung.php">Gabung HMPSIF</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

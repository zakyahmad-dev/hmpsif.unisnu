<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?= url("index.php") ?>">
            <img src="<?= url("assets/img/logo1.png") ?>" class="website-logo" alt="Logo HMPSIF" 
            style="width:120px !important;height:45px !important;max-width:120px !important;max-height:45px 
            !important;object-fit:contain !important;display:block !important;" >
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="<?= url("index.php") ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url("tentang.php") ?>">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url("organisasi.php") ?>">Organisasi</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url("program.php") ?>">Program Kerja</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url("kegiatan.php") ?>">Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url("berita.php") ?>">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url("galeri.php") ?>">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url("gabung.php") ?>">Cara Bergabung</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url("kontak.php") ?>">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= url("about.php") ?>">about</a></li>
                <li class="nav-item ms-lg-2">
                    <button id="themeToggle" class="btn btn-sm btn-outline-secondary" type="button" aria-label="Ganti tema">
                        <i class="fa-solid fa-moon"></i>
                    </button>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary rounded-pill px-4" href="<?= url("gabung.php") ?>">Gabung Himpunan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

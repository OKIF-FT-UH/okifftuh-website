<body>
    <!--/home -->
    <?php $navi = $this->uri->segment(2); ?>
    <div id="home" class="inner-w3pvt-page">
        <div class="overlay-innerpage">
            <!--/top-nav -->
            <div class="top_w3pvt_main container">
                <!--/header -->
                <header class="nav_w3pvt text-center">
                    <!-- nav -->
                    <nav class="wthree-w3ls">
                        <div id="logo">
                        <h1> <a class="navbar-brand px-0 mx-0" href="<?= site_url('home') ?>">OKIF FT-UH
                            </a>
                        </h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mr-auto">
                        <li class="<?= ($navi == '' ? 'active' : '' ) ?>"><a href="<?=base_url('Home/index/') ?>">Home</a></li>

                        <li class="<?= ($navi == 'profil' ? 'active' : '' ) ?>"><a href="<?=base_url('Home/profil/') ?>">Profil</a></li>

                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-3" class="toggle toggle-2">Pengurus <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Pengurus  <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-3" />
                            <ul>

                                <li class="<?= ($navi == 'pengurusDmmif') ? 'active' : '' ?>"><a href="<?= base_url('Home/pengurusDmmif') ?>" class="drop-text">DMMIF FT-UH</a></li>
                                <li class="<?= ($navi == 'pengurusHmif') ? 'active' : '' ?>"><a href="<?= base_url('Home/pengurusHmif') ?>" class="drop-text">HMIF FT-UH</a></li>
                                <li class="<?= ($navi == 'programKerja') ? 'active' : '' ?>"><a href="<?= base_url('Home/programKerja') ?>" class="drop-text">Program Kerja HMIF FT-UH</a></li>
                                <li class="<?= ($navi == 'sejarahPengurus') ? 'active' : '' ?>"><a href="<?= base_url('Home/sejarahPengurus') ?>" class="drop-text">Sejarah Pengurus</a></li>
                            </ul>
                        </li>

                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-4" class="toggle toggle-3">Informasi <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="<?= base_url('Home/informasi') ?>">Informasi  <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-4" />
                            <ul style="margin-left:9rem;">
                                <li class="<?= ($navi == 'himpunan') ? 'active' : '' ?>"><a href="<?= base_url('Home/himpunan') ?>" class="drop-text">Kegiatan</a></li>
                                <li class="<?= ($navi == 'beasiswa') ? 'active' : '' ?>"><a href="<?= base_url('Home/beasiswa') ?>" class="drop-text">Beasiswa</a></li>
                                <li class="<?= ($navi == 'prestasi') ? 'active' : '' ?>"><a href="<?= base_url('Home/prestasi') ?>" class="drop-text">Prestasi</a></li>
                                <li class="<?= ($navi == 'kemahasiswaan') ? 'active' : '' ?>"><a href="<?= base_url('Home/kemahasiswaan') ?>">Kemahasiswaan</a></li>
                                <li class="<?= ($navi == 'artikel') ? 'active' : '' ?>"><a href="<?= base_url('Home/artikel') ?>" class="drop-text">Artikel</a></li>
                                <li class="<?= ($navi == 'daftarPrestasi') ? 'active' : '' ?>"><a href="<?= base_url('Home/daftarPrestasi') ?>" class="drop-text">Daftar Prestasi</a></li>
                            </ul>
                        </li>


                        <li class="<?= ($navi == 'galeri') ? 'active' : '' ?>"><a href="<?= base_url('Home/galeri') ?>">Galeri</a></li>
                        <li class="<?= ($navi == 'arsip') ? 'active' : '' ?>"><a href="<?=base_url('Home/arsip') ?>">Arsip</a></li>
                        <li class="<?= ($navi == 'addSaran') ? 'active' : '' ?>"><a href="<?= base_url('Home/addSaran') ?>">Kritik & Saran</a></li>
                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-8" class="toggle toggle-2">Covid-19 <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Covid-19  <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-8" />
                            <ul style="margin-left:37rem;">
                                <li class="<?= ($navi == 'covid') ? 'active' : '' ?>"><a href="<?= base_url('Home/covid') ?>">Indonesia</a></li>
                                <li class="<?= ($navi == 'covidglobal') ? 'active' : '' ?>"><a href="<?= base_url('Home/covidglobal') ?>">Dunia</a></li>
                            </ul>
                        </li>
                    </ul>
                    </nav>
                    <!-- //nav -->
                </header>
                <!--//header -->

                <!--/breadcrumb-->
                <div class="inner-w3pvt-page-info">
                    <ol class="breadcrumb d-flex">
                        <li class="breadcrumb-item">
                            <a href="<?=base_url('')?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><?= $nav ?></li>
                    </ol>

                </div>
                <!--//breadcrumb-->
            </div>
            <!-- //top-nav -->
        </div>
    </div>
    <!-- //home -->
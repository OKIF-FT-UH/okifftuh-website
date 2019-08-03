<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?= $title ?></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Infinitude Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/if.png')?>">
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="<?= base_url('assets/home/'); ?>css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/home/'); ?>css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="<?= base_url('assets/home/'); ?>css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->

</head>

<body>
    <!-- home -->
    <?php $navi = $this->uri->segment(2); ?>
    <div id="home">
        <!--/top-nav -->
        <div class="top_w3pvt_main container">
            <!--/header -->
            <header class="nav_w3pvt text-center ">
                <!-- nav -->
                <nav class="wthree-w3ls">
                    <div id="logo">
                        <h1> <a class="navbar-brand px-0 mx-0" href="index.html">OKIF FT-UH
                            </a>
                        </h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mr-auto">
                        <li class="<?= ($navi == 'index' or $navi == '') ? 'active' : '' ?>"><a href="<?=base_url('Home/index/') ?>">Home</a></li>

                        <li><a href="<?=base_url('Home/profil/') ?>">Profil</a></li>

                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-3" class="toggle toggle-2">Pengurus <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Pengurus  <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-3" />
                            <ul>

                                <li><a href="<?= base_url('Home/pengurusDmmif') ?>" class="drop-text">DMMIF FT-UH</a></li>
                                <li><a href="<?= base_url('Home/pengurusHmif') ?>" class="drop-text">HMIF FT-UH</a></li>
                            </ul>
                        </li>

                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-4" class="toggle toggle-3">Informasi <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Informasi  <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-4" />
                            <ul style="margin-left:9rem;">
                                <li><a href="services.html" class="drop-text">Kegiatan</a></li>
                                <li><a href="timeline.html" class="drop-text">Beasiswa</a></li>
                                <li><a href="team.html" class="drop-text">Prestasi</a></li>
                                <li><a href="team.html" class="drop-text">Kemahasiswaan</a></li>
                                <li><a href="typo.html" class="drop-text">Artikel</a></li>
                                <li><a href="error.html" class="drop-text">Daftar Prestasi</a></li>
                            </ul>
                        </li>


                        <li><a href="<?= base_url('Home/galeri') ?>">Galeri</a></li>
                        <li><a href="#gallery">Arsip</a></li>
                        <li class="<?= ($navi == 'saran') ? 'active' : '' ?>"><a href="<?= base_url('Home/addSaran') ?>">Kritik & Saran</a></li>
                    </ul>
                </nav>
                <!-- //nav -->
            </header>
            <!--//header -->
        </div>
        <!-- //top-nav -->
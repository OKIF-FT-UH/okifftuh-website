    <!-- /projects -->
    <section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Galeri</span> OKIF FT-UH</h3>
            <div class="row news-grids mt-md-5 mt-4 text-center">
            
            <?php foreach ($galeri as $get) { ?>

                <?php
                    $this->load->helper('tanggal');
                    $tanggal = $get->tanggal_galeri;
                    $convertDate = date("Y-m-j", strtotime($tanggal));
                ?>
                <div class="col-md-4 gal-img">
                    <a href="#gal<?= $get->id_galeri ?>"><img src="<?= base_url('assets/admin/img/galeri/resized/'.$get->foto_galeri) ?>" alt="w3pvt" class="img-fluid" id="current<?= $get->id_galeri ?>"></a>
                    <div class="gal-info">
                        <h5><span class="decription"><?= longdate_indo($convertDate) ?></span><?= word_limiter($get->caption_galeri, 6)?></h5>
                    </div>
                </div>
                <!-- popup-->
                <div id="gal<?= $get->id_galeri ?>" class="pop-overlay">
                    <div class="popup">
                        <img src="<?= base_url('assets/admin/img/galeri/'.$get->foto_galeri); ?>" alt="Popup Image" class="img-fluid" />
                        <p class="mt-4"><?= $get->caption_galeri ?>.</p>
                        <a class="close" href="#current<?= $get->id_galeri ?>">&times;</a>
                    </div>
                </div>
                <!-- //popup -->
            <?php } ?>
        </div>
    </section>
    <!-- //projects -->
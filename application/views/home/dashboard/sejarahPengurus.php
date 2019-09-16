<section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-center mb-5"><span class="pink">Sejarah</span> Pengurus</h3>
            <?php 
            foreach($dataA as $get){
            ?>
            <h4 class="title-w3ls text-center"> <?= $get->periode_pengurus ?> </h4>
            <div class="row news-grids mt-md-5 mt-4 text-center">
                <div class="col-md-6 gal-img mx-auto">
                    <a href="#gal1"><img src="<?= base_url('assets/admin/img/'.$folder.'/'.$get->foto_pengurus) ?>" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h4 class="text-center"><?= $get->jabatan_pengurus ?><span class="decription"><?= $get->nama_pengurus ?></span></h4>
                    </div>
                </div>
            </div> <br> <br> <br>
            <!-- popup-->
            <div id="gal1" class="pop-overlay">
                <div class="popup2">
                    <h6>Struktur Pengurus</h6>  <hr>
                    <p class="mt-4">Ketua Umum: <?= $get->nama_pengurus ?></p>
                    <p><?= $get->daftar_pengurus ?></p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <?php } ?>
            <!-- //popup -->
            <?php
                $periode1617 = $dataB[0]->periode_pengurus;
                $periode1718 = $dataB[2]->periode_pengurus;
            ?>
            <h4 class="title-w3ls text-center"><?= $periode1617 ?></h4>
            <div class="row news-grids mt-md-5 mt-4 text-center">
            <?php 
                foreach($dataB as $get){
            ?>
                <div class="col-md-6 gal-img">
                    <a href="#gal1"><img src="<?= base_url('assets/admin/img/'.$folder.'/'.$get->foto_pengurus) ?>" alt="w3pvt" class="img-fluid"></a>
                    <div class="gal-info">
                        <h4 class="text-center"><?= $get->jabatan_pengurus ?><span class="decription"><?= $get->nama_pengurus ?></span></h4>
                    </div>
                </div>
                <!-- popup-->
                <div id="gal1" class="pop-overlay">
                    <div class="popup2">
                        <h6>Struktur Pengurus</h6>  <hr>
                        <p class="mt-4">Ketua Umum: <?= $get->nama_pengurus ?></p>
                        <p><?= $get->daftar_pengurus ?></p>
                        <a class="close" href="#gallery">&times;</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
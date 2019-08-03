    <!-- /projects -->
    <section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Pengurus</span> <?= $title ?></h3>
            <div class="row news-grids mt-md-5 mt-4 text-center">
            
            <?php foreach ($data as $get) { ?>
                <div class="col-md-4 gal-img">
                    <a href="#gal<?=$get->id_pengurus ?>"><img src="<?= base_url('assets/admin/img/pengurus/'.$folder.'/'.$get->foto_pengurus) ?>" alt="error" class="img-fluid"></a>
                    <div class="gal-info">
                        <h5 class="text-center"><?= $get->jabatan_pengurus ?><span class="decription"><?= $get->nama_pengurus ?></span></h5>
                    </div>
                </div>   
                <!-- popup-->
                <div id="gal<?=$get->id_pengurus ?>" class="pop-overlay">
                <div class="popup">
                    <img src="<?= base_url('assets/admin/img/pengurus/'.$folder.'/'.$get->foto_pengurus) ?>" alt="Popup Image" class="img-fluid" />
                    <p class="mt-2">
                        Nama : <?= $get->nama_pengurus ?> <br>
                        Jabatan : <?= $get->jabatan_pengurus ?> <br>
                        Periode : <?= $get->periode_pengurus ?> <br>
                    </p>
                    <div class="text-center">
                        <a href="<?= $get->facebook ?>"><span class="fa fa-facebook fa-lg" aria-hidden="true"></span></a>
                        <a href="<?= $get->twitter ?>"><span class="fa fa-twitter fa-lg" aria-hidden="true"></span></a>
                        <a href="<?= $get->instagram ?>"><span class="fa fa-instagram fa-lg" aria-hidden="true"></span></a>
                        <a class="close" href="#current<?=$get->id_pengurus ?>">&times;</a>
                    </div>

                </div>
                <!-- //popup -->   
        </div>
        <?php } ?>
    </section>
    <!-- //projects -->
<section class="team py-5" id="appointment">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls mb-5 text-center"><?= $title ?></h3>
            <?php
            if($title=='HMIF FT-UH'){          
            ?>
            <div class="row mt-lg-5 mt-4">
                <?php foreach($dataA as $get){ ?>
                <div class="col-md-4 team-gd text-center mx-auto">
                    <div class="team-img mt-5">
                        <a href="team.html"><img src="<?= base_url('assets/admin/img/pengurus/'.$folder.'/'.$get->foto_pengurus) ?>" class="img-fluid" alt="user-image"></a>
                    </div>
                    <div class="team-info">
                        <span class="sub-tittle-team"><?= $get->jabatan_pengurus ?></span>
                        <h3><a href="team.html"><?= $get->nama_pengurus ?></a></h3>
                        <div class="icon-social team">
                            <a href="<?= $get->facebook ?>" class="button-footr">
                                <span class="fa fa-facebook"></span>
                            </a>
                            <a href="<?= $get->twitter ?>" class="button-footr">
                                <span class="fa fa-twitter"></span>
                            </a>

                            <a href="<?= $get->instagram ?>" class="button-footr">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
                <?php }else{ ?>
                    <div class="row mt-lg-5 mt-4">
                <?php foreach($dataA as $get){ ?>
                <div class="col-md-4 team-gd text-center mx-auto">
                    <div class="team-img mt-5">
                        <a href="team.html"><img src="<?= base_url('assets/admin/img/pengurus/'.$folder.'/'.$get->foto_pengurus) ?>" class="img-fluid" alt="user-image"></a>
                    </div>
                    <div class="team-info">
                        <span class="sub-tittle-team"><?= $get->jabatan_pengurus ?></span>
                        <h3><a href="team.html"><?= $get->nama_pengurus ?></a></h3>
                        <div class="icon-social team">
                            <a href="<?= $get->facebook ?>" class="button-footr">
                                <span class="fa fa-facebook"></span>
                            </a>
                            <a href="<?= $get->twitter ?>" class="button-footr">
                                <span class="fa fa-twitter"></span>
                            </a>

                            <a href="<?= $get->instagram ?>" class="button-footr">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="row mt-lg-5 mt-4">
                <?php foreach($dataC as $get){ ?>
                <div class="col-md-4 team-gd text-center mx-auto">
                    <div class="team-img mt-5">
                        <a href="team.html"><img src="<?= base_url('assets/admin/img/pengurus/'.$folder.'/'.$get->foto_pengurus) ?>" class="img-fluid" alt="user-image"></a>
                    </div>
                    <div class="team-info">
                        <span class="sub-tittle-team"><?= $get->jabatan_pengurus ?></span>
                        <h3><a href="team.html"><?= $get->nama_pengurus ?></a></h3>
                        <div class="icon-social team">
                            <a href="<?= $get->facebook ?>" class="button-footr">
                                <span class="fa fa-facebook"></span>
                            </a>
                            <a href="<?= $get->twitter ?>" class="button-footr">
                                <span class="fa fa-twitter"></span>
                            </a>

                            <a href="<?= $get->instagram ?>" class="button-footr">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
                <?php } ?>

            <div class="row mt-lg-5 mt-4">
                <?php foreach($dataB as $get){ ?>
                <div class="col-md-4 team-gd text-center">
                    <div class="team-img mt-5">
                        <a href="team.html"><img src="<?= base_url('assets/admin/img/pengurus/'.$folder.'/'.$get->foto_pengurus) ?>" class="img-fluid" alt="user-image"></a>
                    </div>
                    <div class="team-info">
                        <span class="sub-tittle-team"><?= $get->jabatan_pengurus ?></span>
                        <h3><a href="team.html"><?= $get->nama_pengurus ?></a></h3>
                        <div class="icon-social team">
                            <a href="<?= $get->facebook ?>" class="button-footr">
                                <span class="fa fa-facebook"></span>
                            </a>
                            <a href="<?= $get->twitter ?>" class="button-footr">
                                <span class="fa fa-twitter"></span>
                            </a>

                            <a href="<?= $get->instagram ?>" class="button-footr">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            

        </div>
    </section>
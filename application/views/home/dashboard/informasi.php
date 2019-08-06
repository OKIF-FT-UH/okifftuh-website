<section class="about py-5">
<?php $modul = $this->uri->segment(2);
if($modul == 'informasi'){
    $kata = 'Semua';
}else {
    $kata = 'Daftar';
}
?>

        <div class="container p-md-5">
        <h3 class="tittle-w3ls mb-3"><span class="pink"><?=$kata ?></span> Informasi</h3>
        </br>
             <?php 
                foreach($data as $get){
                    $view       = $get->view_informasi;
                    $kode       = $get->id_kategori_informasi;
                    $judul      = $get->judul_informasi;
                    $isi        = $get->isi_informasi;
                    $foto       = $get->foto_informasi;
                    $penulis    = $get->penulis_informasi;
                    $waktu = date('d-M-Y', strtotime($get->tanggal_informasi));


                        if($kode == '1'){
                            $folder     = 'himpunan';
                            $kategori   = 'Kegiatan Himpunan';
                        }else if($kode == '2'){
                            $folder     = 'kemahasiswaan';
                            $kategori   = 'Info Kemahasiswaan';
                        }else if($kode == '3'){
                            $folder = 'beasiswa';
                            $kategori   = 'Info Beasiswa';
                        }else if($kode == '4'){
                            $folder     = 'prestasi';
                            $kategori   = 'Info Prestasi';
                        }else if($kode == '5'){
                            $folder     = 'artikel';
                            $kategori   = 'Artikel';
                        }else if($kode == '6'){
                            $folder     = 'lomba';
                            $kategori   = 'Info Lomba';
                        }
                ?>
            <div class="row inner_sec_info">
                <div class="col-md-6 banner_bottom_grid help">
                    <img src="<?= base_url('assets/admin/img/'.$folder.'/'.$get->foto_informasi)?>" alt="" class="img-post">
                </div>
                <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
                    <form method="POST" action="<?=base_url('home/count/'.$get->id_informasi)?>" enctype="multipart/form-data">
                    <input type="hidden" name="view" value="<?=$view?>">
                    <button type="submit" class="btn more judul" ><h4 class="link-hny" style="font-size:1.6em;"><?=$judul ?></h4></button></br>
                    <h6 class="date">By <?=$penulis?> | <?=$waktu?></h6>
                    <p style="text-align: justify !important;"><?= word_limiter($isi, 50) ?></p>
                    </br>
                    <div>
                    <button class="btn more read" style="float:right;" type="submit" role="button">Read More</button>
                    </form>
                    </div>
                </div>
            </div>
            </br>
            <?php } ?>
            <?=$this->pagination->create_links(); ?>
        </div>
    </section>

    <section class="about py-5">
        <div class="container">
        <center><h3 class="tittle-w3ls mb-3"><span class="pink">Sering </span> Dikunjungi</h3></center>
            <div class="row">
                <?php 
                foreach($populardata as $get){
                    $view       = $get->view_informasi;
                    $kode       = $get->id_kategori_informasi;
                    $judul      = $get->judul_informasi;
                    $isi        = $get->isi_informasi;
                    $foto       = $get->foto_informasi;
                    $penulis    = $get->penulis_informasi;
                    $waktu = date('d-M-Y', strtotime($get->tanggal_informasi));


                        if($kode == '1'){
                            $folder     = 'himpunan';
                            $kategori   = 'Kegiatan Himpunan';
                        }else if($kode == '2'){
                            $folder     = 'kemahasiswaan';
                            $kategori   = 'Info Kemahasiswaan';
                        }else if($kode == '3'){
                            $folder = 'beasiswa';
                            $kategori   = 'Info Beasiswa';
                        }else if($kode == '4'){
                            $folder     = 'prestasi';
                            $kategori   = 'Info Prestasi';
                        }else if($kode == '5'){
                            $folder     = 'artikel';
                            $kategori   = 'Artikel';
                        }else if($kode == '6'){
                            $folder     = 'lomba';
                            $kategori   = 'Info Lomba';
                        }
                ?>
                <div class="col-md-6">
                    <div>
                        <img src="<?= base_url('assets/admin/img/'.$folder.'/'.$get->foto_informasi)?>" alt="" class="img-post">
                    </div>
                    <div>
                        <form method="POST" action="<?=base_url('home/count/'.$get->id_informasi)?>" enctype="multipart/form-data">
                        <input type="hidden" name="view" value="<?=$view?>">
                        <button type="submit" class="btn more judul" ><h4 class="link-hny" style="font-size:1.6em;"><?=$judul ?></h4></button></br>
                        <h6 class="date">By <?=$penulis?> | <?=$waktu?></h6>
                        <p style="text-align: justify !important;"><?= word_limiter($isi, 50) ?></p>
                        <div>
                        <button class="btn more read" style="float:left;" type="submit" role="button">Read More</button>
                        </form>
                        </br>
                        </br>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>

        </div>
    </section>
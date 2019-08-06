<!-- Contact -->
    <section class="about-info p-lg-5 p-3">
        <div class="content-w3ls-inn px-lg-5">
            <div class="container py-md-5 py-3">
            <?php 
            foreach ($data as $get) {
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
                    $folder     = 'beasiswa';
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
            }
            ?>
                <div class="content-sing-w3pvt px-lg-5">
                    <h1 style="font-family: helvetica Neue;"><b><?=$judul ?></b></h1>
                    <div>
                    <a href="<?=base_url('home/'.$folder) ?>"><h4 style="font-size:1em;">From <i><?=$kategori?></i></a>&ensp;<i class="fa fa-eye" style="color:gray !important;" aria-hidden="true"> <?=$view ?></i></h4>
                    </div></br>
                    <img class="img-fluid mb-2" src="<?= base_url('assets/admin/img/'.$folder.'/'.$get->foto_informasi)?>" alt="">
                    <h6 class="date">By <?=$penulis?> | <?=$waktu?></h6>
                    <p><?=$isi?></p>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- //single -->
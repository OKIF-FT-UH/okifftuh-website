<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
<?php

$modul = $this->uri->segment(2);
$kode = $this->uri->segment(3);
$judul = '';
$penulis = '';
$konten = '';
$foto = '';
$tombol = 'Simpan';


if($modul == 'editInformation'){
    $id_informasi = $this->uri->segment(4);
    $aksi = site_url('admin/doEditInformation/'.$kode.'/'.$id_informasi);
    foreach($dataInformasi as $get){
        $judul = $get->judul_informasi;
        $penulis = $get->penulis_informasi;
        $konten = $get->isi_informasi;
        $foto = $get->foto_informasi;
        $tombol = 'Update';

    }
}else if($modul == 'createInformation'){
    $aksi = site_url('admin/doAddInformation/'.$kode);
}

?>



            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php 
                                    if($modul == 'createInformation'){
                                            if($kode == '1'){
                                                echo "Tambah Kegiatan Himpunan";
                                            }else if($kode == '2'){
                                                echo "Tambah Informasi Kemahasiswaan";
                                            }else if($kode == '3'){
                                                 echo "Tambah Informasi Beasiswa";
                                            }else if($kode == '4'){
                                                 echo "Tambah Informasi Prestasi";
                                            }else if($kode == '5'){
                                                echo 'Tambah Artikel';
                                            }
                                    }else if($modul == 'editInformation'){
                                        if($kode == '1'){
                                                echo "Edit Kegiatan Himpunan";
                                            }else if($kode == '2'){
                                                echo "Edit Informasi Kemahasiswaan";
                                            }else if($kode == '3'){
                                                 echo "Edit Informasi Beasiswa";
                                            }else if($kode == '4'){
                                                 echo "Edit Informasi Prestasi";
                                            }else if($kode == '5'){
                                                echo 'Edit Artikel';
                                            }
                                    }
                                    
                                    ?>
                                    
                                </h4>

                                 <div class="basic-form">
                                    <form method="POST" action="<?= $aksi ?>" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Judul Informasi</label>
                                                <input type="text" name="judul_informasi" maxlength="200" class="form-control" placeholder="Masukkan Judul Informasi" value="<?= $judul ?>"  required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Penulis</label>
                                                <input type="text" name="penulis_informasi" maxlength="40" class="form-control" placeholder="Masukkan Nama Penulis" value="<?= $penulis ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Content</label>
                                                <textarea class="summernote" style="height: 200px;" name="isi_informasi"><?= $konten ?></textarea>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Cover</label>
                                                <input type="file" name="userfile" maxlength="40" class="form-control" <?php if($modul=='createInformation'){echo 'required';} ?> >
                                                <div style="font-size: 10px">File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb</div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        <input type="submit" class="btn mb-1 btn-success col-md-12" value="<?php echo $tombol ?>">
                                        </div>
                                        
                                        <input type="hidden"  id="foto_lama"  name="foto_lama"  value="<?php echo $foto ?>">
                                        
                                    </form>
                                 </div>   
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
       
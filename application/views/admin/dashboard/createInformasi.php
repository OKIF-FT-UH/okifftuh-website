<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php 

                                    $kode = $this->uri->segment(3);
                                    if($kode == '1'){
                                        echo "Tambah Kegiatan Himpunan";
                                    }
                                    else if($kode == '2'){
                                        echo "Tambah Informasi Kemahasiswaan";
<<<<<<< HEAD
                                    }
                                    else if($kode == '5'){
                                        echo 'Tambah Artikel';
                                    }
=======
                                     }else if ($kode == '3'){
                                        echo "Tambah Informasi Beasiswa";
                                     }
>>>>>>> f681f92875e858bbc7ef8abfb3e4e5f1a8dd2102

                                    ?>
                                    
                                </h4>

                                 <div class="basic-form">
                                    <form method="POST" action="<?= site_url('admin/doAddInformation/'.$kode) ?>" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Judul Informasi</label>
                                                <input type="text" name="judul_informasi" maxlength="200" class="form-control" placeholder="Masukkan Judul Informasi" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Penulis</label>
                                                <input type="text" name="penulis_informasi" maxlength="40" class="form-control" placeholder="Masukkan Nama Penulis" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Content</label>
                                                <textarea class="konten" style="height: 200px;" name="isi_informasi"></textarea>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Cover</label>
                                                <input type="file" name="userfile" maxlength="40" class="form-control" placeholder="Masukkan Nama Penulis" required>
                                                <div style="font-size: 10px">File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb</div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        <input type="submit" class="btn mb-1 btn-success col-md-12" value="Simpan">
                                        </div>
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
       
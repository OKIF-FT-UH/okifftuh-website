<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
        <?php $modul = $this->uri->segment(2); ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php 
                                        if($modul == 'himpunan'){
                                            echo "Daftar Kegiatan Himpunan";
                                            $kode = 1;
                                        }else if($modul == 'kemahasiswaan'){
                                            echo "Daftar Informasi Kemahasiswaan";
                                            $kode = 2;
                                        }else if($modul == 'beasiswa'){
                                            echo "Daftar Informasi Beasiswa";
                                            $kode = 3; 
                                        }else{

                                        }
                                    ?>
                                </h4>

                                <h6 style="color: yellow;">
                                    <?php
                                        $info = $this->session->flashdata('info');
                                        if(!empty($info)){
                                            echo $info;
                                        }
                                    ?>
                                </h6>

                                <button type="button" onclick="window.location.href='<?= base_url("admin/createInformation/".$kode) ?>'" class="btn mb-1 btn-success">Tambah <span class="btn-icon-right"><i class="fa fa-plus-square"></i></span>
                                </button>

                                <div class="table-responsive" style="margin-top: -20px;">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;">No</th>
                                                <th style="text-align: center;vertical-align: middle;">Judul Informasi</th>
                                                <th style="text-align: center;vertical-align: middle;">Tanggal Posting</th>
                                                <th style="text-align: center;vertical-align: middle;">Penulis</th>
                                                <th style="text-align: center;vertical-align: middle;">Action</th>
                                            </tr>
                                        </thead>

                                <?php 
                                $no = 1;
                                foreach($data as $get){ 
                                    $waktu = date('d-M-Y', strtotime($get->tanggal_informasi));
                                ?>
                                    
                                        <tbody>
                                            <tr>
                                                <td style="vertical-align: middle;text-align: center;"><?= $no++ ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?= $get->judul_informasi ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?= $waktu ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?= $get->penulis_informasi ?></td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <button type="button" class="btn mb-1 btn-primary"><i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger"><i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                <?php } ?>    
                                        </tbody>
                                    </table>
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
       
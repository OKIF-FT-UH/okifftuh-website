<!-- **********************************
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
                                        }else if($modul == 'prestasi'){
                                            echo "Daftar Informasi Prestasi";
                                            $kode = 4;
                                        }else if($modul == 'artikel'){
                                            echo 'Daftar Informasi Artikel';
                                            $kode = 5;
                                        }else if($modul == 'lomba'){
                                            echo "Daftar Informasi Lomba";
                                            $kode = 6;
                                        }
                                    ?>
                                </h4>

                                <h6 style="color: red;">
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
                                                    <button type="button" class="btn mb-1 btn-primary" onclick="window.location.href='<?= base_url("admin/editInformation/".$kode.'/'.$get->id_informasi) ?>'"><i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $get->id_informasi ?>" ><i class="fa fa-trash"></i>
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


       <!-- Modal Hapus-->

<?php
   foreach($data as $get){
    $id = $get->id_informasi;
?>

<div class="modal fade" id="modal_hapus<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('admin/doDeleteInformation/'.$kode.'/'.$id) ?>">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="recipient-name" name="foto_informasi" value="<?= $get->foto_informasi ?>">
                    </div>
                    <!-- <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div> -->
                
                <h5>
                    Apakah Anda Yakin Menghapus Data Ini ?
                </h5>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>

        </form>

        </div>
    </div>                                     
</div>

<?php } ?>

<!-- End Modal Hapus
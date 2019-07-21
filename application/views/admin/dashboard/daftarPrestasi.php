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
                                <h4 class="card-title">Daftar Prestasi Mahasiswa</h4>

                                <h6 style="color: red;">
                                    <?php
                                        $info = $this->session->flashdata('info');
                                        if(!empty($info)){
                                            echo $info;
                                        }
                                    ?>
                                </h6>

                                <button type="button" data-toggle="modal" data-target="#Modal_Tambah" class="btn mb-1 btn-success">Tambah <span class="btn-icon-right"><i class="fa fa-plus-square"></i></span>
                                </button>

                                <div class="table-responsive" style="margin-top: -20px;">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;">No</th>
                                                <th style="text-align: center;vertical-align: middle;">Nama Mahasiswa</th>
                                                <th style="text-align: center;vertical-align: middle;">Prestasi</th>
                                                <th style="text-align: center;vertical-align: middle;">Kegiatan</th>
                                                <th style="text-align: center;vertical-align: middle;">Tahun</th>
                                                <th style="text-align: center;vertical-align: middle;">Action</th>
                                            </tr>
                                        </thead>

                                <?php 
                                $no = 1;
                                foreach($data as $get){ 
                                ?>
                                    
                                        <tbody>
                                            <tr>
                                                <td style="vertical-align: middle;text-align: center;"><?= $no++ ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?= $get->nama_prestasi ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?= $get->prestasi ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?= $get->kegiatan_prestasi ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?= $get->tahun_prestasi ?></td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#modal_update<?= $get->id_prestasi ?>" ><i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $get->id_prestasi ?>" ><i class="fa fa-trash"></i>
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


        <!-- Modal Tambah-->

        <div class="modal fade" id="Modal_Tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Prestasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?= site_url('admin/addDaftarPrestasi') ?>" >
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Nama Mahasiswa</label>
                                                            <input type="text" class="form-control" name="nama" id="message-text" required >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Prestasi</label>
                                                            <input type="text" class="form-control" name="prestasi" id="recipient-name" required >
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Nama Kegiatan</label>
                                                            <input type="text" class="form-control" name="kegiatan" id="recipient-name" required >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Tahun</label>
                                                            <input type="number" class="form-control" name="tahun" id="recipient-name" required >
                                                        </div>

                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </div>
                                                    </form>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>


        <!-- End Modal Tambah-->

        <!-- Modal Update-->

        <?php

            foreach ($data as $get) {
                $id=$get->id_prestasi;

        ?>


        <div class="modal fade" id="modal_update<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Prestasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?= site_url('admin/updateDaftarPrestasi/'.$id) ?>" >
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Nama Mahasiswa</label>
                                                            <input type="text" class="form-control" name="nama" id="message-text" value="<?= $get->nama_prestasi ?>" required >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Prestasi</label>
                                                            <input type="text" class="form-control" name="prestasi" id="recipient-name" value="<?= $get->prestasi ?>" required >
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Nama Kegiatan</label>
                                                            <input type="text" class="form-control" name="kegiatan" id="recipient-name" value="<?= $get->kegiatan_prestasi ?>" required >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Tahun</label>
                                                            <input type="number" class="form-control" name="tahun" id="recipient-name" value="<?= $get->tahun_prestasi ?>" required >
                                                        </div>

                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                                    </form>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                    }
                                ?>

        <!--End Modal Update-->

       <!-- Modal Hapus-->

<?php
   foreach($data as $get){
    $id = $get->id_prestasi;
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
                <form method="POST" action="<?= base_url('admin/deleteDaftarPrestasi/'.$id) ?>">
                  
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
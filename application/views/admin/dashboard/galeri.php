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
                                <h4 class="card-title">Gallery Table</h4>
                                <?= $this->session->flashdata('info'); ?> </br>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal" >Tambah <span class="btn-icon-right"><i class="fa fa-plus-square"></i></span>
                                </button>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" method="post" action="<?= site_url('admin/galeri')?>">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;">No.</th>
                                                <th style="text-align: center;vertical-align: middle;">Foto</th>
                                                <th style="text-align: center;vertical-align: middle;">Caption</th>
                                                <th style="text-align: center;vertical-align: middle;">Tanggal Posting</th>
                                                <th style="text-align: center;vertical-align: middle;">Action</th>
                                            </tr>
                                        </thead>

                                     <?php
                                     $no=1;
                                     foreach($data as $get){ 
                                        $waktu = date('d-M-Y', strtotime($get->tanggal_galeri));
        
                                     ?>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;vertical-align: center;"><?= $no++ ?></td>
                                                <td style="text-align: center;vertical-align: left;"><img src="<?= base_url('assets/admin/img/galeri/'.$get->foto_galeri)?>" class="img-responsive" style="max-height: 240px; max-width: 200px;"></td>
                                                <td style="text-align: center;vertical-align: center;"><?= $get->caption_galeri ?></td>
                                                <td style="text-align: center;vertical-align: left;"><?= $waktu ?></td>
                                                <td style="text-align: center;vertical-align: center;">
                                                    <button type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target="#editModal<?= $get->id_galeri ?>"><i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target="#basicModal<?= $get->id_galeri ?>"><i class="fa fa-trash"></i>
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

        <!-- Modal ADD DATA -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= site_url('admin/addGaleri')?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Foto</label>
                                                    <input type="file" name="userfile" maxlength="40" class="form-control" required>
                                                    <div style="font-size: 10px">File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb</div> 
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Caption</label>
                                                    <textarea class="form-control" id="message-text" name="caption_galeri" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Tambah Foto</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
</div>
        <!-- End Modal ADD DATA -->

        <!-- Delete Data -->
<?php
foreach($data as $get){
$id = $get->id_galeri;
?>
<div class="modal fade" id="basicModal<?= $id ?>" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/deleteGaleri/'.$id) ?>">
            <div>
                <input type="hidden" class="form-control" name="foto_galeri" value="<?= $get->foto_galeri ?>">
            </div>
            <div class="modal-body">Apakah anda yakin menghapus data anda?</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>


        <!-- End Delete -->

        <!--EditData-->
<?php
foreach($data as $get){
$id = $get->id_galeri;
?>

<div class="modal fade" id="editModal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> Edit Foto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= site_url('admin/editGaleri/'.$id)?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Foto</label>
                                                    <input type="file" name="userfile" maxlength="40" class="form-control" required>
                                                    <div style="font-size: 10px">File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb</div>
                                                    <img src="<?= base_url('assets/admin/img/galeri/'.$get->foto_galeri)?>" class="img-responsive" style="max-height: 240px; max-width: 200px;">
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-8">
                                                        <input name="foto_lama" type="hidden" class="form-control" type="text" value="<?= $get->foto_galeri ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Caption</label>
                                                    <input class="form-control" id="message-text" name="caption_galeri" value="<?= $get->caption_galeri ?>"></input>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Add Photo</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
</div>
<?php } ?>

        <!--END EDIT DATA-->

       
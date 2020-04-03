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
                                <h4 class="card-title">Daftar Arsip</h4>
                                <h6 style="color: red;">
                                    <?php
                                        $info = $this->session->flashdata('info');
                                        if(!empty($info)){
                                        echo $info;
                                        }
                                    ?>
                                </h6>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal" >Tambah <span class="btn-icon-right"><i class="fa fa-plus-square"></i></span>
                                </button>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;">No.</th>
                                                <th style="text-align: center;vertical-align: middle;">Nama Arsip</th>
                                                <th style="text-align: center;vertical-align: middle;">Link Arsip</th>
                                                <th style="text-align: center;vertical-align: middle;">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $no=1;
                                        foreach($data as $get){
                                        $arsip = $get->file_arsip
                                        // $waktu = date('d-M-Y', strtotime($get->tanggal_galeri));
                                        ?>
                                            <tr>
                                                <td style="text-align: center;vertical-align: center;"><?= $no++ ?></td>
                                                <td style="text-align: center;vertical-align: left;"><?= $get->nama_arsip ?></td>
                                                <td style="text-align: center;vertical-align: center;"><a href="<?= base_url('admin/downloadArsip/'.$arsip) ?>"><?= $arsip ?></a></td>
                                                <td style="text-align: center;vertical-align: center;">
                                                    <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#editModal<?= $get->id ?>"><i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target="#basicModal<?= $get->id ?>"><i class="fa fa-trash"></i>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Arsip</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= site_url('admin/addArsip')?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">File Arsip</label>
                                                    <input type="file" class="form-control-file" name="userfile" required><br>
                                                    <div style="font-size: 10px">File hanya PDF, XLS, XLSX, DOC, DOCX dengan ukuran Maks. 10 Mb </div> 
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Nama Arsip</label>
                                                    <textarea class="form-control" id="message-text" name="nama_arsip"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Tambah Foto</button>
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
$id = $get->id;
?>
<div class="modal fade" id="basicModal<?= $id ?>" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/deleteArsip/'.$id) ?>">
            <div>
                <input type="hidden" class="form-control" name="file_lama" value="<?= $get->file_arsip ?>">
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
$id = $get->id;
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
                                        <form method="post" action="<?= site_url('admin/editArsip/'.$id)?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">File Arsip</label>
                                                    <input type="file" class="form-control-file" name="userfile"><br>
                                                    <div style="font-size: 10px">File hanya PDF, XLS, XLSX, DOC, DOCX dengan ukuran Maks. 10 Mb </div> 
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-8">
                                                        <input name="file_lama" type="hidden" class="form-control" type="text" value="<?= $get->file_arsip ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Nama Arsip</label>
                                                    <textarea class="form-control" id="message-text" name="nama_arsip"><?=$get->nama_arsip?></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Tambah Foto</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
</div>
<?php } ?>

        <!--END EDIT DATA-->

       
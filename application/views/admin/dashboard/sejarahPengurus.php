
        <div class="content-body">
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Sejarah Pengurus</h4>
                                <h6 style="color: red;">
                                    <?php
                                        $info = $this->session->flashdata('info');
                                        if(!empty($info)){
                                            echo $info;
                                        }
                                    ?>
                                </h6>

                                <button type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target="#modal_tambah" data-whatever="@getbootstrap">Tambah <span class="btn-icon-right"><i class="fa fa-plus-square"></i></span>
                                </button>
                                <div class="table-responsive" style="margin-top: -20px;">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;">No</th>
                                                <th style="text-align: center;vertical-align: middle;">Foto Pengurus</th>
                                                <th style="text-align: center;vertical-align: middle;">Nama Pengurus</th>
                                                <th style="text-align: center;vertical-align: middle;">Jabatan</th>
                                                <th style="text-align: center;vertical-align: middle;">Periode</th>
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
                                                <td style="vertical-align: middle;text-align: left;"><img src="<?= base_url('assets/admin/img/sejarahPengurus/'.$get->foto_pengurus) ?>" class="img-responsive" style="max-height: 240px; max-width: 200px;" > </td>
                                                <td style="vertical-align: middle;text-align: left;"><?= $get->nama_pengurus ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?= $get->jabatan_pengurus ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?= $get->periode_pengurus ?></td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#modal_edit<?= $get->id_pengurus ?>" data-whatever="@getbootstrap"><i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $get->id_pengurus ?>" ><i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>    
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

<!-- Modal Create -->

<div class="modal fade bd-example-modal-lg" id="Modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="<?= site_url('admin/doCreateSejarah') ?>"  enctype="multipart/form-data" id="formAdd">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col-6">
                                    <label class="col-form-label">Nama Pengurus:</label>
                                    <input type="text" class="form-control" name="nama_pengurus" required maxlength="50">
                               </div>
                               <div class="col">
                                    <label class="col-form-label">Jabatan Pengurus:</label>
                                    <select class="form-control" name="jabatan_pengurus">
                                    <option value="Ketua OKIF FT-UH">Ketua OKIF FT-UH</option>
                                    <option value="Ketua Umum HMIF FT-UH">Ketua Umum HMIF FT-UH</option>
                                    <option value="Ketua DMMIF FT-UH">Ketua DMMIF FT-UH</option>
                                    </select>
                               </div>
                                <div class="col">
                                    <label class="col-form-label">Periode Kepengrusan:</label>
                                    <input type="text" class="form-control" name="periode_pengurus" required maxlength="50" placeholder="">
                               </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-form-label">Struktur Kepengurusan:</label>
                        <textarea class="form-control" name="daftar_pengurus" required></textarea>
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">Foto Pengurus:</label>
                        <input type="file" name="userfile" maxlength="40" class="form-control" required>
                        <div style="font-size: 10px">File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb</div>
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- End Modal Create-->

<!-- Begin Modal Edit -->

<?php
    foreach($data as $get){
    $id = $get->id_pengurus;
    $select = $get->jabatan_pengurus;

?>

<div class="modal fade bd-example-modal-lg" id="Modal_edit<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="<?= site_url('admin/doEditSejarah/'.$id) ?>"  enctype="multipart/form-data" id="formAdd">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col-6">
                                    <label class="col-form-label">Nama Pengurus:</label>
                                    <input type="text" class="form-control" name="nama_pengurus" required maxlength="50" value="<?=$get->nama_pengurus ?>">
                               </div>
                               <div class="col">
                                    <label class="col-form-label">Jabatan Pengurus:</label>
                                    <select class="form-control" name="jabatan_pengurus">
                                    <option value="Ketua OKIF FT-UH" <?php if($select == 'Ketua OKIF FT-UH'){echo "selected";} ?>>Ketua OKIF FT-UH</option>
                                    <option value="Ketua Umum HMIF FT-UH" <?php if($select == 'Ketua Umum HMIF FT-UH'){echo "selected";} ?>>Ketua Umum HMIF FT-UH</option>
                                    <option value="Ketua DMMIF FT-UH" <?php if($select == 'Ketua DMMIF FT-UH'){echo "selected";} ?>>Ketua DMMIF FT-UH</option>
                                    </select>
                               </div>
                                <div class="col">
                                    <label class="col-form-label">Periode Kepengrusan:</label>
                                    <input type="text" class="form-control" name="periode_pengurus" required maxlength="50" value="<?=$get->periode_pengurus ?>">
                               </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-form-label">Struktur Kepengurusan:</label>
                        <textarea class="form-control" name="daftar_pengurus" required><?=$get->daftar_pengurus ?></textarea>
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">Foto Pengurus:</label>
                        <input type="file" name="userfile" maxlength="40" class="form-control">
                        <div style="font-size: 10px">File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb</div>
                        <img src="<?= base_url('assets/admin/img/sejarahPengurus/'.$get->foto_pengurus) ?>" class="img-responsive" style="max-height: 240px; width:300px;" > 
                    </div>
                    <div class="form-group">
                        <input type="hidden" readonly name="foto_lama" value="<?= $get->foto_pengurus ?>">
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
<?php } ?>
<!-- End Modal Edit -->

<!-- Modal Hapus -->
<?php
   foreach($data as $get){
    $id = $get->id_pengurus;
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
                <form method="POST" action="<?= base_url('admin/doDeleteSejarah/'.$id) ?>">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="foto_pengurus" value="<?= $get->foto_pengurus ?>">
                    </div>
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
<!-- End Modal Hapus -->


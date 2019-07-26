<!-- **********************************
            Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <?php 
        $judul = '';
        $modul = '';
        $tipe_pengurus = '';
        $folder = '';
        $modul = $this->uri->segment(2);
        $id = '';
        
        if($modul == 'pengurusDmmif'){
            $tipe_pengurus = 1;
            $judul = 'Pengurus DMMIF FT-UH';
            $pengurus = 'DMMIF FT-UH';
            $folder = 'dmmif';
        }else if($modul == 'pengurusHmif'){
            $tipe_pengurus = 2;
            $judul = 'Pengurus HMIF FT-UH';
            $pengurus = 'HMIF FT-UH';
            $folder = 'hmif';
        }
     ?>    
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                         <?php echo $judul; ?>
                        </h4>
                        <h6 style="color: red;">
                           <?php
                                $info = $this->session->flashdata('info');
                                if(!empty($info)){
                                    echo $info;
                                }
                            ?>
                        </h6>

                        <button type="button" data-toggle="modal" data-target="#create_modal" data-whatever="@getbootstrap" class="btn mb-1 btn-success">Tambah<span class="btn-icon-right"><i class="fa fa-plus-square"></i></span>
                        </button>

                        <div class="table-responsive" style="margin-top: -20px;">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;vertical-align: middle;">No</th>
                                        <th style="text-align: center;vertical-align: middle;">Foto</th>
                                        <th style="text-align: center;vertical-align: middle;">Nama</th>
                                        <th style="text-align: center;vertical-align: middle;">Jabatan</th>
                                        <th style="text-align: center;vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    $no = 1;

                                    foreach($data as $get){
                                    $id = $get->id_pengurus; 
                                ?>
                                    <tr>
                                        <td style="vertical-align: middle;text-align: center;"><?php echo $no++ ?></td>
                                        <td style="vertical-align: middle;text-align: center;"><img src="<?= base_url('assets/admin/img/pengurus/'.$folder.'/'.$get->foto_pengurus)?>" class="img-responsive" style="max-height: 240px; max-width: 200px;"></td>
                                        <td style="vertical-align: middle;text-align: center;"><?php echo $get->nama_pengurus ?></td>
                                        <td style="vertical-align: middle;text-align: center;"><?php echo $get->jabatan_pengurus ?></td>
                                        <td style="vertical-align: middle;text-align: center;">
                                            <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#update_modal<?= $id ?>"><i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target="#delete_modal<?= $id ?>"><i class="fa fa-trash"></i>
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

<!-- Begin Add Modal -->
<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi Pengurus <?php echo $pengurus?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/doAddPengurus/'.$tipe_pengurus) ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama-lengkap" class="col-form-label">Nama Lengkap:</label>
                        <input type="text" class="form-control" name="nama_pengurus" placeholder="Masukkan nama lengkap pengurus" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan" class="col-form-label">Jabatan:</label>
                        <input type="text" class="form-control" name="jabatan" placeholder="Ex. Ketua Umum HMIF FT-UH" required>
                    </div>
                    <div class="form-group">
                        <label for="periode" class="col-form-label">Periode:</label>
                        <input type="text" class="form-control" name="periode" placeholder="Ex. Masa Bakti 2019" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Facebook</span>
                        </div>
                        <input type="text" class="form-control" name="facebook" placeholder="Masukkan Link akun facebook">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Twitter</span>
                        </div>
                        <input type="text" class="form-control" name="twitter" placeholder="Masukkan Link akun twitter">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Instagram</span>
                        </div>
                        <input type="text" class="form-control" name="instagram" placeholder="Masukkan Link akun instagram">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="fotoPengurus" accept=".png, .jpg, .jpeg" required>
                        <div style="font-size: 10px">
                            File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb
                        </div>
                    </div>
                    <input type="hidden" readonly name="tipe_pengurus" value="<?php echo $tipe_pengurus ?>">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>
<!-- End Add Modal -->

<!-- Begin Delete Modal -->
<?php
   foreach($data as $get){
    $id = $get->id_pengurus;
?>

<div class="modal fade" id="delete_modal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('admin/doDeletePengurus/'.$tipe_pengurus.'/'.$id) ?>">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="recipient-name" name="foto_pengurus" value="<?= $get->foto_pengurus ?>">
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
<!-- End Delete Modal -->

<!-- Begin Update Modal -->
<?php
    foreach($data as $get){
    $id = $get->id_pengurus;
?>

<div class="modal fade" id="update_modal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Informasi Pengurus <?php echo $pengurus?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/doUpdatePengurus/'.$tipe_pengurus.'/'.$id) ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama-lengkap" class="col-form-label">Nama Lengkap:</label>
                        <input type="text" class="form-control" name="nama_pengurus" placeholder="Masukkan nama lengkap pengurus" value="<?php echo $get->nama_pengurus ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan" class="col-form-label">Jabatan:</label>
                        <input type="text" class="form-control" name="jabatan" placeholder="Ex. Ketua Umum HMIF FT-UH" value="<?php echo $get->jabatan_pengurus ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="periode" class="col-form-label">Periode:</label>
                        <input type="text" class="form-control" name="periode" placeholder="Ex. Masa Bakti 2019" value="<?php echo $get->periode_pengurus ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Facebook</span>
                        </div>
                        <input type="text" class="form-control" name="facebook" placeholder="Masukkan Link akun facebook" value="<?php echo $get->facebook ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Twitter</span>
                        </div>
                        <input type="text" class="form-control" name="twitter" placeholder="Masukkan Link akun twitter" value="<?php echo $get->twitter ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Instagram</span>
                        </div>
                        <input type="text" class="form-control" name="instagram" placeholder="Masukkan Link akun instagram" value="<?php echo $get->instagram ?>">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="fotoPengurus" accept=".png, .jpg, .jpeg">
                        <div style="font-size: 10px">
                            File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb
                        </div>
                        <img src="<?= base_url('assets/admin/img/pengurus/'.$folder.'/'.$get->foto_pengurus) ?>" class="img-responsive" style="max-height: 240px; width:300px; margin-top: 20px;" >
                    </div>
                    <input type="hidden" readonly name="tipe_pengurus" value="<?php echo $tipe_pengurus ?>">
                    <input type="hidden" readonly name="foto_lama" value="<?= $get->foto_pengurus ?>">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>

<?php } ?>
<!-- End Update Modal -->
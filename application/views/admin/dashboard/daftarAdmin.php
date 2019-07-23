<!-- **********************************
            Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <?php 
        $folder = 'fotoAdmin';
        $modul = $this->uri->segment(2);
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                         Daftar Administrator
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
                                        <th style="text-align: center;vertical-align: middle;">Nama Administrator</th>
                                        <th style="text-align: center;vertical-align: middle;">status</th>
                                        <th style="text-align: center;vertical-align: middle;">terakhir kali log-in</th>
                                        <th style="text-align: center;vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <!-- <?= ($modul == 'admin') ? 'active' : '' ?> -->
                                <?php 
                                    $no = 1;
                                    foreach($data as $get){
                                    $id = $get->id_admin;
                                    $status = $get->status_admin; 
                                ?>

                                <tbody>
                                    <tr>
                                        <td style="vertical-align: middle;text-align: center;"><?= $no++ ?></td>
                                        <td style="vertical-align: middle;text-align: center;"><?= $get->nama_lengkap_admin ?></td>
                                        <td style="vertical-align: middle;text-align: center;"><?= ($status == 'super_admin') ? 'Super Administrator' : 'Administrator' ?></td>
                                        <td style="vertical-align: middle;text-align: center;"><?= $get->last_login_admin ?></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi Pengurus <!-- <?php echo $pengurus?> --></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/doAddAdmin') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama-lengkap" class="col-form-label">Nama Lengkap:</label>
                        <input type="text" class="form-control" name="nama_lengkap_admin" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" name="username_admin" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="text" class="form-control" name="password_admin" required>
                    </div>
                    <div class="form-group">
                        <label for="level" class="col-form-label">Level Admin:</label>
                        <select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" name="status_admin" required>
                            <option selected value="">Pilih Level Administrator</option>
                            <option value="super_admin">Super Administrator</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="foto_admin" accept=".png, .jpg, .jpeg" required>
                        <div style="font-size: 10px">
                            File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb
                        </div>
                    </div>
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
    $id = $get->id_admin;
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
                <form method="POST" action="<?= base_url('admin/doDeleteAdmin/'.$id) ?>">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="recipient-name" name="foto_admin" value="<?= $get->foto_admin ?>">
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

<!-- Begin Update Modal -->
<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi Pengurus <!-- <?php echo $pengurus?> --></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/doAddPengurus/'.$tipe_pengurus) ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama-lengkap" class="col-form-label">Nama Lengkap:</label>
                        <input type="text" class="form-control" name="nama_lengkap_admin" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" name="username_admin" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="text" class="form-control" name="password_admin" required>
                    </div>
                    <div class="form-group">
                        <label for="level" class="col-form-label">Level Admin:</label>
                        <select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                            <option selected="selected" value="">Pilih Level Administrator</option>
                            <option value="super_admin">Super Administrator</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="foto_admin" accept=".png, .jpg, .jpeg" required>
                        <div style="font-size: 10px">
                            File hanya JPG dan PNG dengan ukuran Maks. 2048 Kb
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>

<?php } ?>
<!-- End Update Modal -->
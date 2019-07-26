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
                                <h4 class="card-title">Database Alumni</h4>
                                <h6 style="color: red;">
                                    <?php
                                        $info = $this->session->flashdata('info');
                                        if(!empty($info)){
                                            echo $info;
                                        }
                                    ?>
                                </h6>

                                <button type="button" data-toggle="modal" data-target="#modal_tambah" class="btn mb-1 btn-success">Tambah <span class="btn-icon-right"><i class="fa fa-plus-square"></i></span>
                                </button>

                                <div class="table-responsive" style="margin-top: -20px;">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;">NO</th>
                                                <th style="text-align: center;vertical-align: middle;">Nama</th>
                                                <th style="text-align: center;vertical-align: middle;">Jenis Kelamin</th>
                                                <th style="text-align: center;vertical-align: middle;">Angkatan</th>
                                                <th style="text-align: center;vertical-align: middle;">Alamat</th>
                                                <th style="text-align: center;vertical-align: middle;">Instansi</th>
                                                <th style="text-align: center;vertical-align: middle;">Action</th>
                                            </tr>
                                        </thead>

                                         
                                        <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($data as $get){ 
                                        ?>
                                            <tr>
                                                <td style="vertical-align: middle;text-align: center;"><?= $no++ ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?=$get->nama_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?=$get->gender_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?=$get->angkatan_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?=$get->alamat_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?=$get->instansi_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <button type="button" class="btn mb-1 btn-dark" data-toggle="modal" data-target="#modal_detail<?= $get->id_mahasiswa ?>"><i class="fa fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#modal_edit<?= $get->id_mahasiswa ?>"><i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $get->id_mahasiswa ?>" ><i class="fa fa-trash"></i>
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

<!-- Modal Create -->

<div class="modal fade bd-example-modal-lg" id="Modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="<?= site_url('admin/doAddAlumni') ?>"  enctype="multipart/form-data" id="formAdd">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col-7">
                                    <label>Nama Alumni :</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" required maxlength="50">
                               </div>
                            <div class="col-3">
                                <label>Jenis Kelamin :</label>
                                <select class="form-control" name="gender_mahasiswa">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                                <div class="col-2">
                                    <label>Angkatan :</label>
                                    <input type="text" class="form-control" name="angkatan_mahasiswa" required maxlength="50">
                               </div>
                            </div>
                    </div>
                    </br>
                    <div class="basic-form">
                        <div class="form-row">
                            <div class="col-6">
                                <label>Tempat Lahir :</label>
                                <input type="text" class="form-control" name="tempat_lahir_mahasiswa" maxlength="50">
                            </div>
                            <div class="col">
                                <label>Tanggal Lahir :</label>
                                <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" maxlength="50">
                            </div>
                            <div class="col-3">
                                <label>Agama :</label>
                                <input type="text" class="form-control" name="agama_mahasiswa" required maxlength="50">
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="basic-form">
                        <div class="form-row">
                            <div class="col-8">
                                <label>Alamat :</label>
                                <input type="text" class="form-control" name="alamat_mahasiswa" maxlength="50">
                            </div>
                            <div class="col-4">
                                <label>No. HP :</label>
                                <input type="number" class="form-control" name="no_hp_mahasiswa" maxlength="50">
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="basic-form">
                        <div class="form row">
                            <div class="col">
                                <label>Instansi :</label>
                                <input type="textr" class="form-control" name="instansi_mahasiswa" maxlength="50">
                            </div>
                            <div class="col-5">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email_mahasiswa" maxlength="50">
                            </div>
                        </div>
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

<!-- Modal Detail-->

<?php
    foreach($data as $get){
    $id = $get->id_mahasiswa;
    $select = $get->gender_mahasiswa;

?>
<div class="modal fade bd-example-modal-lg" id="Modal_detail<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action=""  enctype="multipart/form-data" id="formAdd">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col-7">
                                    <label>Nama Alumni :</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" readonly maxlength="50" value="<?=$get->nama_mahasiswa ?>">
                               </div>
                            <div class="col-3">
                                <label>Jenis Kelamin :</label>
                                <input type="text" class="form-control" name="gender_mahasiswa" readonly maxlength="50" value="<?=$get->gender_mahasiswa ?>">
                            </div>
                                <div class="col-2">
                                    <label>Angkatan :</label>
                                    <input type="text" class="form-control" name="angkatan_mahasiswa" readonly maxlength="50" value="<?=$get->angkatan_mahasiswa ?>">
                               </div>
                            </div>
                    </div>
                    </br>
                    <div class="basic-form">
                        <div class="form-row">
                            <div class="col-6">
                                <label>Tempat Lahir :</label>
                                <input type="text" class="form-control" name="tempat_lahir_mahasiswa" readonly maxlength="50" value="<?=$get->tempat_lahir_mahasiswa ?>">
                            </div>
                            <div class="col">
                                <label>Tanggal Lahir :</label>
                                <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" readonly maxlength="50" value="<?=$get->tanggal_lahir_mahasiswa ?>">
                            </div>
                            <div class="col-3">
                                <label>Agama :</label>
                                <input type="text" class="form-control" name="agama_mahasiswa" readonly maxlength="50" value="<?=$get->agama_mahasiswa ?>">
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="basic-form">
                        <div class="form-row">
                            <div class="col-8">
                                <label>Alamat :</label>
                                <input type="text" class="form-control" name="alamat_mahasiswa" readonly maxlength="50" value="<?=$get->alamat_mahasiswa ?>">
                            </div>
                            <div class="col-4">
                                <label>No. HP :</label>
                                <input type="number" class="form-control" name="no_hp_mahasiswa" readonly maxlength="50" value="<?=$get->no_hp_mahasiswa ?>">
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="basic-form">
                        <div class="form row">
                            <div class="col">
                                <label>Instansi :</label>
                                <input type="text" class="form-control" name="instansi_mahasiswa" readonly maxlength="50" value="<?=$get->instansi_mahasiswa ?>">
                            </div>
                            <div class="col-5">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email_mahasiswa" readonly maxlength="50" value="<?=$get->email_mahasiswa ?>">
                            </div>
                        </div>
                    </div>
               
            </div>
        </form>
        </div>
    </div>
</div>
<?php } ?>
<!-- End Modal Detail-->

<!-- Modal Edit-->
<?php
    foreach($data as $get){
    $id = $get->id_mahasiswa;
    $select = $get->gender_mahasiswa;

?>
<div class="modal fade bd-example-modal-lg" id="Modal_edit<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="<?= site_url('admin/doEditAlumni/'.$id) ?>"  enctype="multipart/form-data" id="formAdd">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col-7">
                                    <label>Nama Alumni :</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" required maxlength="50" value="<?=$get->nama_mahasiswa ?>">
                               </div>
                            <div class="col-3">
                                <label>Jenis Kelamin :</label>
                                <select class="form-control" name="gender_mahasiswa" required>
                                    <option value="Laki-Laki" <?php if($select == 'Laki-Laki'){echo "selected";} ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if($select == 'Perempuan'){echo "selected";} ?>>Perempuan</option>
                                </select>
                            </div>
                                <div class="col-2">
                                    <label>Angkatan :</label>
                                    <input type="text" class="form-control" name="angkatan_mahasiswa" required maxlength="50" value="<?=$get->angkatan_mahasiswa ?>">
                               </div>
                            </div>
                    </div>
                    </br>
                    <div class="basic-form">
                        <div class="form-row">
                            <div class="col-6">
                                <label>Tempat Lahir :</label>
                                <input type="text" class="form-control" name="tempat_lahir_mahasiswa" maxlength="50" value="<?=$get->tempat_lahir_mahasiswa ?>">
                            </div>
                            <div class="col">
                                <label>Tanggal Lahir :</label>
                                <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" maxlength="50" value="<?=$get->tanggal_lahir_mahasiswa ?>">
                            </div>
                            <div class="col-3">
                                <label>Agama :</label>
                                <input type="text" class="form-control" name="agama_mahasiswa" maxlength="50" value="<?=$get->agama_mahasiswa ?>">
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="basic-form">
                        <div class="form-row">
                            <div class="col-8">
                                <label>Alamat :</label>
                                <input type="text" class="form-control" name="alamat_mahasiswa" maxlength="50" value="<?=$get->alamat_mahasiswa ?>">
                            </div>
                            <div class="col-4">
                                <label>No. HP :</label>
                                <input type="number" class="form-control" name="no_hp_mahasiswa" maxlength="50" value="<?=$get->no_hp_mahasiswa ?>">
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="basic-form">
                        <div class="form row">
                            <div class="col">
                                <label>Instansi :</label>
                                <input type="text" class="form-control" name="instansi_mahasiswa" maxlength="50" value="<?=$get->instansi_mahasiswa ?>">
                            </div>
                            <div class="col-5">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email_mahasiswa" maxlength="50" value="<?=$get->email_mahasiswa ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </div>
        </form>
        </div>
    </div>
</div>
<?php } ?>
<!-- End Modal Edit-->

<!-- Modal Hapus -->
<?php
   foreach($data as $get){
    $id = $get->id_mahasiswa;
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
                <form method="POST" action="<?= base_url('admin/doDeleteAlumni/'.$id) ?>">
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
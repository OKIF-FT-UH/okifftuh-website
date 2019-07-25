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
                                <h4 class="card-title">Database Mahasiswa</h4>
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
                                                <th style="text-align: center;vertical-align: middle;">NIM</th>
                                                <th style="text-align: center;vertical-align: middle;">Angkatan</th>
                                                <th style="text-align: center;vertical-align: middle;">Jenis kelamin</th>
                                                <th style="text-align: center;vertical-align: middle;">Total SKS</th>
                                                <th style="text-align: center;vertical-align: middle;">IPK</th>
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
                                                <td style="vertical-align: middle;text-align: left;"><?=$get->nama_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?=$get->nim_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?=$get->angkatan_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?=$get->gender_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?=$get->sks_mahasiswa ?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?=$get->ipk_mahasiswa ?></td>
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
        <form method="post" action="<?= site_url('admin/doAddMahasiswa') ?>"  enctype="multipart/form-data" id="formAdd">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col-7">
                                    <label>Nama Mahasiswa :</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" required maxlength="50">
                               </div>
                               <div class="col-3">
                                    <label>NIM :</label>
                                    <input type="text" class="form-control" name="nim_mahasiswa" required maxlength="50">
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
                            <div class="col-3">
                                <label>Jenis Kelamin :</label>
                                <select class="form-control" name="gender_mahasiswa">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label>Agama :</label>
                                <input type="text" class="form-control" name="agama_mahasiswa" required maxlength="50">
                            </div>
                            <div class="col-4">
                                <label>Tempat Lahir :</label>
                                <input type="text" class="form-control" name="tempat_lahir_mahasiswa" maxlength="50">
                            </div>
                            <div class="col">
                                <label>Tanggal Lahir :</label>
                                <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" maxlength="50">
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
                            <div class="col-6">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email_mahasiswa" maxlength="50">
                            </div>
                            <div class="col-3">
                                <label>SKS :</label>
                                <input type="number" class="form-control" name="sks_mahasiswa" required maxlength="50">
                            </div>
                            <div class="col-3">
                                <label>IPK :</label>
                                <input type="float" class="form-control" name="ipk_mahasiswa" required maxlength="50">
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

<!-- Modal Detail -->

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
                <h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col-7">
                                    <label>Nama Mahasiswa :</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" readonly maxlength="50" value="<?=$get->nama_mahasiswa ?>">
                               </div>
                               <div class="col-3">
                                    <label>NIM :</label>
                                    <input type="text" class="form-control" name="nim_mahasiswa" readonly maxlength="50" value="<?=$get->nim_mahasiswa ?>">
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
                            <div class="col-3">
                                <label>Jenis Kelamin :</label>
                                <input type="text" class="form-control" name="gender_mahasiswa" readonly maxlength="50" value="<?=$get->gender_mahasiswa ?>">
                            </div>
                            <div class="col-2">
                                <label>Agama :</label>
                                <input type="text" class="form-control" name="agama_mahasiswa" readonly maxlength="50" value="<?=$get->agama_mahasiswa ?>">
                            </div>
                            <div class="col-4">
                                <label>Tempat Lahir :</label>
                                <input type="text" class="form-control" name="tempat_lahir_mahasiswa" readonly maxlength="50" value="<?=$get->tempat_lahir_mahasiswa ?>">
                            </div>
                            <div class="col">
                                <label>Tanggal Lahir :</label>
                                <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" readonly maxlength="50" value="<?=$get->tanggal_lahir_mahasiswa ?>">
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
                            <div class="col-6">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email_mahasiswa" readonly maxlength="50" value="<?=$get->email_mahasiswa ?>">
                            </div>
                            <div class="col-3">
                                <label>SKS :</label>
                                <input type="number" class="form-control" name="sks_mahasiswa" readonly maxlength="50" value="<?=$get->sks_mahasiswa ?>">
                            </div>
                            <div class="col-3">
                                <label>IPK :</label>
                                <input type="float" class="form-control" name="ipk_mahasiswa" readonly maxlength="50" value="<?=$get->ipk_mahasiswa ?>">
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

<!-- Modal Edit -->

<?php
    foreach($data as $get){
    $id = $get->id_mahasiswa;
    $select = $get->gender_mahasiswa;

?>

<div class="modal fade bd-example-modal-lg" id="Modal_edit<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="<?= site_url('admin/doEditMahasiswa/'.$id) ?>"  enctype="multipart/form-data" id="formAdd">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col-7">
                                    <label>Nama Mahasiswa :</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" required maxlength="50" value="<?=$get->nama_mahasiswa ?>">
                               </div>
                               <div class="col-3">
                                    <label>NIM :</label>
                                    <input type="text" class="form-control" name="nim_mahasiswa" required maxlength="50" value="<?=$get->nim_mahasiswa ?>">
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
                            <div class="col-3">
                                <label>Jenis Kelamin :</label>
                                <select class="form-control" name="gender_mahasiswa" required>
                                    <option value="Laki-Laki" <?php if($select == 'Laki-Laki'){echo "selected";} ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if($select == 'Perempuan'){echo "selected";} ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label>Agama :</label>
                                <input type="text" class="form-control" name="agama_mahasiswa" required maxlength="50" value="<?=$get->agama_mahasiswa ?>">
                            </div>
                            <div class="col-4">
                                <label>Tempat Lahir :</label>
                                <input type="text" class="form-control" name="tempat_lahir_mahasiswa" maxlength="50" value="<?=$get->tempat_lahir_mahasiswa ?>">
                            </div>
                            <div class="col">
                                <label>Tanggal Lahir :</label>
                                <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" maxlength="50" value="<?=$get->tanggal_lahir_mahasiswa ?>">
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
                            <div class="col-6">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email_mahasiswa" maxlength="50" value="<?=$get->email_mahasiswa ?>">
                            </div>
                            <div class="col-3">
                                <label>SKS :</label>
                                <input type="number" class="form-control" name="sks_mahasiswa" required maxlength="50" value="<?=$get->sks_mahasiswa ?>">
                            </div>
                            <div class="col-3">
                                <label>IPK :</label>
                                <input type="float" class="form-control" name="ipk_mahasiswa" required maxlength="50" value="<?=$get->ipk_mahasiswa ?>">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
                <form method="POST" action="<?= base_url('admin/doDeleteMahasiswa/'.$id) ?>">
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
       
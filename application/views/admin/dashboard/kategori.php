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
                                <h4 class="card-title">Daftar Kategori</h4>
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
                                                <th style="text-align: center;vertical-align: middle;">Nama Kategori</th>
                                                <th style="text-align: center;vertical-align: middle;">Action</th>
                                            </tr>
                                        </thead>

                                        <?php 
                                            $no = 1;
                                            foreach($data as $get){ 
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td style="vertical-align: middle;text-align: center;"><?=$no++ ?></td>
                                                <td style="vertical-align: middle;text-align: left;"><?=$get->nama_kategori ?></td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#modal_edit<?= $get->id_kategori ?>"><i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $get->id_kategori ?>" ><i class="fa fa-trash"></i>
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
<div class="modal fade" id="Modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form method="post" action="<?= site_url('admin/doAddKategori') ?>"  enctype="multipart/form-data" id="formAdd">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col">
                                    <label>Nama Kategori :</label>
                                    <input type="text" class="form-control" name="nama_kategori" required maxlength="50">
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

<!-- Modal Edit -->

<?php
    foreach($data as $get){
    $id = $get->id_kategori;

?>
<div class="modal fade" id="Modal_edit<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form method="post" action="<?= site_url('admin/doEditKategori/'.$id) ?>"  enctype="multipart/form-data" id="formAdd">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="basic-form">
                            <div class="form-row">
                               <div class="col">
                                    <label>Nama Kategori :</label>
                                    <input type="text" class="form-control" name="nama_kategori" required maxlength="50" value="<?=$get->nama_kategori?>">
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
    $id = $get->id_kategori;
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
                <form method="POST" action="<?= base_url('admin/doDeleteKategori/'.$id) ?>">
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
       
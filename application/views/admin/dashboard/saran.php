<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            
            <!-- Saran Baru-->
            <?php $modul = $this->uri->segment(2); ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php
                                        if($modul=='saranMasuk'){
                                            echo 'Saran Masuk';
                                        }elseif ($modul=='saranApprove') {
                                            echo 'Saran yang Telah disetujui';
                                        }
                                    ?>
                                </h4>
                                <?php
                                    if($modul=='saranMasuk'){ ?>
                                <h6 style="color: red;">
                                    <?php
                                        $info = $this->session->flashdata('info');
                                        if(!empty($info)){
                                        echo $info;
                                        }
                                    ?>
                                </h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;">No.</th>
                                                <th style="text-align: center;vertical-align: middle;">Nama</th>
                                                <th style="text-align: center;vertical-align: middle;">Email</th>
                                                <th style="text-align: center;vertical-align: middle;">Perihal</th>
                                                <th style="text-align: center;vertical-align: middle;">Tanggal Masuk</th>
                                                <th style="text-align: center;vertical-align: middle;">Action</th>
                                            </tr>
                                        </thead>

                                        
                                        <tbody>
                                        <?php
                                            $no=1;
                                            foreach($data as $get){
                                                $waktu = date('d-M-Y', strtotime($get->waktu_saran));
                                        ?>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;"><?= $no++ ?></td>
                                                <td style="text-align: center;vertical-align: middle;"><?= $get->nama_saran ?></td>
                                                <td style="text-align: center;vertical-align: middle;"><?= $get->email_saran ?></td>
                                                <td style="text-align: center;vertical-align: middle;"><?= $get->perihal_saran ?></td>
                                                <td style="text-align: center;vertical-align: middle;"><?= $waktu ?></td>
                                                <td style="text-align: center;vertical-align: middle;">
                                                    <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#openMsg<?= $get->id_saran ?>"><i class="fa fa-envelope-open"></i>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target="#deleteSaran<?= $get->id_saran ?>"><i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } 
                                                    ?>
                                        </tbody>
                                            
                                    </table>
                                </div>
                                     <?php }elseif($modul=='saranApprove'){ ?>
                                        <h6 style="color: red;">
                                    <?php
                                        $info = $this->session->flashdata('info');
                                        if(!empty($info)){
                                        echo $info;
                                        }
                                    ?>
                                </h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" id="tabell">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;">No.</th>
                                                <th style="text-align: center;vertical-align: middle;">Nama</th>
                                                <th style="text-align: center;vertical-align: middle;">Email</th>
                                                <th style="text-align: center;vertical-align: middle;">Perihal</th>
                                                <th style="text-align: center;vertical-align: middle;">Tanggal Masuk</th>
                                                <th style="text-align: center;vertical-align: middle;">Tanggpan</th>
                                                <th style="text-align: center;vertical-align: middle;">Tanggal Penyelesaian</th>
                                                <th style="text-align: center;vertical-align: middle;">Action</th>
                                            </tr>
                                        </thead>

                                        
                                        <tbody>
                                        <?php
                                            $no=1;
                                            foreach($data as $get){
                                                $waktu = date('d-M-Y', strtotime($get->waktu_saran));
                                                $today = date('Y-m-d H:i:s');
                                                $waktuApprove = date('d-M-Y', strtotime($get->acc_saran));
                                                $kode = $get->kode_saran
                                        ?>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;"><?= $no++ ?></td>
                                                <td style="text-align: center;vertical-align: middle;"><?= $get->nama_saran ?></td>
                                                <td style="text-align: center;vertical-align: middle;"><?= $get->email_saran ?></td>
                                                <td style="text-align: center;vertical-align: middle;"><?= $get->perihal_saran ?></td>
                                                <td style="text-align: center;vertical-align: middle;"><?= $waktu ?></td>

                                                
                                                <?php
                                                if($kode==1){ 
                                                 ?>
                                                <td style="text-align: center;vertical-align: middle;"> - </td>
                                                <td style="text-align: center;vertical-align: middle;"> - </td>
                                                <td style="text-align: center;vertical-align: middle;">
                                                    <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#openMsgApprove<?= $get->id_saran ?>"><i class="fa fa-envelope-open"></i>
                                                    </button>
                                                </td>
                                                <?php }elseif ($kode==2) {
                                                ?>
                                                <td style="text-align: center;vertical-align: middle;"><?= $get->tanggapan_saran ?></td>
                                                <td style="text-align: center;vertical-align: middle;"><?= $waktuApprove ?></td>
                                                <td style="text-align: center;vertical-align: middle;">
                                                    <button type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target="#successSaran<?= $get->id_saran ?>"><i class="fa fa-check-square-o"></i>
                                                    </button>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                             <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                     <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Saran Baru -->
            
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<!--Begin Open Messages saranMasuk-->
<?php 
if($modul=='saranMasuk'){
    foreach($data as $get){
    $id = $get->id_saran;
    ?>
<div class="modal fade" id="openMsg<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Saran Masuk</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= site_url('admin/saranProses/'.$id)?>">
                                                        <div class="form-group">
                                                            <label for="name" class="col-form-label">Nama:</label>
                                                            <input type="text" class="form-control" id="name" disabled value="<?= $get->nama_saran ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email" class="col-form-label">Email</label>
                                                            <input type="text" class="form-control" id="email" disabled value="<?= $get->email_saran ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="perihal" class="col-form-label">Perihal</label>
                                                            <input type="text" class="form-control" id="perihal" disabled value="<?= $get->perihal_saran ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Isi Saran:</label>
                                                            <textarea class="form-control" id="message-text" disabled><?= $get->isi_saran ?></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Proses Saran</button>
                                                         </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php }
        }elseif($modul=='saranApprove'){ ?>                                    
<!-- End Open Messages -->

<!-- Open saranApprove -->
<?php 
    foreach($data as $get){
    $id = $get->id_saran;
    ?>
<div class="modal fade" id="openMsgApprove<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Proses Saran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= site_url('admin/saranDone/'.$id) ?>">
                                                        <div class="form-group">
                                                            <label for="name" class="col-form-label">Nama:</label>
                                                            <input type="text" class="form-control" id="name" disabled value="<?= $get->nama_saran ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email" class="col-form-label">Email</label>
                                                            <input type="text" class="form-control" id="email" disabled value="<?= $get->email_saran ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="perihal" class="col-form-label">Perihal</label>
                                                            <input type="text" class="form-control" id="perihal" disabled value="<?= $get->perihal_saran ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Isi Saran:</label>
                                                            <textarea class="form-control" id="message-text" disabled><?= $get->isi_saran ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Tanggapan Saran:</label>
                                                            <textarea class="form-control" id="message-text" name="tanggapan_saran"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Telah diselesaikan!</button>
                                                         </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php }
        } ?>                          

<!-- End saranApprove -->

<!-- Delete Saran Masuk -->
<?php
foreach($data as $get){
$id = $get->id_saran;
?>
<div class="modal fade" id="deleteSaran<?= $id ?>" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/deleteSaran/'.$id) ?>">
            <div class="modal-body">Apakah anda yakin menghapus data anda?</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
<!-- End Delete Saran Masuk -->

<!-- Success -->

<?php 
    foreach($data as $get){
    $id = $get->id_saran;
    ?>
<div class="modal fade" id="successSaran<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Proses Saran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= site_url('admin/saranDone/'.$id) ?>">
                                                        <div class="form-group">
                                                            <label for="name" class="col-form-label">Nama:</label>
                                                            <input type="text" class="form-control" id="name" disabled value="<?= $get->nama_saran ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email" class="col-form-label">Email</label>
                                                            <input type="text" class="form-control" id="email" disabled value="<?= $get->email_saran ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="perihal" class="col-form-label">Perihal</label>
                                                            <input type="text" class="form-control" id="perihal" disabled value="<?= $get->perihal_saran ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Isi Saran:</label>
                                                            <textarea class="form-control" id="message-text" disabled><?= $get->isi_saran ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Tanggapan Saran:</label>
                                                            <textarea class="form-control" id="message-text" name="tanggapan_saran" disabled><?= $get->tanggapan_saran  ?></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <div class="modal-body">Saran Telah dilaksanakan!</div>
                                                         </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php }
         ?>                          

<!-- End Success -->

<script>
$(document).ready(function() {
    $('#tabell').dataTable({
        "scrollX": true,
        "pagingType": "numbers",
        "processing": true,
        "serverSide": true,
        "ajax": "server.php"
    } );
} );
</script>
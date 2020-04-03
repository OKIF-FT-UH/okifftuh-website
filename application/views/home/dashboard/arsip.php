<section class="py-5">
        <div class="container">
            <h3 class="tittle-w3ls mb-5">Arsip<span class="text-primary"></span></h3>
            <div class="row">
                <div class="col-lg-12 pl-4">
                    <div class="table-responsive rounded-lg shadow" style="height: 33.1rem;">
                        <table class="table m-0 table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center;vertical-align: middle;">No</th>
                                    <th style="text-align: center;vertical-align: middle;">Daftar Arsip</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach($data as $q){
                                    $arsip=$q->file_arsip?>
                                <tr>
                                <td style="text-align: center;vertical-align: middle;"><?=$i?></td>
                                <td style="text-align: center;vertical-align: middle;"><a href="<?= base_url('home/downloadArsip/'.$arsip) ?>"><?= $q->nama_arsip ?></a></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
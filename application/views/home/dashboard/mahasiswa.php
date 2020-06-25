<section class="py-5">
        <div class="container">
            <h3 class="tittle-w3ls mb-5"><?= substr($title,0,6)?> <span class="text-primary"><?= substr($title,6)?></span></h3>

            <div class="row">
    
                <div class="col-lg-12 pl-4">
                    <div class="table-responsive rounded-lg shadow" style="height: 33.1rem;">
                        <table class="table m-0 table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="atasbro">No.</th>
                                    <th class="atasbro">Nama</th>
                                    <th class="atasbro">NIM</th>
                                    <th class="atasbro">Angkatan</th>
                                    <th class="atasbro">Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                foreach($data as $q){?>
                                <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $q->nama_mahasiswa ?></td>
                                <td><?= $q->nim_mahasiswa ?></td>
                                <td><?= $q->angkatan_mahasiswa ?></td>
                                <td><?= $q->gender_mahasiswa?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
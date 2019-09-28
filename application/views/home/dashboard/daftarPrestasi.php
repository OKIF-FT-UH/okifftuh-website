<section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Prestasi</span> yang Telah Kami Raih</h3>
            <div class="row">
              <div class="col-md-4 offset-md-8">
                <form action="<?= base_url('home/daftarPrestasi') ?>" method="post">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Pencarian..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                      <input class="btn btn-outline-secondary" type="submit" name="submit" value="cari">
                    </div>
                </div>
                </form>
              </div>
            </div>
            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Prestasi</th>
                  <th scope="col">Kegiatan Prestasi</th>
                  <th scope="col">Tahun Prestasi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                
                foreach($prestasi as $get){
                ?>
                <tr>
                  <th scope="row"><?= ++$nomor ?></th>
                  <td><?= $get->nama_prestasi ?></td>
                  <td><?= $get->prestasi ?></td>
                  <td><?= $get->kegiatan_prestasi ?></td>
                  <td><?= $get->tahun_prestasi ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <?=$this->pagination->create_links(); ?>
    </div>
</section>
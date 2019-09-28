<section class="about-info py-5 px-lg-5">
        <div class="content-w3ls-inn px-lg-5">
            <div class="container py-md-5 py-3">
                <div class="px-lg-5">
                    <h3 class="tittle-w3ls mb-lg-5 mb-4"><span class="pink">Kritik &</span> Saran</h3>

                    <div class="contact-hny-form mt-lg-5 mt-3">
                        <h3 class="title-hny mb-lg-5 mb-3" style="color: green;">
                            <?php
                                $info = $this->session->flashdata('info');
                                if(!empty($info)){
                                echo $info;
                                }
                            ?>
                        </h3>
                        <form action="<?= site_url('home/doAddSaran') ?>" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="w3lName">Nama</label>
                                        <input type="text" name="nama_saran" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="w3lSender">Email</label>
                                        <input type="text" name="email_saran" id="w3lSender" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="w3lSubject">Perihal</label>
                                        <input type="text" name="perihal_saran" id="w3lSubject" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="w3lSubject">Isi</label>
                                        <textarea type="text" name="isi_saran" id="w3lMessage" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group mx-auto mt-3">
                                    <button type="submit" class="btn btn-default morebtn more black con-submit">Kirim</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
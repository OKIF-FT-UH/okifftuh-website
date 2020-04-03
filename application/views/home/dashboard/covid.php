<section class="py-5">
        <div class="container">
            <h3 class="tittle-w3ls mb-5">Informasi <span class="text-primary">COVID-19</span></h3>

            <div class="row">
                <div class="card col-lg-3 rounded-lg border-0 shadow mb-4" style="padding:0">
                    <div class="card-body p-4">
                        <h4>Situasi <span class="font-weight-bold">COVID-19</span> di Indonesia</h4>
                        <hr class="mt-4 mb-2">
                        <small class="text-secondary mb-3 float-right"></small>
                        <div class="clearfix"></div>
                        
                        <!-- Information -->
                        <div class="card border-bottom border-warning">
                            <div class="card-body">
                                <div class="font-weight-bold">Total Kasus Positif</div>
                                <div class="font-weight-bold text-warning" style="font-size: 1.8rem;"><?php echo $total_indonesia[0]->positif; ?></div>
                            </div>
                        </div>

                        <div class="card my-3 border-bottom border-success">
                            <div class="card-body">
                                <div class="font-weight-bold">Total Orang Sembuh</div>
                                <div class="font-weight-bold text-success" style="font-size: 1.8rem;"><?php echo $total_indonesia[0]->sembuh; ?></div>
                            </div>
                        </div>

                        <div class="card border-bottom border-danger">
                            <div class="card-body">
                                <div class="font-weight-bold">Total Orang Meninggal</div>
                                <div class="font-weight-bold text-danger" style="font-size: 1.8rem;"><?php echo $total_indonesia[0]->meninggal; ?></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
    
                <div class="col-lg-9 pl-4">
                    <div class="table-responsive rounded-lg shadow" style="height: 33.1rem;">
                        <table class="table m-0 table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Positif</th>
                                    <th scope="col">Sembuh</th>
                                    <th scope="col">Meninggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach($total_provinsi as $q){ ?>
                                <tr>
                                <td><?=$i?></td>
                                <td><?php echo $q->attributes->Provinsi; ?></td>
                                <td><?php echo $q->attributes->Kasus_Posi; ?></td>
                                <td><?php echo $q->attributes->Kasus_Semb; ?></td>
                                <td><?php echo $q->attributes->Kasus_Meni; ?></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
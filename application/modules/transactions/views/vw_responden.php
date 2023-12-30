<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <ul class="list-group col-md-3">
                            <li class="list-group-item"><?= $data_transaksi['responden_name'] ?></li>
                            <li class="list-group-item"><?= $data_transaksi['email'] ?></li>
                        </ul>
                        <ul class="list-group col-md-3">
                            <li class="list-group-item"><?= $data_transaksi['born_date'] ?></li>
                            <li class="list-group-item"><?= $data_transaksi['work_level'] ?></li>
                        </ul>
                    </div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Kompetensi dan perilaku kunci</button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Kompetensi</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" rowspan="2" style="vertical-align:middle">#</th>
                                        <th scope="col" rowspan="2" colspan="2" style="vertical-align:middle">ITEM KOMPETENSI DAN PERILAKU</th>
                                        <th scope="col" colspan="2" style="text-align: center;">Distribusi jawaban</th>
                                        <th scope="col" rowspan="2" style="text-align: center; vertical-align:middle">Hitung</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" style="text-align: center;">Frekuensi</th>
                                        <th scope="col" style="text-align: center;">Kepentingan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i_kompetensi = 1;
                                    $i_perilaku = 1;
                                    ?>
                                    <?php foreach ($data_kompetensi as $kompetensi) : ?>
                                        <tr>
                                            <th scope="row" rowspan="9"><?= $i_kompetensi ?></th>
                                            <td colspan="2" class="table-info"><?= $kompetensi['name'] ?></td>
                                            <td style="text-align: center;" class="table-info"><?= $kompetensi['frekuensi'] ?></td>
                                            <td style="text-align: center;" class="table-info"><?= $kompetensi['kepentingan'] ?></td>
                                            <td style="text-align: center;" class="table-info"><?= ($kompetensi['kepentingan'] + $kompetensi['frekuensi']) / 2 ?></td>
                                        </tr>
                                        <?php foreach ($data_perilaku as $perilaku) : ?>
                                            <?php if ($kompetensi['id'] == $perilaku['kompetensi']) : ?>
                                                <tr style="line-height: 10px;">
                                                    <th scope="row"><?= $i_perilaku ?></th>
                                                    <td><?= $perilaku['pertanyaan'] ?></td>
                                                    <td><?= $perilaku['frekuensi'] ?></td>
                                                    <td><?= $perilaku['kepentingan'] ?></td>
                                                    <td><?= $perilaku['total'] ?></td>
                                                </tr>
                                                <?php $i_perilaku++ ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php $i_kompetensi++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="vertical-align:middle; text-align:center">#Ranking</th>
                                        <th scope="col" style="vertical-align:middle; text-align:center">RANKING KOMPETENSI</th>
                                        <th scope="col" style="vertical-align:middle; text-align:center">Nilai Rank</th>
                                        <th scope="col" style="vertical-align:middle; text-align:center">Kepentingan</th>
                                        <th scope="col" style="vertical-align:middle; text-align:center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_ranking as $key) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $i ?></td>
                                            <td><?= $key['name'] ?></td>
                                            <td style="text-align:center"><?= $key['value'] ?></td>
                                            <td style="text-align:center"><?= $key['kepentingan_kompetensi'] ?></td>
                                            <td style="text-align:center"><?= $key['kepentingan_kompetensi'] + $key['value'] ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
</div>
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
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Perilaku kegiatan</button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Kompetensi</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                    </div>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
</div>
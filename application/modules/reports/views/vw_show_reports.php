<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center"><?= $events['client_name'] ?></h4>
                <hr>
                <h6 class="text-center"><?= $events['name'] ?> | <?= date($events['event_start']) ?> - <?= date($events['event_end']) ?> | Responden : <?= $jumlah_responden ?> / <?= $events['min_responden'] ?> </h6>
            </div>
        </div>
    </div><!-- /# column -->
</div>
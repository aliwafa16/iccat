<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center"><?= $events['client_name'] ?></h4>
                <hr>
                <h6 class="text-center"><?= $events['name'] ?> | <?= date($events['event_start']) ?> - <?= date($events['event_end']) ?> | Responden : <?= $jumlah_responden ?> / <?= $events['min_responden'] ?> </h6>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 10%; text-align:center"><input type="checkbox" class="check-all form-check-input">#No/Ranking</th>
                    <th scope="col" style="text-align: center;">Ranking Kompetensi dan Ranking Perilakunya</th>
                    <th scope="col" style="text-align: center;">Bobot/Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($data as $data) : ?>
                    <tr class="table-info">
                        <th scope="row" style="text-align: center;vertical-align:middle" rowspan="9"><input class="form-check-input parent-check check_kompetensi_<?= $data['kompetensi_id'] ?>" data-no="<?= $i ?>" data-kompetensi="<?= $data['name'] ?>" data-deskripsi="<?= $data['deskripsi'] ?>" type="checkbox" value="<?= $data['hasil_bagi_responden'] ?>" id="kompetensi_<?= $data['kompetensi_id'] ?>" name="kompetensi_<?= $data['kompetensi_id'] ?>"></th>
                        <td style="vertical-align:middle"><b><?= $i ?>. <?= $data['name'] ?><p><?= $data['deskripsi'] ?></b></p>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?= $data['hasil_bagi_responden'] ?></td>
                    </tr>
                    <?php foreach ($data['item_pertanyaan'] as $perilaku) : ?>
                        <tr style="line-height: 10px;">
                            <td>
                                <input class="form-check-input child-check-<?= $i ?>" data-perilaku="<?= $perilaku['pertanyaan'] ?>" name="perilaku_<?= $perilaku['id'] ?>" type="checkbox" value="<?= $perilaku['hasil_bagi_responden'] ?>"> <?= $perilaku['pertanyaan'] ?>
                            </td>
                            <td style="vertical-align:middle;text-align:center"><?= $perilaku['hasil_bagi_responden'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<script>
    $('.selectall').click(function() {
        if ($(this).is(':checked')) {
            $('div input').attr('checked', true);
        } else {
            $('div input').attr('checked', false);
        }
    });



    $('.parent-check').on('click', function() {
        var no = $(this).data('no');
        var child = '.child-check-' + no;
        if ($(this).is(':checked')) {
            $(this).parent().parent().siblings().find(child).attr('checked', true);
        } else {
            $(this).parent().parent().siblings().find(child).attr('checked', false);
        }
    });


    $('.check-all').on('click', function() {
        if ($(this).is(':checked')) {
            $(this).parent().parent().parent().parent().find('.form-check-input').attr('checked', true);
        } else {
            $(this).parent().parent().parent().parent().find('.form-check-input').attr('checked', false);
        }
    });
</script>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline" id="form-reports">
                        <div class="form-group mx-sm-3 mb-2 col-md-3">
                            <select class="form-control js-example-basic-single" id="event_id" name="event_id" style="width: 180%; height:100px">
                                <?php foreach ($events as $event) : ?>
                                    <option value="<?= $event['id'] ?>"><?= $event['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> Cari</button>
                        <button type="button" id="btn_download" class="btn btn-success mb-2 ml-2"><i class="fa fa-download"></i> Download</button>
                    </form>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
    <div id="results"></div>
</div>

<script>
    $('#form-reports').on('submit', function(e) {
        e.preventDefault()
        let formData = new FormData($('#form-reports')[0])
        $.ajax({
            url: '<?= base_url() ?>reports/show_reports',
            method: 'POST',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            data: formData,
            success: function(results) {
                $("#results").html(results);
            }
        })
    })

    $('#btn_download').on('click', function() {
        console.log('ok')
        let data = [];
        $('input[name*="kompetensi"]:checked').each(function() {
            let row = {
                name: this.name,
                value: this.value,
                kompetensi: $(this).data('kompetensi'),
                deskripsi: $(this).data('deskripsi'),
                perilaku: []
            }
            let kompetensi_id = $(this).data('no');
            let class_child = "child-check-" + kompetensi_id;

            $('input[class*="' + class_child + '"]:checked').each(function() {
                row.perilaku.push({
                    name: this.name,
                    value: this.value,
                    perilaku: $(this).data('perilaku')
                })
            })

            data.push(row)
        });

        let new_data = JSON.stringify(data)


        $.ajax({
            url: '<?= base_url('Reports') ?>/prints_reports_pdf',
            data: {
                data: new_data,
                event: $('#event_id').val()
            },
            type: 'POST',
            dataType: 'JSON',
            success: function(results) {
                console.log(results)
            }
        })
    })
</script>
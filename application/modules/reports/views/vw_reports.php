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
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> Cari</button>
                            <div class="btn-group">
                                <button class="btn btn-success dropdown-toggle mb-2 ml-2" id="btn_master" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-download"></i> Download
                                </button>
                                <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item btn_download" href="#" data-bobot="true">Semua</button>
                                    <button type="button" class="dropdown-item btn_download" href="#" data-bobot="false">Semua ( Tanpa bobot nilai )</button>
                                    <button type="button" id="btn_kompetensi" class="dropdown-item" href="#">Kompetensi</button>
                                    <a class="dropdown-item" href="#">Atur ulang</a>
                                </div>
                            </div>
                        </div>
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

    $('.btn_download').on('click', function() {
        var btn = $(this);
        var bobot = $(this).data('bobot')
        console.log(bobot)
        // Disable the button and change its content to show the spinner
        $('#btn_master').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Downloading...');
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
            let class_child = ".child-check-" + kompetensi_id;

            var checkboxes = $(class_child);

            checkboxes.each(function(index, checkbox) {
                if ($(checkbox).prop('checked')) {
                    row.perilaku.push({
                        name: $(checkbox).attr('name'),
                        value: $(checkbox).val(),
                        perilaku: $(checkbox).data('perilaku')
                    });
                }
            });

            data.push(row)
        });

        let new_data = JSON.stringify(data)
        $.ajax({
            url: '<?= base_url('Reports') ?>/prints_reports_pdf',
            data: {
                data: new_data,
                event: $('#event_id').val(),
                bobot: bobot
            },
            type: 'POST',
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response, status, xhr) {
                $('#btn_master').prop('disabled', false).html('<i class="fa fa-download"></i> Download');

                if (response instanceof Blob) {
                    var blob = new Blob([response]);
                    var link = document.createElement('a');

                    // Use the filename from the response
                    var filename = xhr.getResponseHeader('Content-Disposition').split('filename=')[1];

                    let new_filename = filename.replace(/^"|"$/g, '').trim()

                    link.href = window.URL.createObjectURL(blob);
                    link.download = new_filename;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                } else {
                    console.error("Invalid response format");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
            }
        })
    })

    $('#btn_kompetensi').on('click', function() {
        $('#btn_master').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Downloading...');
        let data = [];
        $('input[name*="kompetensi"]:checked').each(function() {
            let row = {
                name: this.name,
                value: this.value,
                kompetensi: $(this).data('kompetensi'),
                deskripsi: $(this).data('deskripsi'),
            }
            data.push(row)
        });

        let new_data = JSON.stringify(data)
        $.ajax({
            url: '<?= base_url('Reports') ?>/prints_kompetensi_pdf',
            data: {
                data: new_data,
                event: $('#event_id').val(),
                bobot: true
            },
            type: 'POST',
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response, status, xhr) {
                $('#btn_master').prop('disabled', false).html('<i class="fa fa-download"></i> Download');

                if (response instanceof Blob) {
                    var blob = new Blob([response]);
                    var link = document.createElement('a');

                    // Use the filename from the response
                    var filename = xhr.getResponseHeader('Content-Disposition').split('filename=')[1];

                    let new_filename = filename.replace(/^"|"$/g, '').trim()

                    link.href = window.URL.createObjectURL(blob);
                    link.download = new_filename;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                } else {
                    console.error("Invalid response format");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
            }
        })
    })
</script>
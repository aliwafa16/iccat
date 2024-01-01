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
                        <button type="submit" class="btn btn-success mb-2 ml-2"><i class="fa fa-download"></i> Download</button>
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
</script>
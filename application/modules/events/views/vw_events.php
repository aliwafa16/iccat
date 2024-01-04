<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-info mb-3" type="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Tambah data</button>

                    <table id="events_table" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Client</th>
                                <th>Kode</th>
                                <th>Status</th>
                                <th>Responden</th>
                                <th>Event Start</th>
                                <th>Event End</th>
                                <th>PIC Event</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
</div>

<div class="modal fade" id="addModal" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md static" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form_tambah">
                    <div class="form-group">
                        <label for="client_id">Client</label>
                        <select class="form-control js-example-basic-single" id="client_id" name="client_id" style="width: 100%; height:100px">
                            <?php foreach ($clients as $client) : ?>
                                <option value="<?= $client['id'] ?>"><?= $client['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="min_responden">Minimal Responden</label>
                        <input type="number" class="form-control" id="min_responden" name="min_responden" required>
                    </div>
                    <div class="form-group">
                        <label for="event_start">Event Mulai</label>
                        <input type="datetime-local" class="form-control" id="event_start" name="event_start" required>
                    </div>
                    <div class="form-group">
                        <label for="event_end">Event Selesai</label>
                        <input type="datetime-local" class="form-control" id="event_end" name="event_end" required>
                    </div>
                    <div class="form-group">
                        <label for="pic_event">PIC Event</label>
                        <input type="text" class="form-control" id="pic_event" name="pic_event" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        var table = $("#events_table");
        grid_brand = table.DataTable({
            // scrollX: true,
            // scrollCollapse: true,
            aaSorting: [],
            initComplete: function(settings, json) {},
            retrieve: true,
            processing: true,
            ajax: {
                type: "GET",
                url: '<?= base_url() ?>Events/load',
                data: function(d) {
                    no = 0;
                },
                dataSrc: "",
            },
            columns: [{
                    render: function(data, type, full, meta) {
                        no += 1;

                        return no;
                    },
                    className: "text-center",
                    width: "1%",
                },
                {
                    render: function(data, type, full, meta) {
                        return full.name;
                    },
                    className: "text-center",
                },
                {
                    render: function(data, type, full, meta) {
                        return full.client_name;
                    },
                    className: "text-center",
                },
                {
                    render: function(data, type, full, meta) {
                        return full.code;
                    },
                    className: "text-center",
                },
                {
                    render: function(data, type, full, meta) {
                        return full.is_active;
                    },
                    className: "text-center",
                },
                {
                    render: function(data, type, full, meta) {
                        return full.min_responden;
                    },
                    className: "text-center",
                },
                {
                    render: function(data, type, full, meta) {
                        return full.event_start;
                    },
                    className: "text-center",
                },

                {
                    render: function(data, type, full, meta) {
                        return full.event_end;
                    },
                    className: "text-center",
                },
                {
                    render: function(data, type, full, meta) {
                        return full.pic_event;
                    },
                    className: "text-center",
                },
                {
                    render: function(data, type, full, meta) {
                        return `<div class="container">
                                    <div class="row">
                                    <div class="col">
                                    <button title="Edit" onclick="edit('${full.id_brand}','${full.brand}')" type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                    <button onclick="hapus('${full.id_brand}')" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                    </div>
                                </div>`;
                    },
                    width: "20%",
                    className: "text-center",
                },
            ],
        });
    })


    $("#form_tambah").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData($('#form_tambah')[0])
        $.ajax({
            url: '<?= base_url() ?>Events/tambah',
            method: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            data: formData,
            success: function(results) {
                if (results.code != 200) {
                    errors(results.message)
                } else {
                    success(results.message)
                    $('.modal').modal('hide')
                }
            }
        })
    });
</script>
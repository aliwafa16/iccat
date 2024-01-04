<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- <button class="btn btn-info mb-3" type="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Tambah data</button> -->

                    <table id="client_table" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Kompetensi</th>
                                <th>Perilaku</th>
                                <th>Created At</th>
                                <th>Updated At</th>
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form_edit">
                    <input type="hidden" class="form-control" id="id_perilaku" name="id_perilaku" aria-describedby="emailHelp" required>
                    <div class="form-group">
                        <label for="perilaku">Perilaku</label>
                        <input type="text" class="form-control" id="perilaku" name="perilaku" aria-describedby="emailHelp" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $("#client_table");
        grid_brand = table.DataTable({
            // scrollX: true,
            // scrollCollapse: true,
            aaSorting: [],
            initComplete: function(settings, json) {},
            retrieve: true,
            processing: true,
            ajax: {
                type: "GET",
                url: '<?= base_url() ?>behaviors/load',
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
                        return full.kompetensi;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.perilaku;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.created_at;
                    },
                    width: "10%",
                },
                {
                    render: function(data, type, full, meta) {
                        return full.updated_at;
                    },
                    width: "10%",
                },
                {
                    render: function(data, type, full, meta) {
                        return `<div class="container">
                                    <button title="Edit" onclick="edit('${full.id}','${full.perilaku}')" type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
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
            url: '<?= base_url() ?>Clients/tambah',
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

    function edit(id, value) {
        $('#editModal').modal('show')
        $('#editModal #perilaku').val(value)
        $('#editModal #id_perilaku').val(id)
    }

    $("#form_edit").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData($('#form_edit')[0])
        $.ajax({
            url: '<?= base_url() ?>behaviors/edit',
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
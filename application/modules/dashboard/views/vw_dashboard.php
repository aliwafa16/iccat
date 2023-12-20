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
                    <table id="dashboard_table" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Client</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Jumlah Responden</th>
                                <th>Event Mulai</th>
                                <th>Event Selesai</th>
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

<div class="modal fade" id="addModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
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

                    <h5><b>Client data</b></h5>
                    <hr>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No.Telp</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                    </div>
                    <div class="form-group">
                        <label for="pic_client">PIC</label>
                        <input type="text" class="form-control" id="pic_client" name="pic_client" required>
                    </div>
                    <h5 class="mt-4"><b>Akun data</b></h5>
                    <hr>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="re_password">Re-Password</label>
                        <input type="password" class="form-control" id="re_password" name="re_password" required>
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
        var table = $("#dashboard_table");
        grid_brand = table.DataTable({
            // scrollX: true,
            // scrollCollapse: true,
            aaSorting: [],
            initComplete: function(settings, json) {},
            retrieve: true,
            processing: true,
            ajax: {
                type: "GET",
                url: '<?= base_url() ?>dashboard/load',
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
                },
                {
                    render: function(data, type, full, meta) {
                        return full.client_name;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.client_email;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.is_active;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.min_responden;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.event_start;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.event_end;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return `<div class="container">
                                    <a href="${full.link}" title="Edit" type="button" class="btn btn-success"><i class="fa fa-paper-plane"></i> Mulai survey</button>
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
</script>
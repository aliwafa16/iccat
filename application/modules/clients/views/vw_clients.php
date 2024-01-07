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

                    <table id="client_table" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>No. Telp</th>
                                <th>PIC Client</th>
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
                <form action="" method="POST" id="form_tambah" enctype="multipart/form-data">

                    <h5><b>Client data</b></h5>
                    <hr>
                    <div class="form-group">
                        <label for="name">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No.Telp <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="logo" name="logo" required accept=".png, .jpeg, .jpg">
                        <small id="emailHelp" class="form-text text-muted">Format : .png, .jpeg, .jpg</small>
                        <small id="emailHelp" class="form-text text-muted">Max File : 5MB</small>
                        <small id="emailHelp" class="form-text text-muted">Rekomendasi Resolusi : </small>
                    </div>
                    <div class="form-group">
                        <label for="pic_client">PIC <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="pic_client" name="pic_client" required>
                    </div>
                    <h5 class="mt-4"><b>Akun data</b></h5>
                    <hr>
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="re_password">Re-Password <span class="text-danger">*</span></label>
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
                url: '<?= base_url() ?>clients/load',
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
                        return full.email;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return `<img src="<?= base_url() ?>assets/uploads/logo_clients/${full.logo}" alt="" width="80%">`;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.is_active;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.no_telp;
                    },
                },
                {
                    render: function(data, type, full, meta) {
                        return full.pic_client;
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
                                    <button title="Edit" onclick="edit('${full.id_brand}','${full.brand}')" type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                    <button onclick="hapus('${full.id_brand}')" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
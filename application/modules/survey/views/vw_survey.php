<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>

    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Wizard -->
    <link href="<?= base_url('assets/wizards') ?>/dist/css/smart_wizard_dots.css" rel="stylesheet" type="text/css" />

    <!-- Alert -->
    <link rel="stylesheet" href="<?= base_url('assets/alerts/style.css') ?>">

    <!-- Fontawesome -->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">



    <style>
        td {
            position: relative;
            text-align: center;
        }

        input[type="radio"] {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-dark" style="background-color: #6777ef;">
        <div class="container justify-content-center">
            <ul class="nav">
                <li class="nav-item">
                    <h3 class="text-light">IDENTIFICATION CRITERIA COMPETENCIES AT WORK</h3>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid" id="tahap-1">
        <div class="row mt-5">
            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <b>PETUNJUK PENGISIAN</b>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <p class="card-text" style="text-align:justify">Berikut ini terdapat daftar kegiatan yang biasa dilakukan oleh seorang karyawan/pimpinan. Kegiatan tersebut merupakan perilaku yang menjadi indikator dari kompetensi yang biasanya menjadi persyaratan seseorang dalam menjalankan fungsi pekerjaan pada suatu posisi tertentu. Tujuan dari kuesioner ini adalah untuk membantu kami dalam menentukan kriteria-kriteria yang diperlukan oleh pegawai pada pekerjaan tersebut, sehingga dapat diidentifikasi kompetensi disertai tindakannya yang dinilai paling penting, untuk mencapai keberhasilan dalam menjalankan tugas, kewajiban dan tanggung jawab pada fungsi pekerjaan tersebut.</p>
                        <p class="card-text" style="text-align:justify">Kami meminta saudara untuk memberikan penilaian pada setiap kegiatan atau perilaku tersebut. Dalam hal ini saudara diminta untuk menentukan frekuensi dan derajat/tingkat kepentingan dari setiap tindakan atau perilaku tersebut, yaitu dengan cara memberi tanda silang (x) pada salah satu dari alternatif penilaian yang tersedia.</p>
                        <h5 class="card-title">Tingkat kepentingan</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><b>MUTLAK</b> : Saudara tidak dapat mengerjakan pekerjaan dengan sukses dan baik tanpa memunculkan kompetensi</li>
                            <li class="list-group-item"><b>PENTING</b> : Akan sulit bagi saudara untuk melaksanakan pekerjaan dengan sukses, tanpa memunculkan kompetensi</li>
                            <li class="list-group-item"><b>BERGUNA, TAPI TIDAK PENTING</b> : Kegiatan ini akan menunjang prestasi kerja, tetapi juga prestasi tersebut dapat diraih secara memuaskan tanpa harus memuncullkan kompetensi</li>
                            <li class="list-group-item"><b>TIDAK PERLU</b> : Kompetensi ini jarang atau sama sekali tidak berkaitan dengan prestasi kerja</li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div id="smartwizard">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#step-1">
                                <div class="num">1</div>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $max_loop; $i++) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-<?= $i + 1 ?>">
                                    <div class="num"><?= $i + 1 ?></div>
                                </a>
                            </li>
                        <?php endfor; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-14">
                                <div class="num">14</div>
                            </a>
                        </li>
                    </ul>
                    <form action="" id="form-survey">
                        <div class="tab-content">
                            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                <div class="mt-3">
                                    <div class="form-group col-md-3">
                                        <label for="username">Nama</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="no_telp">No. Telp</label>
                                        <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="born_date">Tanggal lahir</label>
                                        <input type="date" class="form-control" id="born_date" name="born_date" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="position">Jabatan saat ini</label>
                                        <input type="text" class="form-control" id="position" name="position" required>
                                    </div>
                                </div>
                            </div>
                            <?php $step = 1 ?>
                            <?php foreach ($item_pernyataan as $pernyataan) : ?>
                                <div id="step-<?= $step + 1 ?>" class="tab-pane" role="tabpanel" aria-labelledby="step-<?= $step + 1 ?>">
                                    <table class="table table-hover table-bordered">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th scope="col" style="width: 50%;vertical-align:middle" rowspan="3">Kompetensi dan perilaku kunci</th>
                                                <th scope="col" style="width: 50%;vertical-align:middle" colspan="10">Analisa Kompetensi</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" style="vertical-align:middle" colspan="6">Frekuensi</th>
                                                <th scope="col" style="vertical-align:middle" colspan="5">Tingkat kepentingan</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" style="vertical-align:middle">Tidak Pernah</th>
                                                <th scope="col" style="vertical-align:middle">Tahunan</th>
                                                <th scope="col" style="vertical-align:middle">Bulanan</th>
                                                <th scope="col" style="vertical-align:middle">Mingguan</th>
                                                <th scope="col" style="vertical-align:middle">Harian</th>
                                                <th scope="col" style="vertical-align:middle">Beberapa kali dalam sehari</th>
                                                <th scope="col" style="vertical-align:middle">Mutlak</th>
                                                <th scope="col" style="vertical-align:middle">Penting</th>
                                                <th scope="col" style="vertical-align:middle">Berguna</th>
                                                <th scope="col" style="vertical-align:middle">Tidak Perlu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pernyataan as $item) : ?>
                                                <tr>
                                                    <td style="padding: 6px; text-align:left"><?= $item['perilaku'] ?></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="0" required></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="1" required></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="2" required></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="3" required></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="4" required></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="5" required></td>
                                                    <td class="align-middle"><input type="radio" name="kepentingan_<?= $item['id'] ?>" id="kepentingan_<?= $item['id'] ?>" style="accent-color: red;" value="4" required></td>
                                                    <td class="align-middle"><input type="radio" name="kepentingan_<?= $item['id'] ?>" id="kepentingan_<?= $item['id'] ?>" style="accent-color: red;" value="3" required></td>
                                                    <td class="align-middle"><input type="radio" name="kepentingan_<?= $item['id'] ?>" id="kepentingan_<?= $item['id'] ?>" style="accent-color: red;" value="2" required></td>
                                                    <td class="align-middle"><input type="radio" name="kepentingan_<?= $item['id'] ?>" id="kepentingan_<?= $item['id'] ?>" style="accent-color: red;" value="1" required></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php $step++; ?>
                            <?php endforeach ?>
                            <div id="step-14" class="tab-pane" role="tabpanel" aria-labelledby="step-14">
                                <div class="row">
                                    <div class="list-group col-md-3">
                                        <?php foreach ($item_kompetensi as $kompetensi) : ?>
                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1"><?= $kompetensi['kompetensi'] ?></h5>
                                                    <small><i class="fa fa-plus"></i></small>
                                                </div>
                                                <p class="mb-1"></p>
                                                <small><?= $kompetensi['deskripsi'] ?></small>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-md-9">
                                        <table class="table table-hover table-bordered">
                                            <thead style="text-align: center;">
                                                <tr>
                                                    <th scope="col" style="width: 50%;vertical-align:middle" rowspan="2">Ranking</th>
                                                    <th scope="col" style="width: 50%;vertical-align:middle" rowspan="2">Kompetensi</th>
                                                    <th scope="col" style="width: 50%;vertical-align:middle" colspan="4">Tingkat Kepentingan</th>
                                                </tr>
                                                <tr>
                                                    <th scope="col" style="vertical-align:middle">Mutlak</th>
                                                    <th scope="col" style="vertical-align:middle">Penting</th>
                                                    <th scope="col" style="vertical-align:middle">Berguna</th>
                                                    <th scope="col" style="vertical-align:middle">Tidak Perlu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <?php foreach ($item_kompetensi as $kompetensi) : ?>
                                                    <tr>
                                                        <td>
                                                            <h5><?= $i ?></h5>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <select class="js-example-data-array js-data-example-ajax form-control" style="width: 100%;" name="kompetensi_<?= $kompetensi['id'] ?>" onchange="changeSelected(this)">
                                                                        <option value="">---Pilih kompetensi---</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <!-- <button class="btn btn-danger" type="button"><i class="fa fa-times"></i></button> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Include optional progressbar HTML -->
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <!-- Wizards -->
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

    <!-- Alerts -->
    <script src="<?= base_url('assets/alerts/cute-alert.js') ?>"></script>

    <!-- Sortable -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script> -->

    <script>
        $(document).ready(function() {


            var formInputs = $('#form-survey').find(':input:not(:radio)');

            // Loop melalui setiap elemen formulir
            formInputs.each(function() {
                var inputName = $(this).attr('name');

                // Periksa apakah ada nilai di local storage untuk kunci yang sesuai
                var storedValue = localStorage.getItem(inputName);

                // Jika ada nilai di local storage, atur nilai tersebut ke dalam elemen formulir
                if (storedValue !== null) {
                    $(this).val(storedValue);
                }
            });


            var radioButtons = $('#form-survey').find(':radio');

            // Loop through each radio button
            radioButtons.each(function() {
                var radioName = $(this).attr('name');

                // Check if there is a value in local storage for the corresponding key
                var storedValueRadio = localStorage.getItem(radioName);

                // If a value is found in local storage, check the radio button with that value
                if (storedValueRadio !== null && $(this).val() === storedValueRadio) {
                    $(this).prop('checked', true);
                }
            });

            // Sortable// Without options:
            // $('#my-list').sortable();
            // var order = $('#my-list').sortable('toArray');

            // function toArray() {
            //     console.log('okaaa')
            // }



            $(function() {
                // SmartWizard initialize
                $('#smartwizard').smartWizard({
                    theme: 'dots',
                    lang: { // Language variables for button
                        next: 'Selanjutnya',
                        previous: 'Sebelumnya'
                    },
                    toolbar: {
                        extraHtml: `<button class="btn btn-success" type="button" id="finish-btn" onclick="onFinish()">Finish</button>`
                    },

                });

                $('#smartwizard').on('showStep', function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                    // Hide the finish button initially
                    $('#finish-btn').hide();

                    // Show the finish button only on the last step
                    if (stepPosition === 'last') {
                        $('#finish-btn').show();
                    }

                    if (stepNumber == 13) {
                        console.log('okkkkkkkkkkk')
                    }
                });

                $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
                    // return confirm("Do you want to leave the step " + currentStepIndex + "?");


                    if (currentStepIndex == 0) {
                        var formData1 = $('#form-survey').find(':input:not(:radio)').map(function() {
                            localStorage.setItem($(this).attr('name'), $(this).val());
                        }).get();
                    } else {
                        var formData = $('#form-survey').find(':radio:checked').map(function() {
                            localStorage.setItem($(this).attr('name'), $(this).val());
                        }).get();
                    }
                });

            });

            // Get Data dropdown
            // data_dropdown = [];
            // $.ajax({
            //     url: '<?= base_url() ?>Survey/getKompetensi',
            //     dataType: 'JSON',
            //     method: 'POST',
            //     success: function(results) {
            //         results.forEach(element => {
            //             data_dropdown.push({
            //                 id: element.id,
            //                 text: element.kompetensi
            //             })
            //         });


            //         $(".js-example-data-array").select2({
            //             data: data_dropdown
            //         })

            //         console.log(data_dropdown)
            //     }
            // })

        })

        function changeSelected(e) {
            // console.log(e.value)
            // data_dropdown = data_dropdown.filter(function(obj) {
            //     return obj.id !== e.value;
            // });
        }

        // for (var i = 0; i < 360; i++) {
        //     $('[name=frekuensi_' + i + ']').eq(Math.floor(Math.random() * 6)).attr('checked', true);
        // }

        $('.js-data-example-ajax').select2({
            ajax: {
                url: '<?= base_url('Survey/getKompetensi') ?>',
                dataType: 'json',
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.text
                            };
                        })
                    };
                },
                data: function(params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                }
            }
        })

        $("select").on("select2:select", function(evt) {
            var element = evt.params.data.element;
            var $element = $(element);
            $element.detach();
            $(this).append($element);
            $(this).trigger("change");
        });

        function onFinish() {
            cuteAlert({
                type: "question",
                title: 'Yakin melanjutkan ?',
                message: 'Data yang sudah disimpan tidak bisa diubah',
                confirmText: 'Lanjutkan',
                cancelText: 'Batal'
            }).then((e) => {
                if (e == "confirm") {
                    $('#tahap-1').hide();
                } else {
                    console.log('gak confirm')
                }
            })
            // alertify.confirm("Yakin ingin menghapus data ?",
            // function() {
            // $.ajax({
            // url: '<?= base_url() ?>Category/hapus',
            // method: 'POST',
            // dataType: 'JSON',
            // data: {
            // id
            // },
            // success: function(results) {
            // if (results.code != 200) {
            // errors(results.message)
            // } else {
            // success(results.message)
            // }
            // }
            // })
            // },
            // ).set('labels', {
            // ok: 'Hapus',
            // cancel: 'Batal'
            // }).set({
            // title: "Hapus data"
            // });
        }
    </script>
</body>

</html>
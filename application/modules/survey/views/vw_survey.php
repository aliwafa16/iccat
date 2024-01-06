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
    <link href="<?= base_url('assets/') ?>images/logo2.JPG" rel="icon">
    <title>ICCW - Survey</title>


    <style>
        td {
            position: relative;
            text-align: center;
        }

        table,
        th,
        td {
            border: 2px solid black !important;
        }

        input[type="radio"] {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .list-group {
            max-height: 300px;
            overflow-y: auto;
        }

        .list-group::-webkit-scrollbar {
            width: 8px;
        }

        .list-group::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        .list-group::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
    </style>
    <title>Survey</title>
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
        <a class="btn btn-primary mt-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Petunjuk Pengisian
        </a>
        <div class="row mt-3">
            <div class="collapse mb-2" id="collapseExample">
                <div class="card" id="pernyataan">
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
                <div class="card" id="kompetensi">
                    <div class="card-header">
                        <b>PETUNJUK PENGISIAN</b>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <p class="card-text" style="text-align:justify">Berikut ini terdapat daftar kompetensi yang biasanya menjadi persyaratan seseorang dalam menjalankan fungsi pekerjaan pada suatu posisi tertentu. Tujuan dari kuesioner ini adalah untuk membantu kami dalam menentukan kriteria-kriteria yang diperlukan oleh pegawai pada pekerjaan tersebut, sehingga dapat diidentifikasi kompetensi yang paling penting, untuk mencapai keberhasilan dalam menjalankan tugas, kewajiban dan tanggung jawab pada fungsi pekerjaan tersebut.</p>
                        <p class="card-text" style="text-align:justify">Kami meminta saudara untuk memberikan penilaian pada setiap kompetensi. Dalam hal ini saudara diminta untuk menentukan <b>RANKING</b> dari setiap kompetensi tersebut.</p>
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
            <div class="col-md-12">
                <div id="smartwizard">
                    <ul class="nav" style="visibility:hidden">
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
                    <form action="" id="form-survey" method="POST" enctype="multipart/form-data">
                        <div class="tab-content">
                            <!-- Include optional progressbar HTML -->
                            <div class="progress mb-2">
                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
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
                                        <label for="gender">Jenis Kelamin</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="1">Pria</option>
                                            <option value="2">Wanita</option>
                                        </select>
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
                                                <th scope="col" class="table-secondary" style="width: 50%;vertical-align:middle; font-size:24px" rowspan="3">Kompetensi dan perilaku kunci</th>
                                                <th scope="col" class="table-secondary" style="width: 50%;vertical-align:middle" colspan="10">Analisa Kompetensi</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="table-danger" style="vertical-align:middle" colspan="6">Frekuensi</th>
                                                <th scope="col" class="table-primary" style="vertical-align:middle" colspan="5">Tingkat kepentingan</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="table-danger" style="vertical-align:middle">Tidak Pernah</th>
                                                <th scope="col" class="table-danger" style="vertical-align:middle">Tahunan</th>
                                                <th scope="col" class="table-danger" style="vertical-align:middle">Bulanan</th>
                                                <th scope="col" class="table-danger" style="vertical-align:middle">Mingguan</th>
                                                <th scope="col" class="table-danger" style="vertical-align:middle">Harian</th>
                                                <th scope="col" class="table-danger" style="vertical-align:middle">Beberapa kali dalam sehari</th>
                                                <th scope="col" class="table-primary" style="vertical-align:middle">Mutlak</th>
                                                <th scope="col" class="table-primary" style="vertical-align:middle">Penting</th>
                                                <th scope="col" class="table-primary" style="vertical-align:middle">Berguna</th>
                                                <th scope="col" class="table-primary" style="vertical-align:middle">Tidak Perlu</th>
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
                                    <div class="col-md-3">
                                        <h3 class="text-center mb-2">Daftar Kompetensi</h3>
                                        <div class="list-group" style="max-height: 50em; overflow-y: auto;">
                                            <?php foreach ($item_kompetensi as $kompetensi) : ?>
                                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1"><?= $kompetensi['kompetensi'] ?></h5>
                                                    </div>
                                                    <p class="mb-1"></p>
                                                    <small><?= $kompetensi['deskripsi'] ?></small>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <table class="table table-hover table-bordered">
                                            <thead style="text-align: center;">
                                                <tr>
                                                    <th scope="col" class="table-secondary" style="vertical-align:middle" rowspan="2">Ranking</th>
                                                    <th scope="col" class="table-secondary" style="vertical-align:middle" rowspan="2">Kompetensi</th>
                                                    <th scope="col" class="table-secondary" style="vertical-align:middle" colspan="4">Tingkat Kepentingan</th>
                                                </tr>
                                                <tr>
                                                    <th scope="col" class="table-primary" style="vertical-align:middle">Mutlak</th>
                                                    <th scope="col" class="table-primary" style="vertical-align:middle">Penting</th>
                                                    <th scope="col" class="table-primary" style="vertical-align:middle">Berguna</th>
                                                    <th scope="col" class="table-primary" style="vertical-align:middle">Tidak Perlu</th>
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
                                                                    <select class="js-example-data-array js-data-example-ajax form-control" style="width: 100%;" id="rank_<?= $i ?>" name="rank_<?= $i ?>" onchange="changeSelected(`<?= $i ?>`,this)">
                                                                        <option value="0">---Pilih kompetensi---</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <!-- <button class="btn btn-danger" type="button" onclick="resetSelected(`<?= $kompetensi['id'] ?>`)"><i class="fa fa-times"></i></button> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle"><input type="radio" name="kepentingan_kompetensi_<?= $kompetensi['id'] ?>" id="kepentingan_kompetensi_<?= $kompetensi['id'] ?>" style="accent-color: red;" value="4" required></td>
                                                        <td class="align-middle"><input type="radio" name="kepentingan_kompetensi_<?= $kompetensi['id'] ?>" id="kepentingan_kompetensi_<?= $kompetensi['id'] ?>" style="accent-color: red;" value="3" required></td>
                                                        <td class="align-middle"><input type="radio" name="kepentingan_kompetensi_<?= $kompetensi['id'] ?>" id="kepentingan_kompetensi_<?= $kompetensi['id'] ?>" style="accent-color: red;" value="2" required></td>
                                                        <td class="align-middle"><input type="radio" name="kepentingan_kompetensi_<?= $kompetensi['id'] ?>" id="kepentingan_kompetensi_<?= $kompetensi['id'] ?>" style="accent-color: red;" value="1" required></td>
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


            selectedValues = [];
            data_dropdown = [];
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

            const initialAriaValueNow = $('.progress-bar').attr('aria-valuenow');
            console.log('Initial aria-valuenow', initialAriaValueNow);

            $('.progress-bar').text(initialAriaValueNow + '%')



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


                    if (stepNumber != 13) {
                        $('#pernyataan').show()
                        $('#kompetensi').hide()
                    } else {
                        $('#pernyataan').hide()
                        $('#kompetensi').show()
                    }
                });

                $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
                    // Update the progress bar width and aria-valuenow attribute
                    if (currentStepIndex == 0) {
                        var formData1 = $('#form-survey').find(':input:not(:radio)').map(function() {
                            localStorage.setItem($(this).attr('name'), $(this).val());
                        }).get();
                    } else {
                        var formData = $('#form-survey').find(':radio:checked').map(function() {
                            localStorage.setItem($(this).attr('name'), $(this).val());
                        }).get();
                    }

                    let totalSteps = $('#smartwizard ul.nav > li').length;
                    let progressValue = (currentStepIndex + 1) / (totalSteps - 1) * 100;

                    // Update the progress bar width and aria-valuenow attribute
                    $('.progress-bar').css('width', progressValue + '%').attr('aria-valuenow', progressValue);
                    const originalNumber = parseFloat($('.progress-bar').attr('aria-valuenow'));
                    $('.progress-bar').text(originalNumber.toFixed(2) + '%');



                });

            });



            // Get data untuk bagian kompetensi
            $.ajax({
                url: '<?= base_url() ?>Survey/getKompetensi',
                dataType: 'JSON',
                method: 'GET',
                success: function(results) {
                    results.forEach(element => {
                        data_dropdown.push({
                            id: element.id,
                            text: element.text
                        })
                    });


                    $(".js-example-data-array").select2({
                        data: data_dropdown
                    })

                    // console.log(data_dropdown)
                }
            })

        })


        function changeSelected(rank, e) {

            // let obj = {
            //     rank,
            //     value: e.value
            // }

            // // selectedValues.push(obj)

            // var existingIndex = findIndexByRank(rank);

            // // Jika sudah tersedia, hapus entri dengan rank tersebut
            // if (existingIndex !== -1) {
            //     selectedValues.splice(existingIndex, 1);
            // }

            // // Tambahkan entri baru dengan rank yang baru
            // selectedValues.push({
            //     rank,
            //     value: e.value
            // });

            // data_dropdown.forEach(dropdown => {
            //     var isSelected = selectedValues.some(selected => selected.value == dropdown.id);

            //     $("option[value='" + dropdown.id + "']").prop('disabled', isSelected);
            // });

            // Simpan ke local storage
            // localStorage.setItem(`rank_${rank}`, e.value)
        }

        $('select[name*="rank"]').change(function() {

            // start by setting everything to enabled
            $('select[name*="rank"] option').prop('disabled', false);

            // loop each select and set the selected value to disabled in all other selects
            $('select[name*="rank"]').each(function() {
                var $this = $(this);
                $('select[name*="rank"]').not($this).find('option').each(function() {
                    if ($(this).attr('value') == $this.val()) {
                        $(this).prop('disabled', true);
                    }
                });
            });
            $('select[name*="rank"]').select2("destroy").select2();
        });

        function findIndexByRank(rank) {
            for (var i = 0; i < selectedValues.length; i++) {
                if (selectedValues[i].rank === rank) {
                    return i;
                }
            }
            return -1; // Mengembalikan -1 jika tidak ditemukan
        }

        function onFinish() {
            cuteAlert({
                type: "question",
                title: 'Yakin melanjutkan ?',
                message: 'Data yang sudah disimpan tidak bisa diubah',
                confirmText: 'Lanjutkan',
                cancelText: 'Batal'
            }).then((e) => {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                var hours = String(today.getHours()).padStart(2, '0');
                var minutes = String(today.getMinutes()).padStart(2, '0');
                var seconds = String(today.getSeconds()).padStart(2, '0');

                today = mm + '-' + dd + '-' + yyyy + ' ' + hours + ':' + minutes + ':' + seconds;


                let formData = new FormData($('#form-survey')[0])
                let unique_code = '<?= $this->input->get('unique_code') ?>'

                if (e == "confirm") {
                    $.ajax({
                        url: '<?= base_url() ?>Survey/SubmitSurvey/?unique_code=' + unique_code + '&date=' + today,
                        method: 'POST',
                        dataType: 'json',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(results) {
                            if (results.code != 200) {
                                cuteAlert({
                                    type: "error",
                                    title: 'Opps...',
                                    message: `${results.message}`,
                                    buttonText: 'OK'
                                })
                            } else {

                                cuteAlert({
                                    type: "success",
                                    title: 'Selamat',
                                    message: `${results.message}`,
                                    buttonText: 'OK'
                                }).then(() => {
                                    window.localStorage.clear();
                                    window.location.href = '<?= base_url() ?>Survey/finish/?unique_code=' + unique_code + '&date=' + today
                                })
                            }
                        }
                    })
                } else {
                    console.log('gak confirm')
                }
            })
        }
    </script>
</body>

</html>
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


    <!-- Wizard -->
    <link href="<?= base_url('assets/wizards') ?>/dist/css/smart_wizard_dots.css" rel="stylesheet" type="text/css" />
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

    <div class="container-fluid">
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
                    </ul>
                    <form action="">
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
                                        <label for="born_date">Jabatan saat ini</label>
                                        <input type="text" class="form-control" id="born_date" name="born_date" required>
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
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="0"></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="1"></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="2"></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="3"></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="4"></td>
                                                    <td class="align-middle"><input type="radio" name="frekuensi_<?= $item['id'] ?>" id="frekuensi_<?= $item['id'] ?>" value="5"></td>
                                                    <td class="align-middle"><input type="radio" name="kepentingan_<?= $item['id'] ?>" id="kepentingan_<?= $item['id'] ?>" value="4"></td>
                                                    <td class="align-middle"><input type="radio" name="kepentingan_<?= $item['id'] ?>" id="kepentingan_<?= $item['id'] ?>" value="3"></td>
                                                    <td class="align-middle"><input type="radio" name="kepentingan_<?= $item['id'] ?>" id="kepentingan_<?= $item['id'] ?>" value="2"></td>
                                                    <td class="align-middle"><input type="radio" name="kepentingan_<?= $item['id'] ?>" id="kepentingan_<?= $item['id'] ?>" value="1"></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php $step++; ?>
                            <?php endforeach ?>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <!-- Wizards -->
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(function() {
                // SmartWizard initialize
                $('#smartwizard').smartWizard({
                    theme: 'dots',
                    lang: { // Language variables for button
                        next: 'Selanjutnya',
                        previous: 'Sebelumnya'
                    },
                    toolbar: {
                        extraHtml: `<button class="btn btn-success" id="finish-btn" onclick="onFinish()">Finish</button>`
                    },

                });

                $('#smartwizard').on('showStep', function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                    // Hide the finish button initially
                    $('#finish-btn').hide();

                    // Show the finish button only on the last step
                    if (stepPosition === 'last') {
                        $('#finish-btn').show();
                    }
                });


            });
        })
    </script>
</body>

</html>
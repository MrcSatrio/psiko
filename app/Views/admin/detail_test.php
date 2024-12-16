<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<!-- Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Data User</h5>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="Nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="Nama" value="<?php echo $soalujian[0]['nama_user']; ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label for="Email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="Email" value="<?php echo $soalujian[0]['email_user']; ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label for="Umur" class="form-label">Umur</label>
                    <?php
                    // Mengambil tanggal lahir dari database atau variabel
                    $tanggal_lahir = $soalujian[0]['lahir_user'];

                    // Mengubah string tanggal lahir ke objek DateTime
                    $lahir = new DateTime($tanggal_lahir);
                    $sekarang = new DateTime(); // Tanggal sekarang

                    // Menghitung selisih antara tanggal lahir dan tanggal sekarang
                    $interval = $sekarang->diff($lahir);

                    // Menampilkan umur dalam format Tahun, Bulan, Hari
                    $umur = $interval->y . ' Tahun, ' . $interval->m . ' Bulan, ' . $interval->d . ' Hari';
                    ?>
                    <input type="text" class="form-control" id="Umur" value="<?php echo $umur; ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="nohp" class="form-label">No Hp</label>
                    <input type="text" class="form-control" id="nohp" value="<?php echo $soalujian[0]['hp_user']; ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                    <input type="text" class="form-control" id="pendidikan" value="<?php echo $soalujian[0]['pendidikan_user']; ?>" disabled>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-semibold mb-0">Data Tes</h5>
                </div>
                <div class="col-md-6">
                    <label for="mulaitest" class="form-label">Mulai Test</label>
                    <input type="text" class="form-control" id="mulaitest" value="<?php echo $soalujian[0]['mulai_test']; ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="selesaitest" class="form-label">Selesai Test</label>
                    <input type="text" class="form-control" id="selesaitest" value="<?php echo $soalujian[0]['selesai_test']; ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="selesaitest" class="form-label">Durasi Test</label>
                    <input type="text" class="form-control" id="selesaitest" value="<?php echo $soalujian[0]['lama_test']; ?> Jam" disabled>
                </div>
                <div class="col-md-6">
                    <label for="tipetest" class="form-label">Tipe Soal</label>
                    <input type="text" class="form-control" id="tipetest" value="<?php echo $soalujian[0]['nama_jenis_soal']; ?>" disabled>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-semibold mb-0">Hasil Tes</h5>
                </div>
                <div class="col-md-6">
                    <label for="rawscore" class="form-label">Raw Score</label>
                    <input type="text" class="form-control" id="rawscore" value="<?php echo $raw_score ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="kalender" class="form-label">Usia Kalender</label>
                    <input type="text" class="form-control" id="kalender" value="<?php echo $nilai_bobot ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="iq" class="form-label">Klasifikasi IQ</label>
                    <input type="text" class="form-control" id="iq" value="<?php echo $iq_classification ?>" disabled>
                </div>


            </div>
        </div>
        <div class="container-fluid">


            <!-- Table to display user data -->
            <table id="dataTable" class="table table-bordered cell-border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($soalujian as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><img src="<?= base_url('uploads/' . $data['isi_soal']) ?>" alt="Soal Gambar" style="max-width: 100px;"></td>
                            <td>
                                <?php
                                // Loop through jawabanbenar to find the correct answer for the current question
                                $correct_answer = null;
                                foreach ($jawabanbenar as $jawaban) {
                                    if ($jawaban['id_soal'] == $data['id_soal']) {
                                        $correct_answer = $jawaban; // Store the correct answer for the question
                                        break;
                                    }
                                }

                                // Check if the answer exists and compare
                                if ($data['jawaban_soal_ujian'] === null && $correct_answer['id_jawaban_soal'] === null) {
                                    echo 'Bukan Soal'; // Case when there's no answer and no correct answer
                                } else {
                                    // Compare the user's answer with the correct answer
                                    if ($data['jawaban_soal_ujian'] == $correct_answer['id_jawaban_soal']) {
                                        echo 'Benar'; // Correct answer
                                    } else {
                                        echo 'Salah'; // Incorrect answer
                                    }
                                }
                                ?>
                            </td>



                        </tr>
                    <?php endforeach; ?>





                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for editing user -->




<?= $this->endSection() ?>
<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Data Soal</h5>
            </div>
        </div>
        <div class="container-fluid">
            <div class="mb-3">
                <label for="soal" class="form-label">TIPE SOAL</label>
                <?php if (!empty($soal) && isset($soal['nama_jenis_soal'])): ?>
                    <h5><?= esc($soal['nama_jenis_soal']) ?></h5>
                <?php else: ?>
                    <p>Data tipe soal tidak tersedia.</p>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="soal" class="form-label">ISI SOAL</label>
                <?php if (!empty($soal) && isset($soal['isi_soal'])): ?>
                    <h5><img src="<?= base_url('uploads/' . $soal['isi_soal']) ?>" alt="Soal" width="200"></h5>
                <?php else: ?>
                    <p>Isi soal tidak tersedia.</p>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="JAWABAN" class="form-label">JAWABAN</label>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Isi Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($jawabansoal) && count($jawabansoal) > 0): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($jawabansoal as $data): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url('uploads/' . $data['jawaban_soal']) ?>" alt="Jawaban" width="200"></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="2">Tidak ada jawaban soal</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mb-3">
                <label for="kunci_jawaban" class="form-label">Kunci Jawaban</label>
                <?php if (!empty($kunci_jawaban) && isset($kunci_jawaban['jawaban_soal'])): ?>
                    <img src="<?= base_url('uploads/' . $kunci_jawaban['jawaban_soal']) ?>" alt="Kunci Jawaban" width="200">
                <?php else: ?>
                    <p>Jawaban tidak tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<!-- Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Buat Soal</h5>
                <!-- Button to create new user -->
            </div>
        </div>

        <div class="container-fluid">
            <form action="<?= base_url() ?>admin/action_create_test" method="post" enctype="multipart/form-data">

                <!-- Peserta Section -->
                <div class="mb-3">
                    <label for="soal" class="form-label">Peserta</label>
                    <!-- Tabel dengan tombol 'Tambah Jawaban' di header -->
                    <table id="dataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahJawabanModal">
                                        Tambah Peserta
                                    </button>
                                </th>
                                <th>Peserta</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php if (isset($peserta) && is_array($peserta) && !empty($peserta)): ?>
                                <?php foreach ($peserta as $data): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nama_peserta'] ?></td>
                                        <td>
                                            <a href="<?= base_url('/admin/delete_peserta/' . $data['id_peserta']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>

                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Jenis Soal Section -->
                <div class="mb-3">
                    <label for="jenis_soal" class="form-label">Soal</label>
                    <select class="form-select" id="jenis_soal" name="jenis_soal" aria-label="jenis_soal">
                        <option selected>Pilih Soal</option>
                        <?php foreach ($soal as $s) : ?>
                            <option value="<?= $s['id_jenis_soal'] ?>"><?= $s['nama_jenis_soal'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Waktu Mulai Section -->
                <div class="mb-3">
                    <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                    <input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai" aria-label="waktu_mulai">
                </div>

                <!-- Waktu Selesai Section -->
                <div class="mb-3">
                    <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                    <input type="datetime-local" class="form-control" id="waktu_selesai" name="waktu_selesai" aria-label="waktu_selesai">
                </div>

                <!-- Durasi Test Section -->
                <div class="mb-3">
                    <label for="durasi_test" class="form-label">Durasi Test</label>
                    <input type="time" class="form-control" id="timeInput" name="durasi_test" aria-label="durasi_test" step="1">
                </div>
                <?php if (isset($peserta) && is_array($peserta) && !empty($peserta)): ?>
                    <?php foreach ($peserta as $data): ?>
                        <input type="hidden" name="peserta[]" value="<?= $data['email_peserta'] ?>">
                    <?php endforeach; ?>
                <?php else: ?>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Tambah Peserta -->
<div class="modal fade" id="tambahJawabanModal" tabindex="-1" aria-labelledby="tambahJawabanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahJawabanModalLabel">Tambah Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for adding participant -->
                <form action="<?= base_url() ?>admin/action_create_peserta" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Peserta</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Modal Footer with submit button -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Jawaban</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<!--  Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Buat Soal</h5>
                <!-- Button to create new user -->
            </div>
        </div>
        <div class="container-fluid">
            <form action="<?= base_url() ?>admin/action_create_soal" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="jenis_soal" class="form-label">Jenis Soal</label>
                    <select class="form-select" id="jenis_soal" name="jenis_soal" aria-label="jenis_soal">
                        <option selected>Pilih Jenis Soal</option>
                        <?php foreach ($jenis_soal as $data) : ?>
                            <option value="<?= $data['id_jenis_soal'] ?>"><?= $data['nama_jenis_soal'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="contohsoal" name="contohsoal">
                        <label class="form-check-label" for="contohsoal">
                            Contoh Soal
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="soal" class="form-label">Isi Soal</label>
                    <input type="file" class="form-control" id="soal" name="soal" required accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="soal" class="form-label">Isi Jawaban</label>

                    <!-- Tabel dengan tombol 'Tambah Jawaban' di header -->
                    <table id="dataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahJawabanModal">
                                        Tambah Jawaban
                                    </button>
                                </th>
                                <th>Jawaban</th>
                                <th>Aksi</th>
                                <th>Kunci</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($jawaban) && !empty($jawaban)): ?>
                                <?php $no = 65; ?>
                                <?php foreach ($jawaban as $item): ?>
                                    <tr>
                                        <td><?= chr($no++) ?></td>
                                        <td>
                                            <img src="<?= base_url('uploads/' . $item['jawaban']) ?>" alt="Jawaban Gambar" style="max-width: 100px;">
                                        </td>
                                        <td>
                                            <a href="<?= base_url('/admin/delete_jawaban/' . $item['id_jawaban']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                        <td>
                                            <input type="radio" name="kunci_jawaban" value="<?= htmlspecialchars($item['jawaban'], ENT_QUOTES, 'UTF-8') ?>" required>
                                        </td>
                                        <input type="hidden" name="jawaban[]" value="<?= htmlspecialchars($item['jawaban'], ENT_QUOTES, 'UTF-8') ?>">
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>

                            <?php endif; ?>
                        </tbody>


                    </table>


                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="tambahJawabanModal" tabindex="-1" aria-labelledby="tambahJawabanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahJawabanModalLabel">Tambah Jawaban</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form harus mencakup tombol submit -->
                <form action="<?= base_url() ?>admin/action_create_jawaban" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="soal" class="form-label">Isi Jawaban</label>
                        <input type="file" class="form-control" id="jawaban" name="jawaban" required accept="image/*">
                    </div>
                    <!-- Tombol submit harus berada di dalam form -->
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
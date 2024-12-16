<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<!--  Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Data Soal</h5>
                <!-- Button to create new user -->
                <a href="<?= base_url() ?>admin/create_soal" class="btn btn-primary">
                    Create Soal
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <table id="dataTable" class="cell-border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Soal</th>
                        <th>Isi Soal</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($soal as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_jenis_soal'] ?></td>
                            <td><img src="<?= base_url('uploads/' . $data['isi_soal']) ?>" alt="Soal Gambar" style="max-width: 100px;"></td>
                            <td>
                                <a href="<?= base_url() ?>admin/detail_soal/<?= $data['id_soal'] ?>">
                                    <iconify-icon icon="gg:info" class="fs-6"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
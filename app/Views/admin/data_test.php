<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<!-- Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Data Test</h5>
                <!-- Button to create new user -->
                <a href="<?= base_url('admin/create_test') ?>" class="btn btn-primary">
                    Create New Test
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Table to display user data -->
            <table id="dataTable" class="table table-bordered cell-border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mulai Test</th>
                        <th>Selesai Test</th>
                        <th>Durasi Test</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($test as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_user'] ?></td>
                            <td><?= $data['mulai_test'] ?></td>
                            <td><?= $data['selesai_test'] ?></td>
                            <td><?= $data['lama_test'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/detail_test/' . $data['id_test']) ?>" class="btn btn-primary">Detail</a>
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
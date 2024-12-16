<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<!--  Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Data Perusahaan</h5>
                <!-- Button to create new user -->
                <a href="<?= base_url() ?>admin/create_perusahaan" class="btn btn-primary">
                    Create Company
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <table id="dataTable" class="cell-border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($perusahaan as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_perusahaan'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
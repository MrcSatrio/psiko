<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<!--  Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Buat Perusahaan</h5>
                <!-- Button to create new user -->
            </div>
        </div>
        <div class="container-fluid">
            <form action="<?= base_url() ?>admin/action_create_perusahaan" method="post">
                <div class="mb-3">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" aria-describedby="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
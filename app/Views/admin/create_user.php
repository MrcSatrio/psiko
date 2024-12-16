<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<!--  Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Buat Pengguna</h5>
                <!-- Button to create new user -->
            </div>
        </div>
        <div class="container-fluid">
            <form action="<?= base_url() ?>admin/action_create_user" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Masukkan Email">
                </div>
                <div class="mb-3">
                    <label for="hp" class="form-label">No HP</label>
                    <input type="number" class="form-control" id="hp" name="hp" aria-describedby="hp" placeholder="Masukkan No Handphone">
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Kelahiran</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal" placeholder="Masukkan Tanggal Kelahiran">
                </div>

                <div class="mb-3">
                    <label for="pendidikan" class="form-label">Tanggal Kelahiran</label>
                    <option selected>Pilih Pendidikan</option>
                    <select class="form-select" id="pendidikan" name="pendidikan" aria-label="pendidikan">
                        <option value="SMP">SMP</option>
                        <option value="SMA/SMK">SMA/SMK</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
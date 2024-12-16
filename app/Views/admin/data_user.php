<?= $this->extend('admin/main_template') ?>

<?= $this->section('content') ?>
<!-- Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Data User</h5>
                <!-- Button to create new user -->
                <a href="<?= base_url('admin/create_user') ?>" class="btn btn-primary">
                    Create New User
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
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($user as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($data['nama_user']) ?></td>
                            <td><?= esc($data['email_user']) ?></td>
                            <td><?= esc($data['hp_user']) ?></td>
                            <td><?= esc($data['lahir_user']) ?></td>
                            <td>
                                <!-- Button to open modal for editing user -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal" data-userid="<?= $data['id_user'] ?>" data-nama="<?= esc($data['nama_user']) ?>" data-email="<?= esc($data['email_user']) ?>" data-hp="<?= esc($data['hp_user']) ?>" data-lahir="<?= esc($data['lahir_user']) ?>">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for editing user -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for editing user data -->
                <form id="editUserForm" action="<?= base_url('admin/action_edit_user') ?>" method="POST">
                    <input type="hidden" id="userId" name="id_user">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="userName" name="nama_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPhone" class="form-label">No. HP</label>
                        <input type="text" class="form-control" id="userPhone" name="hp_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="userBirthday" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="userBirthday" name="lahir_user" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Script to populate the modal with user data
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var userId = this.getAttribute('data-userid');
                var userName = this.getAttribute('data-nama');
                var userEmail = this.getAttribute('data-email');
                var userPhone = this.getAttribute('data-hp');
                var userBirthday = this.getAttribute('data-lahir');

                document.getElementById('userId').value = userId;
                document.getElementById('userName').value = userName;
                document.getElementById('userEmail').value = userEmail;
                document.getElementById('userPhone').value = userPhone;
                document.getElementById('userBirthday').value = userBirthday;
            });
        });
    });
</script>

<?= $this->endSection() ?>
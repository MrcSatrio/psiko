<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logos/seodashlogo.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?php echo base_url(); ?>admin/dashboard" class="text-nowrap logo-img">
                        <img src="<?php echo base_url(); ?>assets/images/logos/astagina.png" width="210" height="80" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url(); ?>admin/dashboard" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url(); ?>admin/create_test" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="qlementine-icons:test-16" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Buat Tes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url(); ?>admin/read_test" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:book-linear" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Data Tes</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">DATA</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url(); ?>admin/data_user" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="mdi:user" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Data Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url(); ?>admin/data_soal" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:book-linear" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Data Soal</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-6" class="fs-6"></iconify-icon>
                            <span class="hide-menu">Hasil</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:login-3-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Login</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Register</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="<?= base_url() ?>assets/js/sidebarmenu.js"></script>
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/hgys0rz09d359u4mdu9g544jc35j7ixlp04uv0k4a7pbsxor/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</body>
<div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">PT ASTAGINA PRAPTAMA AKSAYA © 2024</p>
</div>
<!-- <script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        images_upload_url: '/path_to_image_upload_handler', // Ganti dengan URL upload di server
        automatic_uploads: true,
        images_upload_handler: function(blobInfo, success, failure) {
            return new Promise(function(resolve, reject) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'admin/upload'); // URL yang benar untuk handler di server Anda

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var json = JSON.parse(xhr.responseText);

                        if (json && json.location) {
                            resolve(success(json.location)); // Kirim URL gambar kembali ke TinyMCE
                        } else {
                            reject(failure('Invalid JSON response from server'));
                        }
                    } else {
                        reject(failure('HTTP Error: ' + xhr.status)); // Kesalahan HTTP
                    }
                };

                xhr.onerror = function() {
                    reject(failure('Image upload failed due to an XHR Transport error.')); // Kesalahan umum
                };

                var formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename()); // Menyiapkan file untuk diunggah

                xhr.send(formData); // Kirim form data
            });
        }
    });
</script> -->



<script>
    tinymce.init({
        selector: 'textarea', // Ganti dengan elemen textarea yang ingin Anda gunakan
        plugins: 'image code',
        toolbar: 'undo redo | link image | code',
        automatic_uploads: true,
        images_upload_url: '<?= base_url('admin/upload') ?>', // Pastikan URL sesuai dengan route yang digunakan di CI4
        images_upload_handler: function(blobInfo, success, failure) {
            // Membuat form data untuk gambar yang diupload
            let formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            // Menggunakan fetch API untuk mengirim file ke server
            fetch('<?= base_url('admin/upload') ?>', { // Gunakan base_url untuk memastikan URL benar
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    // Memeriksa apakah respons dari server OK
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Mengubah response menjadi JSON
                })
                .then(result => {
                    // Debugging: Log untuk melihat respons dari server
                    console.log(result);

                    // Jika respons memiliki field 'location', gambar berhasil diupload
                    if (result.location) {
                        success(result.location); // Kirim URL gambar ke TinyMCE
                    } else {
                        failure('Upload gagal: ' + (result.error || 'Unknown error')); // Tampilkan error jika gagal
                    }
                })
                .catch(error => {
                    // Menangani kesalahan jaringan atau respons yang tidak valid
                    failure('HTTP Error: ' + error.message);
                });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "emptyTable": "Tidak ada data di tabel"
            },
            "paging": true, // Mengaktifkan pagination
            "searching": true, // Mengaktifkan fungsi pencarian
            "ordering": true, // Mengaktifkan pengurutan berdasarkan kolom
            "info": true, // Menampilkan informasi tentang jumlah baris
            "responsive": true // Menjadikan tabel responsif
        });
    });
</script>



<?php if (session()->has('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= session()->getFlashdata('error'); ?>'
        });
    </script>
<?php endif; ?>

<?php if (session()->has('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= session()->getFlashdata('success'); ?>'
        });
    </script>
<?php endif; ?>

</html>
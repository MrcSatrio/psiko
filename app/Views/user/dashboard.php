<?= $this->extend('user/main_template') ?>

<?= $this->section('content') ?>
<!--  Header End -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Soal</h5>
            </div>
        </div>
        <div class="container-fluid">

            <div class="container mt-5">
                <div class="row">
                    <?php
                    // Assuming $soal_ujian contains the list of questions and $test contains the test details
                    foreach ($soal_ujian as $data) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?php echo ($data['tipe_soal'] == 'cfit') ? base_url('assets/images/cfit.png') : ''; ?>" class="card-img-top" alt="Thumbnail">
                                <div class="card-body">
                                    <p class="card-text"><?= $data['nama_jenis_soal'] ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <?php
                                        // Convert database datetime strings to DateTime objects
                                        $mulaiTest = new DateTime($test['mulai_test'], new DateTimeZone('Asia/Jakarta')); // Sesuaikan zona waktu sesuai dengan kebutuhan
                                        $selesaiTest = new DateTime($test['selesai_test'], new DateTimeZone('Asia/Jakarta'));
                                        $currentTime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));


                                        if ($mulaiTest > $currentTime) {
                                            // If the test start time is in the future, show a disabled button
                                            echo '<button class="btn btn-sm btn-outline-secondary" disabled>Test Belum Dimulai</button>';
                                        } elseif ($test['status_test'] == 'Selesai') {
                                            // If the test is finished, show a disabled button
                                            echo '<button class="btn btn-sm btn-outline-secondary" disabled>Test Sudah Selesai</button>';
                                        } elseif ($selesaiTest < $currentTime) {
                                            // If the test end time is in the past, show a disabled button
                                            echo '<button class="btn btn-sm btn-outline-secondary" disabled>Test Sudah Selesai</button>';
                                        } else {
                                            // If the test is within the valid start and end times, show the start button
                                            echo '<div class="btn-group">
                                <button type="button"
                                    onclick="location.href=\'' . base_url('user/' . $data['tipe_soal'] . '/' . hash('sha256', $data['id_test'])) . '\'"
                                    class="btn btn-sm btn-outline-secondary">MULAI</button>
                              </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/js/verification.js"></script>
<script>
    async function sendPermissionStatusToServer(isGranted) {
        try {
            const response = await fetch('<?= base_url('user/verification') ?>', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    permissionGranted: isGranted
                })
            });

            const data = await response.json();

            if (!data.success) {
                // Gunakan SweetAlert untuk menampilkan pesan peringatan
                Swal.fire({
                    icon: 'warning',
                    title: 'Akses Ditolak',
                    text: 'Tidak dapat melanjutkan tanpa izin mic dan kamera.',
                    confirmButtonText: 'Izinkan'
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const stream = await navigator.mediaDevices.getUserMedia({
                                video: true,
                                audio: true
                            });
                            stream.getTracks().forEach(track => track.stop()); // Hentikan stream jika berhasil
                        } catch (error) {
                            console.error("Pengguna menolak akses kamera/mikrofon:", error);
                        }
                        // Arahkan kembali ke dashboard
                        window.location.href = '<?= base_url('user/dashboard') ?>';
                    }
                });
            }
        } catch (error) {
            console.error("Error saat mengirim status izin:", error);
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Terjadi kesalahan saat mengirim status izin. Silakan coba lagi.',
                confirmButtonText: 'Kembali'
            }).then(() => {
                window.location.href = '<?= base_url('user/dashboard') ?>';
            });
        }
    }
</script>




<?= $this->endSection() ?>
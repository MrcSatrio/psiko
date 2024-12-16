<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFIT BAGIAN <?= $currentBagian ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/tes.css" rel="stylesheet">
</head>

<body>

    <div id="floatingCamera">
        <video id="faceVideo" autoplay></video>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Left Panel (Question and Options) -->
            <div class="col-lg-8 left-panel">
                <div id="soal-container">
                    <form id="testForm" method="post" action="<?= base_url() ?>user/cfit/submit-test">
                        <?php $index = 1; ?>
                        <?php foreach ($soalUjian as $soalData) : ?>
                            <div class="soal-item <?php if ($index == 1) echo 'active'; ?>" data-question="<?= $index; ?>">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5>Question No. <?= $index; ?></h5>
                                </div>


                                <div class="mb-3">
                                    <?php if (strpos($soalData['isi_soal'], 'bag' . $currentBagian . '_contoh soal') === false): ?>
                                        <img src="<?= base_url() ?>uploads/<?= $soalData['isi_soal']; ?>" alt="Question <?= $index; ?>">
                                    <?php endif; ?>
                                </div>

                                <?php if ($currentBagian == 2) : ?>
                                    <div class="mb-4">
                                        <?php
                                        $alphabet = range('A', 'Z');
                                        if (isset($soalData['answers']) && !empty($soalData['answers'])) : ?>
                                            <div class="row">
                                                <?php
                                                $groupIndex = 0; // Untuk membedakan grup radio
                                                foreach ($soalData['answers'] as $key => $answer) : ?>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <!-- Menambahkan kondisi grup radio agar bisa lebih dari satu jawaban -->
                                                            <input class="form-check-input" type="radio" name="jawaban_<?= $soalData['id_soal']; ?>_group<?= $groupIndex; ?>"
                                                                id="jawaban_<?= $soalData['id_soal'] . '_' . $key; ?>"
                                                                value="<?= htmlspecialchars($answer['id_jawaban_soal']); ?>">

                                                            <label class="form-check-label" for="jawaban_<?= $soalData['id_soal'] . '_' . $key; ?>">
                                                                <?= $alphabet[$key]; ?>. <img src="<?= base_url() ?>uploads/<?= $answer['jawaban_soal']; ?>" alt="Answer Image">
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php
                                                    $groupIndex++;
                                                endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php else : ?>
                                    <div class="mb-4">
                                        <?php
                                        $alphabet = range('A', 'Z');
                                        if (isset($soalData['answers']) && !empty($soalData['answers'])) : ?>
                                            <div class="row">
                                                <?php foreach ($soalData['answers'] as $key => $answer) : ?>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_<?= $soalData['id_soal']; ?>" id="jawaban_<?= $soalData['id_soal'] . '_' . $key; ?>" value="<?= htmlspecialchars($answer['id_jawaban_soal']); ?>">

                                                            <label class="form-check-label" for="jawaban_<?= $soalData['id_soal'] . '_' . $key; ?>">
                                                                <?= $alphabet[$key]; ?>. <img src="<?= base_url() ?>uploads/<?= $answer['jawaban_soal']; ?>" alt="Answer Image">
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <input type="hidden" name="id_test" value="<?= hash('sha256', $test['id_test']); ?>">
                                <?php if ($index == count($soalUjian)) : ?>
                                    <?php if ($currentBagian < $totalBagian): ?>
                                        <div class="mt-4 text-end">
                                            <a href="#" class="btn btn-primary" id="nextSection">
                                                Lanjut ke Bagian <?= $currentBagian + 1; ?>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="mt-4">

                                            <button type="submit" id="submitAnswers" class="btn btn-success">Submit Answers</button>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>

            <!-- Right Panel (Question Numbers) -->
            <div class="col-lg-4 right-panel">
                <!-- <div class="timer-container">
                    <i class="bi bi-clock"></i> Time Left: <span id="timer">00:00:00</span>
                </div> -->
                <div class="question-list">
                    <div class="row g-2">
                        <?php $index = 1; ?>
                        <?php foreach ($soalUjian as $soalData) : ?>
                            <div class="col-4">
                                <button class="btn btn-outline-secondary w-100 question-btn" data-question="<?= $index; ?>" data-id-soal="<?= $soalData['id_soal']; ?>">
                                    <?= $index; ?>
                                </button>
                            </div>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo base_url(); ?>assets/js/record.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/soal.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/timer.js"></script> -->
    <script>
        const uploadUrl = "<?php echo base_url('user/videotest'); ?>";
        const testId = "<?php echo $test['id_test']; ?>";

        // Mendapatkan currentBagian dari PHP dan menentukan durasi
        const currentBagian = <?= $currentBagian ?>; // Misalnya bagian 2 aktif

        // Tentukan durasi berdasarkan currentBagian
        let durationInSeconds = 0;
        if (currentBagian === 1) {
            durationInSeconds = 3 * 60; // 3 menit
        } else if (currentBagian === 2) {
            durationInSeconds = 4 * 60; // 4 menit
        } else if (currentBagian === 3) {
            durationInSeconds = 3 * 60; // 3 menit
        } else if (currentBagian === 4) {
            durationInSeconds = 2.5 * 60; // 2.5 menit
        } else {
            console.error("Bagian tidak dikenali");
        }

        // Simpan durasi dalam localStorage per bagian jika belum ada
        function setEndTime() {
            const storedEndTime = localStorage.getItem("testEndTime_bagian" + currentBagian);

            // Jika tidak ada waktu yang disimpan di localStorage untuk bagian ini, tentukan berdasarkan currentBagian
            if (!storedEndTime) {
                const currentTime = new Date().getTime();
                const endTime = currentTime + durationInSeconds * 1000; // Simpan dalam milidetik
                localStorage.setItem("testEndTime_bagian" + currentBagian, endTime);
                return endTime;
            }

            return parseInt(storedEndTime, 10);
        }

        // Ambil waktu akhir (end time) dan pastikan durasi sesuai
        const endTime = setEndTime();

        // Debugging untuk memeriksa nilai yang disimpan
        console.log("Current Bagian: ", currentBagian);
        console.log("Durasi: ", durationInSeconds, "detik");
        console.log("End Time: ", new Date(endTime));

        // Fungsi untuk menampilkan timer secara real-time
        function updateTimerDisplay() {
            const currentTime = new Date().getTime(); // Waktu sekarang
            const timeRemaining = endTime - currentTime; // Hitung sisa waktu

            if (timeRemaining >= 0) {
                const hours = Math.floor(timeRemaining / (1000 * 60 * 60)); // Jam
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60)); // Menit
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000); // Detik

                // Menampilkan timer dalam format hh:mm:ss
                document.getElementById("timer").textContent = `${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
            } else {
                document.getElementById("timer").textContent = "00:00:00";
                localStorage.removeItem("testEndTime_bagian" + currentBagian);

                if (currentBagian === 4) {
                    document.getElementById('submitAnswers').click(); // Memanggil submit function
                } else {
                    // Menentukan URL berdasarkan currentBagian
                    let url;
                    if (currentBagian === 2) {
                        url = '<?= base_url("user/cfit/save_answer_double") ?>';
                    } else {
                        url = '<?= base_url("user/cfit/save_answer_single") ?>';
                    }

                    // Ambil data form (misalnya data yang perlu disimpan di server)
                    const formData = new FormData(document.getElementById("testForm"));

                    // Optional: Tampilkan SweetAlert2 untuk memberitahu bahwa waktu habis dan auto-submit
                    Swal.fire({
                        icon: "warning",
                        title: "Time is up!",
                        text: "The test will be submitted automatically.",
                        timer: 3000,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        didClose: () => {
                            // Gunakan fetch untuk mengirim data form ke server
                            fetch(url, {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    console.log(data);
                                    if (data.status === 'success') {
                                        // Redirect ke halaman berikutnya setelah sukses
                                        window.location.href = '<?= base_url('user/cfit/' . hash('sha256', $test['id_test']) . '/' . ($currentBagian + 1)) ?>';
                                    } else {
                                        alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
                                    }
                                })
                                .catch(error => {
                                    console.error('There was a problem with the fetch operation:', error);
                                });
                        },
                    });
                }
            }
        }

        // Update the timer every second
        setInterval(updateTimerDisplay, 1000); // Memperbarui timer setiap detik

        // Debug: Menampilkan waktu akhir
        console.log("End Time: ", setEndTime());
        console.log(`Current Bagian: ${currentBagian}`);
        console.log(`Durasi: ${durationInSeconds} detik`);
        console.log(`End Time: ${new Date(endTime)}`);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menampilkan SweetAlert saat halaman pertama kali dimuat
            Swal.fire({
                title: 'CONTOH SOAL',
                html: '<img src="<?= base_url() ?>uploads/bag<?= $currentBagian ?>_contoh soal.png" style="width: 100%; max-width: 400px; margin: 0 auto; display: block;">',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Ya, siap!',
                cancelButtonText: 'Belum siap',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna memilih 'Ya, siap!', lanjutkan ke halaman ujian
                    startTest();
                } else {
                    // Jika pengguna memilih 'Belum siap', arahkan kembali ke halaman dashboard atau halaman lainnya
                    window.location.href = '<?= base_url('user/dashboard'); ?>'; // Ganti dengan URL sesuai kebutuhan
                }
            });

            function startTest() {
                console.log('Ujian dimulai');
            }
        });
    </script>

    <!-- Tambahkan CSS untuk blur effect -->
    <style>
        body.swal2-shown>[aria-hidden='true'] {
            transition: 0.1s filter;
            filter: blur(10px);
        }
    </style>







    <script>
        async function checkMicAndCameraPermissions() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: true
                });
                sendPermissionStatusToServer(true);
                stream.getTracks().forEach(track => track.stop());
            } catch (err) {
                sendPermissionStatusToServer(false);
            }
        }

        function sendPermissionStatusToServer(isGranted) {
            fetch('<?= base_url('user/verification') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        permissionGranted: isGranted
                    })
                }).then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        alert("Tidak dapat melanjutkan tanpa izin mic dan kamera.");
                        window.location.href = '<?= base_url('user/dashboard') ?>';
                    }
                });
        }

        window.onload = checkMicAndCameraPermissions;
    </script>

    <script>
        document.getElementById('submitAnswers').addEventListener('click', function() {
            localStorage.clear();
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nextSectionButton = document.getElementById('nextSection');
            const form = document.getElementById('testForm');

            if (nextSectionButton) {
                nextSectionButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin melanjutkan ke bagian berikutnya? Jawaban akan disimpan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, lanjutkan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const formData = new FormData(form);
                            if (<?= $currentBagian ?> === 2) {
                                url = '<?= base_url("user/cfit/save_answer_double") ?>';
                            } else {
                                url = '<?= base_url("user/cfit/save_answer_single") ?>';
                            }
                            fetch(url, {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    console.log(data);
                                    if (data.status === 'success') {
                                        // Redirect ke halaman berikutnya setelah sukses
                                        window.location.href = '<?= base_url('user/cfit/' . hash('sha256', $test['id_test']) . '/' . ($currentBagian + 1)) ?>';
                                    } else {
                                        alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
                                    }
                                })
                                .catch(error => {
                                    console.error('There was a problem with the fetch operation:', error);
                                    alert('Terjadi kesalahan saat mengirim data. Silakan coba lagi.');
                                });
                        }
                    });
                });
            }
        });
    </script>







</body>

</html>
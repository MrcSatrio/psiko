async function checkMicAndCameraPermissions() {
    try {
        // Meminta izin akses ke kamera dan mikrofon
        const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });

        // Jika izin diberikan, kirimkan status ke server
        sendPermissionStatusToServer(true);

        // Hentikan stream setelah izin diperoleh
        stream.getTracks().forEach(track => track.stop());
    } catch (err) {
        // Jika pengguna menolak izin, kirimkan status ke server
        sendPermissionStatusToServer(false);
    }
}



// Panggil fungsi pengecekan saat halaman dimuat
document.addEventListener("DOMContentLoaded", () => {
    checkMicAndCameraPermissions();
});
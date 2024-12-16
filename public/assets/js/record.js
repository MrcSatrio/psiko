let faceStream;
let mediaRecorderFace;
let recordedChunksFace = [];

// Fungsi untuk memulai webcam dan merekam video
async function startRecording() {
  try {
    // Meminta akses ke webcam
    faceStream = await navigator.mediaDevices.getUserMedia({
      video: { facingMode: "user" },
      audio: true,
    });
    document.getElementById("faceVideo").srcObject = faceStream;

    // Inisialisasi MediaRecorder untuk perekaman segmen-segmen kecil
    mediaRecorderFace = new MediaRecorder(faceStream, {
      mimeType: "video/webm; codecs=vp8,opus",
    });

    // Setiap ada data baru, simpan ke dalam array recordedChunksFace
    mediaRecorderFace.ondataavailable = (event) => {
      if (event.data.size > 0) {
        recordedChunksFace.push(event.data);
      }
    };

    // Ketika perekaman segmen selesai, kirim video ke server
    mediaRecorderFace.onstop = async () => {
      const blob = new Blob(recordedChunksFace, { type: "video/webm" });
      const formData = new FormData();
      formData.append("video", blob, `faceRecording_${Date.now()}.webm`);
      formData.append("testId", testId);

      try {
        const response = await fetch(uploadUrl, { method: "POST", body: formData });
        if (response.ok) {
          console.log("Chunk uploaded successfully!");
        } else {
          console.error("Failed to upload chunk.");
        }
      } catch (err) {
        console.error("Error uploading chunk:", err);
      }

      // Reset recordedChunksFace untuk chunk berikutnya
      recordedChunksFace = [];

      // Restart recording untuk segmen berikutnya
      mediaRecorderFace.start();
      setTimeout(stopRecording, 10000); // Stop recording after 10 seconds
    };

    // Mulai perekaman segmen pertama
    mediaRecorderFace.start();
    setTimeout(stopRecording, 10000); // Stop recording after 10 seconds for each chunk
    console.log("Recording started in chunks.");
  } catch (err) {
    console.error("Error accessing webcam: ", err);
    alert("Please allow access to your webcam.");
  }
}

// Fungsi untuk menghentikan perekaman
function stopRecording() {
  if (mediaRecorderFace && mediaRecorderFace.state === "recording") {
    mediaRecorderFace.stop();
  }
}

// Mulai perekaman otomatis saat halaman dimuat
window.addEventListener("load", startRecording);

// Fungsi untuk menghentikan perekaman saat form disubmit
document.getElementById("testForm").addEventListener("submit", (event) => {
  if (mediaRecorderFace.state === "recording") {
    mediaRecorderFace.stop();
  }
});


// Draggable logic for the floating webcam container
function dragElement(elmnt) {
  let pos1 = 0,
    pos2 = 0,
    pos3 = 0,
    pos4 = 0;
  elmnt.onmousedown = dragMouseDown;

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    e.stopPropagation();
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    elmnt.style.top = elmnt.offsetTop - pos2 + "px";
    elmnt.style.left = elmnt.offsetLeft - pos1 + "px";
  }

  function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

dragElement(document.getElementById("floatingCamera"));
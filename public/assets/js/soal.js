// Fungsi untuk mengatur tombol soal aktif
function updateQuestionButtonState(questionId) {
    document.querySelectorAll(".question-btn").forEach((btn) => {
        btn.classList.remove("active");
    });
    const questionBtn = document.querySelector(`button[data-question="${questionId}"]`);
    if (questionBtn) {
        questionBtn.classList.add("active");
    }
}

// Fungsi untuk menampilkan soal berdasarkan nomor
function showQuestion(questionNumber) {
    document.querySelectorAll(".soal-item").forEach((item) => {
        item.classList.remove("active");
    });
    const selectedQuestion = document.querySelector(`.soal-item[data-question="${questionNumber}"]`);
    if (selectedQuestion) {
        selectedQuestion.classList.add("active");
    }
}

// Event listener untuk tombol soal
document.querySelectorAll(".question-btn").forEach((button) => {
    button.addEventListener("click", function () {
        const questionNumber = this.getAttribute("data-question");
        showQuestion(questionNumber);
        updateQuestionButtonState(questionNumber);
        localStorage.setItem("activeQuestion", questionNumber);
    });
});

// Event listener untuk setiap jawaban (radio button)
document.querySelectorAll(".form-check-input").forEach((radio) => {
    radio.addEventListener("change", function () {
        const soalId = this.name.split("_")[1];
        const questionBtn = document.querySelector(`button[data-id-soal="${soalId}"]`);
        if (questionBtn) {
            questionBtn.classList.add("answered");
        }
        localStorage.setItem(this.name, this.value);
    });
});

// Fungsi untuk memuat data tersimpan
window.addEventListener("load", function () {
    const activeQuestion = localStorage.getItem("activeQuestion");
    if (activeQuestion) {
        showQuestion(activeQuestion);
        updateQuestionButtonState(activeQuestion);
    }
    document.querySelectorAll(".form-check-input").forEach((radio) => {
        const soalId = radio.name.split("_")[1];
        const savedAnswer = localStorage.getItem(radio.name);
        if (savedAnswer && radio.value === savedAnswer) {
            radio.checked = true;
            const questionBtn = document.querySelector(`button[data-id-soal="${soalId}"]`);
            if (questionBtn) {
                questionBtn.classList.add("answered");
            }
        }
    });
});

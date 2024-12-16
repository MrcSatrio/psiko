<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TestModel;
use App\Models\SoalUjianModel;
use App\Models\JawabanSoalModel;

class Cfit extends BaseController
{
    protected $userModel;
    protected $testModel;
    protected $soalujianModel;
    protected $jawabanSoalModel;
    protected $session;
    protected $db;

    public function __construct()
    {
        // Load UserModel in constructor
        $this->userModel = new UserModel();
        $this->testModel = new TestModel();
        $this->soalujianModel = new SoalUjianModel();
        $this->jawabanSoalModel = new JawabanSoalModel();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function setMicAndCameraStatus()
    {
        // Mendekode data JSON dari permintaan AJAX
        $data = json_decode($this->request->getBody(), true);

        // Periksa apakah izin diberikan
        if (isset($data['permissionGranted']) && $data['permissionGranted'] === true) {
            // Simpan status izin di session
            $this->session->set('micAndCameraGranted', true);
            return $this->response->setJSON(['success' => true]);
        } else {
            $this->session->set('micAndCameraGranted', false);
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function test($hashed_id,  $current_bagian = 1)
    {
        // Cek apakah izin mic dan kamera sudah diberikan
        if (!$this->isMicAndCameraActive()) {
            return redirect()->to(base_url('user/dashboard'))->with('error', 'Harap mengizinkan akses kamera dan mikrofon');
        }

        // Mendapatkan semua data tes untuk pengguna saat ini
        $tests = $this->testModel
            ->where('id_user', $this->session->get('id_user'))
            ->findAll();

        // Mencari tes yang sesuai dengan hashed_id
        $test = null;
        foreach ($tests as $row) {
            if (hash('sha256', $row['id_test']) === $hashed_id) {
                $test = $row;
                break;
            }
        }

        // Jika tes ditemukan
        if ($test) {
            // Mengambil semua soal untuk tes
            $soalUjian = $this->soalujianModel
                ->select('soal.id_soal, soal.isi_soal, soal_ujian.id_soal_ujian, soal_ujian.jawaban_soal_ujian')
                ->join('soal', 'soal_ujian.id_soal = soal.id_soal')
                ->where('soal_ujian.id_test', $test['id_test'])
                ->like('soal.isi_soal', "bag{$current_bagian}_", 'after') // Mencari soal yang dimulai dengan "bag{current_bagian}_"
                ->whereNotIn('soal.isi_soal', [
                    'bag1_contoh soal.png',
                    'bag2_contoh soal.png',
                    'bag3_contoh soal.png',
                    'bag4_contoh soal.png'
                ]) // Mengecualikan soal tertentu yang mengandung nama file contoh soal
                ->findAll();


            // Mengecek apakah tes sudah dilakukan
            foreach ($soalUjian as $soalData) {
                if ($soalData['jawaban_soal_ujian'] !== null) {
                    return redirect()->to('user/dashboard')->with('error', 'Tes sudah dilaksanakan');
                }
            }

            // Mengambil semua jawaban untuk setiap soal
            foreach ($soalUjian as &$soalData) {
                $soalData['answers'] = $this->jawabanSoalModel
                    ->where('id_soal', $soalData['id_soal'])
                    ->findAll();
            }

            // Mengirim data tes dan soal ke view
            return view('user/cfit/test', [
                'test' => $test,
                'soalUjian' => $soalUjian,
                'totalBagian' => 4, // Ubah sesuai jumlah total bagian
                'currentBagian' => $current_bagian,
            ]);
        }

        // Jika tes tidak ditemukan, arahkan kembali dengan pesan error
        return redirect()->to('user/dashboard')->with('error', 'Tes tidak ditemukan');
    }

    // Ambil data POST dari permintaan
    public function save_answer_single()
    {
        // Ambil semua data dari POST request (termasuk file dan data lainnya)
        $postData = $this->request->getPost();
        $hashedIdTest = $postData['id_test'];

        // Inisialisasi variabel untuk menyimpan ID Test
        $idTest = null;

        // Ambil semua catatan test
        $testRecords = $this->testModel->findAll();

        // Mencari ID Test yang sesuai
        foreach ($testRecords as $record) {
            if (hash('sha256', $record['id_test']) === $hashedIdTest) {
                $idTest = $record['id_test'];
                break;
            }
        }

        // Jika ID Test tidak ditemukan, kembalikan respons error
        if ($idTest === null) {
            return redirect()->back()->with('error', 'ID Test tidak valid.');
        }

        // Loop untuk menyimpan jawaban setiap soal ujian
        foreach ($postData as $key => $value) {
            if (strpos($key, 'jawaban_') === 0) {
                // Mengambil nomor soal dari key jawaban
                $number = str_replace('jawaban_', '', $key);

                // Menginisialisasi model SoalUjian
                $soalUjianModel = new SoalUjianModel();

                // Menyimpan jawaban ke dalam database
                $soalUjianModel->where('id_test', $idTest)
                    ->where('id_soal', $number)
                    ->set('jawaban_soal_ujian', $value)
                    ->update();
            }
        }

        // Mengirimkan respon sukses
        return $this->response->setJSON([
            'status' => 'success'
        ]);
    }











    private function isMicAndCameraActive()
    {
        // Periksa status izin dari session
        return $this->session->get('micAndCameraGranted') === true;
    }

    public function submit_test()
    {
        // Ambil data POST dari permintaan
        $postData = $this->request->getPost();
        $hashedIdTest = $postData['id_test'];

        // Inisialisasi variabel untuk menyimpan ID Test
        $idTest = null;

        // Ambil semua catatan test
        $testRecords = $this->testModel->findAll();

        // Mencari ID Test yang sesuai
        foreach ($testRecords as $record) {
            if (hash('sha256', $record['id_test']) === $hashedIdTest) {
                $idTest = $record['id_test'];
                break;
            }
        }

        // Jika ID Test tidak ditemukan, kembalikan respons error
        if ($idTest === null) {
            return redirect()->back()->with('error', 'ID Test tidak valid.');
        }

        // Inisialisasi array untuk menyimpan hasil
        // $output = [];

        // Menggunakan foreach untuk menampilkan hanya jawaban
        foreach ($postData as $key => $value) {
            if (strpos($key, 'jawaban_') === 0) { // Memeriksa apakah kunci dimulai dengan 'jawaban_'
                // Mengambil angka dari kunci dan memisahkan id_soal dan jawaban
                $number = str_replace('jawaban_', '', $key); // Menghapus 'jawaban_' untuk mendapatkan angka

                // Menyimpan hasil format 'id_soal=x jawaban_soal_ujian=y' ke dalam output
                // $output[] = "id_soal=$number jawaban_soal_ujian=$value";

                // Instantiate the SoalUjianModel
                $soalUjianModel = new SoalUjianModel();

                // Menyimpan ke dalam database
                $soalUjianModel->where('id_test', $idTest)
                    ->where('id_soal', $number)
                    ->set('jawaban_soal_ujian', $value)
                    ->update();
            }
        }

        // Perbarui status_test pada tabel test
        $this->testModel->where('id_test', $idTest)
            ->set(['status_test' => 'Selesai']) // Perbaiki dengan menambahkan metode set
            ->update();
        return redirect()->to('user/dashboard')->with('success', 'Jawaban berhasil disimpan.');
    }

    public function save_answer_double()
    {

        // Ambil semua data dari POST request (termasuk file dan data lainnya)
        $data = $this->request->getPost(); // getPost() digunakan untuk mengambil data POST

        // Mengecek apakah data POST kosong
        if (empty($data)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak diterima. Silakan coba lagi.',
                'received_data' => null
            ]);
        }

        // Mendapatkan hashed ID test dari data
        $hashedIdTest = $data['id_test'];
        $idTest = null;

        // Mencari ID Test yang sesuai di database
        $testRecords = $this->testModel->findAll();
        foreach ($testRecords as $record) {
            if (hash('sha256', $record['id_test']) === $hashedIdTest) {
                $idTest = $record['id_test'];
                break;
            }
        }

        // Jika ID Test tidak valid, redirect dengan pesan error
        if ($idTest === null) {
            return redirect()->back()->with('error', 'ID Test tidak valid.');
        }

        // Inisialisasi array untuk menampung jawaban
        $jawaban = [];

        // Mengelompokkan jawaban berdasarkan nomor soal dan grup
        foreach ($data as $key => $value) {
            // Cek jika key dimulai dengan 'jawaban_'
            if (strpos($key, 'jawaban_') === 0) {
                // Mendapatkan nomor soal dan grup dari key
                // Format key: 'jawaban_33_group0', 'jawaban_33_group2', dll
                $keyParts = explode('_', str_replace('jawaban_', '', $key));  // Memecah '33_group0' menjadi ['33', 'group0']
                $number = $keyParts[0]; // Nomor soal
                $group = isset($keyParts[1]) ? $keyParts[1] : null; // Grup jawaban (misal group0, group2, dll)

                // Memeriksa apakah array untuk nomor soal sudah ada
                if (!isset($jawaban[$number])) {
                    $jawaban[$number] = [];
                }

                // Jika grup ada, masukkan ke dalam array berdasarkan grup
                if ($group !== null) {
                    $jawaban[$number][$group][] = $value;  // Mengelompokkan berdasarkan group
                } else {
                    $jawaban[$number][] = $value;  // Jika tidak ada grup, masukkan langsung ke soal
                }
            }
        }

        // Menyusun jawaban untuk output JSON
        $jawabanOutput = [];
        foreach ($jawaban as $number => $groups) {
            // Menyusun jawaban untuk setiap soal
            $jawabanString = [];  // Array untuk menampung jawaban gabungan soal yang sama

            // Menggabungkan jawaban dari berbagai grup (group0, group1, etc.) menjadi satu string dengan koma
            foreach ($groups as $group => $values) {
                $jawabanString[] = implode(',', $values);  // Gabungkan jawaban dalam grup dengan koma
            }

            // Menyimpan jawaban gabungan untuk soal tersebut
            $jawabanOutput[$number] = implode(',', $jawabanString); // Gabungkan semua grup jawaban untuk soal tersebut

            // Perbarui jawaban di database
            $soalUjianModel = new SoalUjianModel();

            // Melakukan query untuk memperbarui jawaban soal ujian
            $soalUjianModel->where('id_test', $idTest)
                ->where('id_soal', $number)
                ->set('jawaban_soal_ujian', $jawabanOutput[$number]) // Menyimpan jawaban gabungan
                ->update();
        }

        // Tampilkan jawaban dalam format JSON untuk pengecekan sebelum disimpan
        return $this->response->setJSON([
            'status' => 'success',
            'jawaban' => $jawabanOutput
        ]);
    }
}

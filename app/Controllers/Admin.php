<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\PerusahaanModel;
use App\Models\SoalModel;
use App\Models\JenisSoalModel;
use App\Models\JawabanSoalModel;
use App\Models\TestModel;
use App\Models\SoalUjianModel;
use CodeIgniter\Database\ConnectionInterface;
use DateTime;

class Admin extends BaseController
{
    protected $userModel;
    protected $session;
    protected $roleModel;
    protected $perusahaanModel;
    protected $soalModel;
    protected $jenissoalModel;
    protected $jawabansoalModel;
    protected $testModel;
    protected $soalujianModel;
    protected $db;

    // Constructor untuk memuat instance database

    public function __construct()
    {
        // Load UserModel di constructor
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->perusahaanModel = new PerusahaanModel();
        $this->soalModel = new SoalModel();
        $this->jenissoalModel = new JenisSoalModel();
        $this->jawabansoalModel = new JawabanSoalModel();
        $this->testModel = new TestModel();
        $this->soalujianModel = new SoalUjianModel();
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect(); // Mendapatkan koneksi database
    }
    public function dashboard(): string
    {
        return view('admin/dashboard');
    }

    public function data_user()
    {

        $user = $this->userModel
            ->join('role', 'user.id_role = role.id_role')
            ->where('user.id_role', 2)
            ->findAll();


        return view('admin/data_user', ['user' => $user]);
    }

    public function action_edit_user()
    {
        $id = $this->request->getPost('id_user');
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'nama_user' => 'required|min_length[3]|max_length[255]',
            'email_user' => "required|valid_email|is_unique[user.email_user,id_user,$id]",
            'hp_user' => 'required|min_length[10]|max_length[15]',
            'lahir_user' => 'required|valid_date'
        ])) {
            // Jika validasi gagal, kembali ke form
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        $this->userModel->update($id, [
            'nama_user' => $this->request->getPost('nama_user'),
            'email_user' => $this->request->getPost('email_user'),
            'hp_user' => $this->request->getPost('hp_user'),
            'lahir_user' => $this->request->getPost('lahir_user')
        ]);

        return redirect()->to(base_url('admin/data_user'))->with('success', 'User updated');
    }

    public function create_user()
    {

        $perusahaan = $this->perusahaanModel
            ->findAll();

        return view('admin/create_user', ['perusahaan' => $perusahaan]);
    }

    public function action_create_user()
    {
        // Ambil input dari request
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $hp = $this->request->getPost('hp');
        $tanggallahir = $this->request->getPost('tanggal');
        $pendidikan = $this->request->getPost('pendidikan');


        // Validasi sederhana: cek apakah semua field terisi
        if (empty($nama) || empty($email) || empty($hp) || empty($tanggallahir) || empty($pendidikan)) {
            return redirect()->to(base_url() . '/admin/create_user')->with('error', 'Pastikan semua data terisi');
        }

        // Cek apakah user dengan email atau nomor HP sudah ada di database
        $existingUser = $this->userModel->where('email_user', $email)
            ->orWhere('hp_user', $hp)
            ->first();

        if ($existingUser) {
            // Jika sudah ada, kembalikan pesan error
            return redirect()->to(base_url() . '/admin/create_user')->with('error', 'Pengguna dengan email atau nomor HP tersebut sudah terdaftar');
        }

        // Jika tidak ada pengguna yang sama, buat data pengguna baru
        $data = [
            'id_role' => 2, // Default role
            'lahir_user' => $tanggallahir,
            'nama_user' => $nama,
            'email_user' => $email,
            'hp_user' => $hp,
            'password_user' => md5('astaginapraptama'),
            'pendidikan_user' => $pendidikan // Pastikan password lebih aman
        ];

        // Insert ke database
        if ($this->userModel->insert($data)) {
            return redirect()->to(base_url() . '/admin/create_user')->with('success', 'User berhasil dibuat');
        } else {
            return redirect()->to(base_url() . '/admin/create_user')->with('error', 'Gagal membuat user');
        }
    }

    public function data_perusahaan()
    {

        $perusahaan = $this->perusahaanModel
            ->findAll();

        return view('admin/data_perusahaan', ['perusahaan' => $perusahaan]);
    }

    public function create_perusahaan()
    {
        return view('admin/create_perusahaan');
    }

    public function action_create_perusahaan()
    {
        // Ambil input dari request
        $perusahaan = $this->request->getPost('nama_perusahaan');

        // Validasi sederhana: cek apakah semua field terisi
        if (empty($perusahaan)) {
            return redirect()->to(base_url() . '/admin/create_perusahaan')->with('error', 'Pastikan semua data terisi');
        }

        if ($this->perusahaanModel->where('nama_perusahaan', $perusahaan)->first()) {
            // Jika sudah ada, kembalikan pesan error
            return redirect()->to(base_url() . '/admin/create_perusahaan')->with('error', 'Perusahaan sudah terdaftar');
        }

        // Jika tidak ada pengguna yang sama, buat data pengguna baru
        $data = [
            'nama_perusahaan' => $perusahaan,
        ];

        // Insert ke database

        if ($this->perusahaanModel->insert($data)) {
            return redirect()->to(base_url() . '/admin/create_perusahaan')->with('success', 'Perusahaan berhasil dibuat');
        } else {
            return redirect()->to(base_url() . '/admin/create_perusahaan')->with('error', 'Gagal membuat perusahaans');
        }
    }

    public function data_soal()
    {

        $soal = $this->soalModel
            ->join('jenis_soal', 'soal.id_jenis_soal = jenis_soal.id_jenis_soal')
            ->findAll();

        return view('admin/data_soal', ['soal' => $soal]);
    }



    public function action_create_soal()
    {
        // Ambil input dari request
        $soal = $this->request->getFile('soal');
        $jawaban = $this->request->getPost('jawaban');
        $id_jenis_soal = $this->request->getPost('jenis_soal');
        $kunci_jawaban = $this->request->getPost('kunci_jawaban');
        $contohsoal = $this->request->getPost('contohsoal'); // Mengecek apakah soal ini contoh soal

        // Cek jika soal adalah contoh soal (contohsoal dicentang)
        if (!empty($contohsoal)) {
            // Cek apakah soal dan id_jenis_soal diisi
            if (empty($soal) || empty($id_jenis_soal)) {
                return redirect()->to(base_url() . '/admin/create_soal')
                    ->with('error', 'Pastikan soal dan jenis soal terisi');
            }

            // Periksa apakah file soal valid
            if ($soal->isValid() && !$soal->hasMoved()) {
                // Generate nama file random
                $newName = $soal->getRandomName();

                // Tentukan path folder untuk upload
                $uploadPath = WRITEPATH . '../public/uploads';  // Pastikan path ini benar

                // Pindahkan file ke folder uploads
                if (!$soal->move($uploadPath, $newName)) {
                    return redirect()->back()->with('error', 'Gagal memindahkan file.');
                }

                // Siapkan data untuk insert soal ke database
                $soalData = [
                    'isi_soal' => $newName,
                    'id_jenis_soal' => $id_jenis_soal
                ];

                // Insert data soal ke database
                if ($this->soalModel->insert($soalData)) {
                    return redirect()->to(base_url() . '/admin/data_soal')
                        ->with('success', 'Soal contoh berhasil dibuat');
                } else {
                    return redirect()->to(base_url() . '/admin/create_soal')
                        ->with('error', 'Gagal membuat soal contoh');
                }
            } else {
                // Jika file tidak valid atau tidak ada
                return redirect()->to(base_url() . '/admin/create_soal')
                    ->with('error', 'File jawaban tidak valid.');
            }
        } else {
            // Jika bukan contoh soal, maka jawaban dan kunci jawaban wajib diisi
            if (empty($soal) || empty($jawaban) || empty($id_jenis_soal) || empty($kunci_jawaban)) {
                return redirect()->to(base_url() . '/admin/create_soal')
                    ->with('error', 'Pastikan soal, jawaban, dan kunci jawaban terisi');
            }

            if ($soal->isValid() && !$soal->hasMoved()) {
                // Generate nama file random
                $newName = $soal->getRandomName();

                // Tentukan path folder untuk upload
                $uploadPath = WRITEPATH . '../public/uploads';  // Pastikan path ini benar

                // Pindahkan file ke folder uploads
                if (!$soal->move($uploadPath, $newName)) {
                    return redirect()->back()->with('error', 'Gagal memindahkan file.');
                }
            }

            // Siapkan data untuk insert soal
            $soalData = [
                'isi_soal' => $newName,
                'id_jenis_soal' => $id_jenis_soal
            ];

            // Insert ke database
            if ($this->soalModel->insert($soalData)) {
                $id_soal = $this->soalModel->getInsertID();

                // Insert jawaban-jawaban soal
                foreach ($jawaban as $value) {
                    $jawabanData = [
                        'id_soal' => $id_soal,
                        'jawaban_soal' => $value
                    ];
                    $this->jawabansoalModel->insert($jawabanData);
                }

                // Cek dan set kunci jawaban
                $kuncijawaban = $this->jawabansoalModel->where([
                    'id_soal' => $id_soal,
                    'jawaban_soal' => $kunci_jawaban
                ])->first();

                if ($kuncijawaban) {
                    $id_jawaban_soal = $kuncijawaban['id_jawaban_soal'];

                    // Update soal dengan id_jawaban_soal sebagai kunci jawaban
                    $this->soalModel->update($id_soal, ['id_jawaban_soal' => $id_jawaban_soal]);
                }

                $session = session();
                $session->remove('listjawaban'); // Hapus data jawaban sementara jika ada

                return redirect()->to(base_url() . '/admin/data_soal')
                    ->with('success', 'Soal berhasil dibuat');
            } else {
                return redirect()->to(base_url() . '/admin/create_soal')
                    ->with('error', 'Gagal membuat soal');
            }
        }
    }


    public function create_soal()
    {
        $session = session();

        // Ambil data anggota dari session
        $jenis_soal = $this->jenissoalModel->findAll();

        // Ambil jawaban dari session
        $listJawaban = $session->get('listjawaban');

        // Kirimkan data ke view dalam satu array asosiatif
        return view('admin/create_soal', [
            'jenis_soal' => $jenis_soal,
            'jawaban' => $listJawaban
        ]);
    }

    public function action_create_jawaban()
    {
        // Start the session
        $session = session();

        // Get the uploaded file
        $jawaban = $this->request->getFile('jawaban');

        // Check if the file is valid (not empty, not an error)
        if (!$jawaban->isValid() || $jawaban->hasMoved()) {
            // Handle the error (you could redirect or show a message)
            return redirect()->back()->with('error', 'File upload failed or invalid file.');
        }

        // Generate a random ID for the new answer
        $randomId = rand();

        // Generate a unique name for the file
        $newName = $jawaban->getRandomName();

        // Move the file to the uploads directory
        $uploadPath = WRITEPATH . '../public/uploads';
        if (!$jawaban->move($uploadPath, $newName)) {
            return redirect()->back()->with('error', 'File move failed.');
        }

        // Retrieve existing answers from the session or initialize an empty array
        $existingJawaban = $session->get('listjawaban') ?? [];

        // Add the new answer to the list
        $existingJawaban[] = [
            'id_jawaban' => $randomId,
            'jawaban' => $newName,
        ];

        // Save the updated list of answers back to the session
        $session->set('listjawaban', $existingJawaban);

        // Redirect to the "create_soal" page
        return redirect()->to(base_url() . '/admin/create_soal');
    }



    public function delete_jawaban($id_jawaban)
    {
        $session = session();

        // Ambil data jawaban dari session
        $listJawaban = $session->get('listjawaban');

        // Periksa apakah data jawaban ada di session
        if (!empty($listJawaban)) {
            // Cari indeks dari jawaban yang memiliki ID yang sesuai dengan $id_jawaban
            $key = array_search($id_jawaban, array_column($listJawaban, 'id_jawaban'));

            // Periksa apakah jawaban dengan ID tersebut ditemukan
            if ($key !== false) {
                // Hapus jawaban berdasarkan key (indeks) yang ditemukan
                unset($listJawaban[$key]);

                // Simpan kembali list jawaban ke session setelah penghapusan
                $session->set('listjawaban', array_values($listJawaban));  // Gunakan array_values() agar indeks array tetap berurutan

                // Berikan pesan sukses dan redirect
                return redirect()->to(base_url('/admin/create_soal'))->with('success', 'Jawaban berhasil dihapus dari session.');
            } else {
                // Jika jawaban dengan ID tidak ditemukan
                return redirect()->to(base_url('/admin/create_soal'))->with('error', 'Jawaban dengan ID tersebut tidak ditemukan.');
            }
        } else {
            // Jika tidak ada data jawaban di session
            return redirect()->to(base_url('/admin/create_soal'))->with('error', 'Tidak ada jawaban di session.');
        }
    }


    public function detail_soal($id_soal)
    {
        $soal = $this->soalModel
            ->join('jenis_soal', 'soal.id_jenis_soal =jenis_soal.id_jenis_soal')
            ->where('id_soal', $id_soal)
            ->first();
        $jawabansoal = $this->jawabansoalModel
            ->where('id_soal', $id_soal)
            ->findAll();
        $kuncijawaban = $this->jawabansoalModel
            ->where('id_soal', $id_soal)
            ->where('id_jawaban_soal', $soal['id_jawaban_soal'])
            ->first();
        return view('admin/detail_soal', ['soal' => $soal, 'jawabansoal' => $jawabansoal, 'kunci_jawaban' => $kuncijawaban]);
    }

    public function upload()
    {

        $file = $this->request->getFile('file');

        if (!$file->isValid()) {
            return $this->response->setJSON(['error' => 'Tidak ada file yang diupload.']);
        }

        // Memeriksa tipe MIME apakah file tersebut gambar
        $mimeType = $file->getMimeType();
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (!in_array($mimeType, $allowedTypes)) {
            return $this->response->setJSON(['error' => 'File bukan gambar.']);
        }

        // Menentukan nama file dan menyimpan ke folder public/uploads
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . '../public/uploads', $newName);

        // Mengembalikan lokasi gambar
        return $this->response->setJSON(['location' => base_url('uploads/' . $newName)]);
    }

    public function create_test()
    {
        $session = session();
        $soal = $this->jenissoalModel->findAll();
        $listpeserta = $session->get('listpeserta');

        return view('admin/create_test', ['soal' => $soal, 'peserta' => $listpeserta]);
    }

    public function action_create_test()
    {
        $emails = $this->request->getPost('peserta');
        $waktu_mulai = $this->request->getPost('waktu_mulai');
        $waktu_selesai = $this->request->getPost('waktu_selesai');
        $durasi_test = $this->request->getPost('durasi_test');
        $jenis_soal = $this->request->getPost('jenis_soal');
        $soal = $this->soalModel->where('id_jenis_soal', $jenis_soal)->findAll();

        foreach ($emails as $email) {
            $user = $this->userModel->where('email_user', $email)->first();

            if ($user) {
                $id_user = $user['id_user'];
                $data = [
                    'id_user' => $id_user,
                    'mulai_test' => $waktu_mulai,
                    'selesai_test' => $waktu_selesai,
                    'lama_test' => $durasi_test,
                    'status_test' => 'Belum Selesai',
                ];

                $this->testModel->insert($data);
                $id_test = $this->testModel->insertID();

                $dataUjian = [];
                foreach ($soal as $soalItem) {
                    $dataUjian[] = [
                        'id_test' => $id_test,
                        'id_soal' => $soalItem['id_soal'],
                    ];
                }

                $this->soalujianModel->insertBatch($dataUjian);

                $message = "Halo {$user['nama_user']},\n\nSilakan ikuti tes yang telah dijadwalkan dengan detail berikut:\n\nWaktu Mulai: {$waktu_mulai}\nWaktu Selesai: {$waktu_selesai}\n\nWebsite: " . base_url() . "\n\nAkses Masuk:\nUsername: {$user['email_user']}\nPassword: astaginapraptama\n\nPastikan untuk menggunakan laptop dan memberikan izin akses ke kamera serta mikrofon agar proses tes berjalan lancar.\n\nSemoga sukses!";

                $dataPost = [
                    "number" => $user['hp_user'], // Nomor telepon peserta
                    "message" => $message,       // Pesan yang akan dikirim
                ];

                // Mengirimkan POST request menggunakan JSON
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'http://192.168.1.103:3000/send-message'); // Endpoint untuk pengiriman pesan
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataPost)); // Mengirim data dalam format JSON
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json', // Header untuk JSON
                    'Accept: application/json',
                ]);

                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $curlError = curl_error($ch);
                curl_close($ch);

                // Log hasil pengiriman
                if ($response === false || $httpCode !== 200) {
                    log_message('error', "Gagal mengirim pesan ke nomor {$user['hp_user']}. Error: {$curlError}, HTTP Code: {$httpCode}, Response: {$response}");
                } else {
                    log_message('info', "Pesan berhasil dikirim ke nomor {$user['hp_user']}. Response: {$response}");
                }
            } else {
                log_message('error', "User dengan email $email tidak ditemukan.");
            }
        }

        return redirect()->to(base_url('/admin/create_test'))->with('success', 'Data berhasil disimpan.');
    }



    public function read_test()
    {
        $test = $this->testModel
            ->join('user', 'test.id_user = user.id_user')
            ->findAll();

        return view('admin/data_test', ['test' => $test]);
    }

    public function detail_test($id_test)
    {
        // Mengambil data soal ujian berdasarkan id_test
        $soalujian = $this->soalujianModel
            ->join('soal', 'soal_ujian.id_soal = soal.id_soal')
            ->join('jenis_soal', 'soal.id_jenis_soal = jenis_soal.id_jenis_soal')
            ->join('test', 'soal_ujian.id_test = test.id_test')
            ->join('user', 'test.id_user = user.id_user')
            ->where('soal_ujian.id_test', $id_test)
            ->findAll();

        if (!$soalujian) {
            return "Data tidak ditemukan.";
        }

        $jawabanbenar = $this->soalModel->findAll();
        // Mengambil data pengguna terkait
        $userData = $this->userModel
            ->where('id_user', $soalujian[0]['id_user'])
            ->first();

        if (!$userData) {
            return "Data user tidak ditemukan.";
        }

        // Menghitung usia berdasarkan tanggal lahir
        $tanggalLahir = new DateTime($userData['lahir_user']);
        $tanggalSekarang = new DateTime();
        $usia = $tanggalSekarang->diff($tanggalLahir);

        // Usia dalam tahun dan bulan
        $usiaTahun = $usia->y;
        $usiaBulan = $usia->m;

        // Konversi usia ke format decimal
        $usiaDecimal = $usiaTahun + ($usiaBulan / 12);

        // Daftar bobot berdasarkan raw score
        $bobot = [
            49 => [null, null, null, null, 183, 183],
            48 => [null, null, 183, 181, 179, 179],
            47 => [null, 183, 179, 178, 176, 176],
            46 => [183, 179, 176, 175, 173, 173],
            45 => [179, 176, 173, 171, 169, 169],
            44 => [176, 173, 169, 168, 167, 167],
            43 => [175, 171, 168, 167, 165, 165],
            42 => [171, 168, 165, 163, 161, 161],
            41 => [167, 163, 160, 159, 157, 157],
            40 => [165, 161, 159, 157, 155, 155],
            39 => [161, 159, 155, 154, 152, 152],
            38 => [159, 155, 152, 150, 149, 149],
            37 => [155, 152, 149, 147, 145, 145],
            36 => [152, 149, 145, 144, 142, 142],
            35 => [150, 147, 144, 142, 140, 140],
            34 => [147, 144, 140, 139, 137, 137],
            33 => [142, 139, 136, 134, 133, 133],
            32 => [140, 137, 133, 133, 131, 131],
            31 => [137, 134, 131, 129, 128, 128],
            30 => [134, 131, 128, 126, 124, 124],
            29 => [131, 128, 124, 123, 121, 121],
            28 => [129, 126, 123, 121, 119, 119],
            27 => [126, 123, 119, 117, 116, 116],
            26 => [123, 119, 116, 114, 113, 113],
            25 => [119, 116, 113, 111, 109, 109],
            24 => [116, 113, 109, 108, 106, 106],
            23 => [113, 109, 106, 104, 103, 103],
            22 => [109, 106, 103, 101, 100, 100],
            21 => [106, 103, 100, 98, 96, 96],
            20 => [104, 101, 98, 96, 94, 94],
            19 => [101, 98, 94, 93, 91, 91],
            18 => [98, 93, 91, 89, 88, 88],
            17 => [94, 91, 88, 86, 85, 85],
            16 => [91, 88, 85, 83, 81, 81],
            15 => [88, 85, 81, 80, 78, 78],
            14 => [85, 81, 78, 76, 75, 75],
            13 => [81, 78, 75, 73, 72, 72],
            12 => [80, 76, 73, 72, 70, 70],
            11 => [76, 73, 70, 68, 67, 67],
            10 => [75, 72, 68, 65, 65, 65],
            9 => [70, 67, 63, 62, 60, 60],
            8 => [67, 63, 60, 58, 57, 57],
            7 => [63, 60, 57, 56, 55, 55],
            6 => [60, 57, 55, 53, 52, 52],
            5 => [57, 55, 53, 51, 48, 48],
            4 => [55, 54, 51, 50, 47, 47],
            3 => [53, 52, 48, 47, 45, 45],
            2 => [52, 51, 47, 46, 43, 43],
            1 => [50, 50, 46, 45, 40, 40],
            0 => [48, 48, 45, 43, 38, 38]
        ];

        // Menentukan kategori usia
        $indexUsia = null;
        if ($usiaDecimal >= 13.0 && $usiaDecimal <= 13.4) {
            $indexUsia = 0;
        } elseif ($usiaDecimal >= 13.5 && $usiaDecimal <= 13.11) {
            $indexUsia = 1;
        } elseif ($usiaDecimal >= 14.0 && $usiaDecimal <= 14.11) {
            $indexUsia = 2;
        } elseif ($usiaDecimal >= 15.0 && $usiaDecimal <= 15.11) {
            $indexUsia = 3;
        } elseif ($usiaDecimal >= 16.0 && $usiaDecimal <= 16.11) {
            $indexUsia = 4;
        } elseif ($usiaDecimal > 17.0) {
            $indexUsia = 5;
        }

        // Menghitung total jawaban benar
        $totalBenar = $this->soalujianModel
            ->select("COUNT(CASE WHEN soal_ujian.jawaban_soal_ujian = soal.id_jawaban_soal THEN 1 END) as total_benar")
            ->join('soal', 'soal_ujian.id_soal = soal.id_soal')
            ->where('soal_ujian.id_test', $id_test)
            ->first();

        $rawScore = $totalBenar['total_benar'] ?? 0;

        // Mengambil bobot berdasarkan raw score dan kategori usia
        $nilaiBobot = isset($bobot[$rawScore]) && $indexUsia !== null ? $bobot[$rawScore][$indexUsia] : null;

        // Klasifikasi IQ
        $iqClassification = $this->getIqClassification($nilaiBobot);

        return view('admin/detail_test', ['user' => $userData, 'usia' => $usiaDecimal, 'raw_score' => $rawScore, 'nilai_bobot' => $nilaiBobot, 'iq_classification' => $iqClassification, 'soalujian' => $soalujian, 'totalBenar' => $rawScore, 'jawabanbenar' => $jawabanbenar]);
    }

    // Fungsi untuk klasifikasi IQ
    private function getIqClassification($nilaiBobot)
    {
        if ($nilaiBobot >= 170) {
            return 'Genius';
        } elseif ($nilaiBobot >= 140) {
            return 'Very Superior';
        } elseif ($nilaiBobot >= 120) {
            return 'Superior';
        } elseif ($nilaiBobot >= 110) {
            return 'High Average';
        } elseif ($nilaiBobot >= 90) {
            return 'Average';
        } elseif ($nilaiBobot >= 80) {
            return 'Low Average';
        } elseif ($nilaiBobot >= 70) {
            return 'Borderline';
        } elseif ($nilaiBobot >= 68) {
            return 'Borderline Mental Retardation';
        } elseif ($nilaiBobot >= 52) {
            return 'Mild Mental Retardation';
        } elseif ($nilaiBobot >= 36) {
            return 'Moderate Mental Retardation';
        } elseif ($nilaiBobot >= 25) {
            return 'Severe Mental Retardation';
        } else {
            return 'Profound Mental Retardation';
        }
    }




    public function action_create_peserta()
    {
        // Get the email from the POST request
        $email = $this->request->getPost('email');

        // Check if the user exists in the database based on the email
        $user = $this->userModel->where('email_user', $email)->first();

        // Start a session for managing participant data
        $session = session();

        // Validate if the user exists
        if (!$user) {
            // If the user is not found, redirect with an error message
            return redirect()->to(base_url('/admin/create_test'))->with('error', 'Peserta dengan email tersebut tidak ditemukan.');
        }

        // Generate a random ID for the participant
        $randomId = rand();

        // Retrieve the existing list of participants from the session, if available
        $existingParticipants = $session->get('listpeserta') ?? [];

        // Add the new participant to the existing list
        $existingParticipants[] = [
            'id_peserta' => $randomId,
            'email_peserta' => $user['email_user'],
            'nama_peserta' => $user['nama_user'],
        ];

        // Save the updated list of participants back to the session
        $session->set('listpeserta', $existingParticipants);

        // Redirect back to the create_test page with a success message
        return redirect()->to(base_url('/admin/create_test'))->with('success', 'Peserta berhasil ditambahkan.');
    }

    public function delete_peserta($id_peserta)
    {
        // Start a session to manage the list of participants
        $session = session();

        // Retrieve the list of participants from the session
        $listPeserta = $session->get('listpeserta');

        // Check if there is any participant data in the session
        if ($listPeserta) {
            // Search for the index of the participant with the given ID
            $key = array_search($id_peserta, array_column($listPeserta, 'id_peserta'));

            // Check if the participant with the specified ID was found
            if ($key !== false) {
                // Remove the participant from the list using the index
                unset($listPeserta[$key]);

                // Re-index the array to ensure no gaps are left after removal
                $listPeserta = array_values($listPeserta);

                // Save the updated list of participants back to the session
                $session->set('listpeserta', $listPeserta);

                // Redirect with a success message
                return redirect()->to(base_url('/admin/create_test'))->with('success', 'Peserta berhasil dihapus.');
            }
        }

        // If participant not found, redirect with an error message
        return redirect()->to(base_url('/admin/create_test'))->with('error', 'Peserta dengan ID tersebut tidak ditemukan.');
    }
}

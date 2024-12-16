<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TestModel;
use App\Models\SoalUjianModel;
use App\Models\JawabanSoalModel;

class Test extends BaseController
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

    public function videotest()
    {
        // Ambil file video dari form data
        $video = $this->request->getFile('video'); // 'video' adalah nama field yang dikirim dari FormData
        $testId = $this->request->getPost('testId');

        if ($video && $video->isValid() && !$video->hasMoved()) {
            // Tentukan folder penyimpanan video
            $videoPath = WRITEPATH . '../public/uploads/videos/'; // Tentukan folder penyimpanan

            // Membuat folder jika belum ada
            if (!is_dir($videoPath)) {
                mkdir($videoPath, 0755, true); // Buat folder jika belum ada
            }

            // Ambil ekstensi file (misalnya .webm)
            $fileExtension = $video->getClientExtension();

            // Dapatkan waktu saat ini dalam format jam (HH-MM-SS)
            $currentTime = date('H-i-s'); // Format jam saat ini

            // Buat nama file berdasarkan testId dan waktu, lalu tambahkan ekstensi
            $newName = $testId . '_' . $currentTime . '.' . $fileExtension;

            // Pindahkan file video ke folder penyimpanan dengan nama yang baru
            if ($video->move($videoPath, $newName)) {
                // Jika berhasil, dapatkan informasi file
                $fileData = [
                    'file_name' => $newName,
                    'file_type' => $video->getClientMimeType(),
                    'file_size' => $video->getSize(),
                    'file_path' => $videoPath . $newName
                ];

                // Mengembalikan respons sukses
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Video uploaded successfully',
                    'file_info' => $fileData
                ]);
            } else {
                // Jika gagal memindahkan file
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to move the uploaded video'
                ]);
            }
        } else {
            // Error jika file tidak valid atau terjadi kesalahan
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $video ? $video->getErrorString() : 'No video file uploaded'
            ]);
        }
    }


}

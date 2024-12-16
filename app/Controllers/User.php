<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TestModel;
use App\Models\SoalUjianModel;
use App\Models\JawabanSoalModel;

class User extends BaseController
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

    public function dashboard(): mixed
{
    $test = $this->testModel
        ->where('id_user', $this->session->get('id_user'))
        ->first();

    // Check if the test is available
    if ($test === null) {
        return redirect()->to(base_url('/logout'))->with('error', 'Tes Tidak Tersedia');
    }

    // Subquery to fetch distinct questions based on jenis_soal
    $subQuery = $this->db->table('soal')
        ->select('MIN(soal_ujian.id_soal_ujian) as id_soal_ujian')
        ->join('soal_ujian', 'soal.id_soal = soal_ujian.id_soal')
        ->where('soal_ujian.id_test', $test['id_test'])
        ->groupBy('soal.id_jenis_soal')
        ->getCompiledSelect();

    // Fetch detailed soal based on subquery
    $soal_ujian = $this->soalujianModel
        ->select('soal_ujian.*, soal.isi_soal, jenis_soal.nama_jenis_soal, jenis_soal.tipe_soal')
        ->join('soal', 'soal_ujian.id_soal = soal.id_soal')
        ->join('jenis_soal', 'soal.id_jenis_soal = jenis_soal.id_jenis_soal')
        ->where("soal_ujian.id_soal_ujian IN ($subQuery)", null, false)
        ->findAll();

    return view('user/dashboard', ['test' => $test, 'soal_ujian' => $soal_ujian]);
}

}

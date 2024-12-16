<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalUjianModel extends Model
{
    protected $table      = 'soal_ujian';
    protected $primaryKey = 'id_soal_ujian';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_soal_ujian', 'id_test', 'id_soal', 'jawaban_soal_ujian'];
}

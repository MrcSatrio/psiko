<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanSoalModel extends Model
{
    protected $table      = 'jawaban_soal';
    protected $primaryKey = 'id_jawaban_soal';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_jawaban_soal', 'id_soal', 'jawaban_soal'];
}

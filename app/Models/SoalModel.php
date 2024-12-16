<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table      = 'soal';
    protected $primaryKey = 'id_soal';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_soal', 'id_jenis_soal', 'isi_soal', 'id_jawaban_soal'];
}

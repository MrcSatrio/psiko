<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisSoalModel extends Model
{
    protected $table      = 'jenis_soal';
    protected $primaryKey = 'id_jenis_soal';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_jenis_soal', 'nama_jenis_soal', 'tipe_soal'];
}

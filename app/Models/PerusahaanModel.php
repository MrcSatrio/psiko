<?php

namespace App\Models;

use CodeIgniter\Model;

class perusahaanModel extends Model
{
    protected $table      = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_perusahaan', 'nama_perusahaan'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table      = 'test';
    protected $primaryKey = 'id_test';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_test', 'id_user', 'mulai_test', 'selesai_test', 'lama_test', 'status_test'];
}

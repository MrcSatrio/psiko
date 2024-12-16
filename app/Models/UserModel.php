<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_user', 'id_role', 'nama_user', 'email_user', 'hp_user', 'lahir_user', 'password_user', 'pendidikan_user'];
}

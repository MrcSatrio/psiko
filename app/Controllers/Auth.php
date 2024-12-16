<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        // Load UserModel di constructor
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }
    public function login(): string
    {
        return view('auth/login');
    }

    public function action_login()
    {
        // Ambil inputan username dan password
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi inputan username dan password
        if (empty($username) || empty($password)) {
            return redirect()->to(base_url('/'))->with('error', 'Username atau Password tidak boleh kosong.');
        }

        $user = $this->userModel
            ->join('role', 'user.id_role = role.id_role')
            ->where('email_user', $username)
            ->first();

        // Cek apakah user ditemukan
        if (!$user) {
            return redirect()->to(base_url('/'))->with('error', 'Username tidak ditemukan.');
        }

        // Verifikasi password dengan MD5
        if ($user['password_user'] !== md5($password)) {
            return redirect()->to(base_url('/'))->with('error', 'Password yang Anda masukkan salah.');
        }

        // Set session untuk login
        $this->session->set([
            'id_user' => $user['id_user'],
            'nama_user' => $user['nama_user'],
            'id_role' => $user['id_role'], // Simpan juga id_role di session
            'logged_in' => true
        ]);

        // Cek role user dan arahkan ke dashboard yang sesuai
        if ($user['id_role'] == 1) {
            // Redirect ke dashboard admin
            return redirect()->to(base_url('admin/dashboard'))->with('success', 'Login berhasil, selamat datang Admin ' . $user['nama_user'] . '!');
        } elseif ($user['id_role'] == 2) {
            // Redirect ke dashboard user
            return redirect()->to(base_url('user/dashboard'))->with('success', 'Login berhasil, selamat datang ' . $user['nama_user'] . '!');
        } else {
            // Jika role tidak dikenali, arahkan ke halaman default atau login
            return redirect()->to(base_url('/'))->with('error', 'Role tidak dikenali.');
        }
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }
}

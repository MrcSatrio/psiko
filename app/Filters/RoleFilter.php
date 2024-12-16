<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RedirectResponse;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('id_user')) {
            return redirect()->to('/');
        } else {
            $role = $session->get('id_role');
            $currentUri = $request->getPath(); // Use the getPath method instead
            if ($role == 1 && strpos($currentUri, 'admin') === false) {
                return redirect()->to(base_url('admin/dashboard'))->withHeaders(['Cache-Control' => 'no-store, no-cache, must-revalidate']);
            } elseif ($role == 2 && strpos($currentUri, 'user') === false) {
                return redirect()->to(base_url('user/dashboard'))->withHeaders(['Cache-Control' => 'no-store, no-cache, must-revalidate']);
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
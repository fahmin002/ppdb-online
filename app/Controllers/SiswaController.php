<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SiswaController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard',
        ];
        return view('user/dashboard', $data);
    }
}

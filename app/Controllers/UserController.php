<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function getlogin()
    {
        return view("admin/login");
    }

    public function postlogin()
    {
        $userModel = new UserModel();
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];
        $validation = service('validation');
        $validation->setRules(
            [
                'email' => [
                    'label' => 'E-Mail',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'email' => 'format email belum valid'
                    ]
                ],
                'password' => [
                    'label'=> 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]
                    );
        if($validation->run($data)) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $userModel->login_user($email, $password);
            if($cek_login) {
                session()->set('email', $cek_login['email']);
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('logged_in', TRUE);
                session()->set('level', 'admin');
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('errors', ['msg' => 'Email atau Password salah']);
                return redirect()->to('/auth/login');
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/auth/login');
        }
    }

    public function logout()
    {
        session()->remove('email');
        session()->remove('nama_user');
        session()->remove('level');
        session()->set('logged_in', FALSE);
        session()->setFlashdata('message', 'Anda berhasil logout');
        return redirect()->to('/auth/login');
    }
}

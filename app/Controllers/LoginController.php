<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\SiswaModel;

class LoginController extends BaseController
{
    public function getlogin()
    {
        return view("admin/login");
    }

    public function postlogin()
    {
        $userModel = new LoginModel();
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
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]
        );
        if ($validation->run($data)) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $userModel->login_user($email, $password);
            if ($cek_login) {
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
        if (session()->get('level') === 'admin') {
            session()->remove('email');
            session()->remove('nama_user');
            session()->remove('level');
            session()->set('logged_in', FALSE);
            session()->setFlashdata('message', 'Anda berhasil logout');
            return redirect()->to('/auth/login');
        } else {
            session()->remove('nama_user');
            session()->remove('level');
            session()->set('logged_in', FALSE);
            session()->setFlashdata('message', 'Anda berhasil logout');
            return redirect()->to('/login');
        }
    }

    public function userGetLogin()
    {
        return view('user/login');
    }

    public function userGetRegister()
    {
        return view('user/register');
    }

    public function userPostRegister()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nisn' => 'required',
            'jalur-masuk' => 'required|in_list[1,2,3,4]',
            'nama-lengkap' => 'required',
            'nama-panggilan' => 'required',
            'jenkel' => 'required|in_list[1,2]',
            'tempat-lahir' => 'required',
            'tanggal-lahir' => 'required|integer|greater_than[0]|less_than[32]',
            'bulan-lahir' => 'required|integer|greater_than[0]|less_than[13]',
            'tahun-lahir' => 'required|integer|greater_than[1989]|less_than[2023]',
            'password' => 'required',
            'confirm-password' => 'required|matches[password]',
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Process the registration data here
        // ...
        $nisn = $this->request->getPost('nisn');
        $jalurMasuk = $this->request->getPost('jalur-masuk');
        $namaLengkap = $this->request->getPost('nama-lengkap');
        $namaPanggilan = $this->request->getPost('nama-panggilan');
        $jenkel = $this->request->getPost('jenkel');
        $tempatLahir = $this->request->getPost('tempat-lahir');
        $tanggalLahir = $this->request->getPost('tanggal-lahir');
        $bulanLahir = $this->request->getPost('bulan-lahir');
        $tahunLahir = $this->request->getPost('tahun-lahir');
        $password = $this->request->getPost('password');
        $noPendaftaran = 'PPDB' . date('YmdHis');
        $tglPendaftaran = date('Y-m-d H:i:s');
        $tahun = date('Y');
        $siswaModel = new SiswaModel();
        $data = [
            'no_pendaftaran' => $noPendaftaran,
            'tgl_pendaftaran' => $tglPendaftaran,
            'tahun' => $tahun,
            'nisn' => $nisn,
            'jalur_masuk' => $jalurMasuk === '1' ? 'Zonasi' : ($jalurMasuk === '2' ? 'Afirmasi' : ($jalurMasuk === '3' ? 'Prestasi' : 'Perpindahan Orang Tua')),
            'nama_lengkap' => $namaLengkap,
            'nama_panggilan' => $namaPanggilan,
            'jenkel' => $jenkel === 'Laki-laki' ? 'L' : 'P',
            'tempat_lahir' => $tempatLahir,
            'tgl_lahir' => $tahunLahir . '-' . $bulanLahir . '-' . $tanggalLahir,
            // 2005-12-31
            'password' => $password,
        ];

        try {
            $siswaModel->save($data);
            return redirect()->to('/login')->with('message', 'Pendaftaran berhasil. Silahkan login.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('errors', ['msg' => $e->getMessage()]);
        }
    }
    public function userPostLogin()
    {
        $siswaModel = new SiswaModel();
        $data = [
            'nisn' => $this->request->getPost('nisn'),
            'password' => $this->request->getPost('password'),
        ];
        $validation = service('validation');
        $validation->setRules(
            [
                'nisn' => [
                    'label' => 'NISN',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'email' => 'format nisn belum valid (hanya angka)'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]
        );

        if ($validation->run($data)) {
            $cek_login = $siswaModel->login_siswa($data['nisn'], $data['password']);
            if ($cek_login) {
                // Simpan data siswa ke session
                session()->set([
                    'id_siswa' => $cek_login['id_siswa'], // Simpan id_siswa
                    'nisn' => $cek_login['nisn'], // Simpan nisn
                    'nama_user' => $cek_login['nama_panggilan'], // Simpan nama panggilan
                    'logged_in' => TRUE,
                    'level' => 'user'
                ]);
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('errors', ['msg' => 'NISN atau Password salah']);
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/login');
        }
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;



class UserController extends BaseController
{
    protected $addusermodel;

    public function __construct()
    {
        $this->addusermodel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tambah User',
            'addusermodel' => $this->addusermodel->getAllData(),
        ];
        return view('admin/adduser', $data);
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'nama_user' => [
                'rules'  => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required'   => 'Nama user wajib diisi.',
                    'min_length' => 'Nama user minimal 3 karakter.',
                    'max_length' => 'Nama user maksimal 255 karakter.',
                ]
            ],
            'email' => [
                'rules'  => 'required|valid_email|max_length[255]',
                'errors' => [
                    'required'    => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'max_length'  => 'Email maksimal 255 karakter.',
                ]
            ],
            'password' => [
                'rules'  => 'required|min_length[8]|max_length[255]',
                'errors' => [
                    'required'   => 'Password wajib diisi.',
                    'min_length' => 'Password minimal 8 karakter.',
                    'max_length' => 'Password maksimal 255 karakter.',
                ]
            ],
            'foto' => [
                'rules'  => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]',
                'errors' => [
                    'uploaded'  => 'Foto wajib diunggah.',
                    'max_size'  => 'Ukuran foto maksimal 1MB.',
                    'is_image'  => 'File yang diunggah harus berupa gambar.',
                ]
            ],
        ];


        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash password
        ];

        // Handle upload foto
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName(); // Generate nama file unik
            $foto->move(FCPATH . 'foto_user', $newName); // Pindahkan file ke folder uploads
            $data['foto'] = $newName; // Simpan nama file ke database
        }

        // Simpan data ke database
        if ($this->addusermodel->createUser($data)) {
            session()->setFlashdata('success', 'Admin berhasil diupdate.');
            return redirect()->to('/admin/adduser');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Gagal menambahkan user.');
        }
    }

    public function detail($id_user)
    {
        $user = $this->addusermodel->find($id_user);  // Menggunakan find() atau query yang sesuai

        if (!$user) {
            return redirect()->to('/admin')->with('error', 'User tidak ditemukan!');
        }
        $data = [
            'title' => 'Detail User',
            'user' => $user,
        ];
        return view('admin/detailuser', $data);
    }


    // UPDATE USER
    public function update($id_user)
    {
        // Validasi input
        $rules = [
            'nama_user' => 'required|min_length[3]|max_length[255]',
            'email'     => 'required|valid_email|max_length[255]',
            'password'  => 'permit_empty|min_length[8]|max_length[255]', // Password boleh kosong
            'foto'      => 'permit_empty|uploaded[foto]|max_size[foto,1024]|is_image[foto]', // Foto boleh kosong
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email'     => $this->request->getPost('email'),
        ];

        // Jika password diisi, hash password baru
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Handle upload foto jika ada
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName(); // Generate nama file unik
            $foto->move(FCPATH . 'foto_user', $newName); // Pindahkan file ke folder public/foto_user
            $data['foto'] = $newName; // Simpan nama file ke database
        }

        // Update data ke database
        if ($this->addusermodel->update($id_user, $data)) {
            session()->setFlashdata('success', 'Agama berhasil diupdate.');
            return redirect()->to('/admin/adduser');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Gagal mengupdate user.');
        }
    }

    // DELETE USER
    public function delete($id_user)
    {
        // Cari data user
        $user = $this->addusermodel->find($id_user);
        if (!$user) {
            return redirect()->to('/admin/adduser')->with('errors', 'User tidak ditemukan.');
        }

        // Hapus foto dari folder (optional)
        if (!empty($user['foto']) && file_exists(FCPATH . 'foto_user/' . $user['foto'])) {
            unlink(FCPATH . 'foto_user/' . $user['foto']);
        }

        // Hapus user dari database
        if ($this->addusermodel->delete($id_user)) {
            session()->setFlashdata('success', 'Agama berhasil diupdate.');
            return redirect()->to('/admin/adduser');
        } else {
            return redirect()->to('/admin/adduser')->with('errors', 'Gagal menghapus user.');
        }
    }
}

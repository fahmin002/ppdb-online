<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgamaModel;

class AgamaController extends BaseController
{
    protected $agamaModel;

    public function __construct()
    {
        $this->agamaModel = new AgamaModel();
    }

    // Menampilkan halaman agama
    public function index()
    {
        $data = [
            'title' => 'Agama',
            'agama' => $this->agamaModel->getAllData(), // Mengambil semua data agama
        ];
        return view('admin/agama', $data);
    }

    // Menyimpan data agama
    public function save()
    {
        // Validasi data agama yang diterima
        $validation = \Config\Services::validation();

        $validation->setRules([
            'agama' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run() === false) {
            // Jika validasi gagal, kembali ke form dengan error message
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Jika validasi berhasil, simpan data agama
        $agama = $this->request->getPost('agama');
        $this->agamaModel->insert([
            'agama' => $agama,
        ]);

        // Setelah berhasil menyimpan, beri notifikasi sukses dan redirect
        session()->setFlashdata('success', 'Agama berhasil ditambahkan.');
        return redirect()->to('/admin/agama');
    }

    public function update($id)
    {
        $agama = $this->request->getPost('agama');
        $this->agamaModel->update($id, [
            'agama' => $agama,
        ]);
        session()->setFlashdata('success', 'Agama berhasil diupdate.');
        return redirect()->to('/admin/agama');
    }

    public function delete($id) 
    {
        $this->agamaModel->delete($id);
        session()->setFlashdata('success', 'Agama berhasil dihapus.');
        return redirect()->to('/admin/agama');
    }
}

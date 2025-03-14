<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PekerjaanModel;

class PekerjaanController extends BaseController
{
    protected $pekerjaanModel;

    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
    }

    // Menampilkan halaman pekerjaan
    public function index()
    {
        $data = [
            'title' => 'Pekerjaan',
            'pekerjaan' => $this->pekerjaanModel->getAllData(), // Mengambil semua data pekerjaan
        ];
        return view('admin/pekerjaan', $data);
    }

    // Menyimpan data pekerjaan
    public function save()
    {
        // Validasi data pekerjaan yang diterima
        $validation = \Config\Services::validation();

        $validation->setRules([
            'pekerjaan' => 'required|min_length[3]', // Pastikan nama pekerjaan tidak kosong dan minimal 3 karakter
        ]);

        if ($validation->withRequest($this->request)->run() === false) {
            // Jika validasi gagal, kembalikan ke form dengan error message
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Jika validasi berhasil, simpan data pekerjaan
        $pekerjaan = $this->request->getPost('pekerjaan');
        $this->pekerjaanModel->insert([
            'pekerjaan' => $pekerjaan,
        ]);

        // Setelah berhasil menyimpan, beri notifikasi sukses dan redirect
        session()->setFlashdata('success', 'Pekerjaan berhasil ditambahkan.');
        return redirect()->to('/admin/pekerjaan');
    }

    public function update($id)
    {
        $pekerjaan = $this->request->getPost('pekerjaan');
        $this->pekerjaanModel->update($id, [
            'pekerjaan' => $pekerjaan,
        ]);
        session()->setFlashdata('success', 'Pekerjaan berhasil diupdate.');
        return redirect()->to('/admin/pekerjaan');
    }

    public function delete($id) 
    {
        $this->pekerjaanModel->delete($id);
        return redirect()->to('/admin/pekerjaan');
    }
}

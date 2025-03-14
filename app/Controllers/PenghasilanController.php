<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenghasilanModel;

class PenghasilanController extends BaseController
{
    protected $penghasilanModel;

    public function __construct()
    {
        $this->penghasilanModel = new PenghasilanModel();
    }

    // Menampilkan halaman penghasilan
    public function index()
    {
        $data = [
            'title' => 'penghasilan',
            'penghasilan' => $this->penghasilanModel->getAllData(), // Mengambil semua data penghasilan
        ];
        return view('admin/penghasilan', $data);
    }

    // Menyimpan data penghasilan
    public function save()
    {
        // Validasi data penghasilan yang diterima
        $validation = \Config\Services::validation();

        $validation->setRules([
            'penghasilan' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run() === false) {
            // Jika validasi gagal, kembali ke form dengan error message
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Jika validasi berhasil, simpan data penghasilan
        $penghasilan = $this->request->getPost('penghasilan');
        $this->penghasilanModel->insert([
            'penghasilan' => $penghasilan,
        ]);

        // Setelah berhasil menyimpan, beri notifikasi sukses dan redirect
        session()->setFlashdata('success', 'penghasilan berhasil ditambahkan.');
        return redirect()->to('/admin/penghasilan');
    }

    public function update($id)
    {
        $penghasilan = $this->request->getPost('penghasilan');
        $this->penghasilanModel->update($id, [
            'penghasilan' => $penghasilan,
        ]);
        session()->setFlashdata('success', 'penghasilan berhasil diupdate.');
        return redirect()->to('/admin/penghasilan');
    }

    public function delete($id) 
    {
        $this->penghasilanModel->delete($id);
        session()->setFlashdata('success', 'penghasilan berhasil dihapus.');
        return redirect()->to('/admin/penghasilan');
    }
}

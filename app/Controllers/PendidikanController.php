<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendidikanModel;

class PendidikanController extends BaseController
{
    protected $pendidikanModel;

    public function __construct()
    {
        $this->pendidikanModel = new PendidikanModel();
    }

    // Menampilkan halaman pekerjaan
    public function index()
    {
        $data = [
            'title' => 'pendidikan',
            'pendidikan' => $this->pendidikanModel->getAllData(), // Mengambil semua data pekerjaan
        ];
        return view('admin/pendidikan', $data);
    }

    // Menyimpan data pekerjaan
    public function save()
    {
        // Validasi data pekerjaan yang diterima
        $validation = \Config\Services::validation();

       $validation->setRules([
            'pendidikan' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run() === false) {
            // Jika validasi gagal, kembalikan ke form dengan error message
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Jika validasi berhasil, simpan data pekerjaan
        $pendidikan = $this->request->getPost('pendidikan');
        $this->pendidikanModel->insert([
            'pendidikan' => $pendidikan,
        ]);

        // Setelah berhasil menyimpan, beri notifikasi sukses dan redirect
        session()->setFlashdata('success', 'pendidikan berhasil ditambahkan.');
        return redirect()->to('/admin/pendidikan');
    }

    public function update($id)
    {
        $pendidikan = $this->request->getPost('pendidikan');
        $this->pendidikanModel->update($id, [
            'pendidikan' => $pendidikan,
        ]);
        session()->setFlashdata('success', 'pendidikan berhasil diupdate.');
        return redirect()->to('/admin/pendidikan');
    }

    public function delete($id) 
    {
        $this->pendidikanModel->delete($id);
        return redirect()->to('/admin/pendidikan');
    }
}

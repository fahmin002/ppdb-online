<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LampiranModel;

class LampiranController extends BaseController
{

    protected $lampiranModel;

    public function __construct()
    {
        $this->lampiranModel = new LampiranModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lampiran',
            'lampiran' => $this->lampiranModel->findAll(),
        ];
        return view('admin/lampiran', $data);
    }

    public function upload()
    {
        // Aturan validasi
        $validationRules = [
            'id_pendaftar' => 'required',
            'jenis_lampiran' => 'required',
            'file_lampiran' => 'uploaded[file_lampiran]|max_size[file_lampiran,2048]|ext_in[file_lampiran,pdf,jpg,jpeg,png]',
        ];

        // Pesan validasi kustom (opsional, jika ingin menimpa pesan dari file bahasa)
        $customMessages = [
            'id_pendaftar' => [
                'required' => 'ID Pendaftar wajib diisi.',
            ],
            'jenis_lampiran' => [
                'required' => 'Jenis lampiran wajib diisi.',
            ],
            'file_lampiran' => [
                'uploaded' => 'File lampiran harus diunggah.',
                'max_size' => 'Ukuran file lampiran maksimal 2 MB.',
                'ext_in'   => 'File lampiran harus berupa PDF, JPG, JPEG, atau PNG.',
            ],
        ];

        // Jalankan validasi
        if (!$this->validate($validationRules, $customMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Proses upload file
        $file = $this->request->getFile('file_lampiran');
        $fileName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/lampiran', $fileName);

        // Simpan data ke database
        $data = [
            'id_pendaftar'    => $this->request->getPost('id_pendaftar'),
            'jenis_lampiran'  => $this->request->getPost('jenis_lampiran'),
            'file_lampiran'   => $fileName,
            'keterangan'      => $this->request->getPost('keterangan'),
        ];

        $lampiranModel = new LampiranModel();
        $lampiranModel->insert($data);

        // Set pesan sukses
        session()->setFlashdata('success', 'Lampiran berhasil diupload.');
        return redirect()->to('/admin/lampiran');
    }

    public function update($id_lampiran)
    {
        // Validasi input
        // Aturan validasi
        $validationRules = [
            'id_pendaftar' => 'required',
            'jenis_lampiran' => 'required',
            'file_lampiran' => 'uploaded[file_lampiran]|max_size[file_lampiran,2048]|ext_in[file_lampiran,pdf,jpg,jpeg,png]',
        ];

        // Pesan validasi kustom (opsional, jika ingin menimpa pesan dari file bahasa)
        $customMessages = [
            'id_pendaftar' => [
                'required' => 'ID Pendaftar wajib diisi.',
            ],
            'jenis_lampiran' => [
                'required' => 'Jenis lampiran wajib diisi.',
            ],
            'file_lampiran' => [
                'uploaded' => 'File lampiran harus diunggah.',
                'max_size' => 'Ukuran file lampiran maksimal 2 MB.',
                'ext_in'   => 'File lampiran harus berupa PDF, JPG, JPEG, atau PNG.',
            ],
        ];

        // Jalankan validasi
        if (!$this->validate($validationRules, $customMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'jenis_lampiran' => $this->request->getPost('jenis_lampiran'),
            'keterangan'     => $this->request->getPost('keterangan'),
        ];

        // Handle file upload
        $file = $this->request->getFile('file_lampiran');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $data['file_lampiran'] = $newName;
        }

        // Update data ke database
        $model = new LampiranModel();
        $model->update($id_lampiran, $data);

        // Redirect dengan pesan sukses
        session()->setFlashdata('success', 'Lampiran berhasil diupdate.');
        return redirect()->to('/admin/lampiran');
    }

    public function delete($id_lampiran)
    {
        // Mengambil data lampiran berdasarkan ID
        $lampiran = $this->lampiranModel->find($id_lampiran);

        if (!$lampiran) {
            return redirect()->to('/lampiran')->with('error', 'Lampiran tidak ditemukan!');
        }

        // Menghapus file yang terkait
        if (file_exists(FCPATH . 'uploads/lampiran/' . $lampiran['file_lampiran'])) {
            unlink(FCPATH . 'uploads/lampiran/' . $lampiran['file_lampiran']); //FCAPTH adalah folder yang mengarah ke Public
        }

        // Menghapus data dari database
        $this->lampiranModel->delete($id_lampiran);

        session()->setFlashdata('success', 'Lampiran berhasil diupdate.');
        return redirect()->to('/admin/lampiran');
    }
}

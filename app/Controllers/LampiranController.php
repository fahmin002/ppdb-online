<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LampiranModel;
use App\Models\SiswaModel;

class LampiranController extends BaseController
{
    protected $lampiranModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->lampiranModel = new LampiranModel();
        $this->siswaModel = new SiswaModel();
    }

    // public function index()
    // {
    //     $data = [
    //         'title' => 'Lampiran',
    //         'lampiran' => $this->lampiranModel->getAllLampiranWithSiswa(), //  Ambil data lampiran beserta nama siswa
    //     ];
    //     return view('admin/lampiran', $data);
    // }
    public function index()
    {
        $data = [
            'title' => 'Lampiran',
            'lampiran' => $this->siswaModel
            ->select('tb_siswa.id_siswa, tb_siswa.no_pendaftaran, tb_siswa.nama_lengkap, tb_siswa.tgl_pendaftaran, tb_siswa.status_ppdb')
            ->join('lampiran', 'lampiran.id_siswa = tb_siswa.id_siswa', 'inner')
            ->groupBy('tb_siswa.id_siswa')
            ->findAll()
            //  Ambil data lampiran beserta nama siswa
        ];
        // dd($data['lampiran']);
        return view('admin/lampiran', $data);
    }

    public function view($siswaId)
    {
        $lampiran = $this->lampiranModel
        ->select('lampiran.id_lampiran, lampiran.id_siswa, tb_siswa.nama_lengkap, lampiran.jenis_lampiran, lampiran.file_lampiran, lampiran.keterangan')
        ->where('lampiran.id_siswa', $siswaId)
        ->join('tb_siswa', 'tb_siswa.id_siswa = lampiran.id_siswa')
        ->findAll();
        $data = [
            'title'=> 'Lampiran',
            'lampiran' => $lampiran,
            'nama_lengkap' => $lampiran[0]['nama_lengkap']
        ];
        return view('admin/lampiranById', $data);
    }

    public function upload()
    {
        // Validasi input
        $validationRules = [
            'id_siswa' => 'required|numeric',
            'jenis_lampiran' => 'required',
            'file_lampiran' => 'uploaded[file_lampiran]|max_size[file_lampiran,2048]|ext_in[file_lampiran,pdf,jpg,jpeg,png]',
        ];

        $customMessages = [
            'id_siswa' => [
                'required' => 'ID Siswa wajib diisi.',
                'numeric'  => 'ID Siswa harus berupa angka.',
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

        if (!$this->validate($validationRules, $customMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Proses upload file
        $file = $this->request->getFile('file_lampiran');
        $fileName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/lampiran', $fileName);

        // Simpan data ke database
        $data = [
            'id_siswa'      => $this->request->getPost('id_siswa'),
            'jenis_lampiran' => $this->request->getPost('jenis_lampiran'),
            'file_lampiran' => $fileName,
            'keterangan'    => $this->request->getPost('keterangan'),
        ];

        $this->lampiranModel->insert($data);

        // Set pesan sukses
        session()->setFlashdata('success', 'Lampiran berhasil diupload.');
        return redirect()->to('/admin/lampiran');
    }

    public function update($id_lampiran)
    {
        // Validasi input
        $validationRules = [
            'id_siswa' => 'required|numeric', // Ganti no_pendaftaran dengan id_siswa
            'file_lampiran' => 'if_exist|uploaded[file_lampiran]|max_size[file_lampiran,2048]|ext_in[file_lampiran,pdf]',
        ];

        $customMessages = [
            'id_siswa' => [
                'required' => 'ID Siswa wajib diisi.',
                'numeric'  => 'ID Siswa harus berupa angka.',
            ],
            'file_lampiran' => [
                'uploaded' => 'File lampiran harus diunggah.',
                'max_size' => 'Ukuran file lampiran maksimal 2 MB.',
                'ext_in'   => 'File lampiran harus berupa PDF.',
            ],
        ];

        if (!$this->validate($validationRules, $customMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_siswa'      => $this->request->getPost('id_siswa'), // Ganti no_pendaftaran dengan id_siswa
            'jenis_lampiran' => $this->request->getPost('jenis_lampiran'), // Tambahkan jenis_lampiran jika diperlukan
            'keterangan'    => $this->request->getPost('keterangan'), // Tambahkan keterangan jika diperlukan
        ];

        // Proses upload file jika ada
        $file = $this->request->getFile('file_lampiran');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/lampiran', $newName);
            $data['file_lampiran'] = $newName;

            // Hapus file lama
            $lampiran = $this->lampiranModel->find($id_lampiran);
            if ($lampiran && file_exists(FCPATH . 'uploads/lampiran/' . $lampiran['file_lampiran'])) {
                unlink(FCPATH . 'uploads/lampiran/' . $lampiran['file_lampiran']);
            }
        }

        $this->lampiranModel->update($id_lampiran, $data);

        session()->setFlashdata('success', 'Lampiran berhasil diupdate.');
        return redirect()->to('/admin/lampiran');
    }

    public function delete($id_lampiran)
    {
        $lampiran = $this->lampiranModel->find($id_lampiran);

        if (!$lampiran) {
            return redirect()->to('/admin/lampiran')->with('error', 'Lampiran tidak ditemukan!');
        }

        // Hapus file lampiran
        if (file_exists(FCPATH . 'uploads/lampiran/' . $lampiran['file_lampiran'])) {
            unlink(FCPATH . 'uploads/lampiran/' . $lampiran['file_lampiran']);
        }

        // Hapus data dari database
        $this->lampiranModel->delete($id_lampiran);

        session()->setFlashdata('success', 'Lampiran berhasil dihapus.');
        return redirect()->to('/admin/lampiran');
    }
}

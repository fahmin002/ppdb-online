<?php


namespace App\Controllers;

use App\Models\LampiranModel;
use App\Models\SiswaModel;

class UserLampiranController extends BaseController
{
    protected $lampiranModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->lampiranModel = new LampiranModel();
        $this->siswaModel = new SiswaModel();
    }

    // Menampilkan form upload lampiran
    public function index()
    {
        $data = [
            "page" => "tentang"
        ];
        $data['siswa'] = $this->siswaModel->find(session('id_siswa')); // Ambil data siswa dari session
        $data['lampiran'] = $this->lampiranModel->where('id_siswa', session('id_siswa'))->findAll(); // Ambil lampiran siswa
        return view('/user/uploads', $data);
    }

    // Proses upload lampiran
    public function upload()
    {
        $file = $this->request->getFile('lampiran');
    
        // Validasi file
        $validationRules = [
            'lampiran' => [
                'label' => 'File Lampiran',
                'rules' => 'uploaded[lampiran]|max_size[lampiran,2048]|ext_in[lampiran,pdf]', // Maksimal 2MB, format PDF
                'errors' => [
                    'uploaded' => 'Harus mengupload file lampiran.',
                    'max_size' => 'Ukuran file maksimal 2MB.',
                    'ext_in' => 'File harus berformat PDF.'
                ]
            ]
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->to('/user/uploads')->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Proses upload file
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Generate nama file unik
            $file->move(FCPATH . 'uploads/lampiran', $newName); // Simpan file ke folder uploads
    
            // Simpan data lampiran ke database
            $data = [
                'id_siswa' => session('id_siswa'), // Ambil ID siswa dari session
                'jenis_lampiran' => $this->request->getPost('jenis_lampiran'),
                'file_lampiran' => $newName,
                'keterangan' => $this->request->getPost('keterangan'),
            ];
    
            $this->lampiranModel->insert($data);
    
            return redirect()->to('/user/uploads')->with('success', 'Lampiran berhasil diupload!');
        } else {
            return redirect()->to('/user/uploads')->with('error', 'Gagal mengupload lampiran.');
        }
    }
}

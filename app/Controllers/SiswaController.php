<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

class SiswaController extends BaseController
{
    public function index()
    {
        // Periksa apakah siswa sudah login
        if (!session()->get('logged_in') || session()->get('level') !== 'user') {
            return redirect()->to('/login'); // Redirect ke login jika belum login
        }

        // Ambil id_siswa dari session
        $id_siswa = session()->get('id_siswa');

        // Ambil data siswa dari database
        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->getSiswaById($id_siswa);

        // Kirim data siswa ke view dashboard
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard',
            'siswa' => $siswa, // Data siswa yang login
        ];

        return view('user/dashboard', $data);
    }

    public function editProfile($nisn)
    {
        $siswaModel = new SiswaModel();

        // Ambil data siswa berdasarkan nisn
        $siswa = $siswaModel->getSiswaByNisn($nisn);
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard',
            'siswa' => $siswa, // Data siswa yang login
        ];


        if (!$siswa) {
            // Jika siswa tidak ditemukan, tampilkan halaman error atau redirect
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Siswa dengan NISN $nisn tidak ditemukan.");
        }

        // Kirim data siswa ke view untuk diedit
        return view('user/editProfile',$data);
    }

    public function updateProfile($nisn)
    {
        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->getSiswaByNisn($nisn);
    
        if (!$siswa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Siswa dengan NISN $nisn tidak ditemukan.");
        }
    
        // Ambil data dari form
        $data = [           
            'nisn'              => $this->request->getPost('nisn'),
            'nama_lengkap'      => $this->request->getPost('nama_lengkap'),
            'nama_panggilan'    => $this->request->getPost('nama_panggilan'),
            'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'         => $this->request->getPost('tgl_lahir'),
            'jenkel'            => $this->request->getPost('jenkel'),
            'nik'               => $this->request->getPost('nik'),
            'id_agama'          => $this->request->getPost('id_agama'),
            'no_telepon'        => $this->request->getPost('no_telepon'),
            'tinggi'            => $this->request->getPost('tinggi'),
            'berat'             => $this->request->getPost('berat'),
            'jml_saudara'       => $this->request->getPost('jml_saudara'),
            'anak_ke'           => $this->request->getPost('anak_ke'),
            'nik_ayah'          => $this->request->getPost('nik_ayah'),
            'nama_ayah'         => $this->request->getPost('nama_ayah'),
            'pendidikan_ayah'   => $this->request->getPost('pendidikan_ayah'),
            'pekerjaan_ayah'    => $this->request->getPost('pekerjaan_ayah'),
            'penghasilan_ayah'  => $this->request->getPost('penghasilan_ayah'),
            'no_telepon_ayah'   => $this->request->getPost('no_telepon_ayah'),
            'nik_ibu'           => $this->request->getPost('nik_ibu'),
            'nama_ibu'          => $this->request->getPost('nama_ibu'),
            'pendidikan_ibu'    => $this->request->getPost('pendidikan_ibu'),
            'pekerjaan_ibu'     => $this->request->getPost('pekerjaan_ibu'),
            'penghasilan_ibu'   => $this->request->getPost('penghasilan_ibu'),
            'no_telepon_ibu'    => $this->request->getPost('no_telepon_ibu'),
            'id_provinsi'       => $this->request->getPost('id_provinsi'),
            'id_kabupaten'      => $this->request->getPost('id_kabupaten'),
            'id_kecamatan'     => $this->request->getPost('id_kecamatan'),
            'alamat'            => $this->request->getPost('alamat'),
            'nama_sekolah_asal' => $this->request->getPost('nama_sekolah_asal'),
            'tahun_lulus'       => $this->request->getPost('tahun_lulus'),
            'no_ijazah'         => $this->request->getPost('no_ijazah'),
            'no_skhun'          => $this->request->getPost('no_skhun'),          
        ];
    
        // Jika password diisi, update password
        if ($this->request->getPost('password')) {
            $data['password'] =($this->request->getPost('password'));
        }
    
        // Proses upload foto (jika ada)
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(ROOTPATH . 'public/foto-siswa', $newName);
            $data['foto'] = $newName;
        }
    
        // Update data siswa
        $updateSuccess = $siswaModel->updateSiswa($siswa['id_siswa'], $data);
    
        if ($updateSuccess) {
            return redirect()->to('/user/editeprofile/' . $nisn)->with('success', 'Profil berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui profil');
        }
    }
}

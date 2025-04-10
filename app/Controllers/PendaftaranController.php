<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use CodeIgniter\HTTP\ResponseInterface;

class PendaftaranController extends BaseController
{
    protected $siswaModel;
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }
    public function getSiswaMasuk()
    {
        $daftarSiswaMasuk = $this->siswaModel
        ->select('id_siswa, no_pendaftaran, nama_lengkap, tgl_pendaftaran, status_pendaftaran, status_ppdb')->findAll();
        $data = [
            'title' => 'Pendaftaran Masuk',
            'daftarSiswa' => $daftarSiswaMasuk
        ];
        return view('admin/siswaMasuk', $data);
    }
    public function getSiswaDitolak()
    {
        $daftarSiswaMasuk = $this->siswaModel
        ->select('id_siswa, no_pendaftaran, nama_lengkap, tgl_pendaftaran, status_pendaftaran, status_ppdb')->where('status_ppdb', 'rejected')->findAll();
        $data = [
            'title' => 'Pendaftaran Masuk',
            'daftarSiswa' => $daftarSiswaMasuk
        ];
        return view('admin/siswaDitolak', $data);
    }

    public function getSiswaDiterima()
    {
        $daftarSiswaMasuk = $this->siswaModel
        ->select('id_siswa, no_pendaftaran, nama_lengkap, tgl_pendaftaran, status_pendaftaran, status_ppdb')->where('status_ppdb', 'verified')->findAll();
        $data = [
            'title' => 'Pendaftaran Masuk',
            'daftarSiswa' => $daftarSiswaMasuk
        ];
        return view('admin/siswaDiterima', $data);
    }

    public function getDetailSiswa($siswaId)
    {
        $detailSiswa = $this->siswaModel->find($siswaId);
        $data = [
            'title' => 'Detail Profile',
            'siswa'=> $detailSiswa
        ];
        return view('admin/detailSiswa', $data);
    }

    public function verify($siswaId)
    {
        try {
            $this->siswaModel
                ->set('status_ppdb', 'verified')
                ->where('id_siswa', $siswaId)
                ->update();
            return redirect()->back()->with('success', 'Siswa berhasil diverifikasi.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function reject($siswaId)
    {
        try {
            $this->siswaModel
                ->set('status_ppdb', 'rejected')
                ->where('id_siswa', $siswaId)
                ->update();
            return redirect()->back()->with('success', 'Siswa telah ditolak');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function pending($siswaId)
    {
        try {
            $this->siswaModel
                ->set('status_ppdb', 'pending')
                ->where('id_siswa', $siswaId)
                ->update();
            return redirect()->back()->with('success', 'Siswa telah dipending.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $siswaModel;
    protected $userModel; // Ubah menjadi lowercase untuk konsistensi

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->userModel = new UserModel(); // Sesuaikan dengan nama property
    }

    public function index()
    {
        // Data total siswa
        $totalSiswa = $this->siswaModel->countAll();

        // Data siswa per jalur masuk
        $jalurOptions = [
            0 => 'Reguler',
            1 => 'Prestasi',
            2 => 'Afirmasi',
            3 => 'Perpindahan Orang Tua'
        ];
        
        $siswaPerJalur = [];
        $labelsJalur = [];
        $dataJalur = [];
        
        foreach ($jalurOptions as $key => $value) {
            $count = $this->siswaModel->where('jalur_masuk', $key)->countAllResults();
            $siswaPerJalur[$value] = $count;
            $labelsJalur[] = $value;
            $dataJalur[] = $count;
        }

        // Data siswa per jenis kelamin
        $siswaLaki = $this->siswaModel->where('jenkel', 'L')->countAllResults();
        $siswaPerempuan = $this->siswaModel->where('jenkel', 'P')->countAllResults();

        // Data siswa per tahun pendaftaran
        $tahunPendaftaran = $this->siswaModel->select('tahun, COUNT(*) as total')
            ->groupBy('tahun')
            ->orderBy('tahun', 'ASC')
            ->findAll();

        $labelsTahun = [];
        $dataTahun = [];
        foreach ($tahunPendaftaran as $tahun) {
            $labelsTahun[] = $tahun['tahun'];
            $dataTahun[] = $tahun['total'];
        }



        // Data status PPDB
        $statusPPDB = [
            'pending' => $this->siswaModel->where('status_ppdb', 'pending')->countAllResults(),
            'verified' => $this->siswaModel->where('status_ppdb', 'verified')->countAllResults(),
            'rejected' => $this->siswaModel->where('status_ppdb', 'rejected')->countAllResults()
        ];

        $data = [
            'title' => 'Dashboard Admin',
            'admins' => $this->userModel->findAll(), // Gunakan property yang sudah dikoreksi
            'totalSiswa' => $totalSiswa,
            'siswaPerJalur' => $siswaPerJalur,
            'labelsJalur' => json_encode($labelsJalur),
            'dataJalur' => json_encode($dataJalur),
            'siswaLaki' => $siswaLaki,
            'siswaPerempuan' => $siswaPerempuan,
            'labelsTahun' => json_encode($labelsTahun),
            'dataTahun' => json_encode($dataTahun),
            'statusPPDB' => $statusPPDB,
            'jalurOptions' => $jalurOptions
        ];

        return view('admin/dashboard', $data);
    }
}
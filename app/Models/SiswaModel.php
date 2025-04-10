<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'tb_siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = [
        'no_pendaftaran',
        'tgl_pendaftaran',
        'tahun',
        'nisn',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tgl_lahir',
        'jenkel',
        'password',
        'id_jalur_masuk',
        'foto',
        'nik',
        'id_agama',
        'no_telepon',
        'tinggi',
        'berat',
        'jml_saudara',
        'anak_ke',
        'nik_ayah',
        'nama_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'no_telepon_ayah',
        'nik_ibu',
        'nama_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'no_telepon_ibu',
        'id_provinsi',
        'id_kabupaten',
        'id_kecamatan',
        'alamat',
        'nama_sekolah_asal',
        'tahun_lulus',
        'no_ijazah',
        'no_skhun',
        'status_ppdb'
    ];

    public function getAllData()
    {
        return $this->orderBy('id_siswa', 'ASC')->findAll(); // Mengurutkan berdasarkan id secara ascending
    }

    public function register_siswa($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function login_siswa($nisn, $password)
    {
        return $this->db->table('tb_siswa')->where(
            ['nisn' => $nisn, 'password' => $password]
        )->get()->getRowArray();
    }

    // Method untuk mengambil data siswa berdasarkan id_siswa
    public function getSiswaById($id_siswa)
    {
        return $this->db->table($this->table)->where('id_siswa', $id_siswa)->get()->getRowArray();
    }

    // Method untuk mengambil data siswa berdasarkan nisn
    public function getSiswaByNisn($nisn)
    {
        return $this->db->table($this->table)->where('nisn', $nisn)->get()->getRowArray();
    }
    public function updateSiswa($id_siswa, $data)
    {
        return $this->db->table($this->table)->where('id_siswa', $id_siswa)->update($data);
    }

    public function lampiran()
    {
        return $this->hasMany('App\Models\LampiranModel', 'id_siswa', 'id_siswa');
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'tb_siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = [
        'no_pendaftaran', 'tgl_pendaftaran', 'tahun', 'nisn', 'nama_lengkap', 'nama_panggilan', 
        'tempat_lahir', 'tgl_lahir', 'jenkel', 'password', 'id_jalur_masuk', 'foto', 'nik', 
        'id_agama', 'no_telepon', 'tinggi', 'berat', 'jml_saudara', 'anak_ke', 'nik_ayah', 
        'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'no_telepon_ayah', 
        'nik_ibu', 'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 
        'no_telepon_ibu', 'id_provinsi', 'id_kabupaten', 'id_kecamatan', 'alamat', 
        'nama_sekolah_asal', 'tahun_lulus', 'no_ijazah', 'no_skhun', 'status_pendaftaran', 
        'status_ppdb'
    ];

    public function register_siswa($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function login_siswa($nisn, $password)
    {
        return $this->db->table('tb_siswa')->where(
            ['nisn'=> $nisn,'password'=> $password]
        )->get()->getRowArray();
    }
}
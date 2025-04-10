<?php

namespace App\Models;

use CodeIgniter\Model;

class LampiranModel extends Model
{
  protected $table      = 'lampiran';  // Nama tabel
  protected $primaryKey = 'id_lampiran';   // Kolom primary key
  protected $allowedFields = ['jenis_lampiran', 'file_lampiran', 'keterangan', 'id_siswa']; // Kolom yang boleh diupdate/insert

  // Fungsi untuk mengambil semua data lampiran
  public function getAllData()
  {
    return $this->orderBy('id_lampiran', 'ASC')->findAll(); // Menggunakan findAll() yang disediakan oleh CodeIgniter Model
  }

  // Fungsi untuk membuat data lampiran
  public function createLampiran($data)
  {
    // Memastikan data yang dimasukkan sesuai dengan allowedFields
    return $this->insert($data);
  }

  // Relasi Many-to-One ke tabel tb_siswa
  public function siswa()
  {
    return $this->belongsTo('App\Models\SiswaModel', 'id_siswa', 'id_siswa');
  }

  public function getAllLampiranWithSiswa()
  {
    return $this->db->table('lampiran')
      ->select('lampiran.*, tb_siswa.nama_lengkap') // Ambil kolom yang diperlukan
      ->join('tb_siswa', 'tb_siswa.id_siswa = lampiran.id_siswa') // Join dengan tabel tb_siswa
      ->get()
      ->getResultArray();
  }
}

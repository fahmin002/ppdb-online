<?php

namespace App\Models;

use CodeIgniter\Model;

class LampiranModel extends Model
{
  protected $table      = 'lampiran';  // Nama tabel
  protected $primaryKey = 'id_lampiran';   // Kolom primary key
  protected $allowedFields = ['jenis_lampiran', 'file_lampiran', 'keterangan', 'id_pendaftar', 'keterangan']; // Kolom yang boleh diupdate/insert   
  // Fungsi untuk mengambil semua data pekerjaan
  public function getAllData()
  {
      return $this->orderBy('id_lampiran', 'ASC')->findAll(); // Menggunakan findAll() yang disediakan oleh CodeIgniter Model
  }

  public function createUser($data)
  {
      // Memastikan data yang dimasukkan sesuai dengan allowedFields
      return $this->insert($data);
  }
}

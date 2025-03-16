<?php

namespace App\Models;

use CodeIgniter\Model;

class AgamaModel extends Model
{
    protected $table      = 'tbl_agama';  // Nama tabel
    protected $primaryKey = 'id';   // Kolom primary key
    protected $allowedFields = ['agama']; // Kolom yang boleh diupdate/insert

    // Jika Anda menggunakan timestamp
    protected $useTimestamps = true;
    protected $createdField  = 'created_at'; // Nama kolom untuk created_at
    protected $updatedField  = 'updated_at'; // Nama kolom untuk updated_at

    // Fungsi untuk mengambil semua data pekerjaan
    public function getAllData()
    {
        return $this->orderBy('id', 'ASC')->findAll(); // Menggunakan findAll() yang disediakan oleh CodeIgniter Model
    }
}

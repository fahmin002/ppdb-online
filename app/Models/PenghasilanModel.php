<?php

namespace App\Models;

use CodeIgniter\Model;

class PenghasilanModel extends Model
{
    protected $table      = 'penghasilan';  // Nama tabel
    protected $primaryKey = 'id';          // Kolom primary key
    protected $allowedFields = ['penghasilan']; // Kolom yang boleh diupdate/insert

    // Jika Anda ingin mengambil semua data dan mengurutkannya berdasarkan id
    public function getAllData()
    {
        return $this->orderBy('id', 'ASC')->findAll(); // Mengurutkan berdasarkan id secara ascending
    }
}
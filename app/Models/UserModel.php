<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'tbl_user';  // Nama tabel
    protected $primaryKey = 'id_user';   // Kolom primary key
    protected $allowedFields = ['nama_user', 'email', 'password', 'foto']; // Kolom yang boleh diupdate/insert   
    // Fungsi untuk mengambil semua data pekerjaan
    public function getAllData()
    {
        return $this->orderBy('id_user', 'ASC')->findAll(); // Menggunakan findAll() yang disediakan oleh CodeIgniter Model
    }

    public function createUser($data)
    {
        // Memastikan data yang dimasukkan sesuai dengan allowedFields
        return $this->insert($data);
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_user', 'email', 'password', 'foto'];
    protected $returnType = 'array'; // Tambahkan ini untuk memastikan return type

    // Fungsi untuk mengambil semua data user
    public function getAllData()
    {
        return $this->orderBy('id_user', 'ASC')->findAll();
    }

    public function createUser($data)
    {
        // Validasi data sebelum insert
        if (!empty($data)) {
            return $this->insert($data);
        }
        return false;
    }

    // Tambahkan fungsi untuk debugging
    public function checkTableExists()
    {
        return $this->db->tableExists($this->table);
    }
}
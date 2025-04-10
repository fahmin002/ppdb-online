<?php

namespace App\Models;

use CodeIgniter\Model;

class JalurMasukModel extends Model
{
    protected $table = 'tb_jalur_masuk';
    protected $primaryKey = 'id_jalur_masuk';
    protected $allowedFields = ['nama_jalur', 'keterangan'];

    public function getAllJalur()
    {
        return $this->orderBy('id_jalur_masuk', 'ASC')->findAll();
    }
}
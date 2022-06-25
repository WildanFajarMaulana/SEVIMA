<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomGuruModel extends Model
{
    protected $table      = 'tb_roomguru';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_guru','nama_pembelajaran','kode_room','jumlah_siswa','status'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    
}
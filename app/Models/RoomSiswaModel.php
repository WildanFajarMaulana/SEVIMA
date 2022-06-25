<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomSiswaModel extends Model
{
    protected $table      = 'tb_roomguru';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_room','id_siswa','status'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    
}